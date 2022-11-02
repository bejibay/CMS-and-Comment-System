<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/config.php";

class Crudmodel{
    
// define the class properties
protected $conn ="";


public function __construct(){
    try{$this->conn = new PDO(DSN, USERNAME, PASSWORD);
    $this->conn-setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!$this->$conn) {die("failed connection". mysqli_connect_errno());}
    return $this->conn;
 }
catch(PDOException $e){echo $e->getMessage();}
}

public function executestatement($query="",$params=[]){
   $this->conn = $this->connect();
    $stmt-= $this->conn->prepare($query);
    if($params) $stmt->execute($params);
    else{$stmt->execute();}
    return $stmt;
    
    }
    


public function insert($query="",$params=[]){
 $this->executestatement($query,$params);
 $result = $this->conn->$LastInsertId;
 return $result;
}



public function select($query="",$params=[]){
 $stmt = $this->executestatement($query,$params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

public function update($query="",$params=[] ){
   $stmt =  $this->executestatement($query,$params);
    $result = $stmt->rowCount();
    return $result;

}

public function delete($query="",$params=[]){
   $stmt =  $this->executestatement($query,$params);
    $result = $stmt-> rowCount();
    return $result;
}

}
?>















