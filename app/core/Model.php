<?php

Trait Model 
{
    use Database;

    public function where($data)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM $this->table WHERE  ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " AND ";
        }
        if($key == "Titolo") {
            $query = str_replace("=", "LIKE", $query);
        }
        $query = trim($query, " AND ");
        return $this->query($query, $data);
    }

    public function findAll(){
        $query = "SELECT * FROM $this->table ";
        return $this->query($query);
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(", ", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";
        $this->query($query, $data);
        return false;
    }

    public function update($id, $data)
    {
        
    }

    public function delete($id)
    {
        
    }
}