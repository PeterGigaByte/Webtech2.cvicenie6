<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../models/holiday.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object


// read products will be here

