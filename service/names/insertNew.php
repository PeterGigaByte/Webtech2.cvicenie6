<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../../config/Database.php';

// instantiate name object
include_once '../../models/Name.php';
include_once '../../models/Country.php';
include_once '../../models/Day.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // set response code - 503 service unavailable
    http_response_code(405);

    // tell the user
    echo json_encode(array("message" => "Method not allowed."));
    // The request is using the POST method
    exit();
}
$database = new Database();
$db = $database->getConnection();

$nameToInsert = new Name($db);
$day = new Day($db);
$country = new Country($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// make sure data is not empty

if(
    !empty($data->name) &&
    !empty($data->day) &&
    !empty($data->month) &&
    !empty($data->country)
){
    $day_id = $day->getDayId($data->day,$data->month);
    $country_id = $country->getCountryId($data->country);

    // set name property values
    $nameToInsert->name = $data->name;
    $nameToInsert->day_id = $day_id;
    $nameToInsert->country_id = $country_id;

    // create the name
    if($nameToInsert->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Name was created."));
    }

    // if unable to create the name, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create name."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create name. Data is incomplete."));
}
?>