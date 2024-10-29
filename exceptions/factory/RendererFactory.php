<?php

namespace App\Exceptions\Factory;

use Exception;
use Throwable;
use App\Config\ApplicationConfig;
use NGFramer\NGFramerPHPExceptions\Render;
use NGFramer\NGFramerPHPExceptions\exceptions\BaseError;
use NGFramer\NGFramerPHPExceptions\renderer\supportive\_BaseRenderer;

class RendererFactory
{
    /**
     * Function to handle exceptions globally.
     *
     * @param Throwable $exception
     * @throws Exception
     */
    public function globalHandler(Throwable $exception): void
    {
        // Get the AppMode from the config.
        // If you're not using ngframer.php, get config data your own way.
        // For ngframer.php, you can use the following code.
        $appMode = ApplicationConfig::get('appMode');

        // Error logging turn on to everything.
        error_reporting(E_ALL);
        ini_set('error_log', '../logs/errors.log');

        // Check if the appMode is development.
        // Applicable to if you're using ngframer.php or not.
        if ($appMode == 'development') {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
        } else {
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
        }

        // Use this snippet of code to use your own renderer.
        // $renderer = $this->create();
        // Use this snippet of code to use the default renderer.
        $renderer = Render::create();

        // This will be applicable to both the default and custom renderer.
        $renderer->render($exception);
    }


    /**
     * Function to register the exception handler.
     */
    public function register(): void
    {
        set_error_handler([(new BaseError()), 'convertToException']);
        set_exception_handler([$this, 'globalHandler']);
    }


    /**
     * Function to create a new renderer factory.
     * Creates and returns an appropriate Exception renderer based on the environment.
     *
     * @returns _BaseRenderer
     * @throws Exception
     */
    public static function create(): _BaseRenderer
    {
        // Check the environment and return the appropriate renderer.
        // Check if the environment is cli.
        if (php_sapi_name() === 'cli') {
            return new CLIExceptionRenderer();
        }

        // Check if the environment is api.
        if (ApplicationConfig::get('appType') === 'api') {
            if (ApplicationConfig::get('appMode') === 'development') {
                return new ApiExceptionDevelopmentRenderer();
            }
            return new ApiExceptionProductionRenderer();
        }

        // If the environment is not cli or api, return the default renderer.
        return new HtmlExceptionRenderer();
    }
}