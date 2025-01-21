<?php

use NGFramer\NGFramerPHPBase\Registry\RegistrySetter;

// Creating a new instance of the RegistrySetter.
$registry = new RegistrySetter();


// Index pages.
$registry->selectMethod('get')->selectPath('/')->setCallback([App\Controllers\Index::class, 'index']);
$registry->selectMethod('get')->selectPath('/home')->setCallback([App\Controllers\Index::class, 'index']);

// Error pages.
$registry->selectMethod('any')->selectPath('any')->setCallback([App\Controllers\Error::class, 'index']);
