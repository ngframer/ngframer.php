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
        $this->databaseConfig['db_name'] = 'exampleDbName';
        $this->databaseConfig['db_host'] = 'localhost';
        $this->databaseConfig['db_port'] = 3306;
        $this->databaseConfig['db_user'] = 'exampleDbUser';
        $this->databaseConfig['db_pass'] = 'exampleDbPass';
        $this->databaseConfig['db_dsn'] = 'mysql:host='.self::get('db_host').';dbname='.self::get('db_name').';';
        // Setting up the current level of database migration if exists.
        $this->databaseConfig['db_migration'] = '1'; // Possible values: ['0', '1, 2, n, '1', '2', 'n', 'none', '']
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
