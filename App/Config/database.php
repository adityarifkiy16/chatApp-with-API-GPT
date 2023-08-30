<?php

namespace Config {
    class Database
    {
        public static $connection;

        static function getConnection(): \PDO
        {
            if (self::$connection === null) {


                $host = "localhost";
                $dbname = "db_chatai";
                $username = "root";
                $password = "";
                self::$connection = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            } else {
                self::$connection = "error connection";
            }

            return self::$connection;
        }

        // method menutup koneksi
        static function closeConnection(): void
        {
            self::$connection = null;
        }
    }
}
