<?php

use Illuminate\Support\Facades\Route;

// Application Routes
require __DIR__.'/app/index.php';

Route::fallback(function(){ return "Lost";});