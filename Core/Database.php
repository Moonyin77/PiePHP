<?php

namespace Core;
use PDO;

class Database {

    protected $host = "mysql:host=localhost";
    protected $dbname = ";dbname=piephp";
    protected $login = "root";
    protected $pwd = "";
    public $pdo;


    public function __construct()
    {
        $this->pdo = $this->bddLogin();
    }

    public function bddLogin()
    {
        return new PDO($this->host . $this->dbname , $this->login , $this->pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}