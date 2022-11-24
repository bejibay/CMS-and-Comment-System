
<?php 

require_once __DIR__."/crudmodel.php";

class Userdata extends Crudmodel{
    // define the class properties

public $id = null;
public $firstname = "";
public $lastname = "";
public $username = "";
public $email = "";
public $password = "";
public $status = null;
public $reseturl = null;
public $created = null;
public $updated = null;
public $ipaddress = null;
public $newemail = "";


public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['firstname']) && preg_match("/^[a-zA-Z]{3,}$/",$data['firstname'])){$this->firstname =$data['firstname'];}
if(isset($data['lastname']) && preg_match("/^[a-zA-Z]{3,}$/",$data['lastname'])){$this->lastname =$data['lastname'];}
if(isset($data['username']) && preg_match("/^[a-zA-Z]{3,}$/",$data['username'])){$this->username =$data['username'];}
if(isset($data['email']))$this->email=filter_var($data['email'],FILTER_VALIDATE_EMAIL);
if(isset($data['password']))$this->password=password_hash($data['password'],PASSWORD_BCRYPT);
if(isset($data['reseturl']))$this->reseturl = $data['reseturl'];
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->created = $data['created'];
if(isset($data['ipaddress']))$this->ipaddress=$data['ipaddress'];
if(isset($data['newemail']))$this->newemail=filter_var($data['newemail'],FILTER_VALIDATE_EMAIL);
}

// define the class properties
public function createUser($data =[]){
if(isset($data['username']) && isset($data['firstname']) && isset($data['lastname']) && isset($data['email']) 
&& isset($data['password'])){
$result1 = $this->verifyUserEmail($data['email']);
if($result1){return false;}
elseif(!$result1){
$result2 = $this->insert("INSERT INTO userdata(firstname,lastname,username,email,password, created,ipaddress)
VALUES(:firstname,:lastname,:username,:email,:password,:created,:ipaddress)",[
"firstname"=>$this->firstname,"lastname"=>$this->lastname,"username"=>$this->username,"email"=>$this->email,
"password"=>$this->password,"created"=>$this->created,"ipaddress"=>$this->ipaddress]);
}
} 
if($result2)return $result2;
else{return false;}
}
   

public function readUsers(){
$result = $this->select("SELECT * FROM userdata");
if($result)return $result;
else{return false;}
}



public function verifyUserEmail($data= []){
if(isset($data['email'])){
$result1 = $this->select("SELECT* FROM userdata WHERE email=:email",["email"=>$data['email']]);
if($result1) return $result1;
}
else{return false;}
}

public function verifyUserPassword($data=[]){
    
if(isset($data['email']) && isset($data['password'])){
$result = $this->verifyUserEmail($data['email']);
if(password_verify($data['password'], $result['password'])){
return true;    
}
else{return false;}
}
}

public function modifyEmail($data=[]){
$result1 = $this->select("SELECT* FROM userdata WHERE email=:email",["email"=>$this->email]); 
if($result1){
$result2 = $this->update("UPDATE userid SET email=:newemail WHERE email=:email",["email"=>$this->newemail,
"email"=>$this->email,"pasword"=>$this->pasword,"updated"=>$this->updated,"ipaddress"=>$this->ipaddress]);
if($result2) return $result2;
    else{return false;}
}
}

public function modifyAccountStatus($reseturl,$data=[]){
$this->reseturl =$reseturl;
$this->status =1;
$result1 = $this->select("SELECT* FROM userdata WHERE email=:email",["email"=>$this->email]); 
if($result1){
$result2 = $this->update("UPDATE userdata SET status =:status,password =:password WHERE email=:email
AND reseturl =:reseturl",["status"=>$this->status,"email"=>$this->email,"password"=>$this->password,"reseturl"=>$this->reseturl]);
if($result2) return $result2;
else{return false;}
}
}

public function modifyResetUrl($data=[]){
$result1 = $this->select("SELECT* FROM userdata WHERE email=:email",["email"=>$this->mail]); 
if($result1){$this->reseturl  =md5(rand(0,999).time());}
$result2 = $this->update("UPDATE userdata SET reseturl=:reseturl WHERE email=:email",
["email"=>$this->email,"reseturl"=>$this->reseturl]);
if($result2) return $result2;
else{return false;}
}
        
 public function deleteUser($id){
$this->id = $id;
$result = $this->delete("DELETE* FROM userdata WHERE id=:id",["id"=>$this->id]);
if($result)return $result;
else{return false;}
}
    }