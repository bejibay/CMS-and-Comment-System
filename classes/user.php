
<?php 
global $accountError, $passwordError;
 class User{
// define the class properties
public $id = null;
public $firstname = null;
public $lasttname = null;
public $email = null;
public $password = null;
public $reseturl ="";
public $pubdate =null;
public $ip = null;

public function __construct($data=array()){
$userpattern =$this->pattern;
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['firstname']))$this->firstname=trim(stripslashes(htmlspecialchars($data['firstname'])));
if(isset($data['lastname']))$this->lastname=trim(stripslashes(htmlspecialchars($data['lastname'])));
if(isset($data['email']))$this->email=filter_var(FILTER_VALIDATE_EMAIL,$data['email']);
if(isset($data['password']))$this->password=password_hash($data['password'], PASSWORD_BCRYPT);
if(isset($data['reseturl']))$this->reseturl=$data['reseturl'];
if(isset($data['pubdate']))$this->pubdate=int($data['pubdate']);
if(isset($data['ip']))$this->ip=int($data['ip']);
}

public function storeFormValues($params){
$this->__construct($params);
if(isset($params['pubdate'])){
$pubdate=explode('-', $params['pubdate']);
if(count($pubdate)==3){
list($y,$m,$d) = $pubdate;
$pubdate=mktime(0,0,0,$d,$m,$y);
}
}
}
public static function getEmail(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="SELECT* FROM user where email=:email";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":email",$this->email, PDO::PARAM_STR);
$stmt->bindValue(":password",$this->password, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch();
if($row) return true;
}

public static function getUser(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="SELECT* FROM user where email=:email";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":email",$this->email, PDO::PARAM_STR);
$stmt->bindValue(":password",$this->password, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch();
if(!$row) $accountError = "account does not exist";
if($row){
$sql="SELECT* FROM user where email=:email AND password=:password";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":email",$this->email, PDO::PARAM_STR);
$stmt->bindValue(":password",$this->password, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$row) $passwordError = "Incorrect Password";
$conn = null;
if($row) return new User($row);
}
}

public function insert(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = "INSERT INTO user(firstname,lastname,email,password,reseturl,pubdate,ip)
VALUES(:firstname,:lastname,:email,:password,:reseturl,:pubdate,:ip)";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":firstname",$this->firstname, PDO::PARAM_STR);
$stmt->bindValue(":lastname",$this->lastname, PDO::PARAM_STR);
$stmt->bindValue(":email",$this->email, PDO::PARAM_STR);
$stmt->bindValue(":password",$this->password, PDO::PARAM_STR);
$stmt->bindValue(":reseturl",$this->reseturl, PDO::PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_STR);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_INT);
$stmt->execute();
$this->id =$conn->lastInsertId();
$conn = null;
}

public function Reset(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = "UPDATE user SET reseturl=:reseturl,pubdate=:pubdate,ip=:ip where email=:email";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":reseturl", $this->reseturl, PDO::PARAM_STR);
$stmt->bindValue(":pubdate", $this->pubdate, PDO::PARAM_INT);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_INT);
$stmt->bindValue(":email",$this->email, PDO::PARAM_STR);
$stmt->execute();
$conn=null;

}
public function resetUrl(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = " UPDATE user SET password=:password,pubdate=:pubdate,ip=:ip where reseturl=:reseturl";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":password", $this->password, PDO::PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_INT);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_UNT);
$stmt->bindValue(":reseturl",$this->reseturl, PDO::PARAM_STR);
$stmt->execute();
$conn=null;
}

public function delete(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="DELETE FROM user where id=:id LIMIT 1";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":id",$this->id, PDO::PARAM_STR);
$stmt->execute();
$conn=null;
}
}
?>















