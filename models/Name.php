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
    function findByDateAndCountry($day,$month,$country){
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
                        WHERE c.country_name = ? AND d.day = ? AND d.month = ?
                        GROUP BY p.id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $country);
        $stmt->bindParam(2, $day);
        $stmt->bindParam(3, $month);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function findByName($name_input,$country_input){
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
                        WHERE p.name = ? AND c.country_name = ?
                        GROUP BY p.id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $name_input);
        $stmt->bindParam(2, $country_input);
        // execute query
        $stmt->execute();

        return $stmt;
    }
    function create(){

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, day_id=:day_id, country_id=:country_id";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->day_id=htmlspecialchars(strip_tags($this->day_id));
        $this->country_id=htmlspecialchars(strip_tags($this->country_id));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":day_id", $this->day_id);
        $stmt->bindParam(":country_id", $this->country_id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}
?>

