<?php 
header("Access-Control-Allow-Oring: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-with");

include_once("../db_connect.php");
include_once 'plans.php';

$postdata = file_get_content('php://input');
$database = new Database();
$db = $datbase->getConnection();
$imte = new Plan($db)

