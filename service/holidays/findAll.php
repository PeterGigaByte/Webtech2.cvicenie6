<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Holiday.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$holiday = new Holiday($db);

$country = isset($_GET['country']) ? $_GET['country'] : die();

// query products
$stmt = $holiday->findAll($country);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
    // products array
    $holidays_arr=array();
    $holidays_arr["holidays"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $holiday_item=array(
            "id" => $id,
            "name" => $name,
            "date" => $day.".".$month.".",
        );

        array_push($holidays_arr["holidays"], $holiday_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($holidays_arr);
}else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No holidays found.")
    );
}


// no products found will be here



// no products found will be here
