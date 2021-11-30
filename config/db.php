<?php

class db{

  private $servername="localhost";
  private $username="root";
  private $password="";
  private $db="cosmetic";
  private $conn;
  // $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  public function connect() {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db."",$this->username, $this->password);

      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Successful";
    }
    catch(PDOException $e) {
      echo "Failed" . $e->getMessage();
    }
    return $this->conn;
  }
}
?>

