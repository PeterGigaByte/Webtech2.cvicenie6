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
    public function getCountryId($country_name){
            $query = "SELECT
                c.id
            FROM
                " . $this->table_name . " c
                        WHERE c.country_name = ?
                       LIMIT 1 ";
            // prepare query statement
            $stmt = $this->conn->prepare($query);

            // bind id of product to be updated
            $stmt->bindParam(1, $country_name);

            // execute query
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC)["id"];
        }
}
?>