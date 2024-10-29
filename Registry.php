<?php

use App\Controllers\Index;
use App\Controllers\Error;
use NGFramer\NGFramerPHPBase\Registry\RegistrySetter;

// Creating a new instance of the RegistrySetter.
$registry = new RegistrySetter();


// Setting the custom routes for the Application.
$registry->selectMethod('get')->selectPath('/')->setCallback([Index::class, 'index']);


// Set this path if you want to catch all the other routes to a specific callback.
$registry->selectMethod('any')->selectPath('any')->setCallback([Error::class, 'index']);