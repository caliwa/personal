<?php

use App\Livewire\Cerrajeria\Auth\CerrajeriaLoginComponent;
use App\Livewire\Cerrajeria\Dashboard\DashboardMediatorComponent;
use App\Livewire\ContactForm\MediatorContactFormComponent;
use App\Livewire\Dashboard\MediatorDashboardComponent;
use App\Livewire\Gallery\MediatorGalleyComponent;
use App\Livewire\Pitch\MediatorPitchComponent;
use App\Livewire\TestExamples\MediatorTestExamplesComponent;
use Illuminate\Support\Facades\Route;


//Route::get('/landing', MediatorDashboardComponent::class)->name('dashboard');

Route::get('/', MediatorGalleyComponent::class)->name('dashboard');

Route::get('/contactanos', MediatorContactFormComponent::class)->name('contactform');

Route::get('/demo', MediatorTestExamplesComponent::class)->name('testexamples');
Route::get('/pitch', MediatorPitchComponent::class)->name('pitch');


Route::get('/cerrajeria', CerrajeriaLoginComponent::class)->name('cerrajeria.login');

Route::prefix('cerrajeria')->group(function () {
    Route::get('/dashboard', DashboardMediatorComponent::class)->name('dashboard-cerrajeria');
});
