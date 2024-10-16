<?php

use app\controllers\Index;
use app\controllers\Error;
use NGFramer\NGFramerPHPBase\registry\RegistrySetter;

// Creating a new instance of the RegistrySetter.
$registry = new RegistrySetter();

// Setting the custom routes for the Application.
$registry->selectMethod('get')->selectPath('/')->setCallback([Index::class, 'index']);
$registry->selectMethod('get')->selectPath('/error')->setCallback([Error::class, 'index']);