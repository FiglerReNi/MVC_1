<?php

namespace core\database;

use mysqli;

class MySqlConnect
{
    private $mysqli;

    /**
     * MySqlConnect constructor.
     */
    public function __construct($db)
    {
        $host = constant($db . '_DATABASE_HOST');
        $username = constant($db . '_DATABASE_USERNAME');
        $password = constant($db . '_DATABASE_PASSWORD');
        $dbname = constant($db . '_DATABASE_NAME');
        $this->mysqli = new mysqli($host, $username, $password, $dbname);
        if ($this->mysqli->connect_errno) {
            die('Adatbázis kapcsolódási hiba' . $this->mysqli->error);
        }
    }

    //Ezzel a módszerrel minden számunkra szükséges functiont megcsinálhatunk
    public function query($query, $result_mode = MYSQLI_STORE_RESULT)
    {
        return $this->mysqli->query($query);
    }

    public function real_escape_string($string)
    {
        return $this->mysqli->real_escape_string($string);
    }



}
