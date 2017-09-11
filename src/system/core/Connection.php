<?php

Namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Connection {

    public function __construct() {
        $this->capsule = new Capsule;
        // Same as database configuration file of Laravel.
        $capsule->addConnection([
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'teste',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci'
        ]);
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        // Hold a reference to established connection just in case.
        $this->connection = $this->capsule->getConnection('default');
    }
}
