<?php
class Signup {
  private $conn;

  //properties
  public $Username;
  public $Pass;

  //connect
  public function __construct($db) {
    $this->conn = $db;
  }

  public function createUser() {
    $query = "INSERT INTO dangnhap SET Username=:Username ,Pass=:Pass ,HoTen=:HoTen ,SDT=:SDT ,DiaChi=:DiaChi ,roleUser=:roleUser ,Email=:Email ";
    $stmt = $this->conn->prepare($query);

    //clean data
    $this->Username = htmlspecialchars(strip_tags($this->Username));
    $this->Pass = htmlspecialchars(strip_tags($this->Pass));
    $this->HoTen = htmlspecialchars(strip_tags($this->HoTen));
    $this->SDT = htmlspecialchars(strip_tags($this->SDT));
    $this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
    $this->roleUser = htmlspecialchars(strip_tags($this->roleUser));
    $this->Email = htmlspecialchars(strip_tags($this->Email));

    //bind data
    $stmt->bindParam(':Username', $this->Username);
    $stmt->bindParam(':Pass', $this->Pass);
    $stmt->bindParam(':HoTen', $this->HoTen);
    $stmt->bindParam(':SDT', $this->SDT);
    $stmt->bindParam(':DiaChi', $this->DiaChi);
    $stmt->bindParam(':roleUser', $this->roleUser);
    $stmt->bindParam(':Email', $this->Email);
    if($stmt->execute()) {
      return true;
    }
    printf("Error %s.\n",$stmt->error);
    return false;
  }

  // //read data

  // public function read(){
  //   $query = "SELECT * FROM dangnhap";

  //   $stmt = $this->conn->prepare($query);

  //   $stmt->execute();
  //   return $stmt;
  // }

    
}

?>