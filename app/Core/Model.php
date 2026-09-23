<?php

class Model
{
    protected mysqli $db;

    public function __construct()
    {
        $database = new Database();

        $this->db = $database->getConnection();
    }
}