<?php

class Database
{
    private function connect()
    {
        $string = "mysql:hostname=localhost;dbname=biblioteca_iis";
        $con = new PDO($string, 'root', '');
        return $con;
    }

    public function query()
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute();

        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result))
            {
                return $result;
            }
        }

        return false;
    }
}