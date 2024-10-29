<?php

namespace App\Models;

use Exception;
use NGFramer\NGFramerPHPBase\model\DbModel;

class UserModel extends DbModel
{
    protected array $structure = [
        'type' => 'table', 'name' => 'examples'
    ];

    protected array $fields = ['id', 'username', 'password'];
    protected array $fillableFields = ['username', 'password'];
    protected array $guardedFields = [];


    /**
     * Have as many custom functions as per the need.
     * @throws Exception
     */
    public function create($username, $password): void
    {
        $this->insert(['username'=>$username, 'password'=>$password]);
    }
}

