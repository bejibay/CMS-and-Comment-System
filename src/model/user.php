
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
public $confirmpassword = "";
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
if(isset($data['password']))$this->password= $data['password'];
if(isset($data['confirmpassword']))$this->confirmpassword=$data['confirmpassword'];
if(isset($data['reseturl']))$this->reseturl = $data['reseturl'];
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->updated = $data['updated'];
if(isset($data['ipaddress']))$this->ipaddress=$data['ipaddress'];
if(isset($data['newemail']))$this->newemail=filter_var($data['newemail'],FILTER_VALIDATE_EMAIL);
}

// define the class properties
public function createUser($reseturl, $data =[]){

if(isset($data['username']) && isset($data['firstname']) && isset($data['lastname']) && isset($data['email']) 
&& isset($data['password']) & isset($data['confirmpassword']) && $data['password'] == $data['confirmpassword']){
$result1 = $this->verifyUserEmail($data['email']);
if(!$result1)
{$result2 = $this->insert("INSERT INTO userdata(firstname,lastname,username,email,password,reseturl, 
created,ipaddress)VALUES(:firstname,:lastname,:username,:email,:password,:reseturl,:created,:ipaddress)",[
"firstname"=>$this->firstname,"lastname"=>$this->lastname,"username"=>$this->username,"email"=>$this->email,
"password"=>password_hash($this->password,PASSWORD_BCRYPT),"reseturl"=>$reseturl,"created"=>$this->created,
"ipaddress"=>$this->ipaddress]);
if($result2)return $result2;}
else{return false;}
}
if($result1){return false;}
}
   

public function readUsers(){
$result = $this->select("SELECT * FROM userdata");
if($result)return $result;
else{return false;}
}

public function selectByResetUrl($url){
$result = $this->select("SELECT * FROM userdata WHERE reseturl =:reseturl",["reseturl"=>$url]);
if($result)return $result;
else{return false;}
}



public function verifyUserEmail($data= []){
if(isset($data['email'])){
$result = $this->select("SELECT* FROM userdata WHERE email=:email",["email"=>$data['email']]);
if($result) return $result;
else{return false;}
}
}

public function verifyUserPassword($data=[]){
$result1 = array();
if(isset($data['email']) && isset($data['password'])){
$result = $this->verifyUserEmail($data['email']);
if(is_array($result)){$result1 = password_verify($data['password'], $result['password']);}
if($result1)return $result1;
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

public function modifyAccountStatus($reseturl, $data= null){
$status =1;
$newreseturl = null;
if(isset($reseturl)){
$result = $this->update("UPDATE userdata SET status =:status, reseturl=:newreseturl WHERE 
reseturl=:reseturl",["status"=>$status,"password"=>$this->password,"newreseturl"=>$newreseturl,"reseturl"=>$reseturl]);
if($result)return $result;
else{return false;}
}
}

public function modifyPassword($reseturl, $data= []){
$newreseturl = null;
if(isset($reseturl) && isset($data['email']) && isset($data['password']) && isset($data['confirmpassword'])
&& $data['password'] == $data['confirmpassword']){
$result1 = $this->verifyUserEmail($data['email']);
if($result1){
$result2 = $this->update("UPDATE userdata SET password =:password, reseturl=:newreseturl WHERE 
reseturl=:reseturl",["password"=>$this->password,"newreseturl"=>$newreseturl,"reseturl"=>$reseturl]);
if($result2)return $result2;
else{return false;}
}
}
}

public function modifyResetUrl($reseturl,$data=[]){
if(isset($reseturl) && isset($data['email'])){
$result = $this->update("UPDATE userdata SET reseturl=:reseturl WHERE email=:email",
["email"=>$this->email,"reseturl"=>$reseturl]);
if($result) return $result;
else{return false;}
}
}
        
 public function deleteUser($id){
if(isset($id)){
$result = $this->delete("DELETE* FROM userdata WHERE id=:id",["id"=>$id]);
if($result)return $result;
else{return false;}
}
}
    }