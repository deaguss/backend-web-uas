<?php

namespace App\Models;

use Database\Database;

class Model extends Database
{
    public function __construct(public $table)
    {
        parent::__construct();
    }

    public function get()
    {
        $query = mysqli_query($this->db, "SELECT * FROM $this->table");
        $data = array();

        while ($temp = mysqli_fetch_object($query)) {
            $data[] = $temp;
        }

        return $data;
    }

    public function getJoin($customQuery)
    {
        $query = mysqli_query($this->db, $customQuery);
        $data = array();

        while ($temp = mysqli_fetch_object($query)) {
            $data[] = $temp;
        }

        return $data;
    }

    public function post(array $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_map([$this, 'escapeString'], array_values($data)));

        $query = "INSERT INTO $this->table ($columns) VALUES ('$values')";

        $result = mysqli_query($this->db, $query);

        if ($result) {
            return mysqli_insert_id($this->db);
        } else {
            return false;
        }
    }

    public function put($id, array $data)
    {
        $updates = [];
        $params = [];
        
        foreach ($data as $column => $value) {
            $updates[] = "$column = ?";
            $params[] = $value;
        }
    
        $params[] = $id; 
        
        $updateString = implode(", ", $updates);
        
        $query = "UPDATE $this->table SET $updateString WHERE id = ?";
        $stmt = mysqli_prepare($this->db, $query);

        $types = str_repeat('s', count($params)); 
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        
        $result = mysqli_stmt_execute($stmt);
    
        if ($result) {
            return mysqli_stmt_affected_rows($stmt);
        } else {
            return false;
        }
    }
    
    

    private function escapeString($value)
    {
        return mysqli_real_escape_string($this->db, $value);
    }
}
