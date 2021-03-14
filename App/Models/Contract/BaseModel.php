<?php

namespace App\Models\Contract;

class BaseModel implements CRUD
{
    /**
     * Type of connection
     *
     * @var string
     */
    public $conn;

    /**
     * Table name
     *
     * @var string
     */
    public static $table;

    /**
     * Set type of connection
     */
    public function __construct()
    {
        global $medoo;
        $this->conn = $medoo;
    }

    /**
     * Create record
     *
     * @param array $data
     * @return int
     */
    public function create($data)
    {
        $this->conn->insert(static::$table, $data);
        return $this->conn->id();
    }

    /**
     * Select records
     *
     * @param array $columns
     * @param array $where
     * @return void
     */
    public function read($columns = '*', $where = array())
    {
        return $this->conn->select(static::$table, $columns, $where);
    }

    /**
     * Update record
     *
     * @param array $data
     * @param array $where
     * @return void
     */
    public function update($data, $where)
    {
        $result = $this->conn->update(static::$table, $data, $where);
        return $result->rowCount();
    }

    /**
     * Delete record
     *
     * @param array $where
     * @return void
     */
    public function delete($where)
    {
        $result = $this->conn->delete(static::$table, $where);
        return $result->rowCount();
    }

    /**
     * It is clear
     *
     * @param string $where
     * @return void
     */
    public function count($where = array())
    {
        return $this->conn->count(static::$table, $where);
    }

    /**
     * Raw query
     *
     * @param string $query
     * @return void
     */
    public function query($query)
    {
        return $this->conn->query($query);
    }
}