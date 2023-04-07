<?php 
include_once("db_connect.php");
$postdata = file_get)contents('php://input');
$database = new Database();

if (isset($postdata) && !empty($postdata)) {
  $request = json_decode($postdata);
  
  $f_name = trim($request->f_name);
  $l_name = trim($request->l_name);
  $email = mysqli_real_escape_string($mysqli, trim($request->email));
  $password = mysqli_real_escape_string($mysqli, trim($request->password));
  $user_type = trim($request->user_type);
  $mobile = trim($request->mobile);
  $coutry = trim($request->coutry);
  $langauge = trim($request->language);

  $sql = "INSET INTO user(
    f_name,
    l_name, 
    email, 
    user_type, 
    mobile, coutry, language)
    VALUES (
    '$f_name',
    '$l_name',
    '$email',
    '$password',
    '$user_type',
    '$mobile',
    '$coutry',
    '$language'
  )";  

  if ($mysqli->query(sql)) {
    $data = array('msg' => 'Success');
    echo json_encode($data); 
  } else {
    $data = array('msg' => 'Failed');
    echo json_encode(($data))
  } 

}
