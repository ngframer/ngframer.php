<?php

namespace app\config;

class DatabaseConfig
{
    // Variables to store data related to this class.
    private static ?self $instance;

    // Variables to store data related to this applicationConfig.
    private array $databaseConfig = [];


    private function init(): void
    {
        // Setting up instance of the class.
        self::$instance = $this;
        // Setting up the variables to store data of applicationConfig.
        $this->databaseConfig['db_name'] = 'users';
        $this->databaseConfig['db_host'] = 'localhost';
        $this->databaseConfig['db_port'] = 3306;
        $this->databaseConfig['db_user'] = 'root';
        $this->databaseConfig['db_pass'] = '';
        $this->databaseConfig['db_dsn'] = 'mysql:host='.self::get('db_host').';dbname='.self::get('db_name').';';
    }


    public static function get(string $variableName): mixed
    {
        // Check if the instance is set.
        if (empty(self::$instance)) {
            (new self())->init();
        }
        // Return the variable if it exists.
        return self::$instance->databaseConfig[$variableName] ?? throw new \Exception('Variable not found in databaseConfig config class.');
    }
}