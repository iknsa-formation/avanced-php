<?php


namespace poo;

class DbConnect
{
    const SQL_USER = 'formation';
    const SQL_HOST = 'localhost';
    const SQL_DBNAME = 'formation';
    const SQL_PASSWORD = 'PassPhp';

    protected $db = null;

    public function __construct()
    {
        if (!$this->db) {

            $this->db = new \PDO(
                'mysql:dbname='.self::SQL_DBNAME.';host='.self::SQL_HOST,
                self::SQL_USER,
                self::SQL_PASSWORD
            );
        }
    }

    public function getDb() {
        return $this->db;
    }
}