<?php

use Repository\UserRepositoryImpl;
use Service\UserServiceImpl;
use Config\Database; // Import the Database class

class Controller
{
    public function getDatabaseConnection()
    {
        require_once '../App/Config/database.php';
        try {
            $pdo = Database::getConnection();
            return $pdo;
        } catch (\Exception $e) {
            throw new \Exception("Database error: " . $e->getMessage());
        }
    }

    public function view($view, $data = [])
    {
        require_once '../App/View/' . $view . '.php';
    }

    public function model($file)
    {
        require_once '../App/Model/' . $file . '.php';
    }

    public function repository($class, $namespace, ...$params)
    {
        require_once '../App/Repository/' . $class . '.php';

        // Use reflection to create an instance with variable constructor parameters
        $reflectionClass = new ReflectionClass($namespace);
        $repo = $reflectionClass->newInstanceArgs($params);
        return $repo;
    }


    public function service($class, $namespace, ...$params)
    {
        require_once '../App/Service/' . $class . '.php';
        $reflectionClass = new ReflectionClass($namespace);
        $service = $reflectionClass->newInstanceArgs($params);
        return $service;
    }
}
