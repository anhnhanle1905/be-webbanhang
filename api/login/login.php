<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once('../../config/db.php');
include_once('../../model/login.php');

$db = new db();
$connect = $db->connect();

$login = new Login($connect);

$data = json_decode(file_get_contents("php://input"));

$login->Username = $data->Username;
$login->Pass = $data->Pass;

if($login->loginUser()) {
  echo json_encode(array('message', 'Login Success!'));
} else {
  echo json_encode(array('message', 'Login Not Success!'));
}



?>