<?php

Trait Model 
{
    use Database;

    protected $table = 'classe';
    public function where($data)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " AND ";
        }
        $query = trim($query, " AND ");
        return $this->query($query, $data);
    }

    public function insert($data)
    {
        
    }

    public function update($id, $data)
    {
        
    }

    public function delete($id)
    {
        
    }
}