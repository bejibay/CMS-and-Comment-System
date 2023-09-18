
<?php 


require_once WORKING_DIR_PATH."src/model/crudmodel.php";

class Userdata extends Crudmodel{

public $id;
public $firstname;
public $lastname;
public $username;
public $email;
public $newemail;
public $password;
public $confirmpassword;
public $biography;
public $status;
public $reseturl;
public $created;
public $updated ;
public $ipaddress;


public function __construct($data=[]){
parent::__construct();
$passwordpattern ="/^(?=.*[A-Z])(?=.*[0-9])(?=.*[@#\-_$%^&+=§!\?]).{8,}$/";
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['firstname']) && preg_match("/^([a-zA-Z]+){3,}$/",$data['firstname'])){$this->firstname =$data['firstname'];}
if(isset($data['lastname']) && preg_match("/^([a-zA-Z]}+){3,}$/",$data['lastname'])){$this->lastname =$data['lastname'];}
if(isset($data['username']) && preg_match("/^([a-zA-Z]+){5,}$/",$data['username'])){$this->username =$data['username'];}
if(isset($data['email']) && filter_var($data['email'],FILTER_VALIDATE_EMAIL))$this->email = $data['email'];
if(isset($data['newemail']) && filter_var($data['newemail'],FILTER_VALIDATE_EMAIL))
$this->newemail=$data['newemail'];
if(isset($data['password']) && preg_match($passwordpattern ,$data['password']))$this->password =$data['password'];
if(isset($data['confirmpassword']) && preg_match($passwordpattern ,$data['confirmpassword']))$this->confirmpassword=$data['confirmpassword'];
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->updated = $data['updated'];
if(isset($data['biography']))$this->biography = $data['biography'];
if(isset($data['ipaddress']))$this->ipaddress=$data['ipaddress'];
}

public function verifyUsername($username){

if(filter_var($username,FILTER_VALIDATE_EMAIL)){
$result = $this->select("SELECT * FROM userdata WHERE email=:email  LIMIT 1",["email"=>$username]);
}else {$result = $this->select("SELECT * FROM userdata WHERE username=:username LIMIT 1",["username"=>$username]);
}
return $result;
}


public function verifyUserPassword($password,$hash){
if(password_verify($password, $hash))return true;
else{return false;}
}
}
