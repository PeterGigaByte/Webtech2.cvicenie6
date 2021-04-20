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
    public function getDayId($day,$month){
        $query = "SELECT
                d.id
            FROM
                " . $this->table_name . " d
                        WHERE d.day = ? AND d.month = ?
                        LIMIT 1";
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $day);
        $stmt->bindParam(2, $month);
        // execute query
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["id"];
    }
}
?>