<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Memorable_day.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$memorable_day = new Memorable_day($db);

$country = isset($_GET['country']) ? $_GET['country'] : die();

// query products
$stmt = $memorable_day->findAll($country);
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // products array
    $memorable_days_arr = array();
    $memorable_days_arr["memorable_days"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $memorable_day_item = array(
            "id" => $id,
            "name" => $name,
            "date" => $day . "." . $month . ".",
        );

        array_push($memorable_days_arr["memorable_days"], $memorable_day_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($memorable_days_arr);
} else {

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No memorable_days found.")
    );
}


// no products found will be here


// no products found will be here
