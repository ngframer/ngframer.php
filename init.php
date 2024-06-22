<?php

namespace NGFramer\NGFramerPHPSQLServices;

use app\config\ApplicationConfig;
use NGFramer\NGFramerPHPExceptions\exceptions\ApiError;
use NGFramer\NGFramerPHPExceptions\handlers\ApiExceptionHandler;

if (!class_exists('app\config\ApplicationConfig')) {
    Throw new \Exception("The project can't be used independently without ngframer.php.");
}

// Set the display error property to E_ALL when in development.
$appMode = ApplicationConfig::get('appMode');
if ($appMode == 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
}

// Set the default error handler based on if it's an API.
$appType = ApplicationConfig::get('appType');
if ($appType == 'api') {
    //Convert the error to an exception (SqlBuilderException).
    set_error_handler([new ApiError(), 'convertToException']);
    // Set the custom exception handler for the library.
    set_exception_handler([new ApiExceptionHandler(), 'handle']);
}
