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
    public function read($columns, $where)
    {
        return $this->Conn->select(static::$table, $columns, $where);
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
        return $this->conn->update(static::$table, $data, $where);
    }

    /**
     * Delete record
     *
     * @param array $where
     * @return void
     */
    public function delete($where)
    {
        return $this->conn->delete(static::$table, $where);
    }

    /**
     * It is clear
     *
     * @param string $where
     * @return void
     */
    public function count($where)
    {
        return $this->conn->count(static::$table, $where);
    }
}