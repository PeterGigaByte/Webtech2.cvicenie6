<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Name.php';
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    // set response code - 503 service unavailable
    http_response_code(405);

    // tell the user
    echo json_encode(array("message" => "Method not allowed."));
    // The request is using the POST method
    exit();
}
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$name = new Name($db);

$day = isset($_GET['day']) ? $_GET['day'] : die();
$month = isset($_GET['month']) ? $_GET['month'] : die();
$country = isset($_GET['country']) ? $_GET['country'] : die();




    // query products
    $stmt = $name->findByDateAndCountry($day,$month,$country);
    $num = $stmt->rowCount();

    // check if more than 0 record found
    if ($num > 0) {
        // products array
        $names_arr = array();
        $names_arr["names"] = array();

        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);

            $name_item = array(
                "id" => $id,
                "name" => $name,
                "date" => $day . "." . $month . ".",
            );

            array_push($names_arr["names"], $name_item);
        }

        // set response code - 200 OK
        http_response_code(200);

        // show products data in json format
        echo json_encode($names_arr);
    } else {

        // set response code - 404 Not found
        http_response_code(404);

        // tell the user no products found
        echo json_encode(
            array("message" => "No names found.")
        );

}


// no products found will be here


// no products found will be here
