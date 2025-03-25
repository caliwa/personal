<?php

use App\Livewire\ContactForm\MediatorContactFormComponent;
use App\Livewire\Dashboard\MediatorDashboardComponent;
use App\Livewire\Gallery\MediatorGalleyComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return redirect('/landing');
});

Route::get('/landing', MediatorDashboardComponent::class)->name('dashboard');

Route::get('/galeria', MediatorGalleyComponent::class)->name('gallery');

Route::get('/contactanos', MediatorContactFormComponent::class)->name('contactform');
