<?php

namespace App\Livewire\TestExamples;

use Livewire\Component;
use setasign\Fpdi\Fpdi;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Isolate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FilesystemException;
use Illuminate\Support\Facades\DB;

#[Isolate]
class IndexTestExamplesComponent extends Component
{
    public $pdfName;
    public $pdfBase64;
    public $currentPage = 1;
    public $totalPages = 0;

    //RECIBIR
    //ID_MOVIMIENTO
    //ID_ASESOR
    //DocEntry
    //NOMBRE PDF (PARA VER EN RUTA COMPLETA)
    
    public function mount()
    {
        // Opción 1: Usar una URL fija de ejemplo
        $publicPdfUrl = 'https://pdfobject.com/pdf/sample.pdf';
        
        // Opción 2: Construir la URL dinámicamente si tienes un patrón
        // $publicPdfUrl = 'https://pdfobject.com/pdf/'.$this->pdf_url_name.'.pdf';
        
        try {
            // Método simple con file_get_contents()
            $fileContents = file_get_contents($publicPdfUrl);
            
            // Alternativa con Guzzle (mejor para producción)
            // $client = new \GuzzleHttp\Client();
            // $response = $client->get($publicPdfUrl);
            // $fileContents = $response->getBody();
            
            if(!$fileContents) {
                dd('Archivo no encontrado en el repositorio público');
            }
            
            $this->pdfBase64 = base64_encode($fileContents);
            
        } catch (\Exception $e) {
            dd("Error al obtener PDF: " . $e->getMessage());
        }
    }
    private function mergeAnnotationLayers($drawingData, $textData, $imageData)
    {
        // Crear array de capas válidas
        $layers = array_filter([
            'images' => $imageData ? imagecreatefromstring(base64_decode(explode(',', $imageData)[1])) : null,
            'drawing' => $drawingData ? imagecreatefromstring(base64_decode(explode(',', $drawingData)[1])) : null,
            'text' => $textData ? imagecreatefromstring(base64_decode(explode(',', $textData)[1])) : null
        ]);
        
        if (empty($layers)) return null;
        
        // Obtener dimensiones de la primera capa disponible
        $firstLayer = reset($layers);
        $width = imagesx($firstLayer);
        $height = imagesy($firstLayer);
        
        // Crear nueva imagen para la fusión
        $mergedImage = imagecreatetruecolor($width, $height);
        
        // Configurar transparencia
        imagesavealpha($mergedImage, true);
        $trans_colour = imagecolorallocatealpha($mergedImage, 0, 0, 0, 127);
        imagefill($mergedImage, 0, 0, $trans_colour);
        
        // Fusionar todas las capas en orden (imágenes primero, luego dibujos, luego texto)
        foreach ($layers as $layer) {
            // Mantener la calidad de la imagen
            imagealphablending($layer, true);
            imagesavealpha($layer, true);
            
            // Copiar la capa manteniendo la transparencia y la calidad
            imagecopyresampled(
                $mergedImage,    // Destino
                $layer,         // Origen
                0, 0,           // Destino x, y
                0, 0,           // Origen x, y
                $width,         // Ancho destino
                $height,        // Alto destino
                $width,         // Ancho origen
                $height,        // Alto origen
            );
            
            imagedestroy($layer);
        }
        
        return $mergedImage;
    }


    #[On('annotationDataJS')]
    public function saveAnnotatedPdf($annotationData)
    {
        try {
            $decodedData = json_decode($annotationData);
            
            // Create temp directory if it doesn't exist
            $tempDir = storage_path('app/temp');
            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }
            
            // Generate unique filenames
            $timestamp = time();
            $originalPdf = $tempDir . '/original_' . $timestamp . '.pdf';
            $finalPdf = $tempDir . '/annotated_' . $timestamp . '.pdf';
            
            // Save original PDF
            $pdfContent = base64_decode($decodedData->pdfData);
            file_put_contents($originalPdf, $pdfContent);
            
            // Create new PDF with FPDI
            $pdf = new Fpdi();
            
            // Get total pages
            $pageCount = $pdf->setSourceFile($originalPdf);
            
            // Process each page
            foreach ($decodedData->annotations as $pageAnnotation) {
                $pageNum = $pageAnnotation->pageNumber;
                
                // Skip if page number is invalid
                if ($pageNum < 1 || $pageNum > $pageCount) continue;
                
                // Import page
                $template = $pdf->importPage($pageNum);
                $size = $pdf->getTemplateSize($template);
                
                // Add page with same orientation and size as original
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $pdf->useTemplate($template);
                
                // Process annotations if they exist for this page
                if ($pageAnnotation->drawings || $pageAnnotation->text || $pageAnnotation->images) {
                    $annotationPath = $tempDir . '/annotation_' . $timestamp . '_' . $pageNum . '.png';
                    
                    $mergedImage = $this->mergeAnnotationLayers(
                        $pageAnnotation->drawings,
                        $pageAnnotation->text,
                        $pageAnnotation->images
                    );
                    
                    if ($mergedImage) {
                        // Guardar con la máxima calidad
                        imagepng($mergedImage, $annotationPath, 0);  // 0 = máxima calidad
                        imagedestroy($mergedImage);
                        
                        // Mantener las dimensiones exactas al añadir al PDF
                        $pdf->Image(
                            $annotationPath, 
                            0, 0, 
                            $size['width'], 
                            $size['height'], 
                            'PNG'
                        );
                        
                        unlink($annotationPath);
                    }
                }
            }
            
            // Save final PDF
            $pdf->Output($finalPdf, 'F');
            
            // Clean up original PDF file
            unlink($originalPdf);
            return response()->download($finalPdf, 'annotated_document.pdf', [
                'Content-Type' => 'application/pdf'
            ])->deleteFileAfterSend(true);
            //return $this->redirect('/landing', navigate: true);
            
            // Stream the file for download
            // return response()->download($finalPdf, 'annotated_document.pdf', [
            //     'Content-Type' => 'application/pdf'
            // ])->deleteFileAfterSend(true);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function downloadPDF($finalPdf){

    }

    public function render()
    {
        return view('livewire.test-examples.index-test-examples-component',
            [
                "pdfBase64" => $this->pdfBase64
            ]
        );
    }
}
