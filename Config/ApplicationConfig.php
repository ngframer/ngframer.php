<?php

namespace App\Config;

use App\Exceptions\AppException;
use Exception;

class ApplicationConfig
{
    /**
     * Variable to store the instance of the class.
     * @var ApplicationConfig|null $instance
     */
    private static ?self $instance;


    /**
     * Variable to store the application configuration data.
     * @var array $applicationConfig
     */
    private array $applicationConfig = [];


    /**
     * Function to initialize the Configuration.
     * Set the variable not directly to the class.
     * Set from applicationConfig variable in this function to avoid problems.
     *
     * @return void
     */
    private function init(): void
    {
        // Setting up an instance of the class.
        self::$instance = $this;
        // Setting up the variables to store data of applicationConfig.
        // Setting up the name of the application.
        $this->applicationConfig['appName'] = 'NGFramerPHP';
        // Setting up the location and the namespace.
        $this->applicationConfig['root'] = dirname(__DIR__);
        $this->applicationConfig['namespace'] = 'app';
        // Setting up application mode and application type.
        $this->applicationConfig['appMode'] = 'production'; // Possible values: [production, development]
        $this->applicationConfig['appType'] = 'app'; // Possible values: [api, app].
    }


    /**
     * Function to get the application configuration details.
     *
     * @param string $variableName
     * @return mixed
     * @throws Exception
     */
    public static function get(string $variableName): mixed
    {
        // Check if the instance is set.
        if (empty(self::$instance)) {
            (new self())->init();
        }
        // Return the variable if it exists.
        return self::$instance->applicationConfig[$variableName] ?? throw new AppException('Variable not found in ApplicationConfig class.');
    }
}
