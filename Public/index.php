<?php

// Filename: index.php
// Location: App/Public/index.php

// Load the autoloader and use namespace.
require_once  __DIR__ . '/../vendor/autoload.php';

// Start using the following classes.
use App\Exceptions\Factory\RendererFactory;
use NGFramer\NGFramerPHPBase\Application;

// Start the error renderer factory.
$renderFactory = new RendererFactory();
$renderFactory->register();

// Instantiate the application.
$application = new Application();

// Now, run the application.
Application::$application->run();