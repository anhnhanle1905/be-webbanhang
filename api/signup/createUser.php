<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../config/db.php');
include_once('../../model/signup.php');

$db = new db();
$connect = $db->connect();

$signup = new Signup($connect);

$data = json_decode(file_get_contents("php://input"));

$signup->Username = $data->Username;
$signup->Pass = $data->Pass;
$signup->HoTen = $data->HoTen;
$signup->SDT = $data->SDT;
$signup->DiaChi = $data->DiaChi;
$signup->roleUser = $data->roleUser;
$signup->Email = $data->Email;

if($signup->createUser()) {
  echo json_encode(array('message', 'User Created'));

} else {
  echo json_encode(array('message', 'User Not Created'));
}

?>