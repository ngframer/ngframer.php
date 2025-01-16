<?php

namespace App\Models;

use Exception;
use App\Schemas\DbTableName;
use NGFramer\NGFramerPHPBase\Model\DbModel;

class UserModel extends DbModel
{
    /**
     * Have as many custom functions as per the need.
     * @throws Exception
     */
    public function create($username, $password): array
    {
        // Use the schema for accessing the tables.
        DbTableName::init()->insert([]);
        // Respond as per the need.
        return [];
    }
}

