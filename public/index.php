<?php

// Filename: index.php
// Location: app/public/index.php

// Error logging turn on to everything.
error_reporting(E_ALL);
ini_set('error_log', '../logs/errors.log');

// Load the autoloader and use namespace.
require_once  __DIR__ . '/../vendor/autoload.php';

// Start using the following classes.
use app\exceptions\factory\RendererFactory;
use NGFramer\NGFramerPHPBase\Application;

// Start the error renderer factory.
$renderFactory = new RendererFactory();
$renderFactory->register();

// Instantiate the application.
$application = new Application();

// Now, run the application.
Application::$application->run();