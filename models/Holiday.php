<?php

class Holiday
{

    // database connection and table name
    private $conn;
    private $table_name = "holidays";

    // object properties
    public $id;
    public $day_id;
    public $country_id;

    public $name;
    public $date;
    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // read holidays
    function findAll($country){
        // select all query
        $query = "SELECT
                d.day,d.month, p.id, p.day_id, p.country_id, p.name
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    days d
                        ON p.day_id = d.id
                        LEFT JOIN
                    countries c
                        ON p.country_id = c.id
                        WHERE c.country_name = ?
                        GROUP BY p.id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $country);
        // execute query
        $stmt->execute();

        return $stmt;
    }
}

?>