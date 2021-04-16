<?php

class Country
{

    // database connection and table name
    private $conn;
    private $table_name = "countries";

    // object properties
    public $id;
    public $country_name;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>