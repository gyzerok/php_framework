<?php

abstract class Model {

    protected $database;
    protected $table_name;
    protected $values = array();

    public function __construct()
    {
        $this->database = Database::instance();
    }

    public function __get($column)
    {
        return $this->values[$column];
    }

    public function __set($column, $value)
    {
        $this->values[$column] = $value;
    }

    public static function factory($model)
    {
        $class_name = 'Model_'.$model;
        return new $class_name;
    }

    public function find($id)
    {
        return $this->database->select_query('SELECT * FROM '.$this->table_name.' WHERE id = '.$id, get_class($this));
    }

    public function find_all()
    {
        return $this->database->select_query('SELECT * FROM '.$this->table_name, get_class($this));
    }

    public function values(array $values)
    {
        foreach ($values as $key => $value)
        {
            $this->values[$key] = $value;
        }

        return $this;
    }

    public function save()
    {
        foreach ($this->values as $key => $value)
        {
            $ins[] = ':'.$key;
        }

        $fields = implode(',', array_keys($this->values));
        $ins = implode(',', $ins);

        $this->database->insert_query('INSERT INTO '.$this->table_name." ($fields) VALUES ($ins)", $this->values);
    }
}