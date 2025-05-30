<?php

namespace App\Livewire\Modulos\Traits;

trait AdapterNoSymbolsCleaveZenJSTrait {

    public function noSymbolsCleaveZenJS($ArrayNumberString, $default = false){
        foreach ($ArrayNumberString as $NumberStringProperty) {
            $property_name = $NumberStringProperty['property_name'];
            if(isset($NumberStringProperty['is_string'])){
                $is_string_param = $NumberStringProperty['is_string'];
                if($is_string_param){
                    $is_string = true;
                }else{
                    $is_string = false;
                }
            }else{
                $is_string = false;
            }

            $property_value = data_get($this, $property_name);

            $decimals = $this->CountDecimals($property_value);

            $value_set = $this->convertionSymbolsCleaveZenJS($property_value, $decimals, $is_string);

            data_set($this, $property_name, $value_set);
        }

        return true;
    }

    private function CountDecimals($property_value){
        $parts = explode('.', $property_value);

        if (count($parts) === 2) {
            $decimals = strlen($parts[1]);
        } else {
            $decimals = 0;
        }
        return $decimals;
    }

    private function convertionSymbolsCleaveZenJS($numberString, $decimals, $is_string){
        $numberString = trim($numberString);

        $return_value = null;
        if($is_string){
            $return_value = '';
        }else{
            $return_value = 0;
        }
        
        if (empty($numberString) || !preg_match('/[0-9]/', $numberString)) {

            return $return_value;
        }
        
        $cleanNumber = preg_replace('/^[^0-9]+|[^0-9.]+$/', '', $numberString);
        
        $withoutCommas = str_replace(',', '', $cleanNumber);
        
        if (empty($withoutCommas) || !preg_match('/[0-9]/', $withoutCommas)) {
            return $return_value;
        }
        
        $parts = explode('.', $withoutCommas);
        
        $integerPart = $parts[0];
        
        if (isset($parts[1])) {
            $decimalPart = substr($parts[1], 0, $decimals);
            $decimalPart = str_pad($decimalPart, $decimals, '0');
        } else {
            $decimalPart = str_repeat('0', $decimals);
        }
        
        if (empty($integerPart) && preg_match('/^0*$/', $decimalPart)) {
            return $return_value;
        }

        return $integerPart . ($decimals > 0 ? '.' . $decimalPart : '');
    }

    public function InitCleaveZenFormatNumeral(){
        $this->js('applyFormatToAllInputs()');
    }
}