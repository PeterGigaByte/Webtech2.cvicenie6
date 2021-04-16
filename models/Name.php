<?php

class Name
{

    // database connection and table name
    private $conn;
    private $table_name = "names";

    // object properties
    public $id;
    public $day_id;
    public $country_id;
    public $name;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>