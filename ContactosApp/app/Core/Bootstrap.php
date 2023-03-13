<?php

namespace App\Core;

use Dotenv\Dotenv;

class Bootstrap
{
    public function declararConst()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "./../..");
        $dotenv->load();
        define("DBHOST", $_ENV["DBHOST"]);
        define("DBUSER", $_ENV["DBUSER"]);
        define("DBPASS", $_ENV["DBPASS"]);
        define("DBNAME", $_ENV["DBNAME"]);
        define("DBPORT", $_ENV["DBPORT"]);
        define("KEY", $_ENV["KEY"]);
    }
}
