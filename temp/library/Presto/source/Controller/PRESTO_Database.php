<?php

class PRESTO_Database
{
    private $dsn = 'pgsql:host=localhost;port=5432;dbname=mymoney;user=postgres;password=postgres';
    protected $connection;

    public function __construct()
    {
        #abre conexao
        try {
            $this->connection = new PDO($this->dsn);
        } catch (PDOException $e) {
            die($e);
        }
    }

    public function getConnection(){
        return $this->connection;
    }

}

