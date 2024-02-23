<?php

// Filename: index.php
// Location: ngframerphp/public/index.php

// Load the autoloader and use namespace.
require_once  __DIR__ . '/../config/application.php';
require_once  __DIR__ . '/../vendor/autoload.php';

// Start using the namespace.
use NGFramer\NGFramerPHPBase\Application;

// Instantiate the application.
$application = new Application();

// Now, run the application.
try {
    Application::$application->run();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}