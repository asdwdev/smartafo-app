<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            $host = "127.0.0.1";   // sesuaikan
            $port = "5432";        // default postgres
            $dbname = "smartafo_db";  // ganti sesuai DB lo
            $user = "postgres";    // username postgres
            $password = "admin"; // password postgres

            try {
                self::$instance = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("DB Connection failed: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
