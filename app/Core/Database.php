<?php

class Database
{
    private mysqli $connection;

    public function __construct()
    {
        $config = require __DIR__ . '/../../config/database.php';

        $this->connection = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database'],
            $config['port']
        );

        if ($this->connection->connect_error) {
            die(
                'Database connection failed: ' .
                $this->connection->connect_error
            );
        }

        $this->connection->set_charset('utf8mb4');
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}