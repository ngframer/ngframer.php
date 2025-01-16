<?php

namespace App\Schemas;

use NGFramer\NGFramerPHPBase\Schema\DbSchema;

class DbTableName extends DbSchema
{
    // Structural properties of the database.
    protected array $structure = [
        'type' => 'table',
        'name' => 'DbTableName'
    ];

    // All the fields in the database.
    protected array $fields = ['accountId', 'password', '2ndAuth'];
    protected array $insertableFields = ['accountId', 'password', '2ndAuth'];
    protected array $updatableFields = ['password', '2ndAuth'];
    protected array $massUpdatableFields = [];
}