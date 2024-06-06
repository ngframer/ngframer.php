<?php

namespace app\config;

class ApplicationConfig
{
    // Variables to store data related to this class.
    private static ?self $instance;

    // Variables to store data related to this applicationConfig.
    private array $applicationConfig = [];


    private function init(): void
    {
        // Setting up instance of the class.
        self::$instance = $this;
        // Setting up the variables to store data of applicationConfig.
        // Setting up the name of the application.
        $this->applicationConfig['appName'] = 'NGFramerPHP';
        // Setting up the location and the namespace.
        $this->applicationConfig['root'] = dirname(__DIR__);
        $this->applicationConfig['namespace'] = 'app';
        // Setting up application mode and application type.
        $this->applicationConfig['appMode'] = ''; // Possible values: [production, development]
        $this->applicationConfig['appType'] = ''; // Possible values: ['api, web].
    }


    public static function get(string $variableName): mixed
    {
        // Check if the instance is set.
        if (empty(self::$instance)) {
            (new self())->init();
        }
        // Return the variable if it exists.
        return self::$instance->applicationConfig[$variableName] ?? throw new \Exception('Variable not found in ApplicationConfig class.');
    }
}