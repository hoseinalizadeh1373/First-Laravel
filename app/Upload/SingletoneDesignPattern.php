<?php

class dbconnection {

    private static $instance;

    protected $conn;

    private function __construct()
    {
        $this->conn = "DBconnected";
    }

    public static function getInstance(){
        self::$instance = self::$instance ?? new self();

        return self::$instance;
    }

}

$db = dbconnection::getInstance();
var_dump($db);
