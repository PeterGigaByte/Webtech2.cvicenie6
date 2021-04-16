<?php

class Day
{

    // database connection and table name
    private $conn;
    private $table_name = "days";

    // object properties
    public $id;
    public $day;
    public $month;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
}
?>