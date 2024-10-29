<?php

namespace App\Config;

use App\Exceptions\AppException;
use Exception;

class DatabaseConfig
{
    /**
     * Variable to store the instance of the class.
     * @var DatabaseConfig|null $instance
     */
    private static ?self $instance;


    /**
     * Variable to store the database configuration data.
     * @var array $databaseConfig
     */
    private array $databaseConfig = [];


    /**
     * Function to initialize the Configuration.
     * Set the variable not directly to the class.
     * Set from databaseConfig variable in this function to avoid problems.
     *
     * @return void
     * @throws Exception
     */
    private function init(): void
    {
        // Setting up an instance of the class.
        self::$instance = $this;
        // Setting up the variables to store data of applicationConfig.
        $this->databaseConfig['db_name'] = 'exampleDbName';
        $this->databaseConfig['db_host'] = 'localhost';
        $this->databaseConfig['db_port'] = 3306;
        $this->databaseConfig['db_user'] = 'exampleDbUser';
        $this->databaseConfig['db_pass'] = 'exampleDbPass';
        $this->databaseConfig['db_dsn'] = 'mysql:host='.self::get('db_host').';dbname='.self::get('db_name').';';
        // Setting up the current level of database migration if exists.
        $this->databaseConfig['db_migration'] = 'latest'; // Possible values: ['0', '1, 2, n, '1', '2', 'n', 'none', '']
    }


    /**
     * Function to get the database configuration details.
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
        return self::$instance->databaseConfig[$variableName] ?? throw new AppException('Variable not found in databaseConfig config class.');
    }
}
