<?php

class Database {

    private static $instance = NULL;

    private $pdo;

    private function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=framework', 'root', '123');
        }
        catch (PDOException $e)
        {
            var_dump($e);
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __sleep() {}
    private function __wakeup() {}
    private function __clone() {}

    public static function instance()
    {
        if (self::$instance === NULL)
            self::$instance = new Database;

        return self::$instance;
    }

    public function select_query($query, $model)
    {
        $query = $this->pdo->query($query);

        $query->setFetchMode(PDO::FETCH_CLASS, $model);

        $rows_count = $query->fetchColumn();

        switch ($rows_count)
        {
            case 0:
                return array();
            case 1:
                return $query->fetch();
            default:
                return $query->fetchAll();
        }
    }

    public function insert_query($query, array $values)
    {
        $query = $this->pdo->prepare($query);

        $query->execute($values);
    }
}