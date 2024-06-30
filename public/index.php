<?php

// Filename: index.php
// Location: app/public/index.php

// Error logging turn on to everything.
error_reporting(E_ALL);
ini_set('error_log', '../logs/errors.log');

// Load the autoloader and use namespace.
require_once  __DIR__ . '/../vendor/autoload.php';

// Start using the namespace.
use NGFramer\NGFramerPHPBase\Application;

// Instantiate the application.
$application = new Application();

// Now, run the application.
Application::$application->run();