<?php
class Login {
  private $conn;

  //properties
  public $Username;
  public $Pass;

  //connect
  public function __construct($db) {
    $this->conn = $db;
  }

  public function loginUser() {
    $query = "SELECT * FROM `dangnhap` where `Username`=:Username and `Pass`=:Pass";
    $stmt = $this->conn->prepare($query);
    if($Username != "" && $Pass != "") {
      // try {
        
    
        $stmt->bindParam('Username', $Username, PDO::PARAM_STR);
        $stmt->bindValue('Pass', $Pass, PDO::PARAM_STR);
      
        if($stmt->execute()) {
          return true;
        }
        // printf("Error %s.\n",$stmt->error)
      // }
      // catch (PDOException $e) {
      //   echo "Error : ".$e->getMessage();
      // }
    }
    return false;
    
  }
    
}

?>