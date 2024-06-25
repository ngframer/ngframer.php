<?php

// Filename: index.php
// Location: app/public/index.php

// Error logging turn on to everything.
error_reporting(E_ALL);

// Load the autoloader and use namespace.
require_once  __DIR__ . '/../vendor/autoload.php';

// Start using the namespace.
use NGFramer\NGFramerPHPBase\Application;

// Instantiate the application.
$application = new Application();

// Now, run the application.
try {
    Application::$application->run();
} catch (Exception $e) {
    // Log the error.
    error_log(json_encode($e));
    if (\app\config\ApplicationConfig::get('appMode') == 'api') {
        throw $e;
    }
    else {
        // TODO: Handle the error, Use the most appropriate error handler.
    }
}