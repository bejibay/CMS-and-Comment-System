
<?php 
require ("model/crudmodel.php");
class User extends Crudmodel{
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

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['firstname']))$this->firstname=preg_match("/[a-Z]{2}/",$data['firstname']);
if(isset($data['lastname']))$this->lastname=preg_match("/[a-Z]{2}/",$data['lastname']);
if(isset($data['username']))$this->username=preg_match("/[a-Z]{5}/");
if(isset($data['email']))$this->email=filter_var($data['email'],FILTER_VALIDATE_EMAIL);
if(isset($data['password']))$this->password=password_hash($data['password'],PASSWORD_BCRYPT);
if(isset($data['status']))$this->status=int($data['status']);
if(isset($data['reseturl']))$this->reseturl=$data['reseturl']);
if(isset($data['created']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['updated']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['ipaddress']))$this->ipaddress=int($data['ipaddress']);
}

// define the class properties
public function createUser($data =[]){
    foreach($data as $key =>$value){
    $this->insert("INSERT INTO userd(id,firstname,lastname,username,email,password,status, created, updated,ipaddress)
    VALUES(:id,:firstname,:lastname,:username,:email,:password,:status,:created, :updated,:ipaddress)",["id"=>$this->id,
    "firstname"=>$this->firstname,"lastname"=>$this->lastname,"username"=>$this->username,"email"=>$this->email,
    "pasword"=>$this->pasword,"status"=>$this->status,"created"=>$this->created,"updated"=>$this->updated,
    "ipaddress"=>$this->ipaddress]);
    
        }
    }
   

public function readUsers(){
$this->select("SELECT * FROM userd");
}

public function readAUser($email ,$password= null){
$verifiedpasword = password_verify($password, $result['password']);
$result1 = $this->select("SELECT* FROM userd WHERE email=:email",["email"=>$this->email]);
if($result1)$result2 = $this->select("SELECT* FROM userd WHERE email=:email AND password=:password",
["email"=>$this->email, "password"=>$verifiedpasword]);

}


public function updateUser($email = null,$reseturl=null,$data){
    foreach($data as $key =>$value){
$result = $this->update("UPDATE userid SET firstname=:firstname, lastname=:lastname,username=:username,email=:email,
password = :password, status=:status,reseturl=:reseturl,created=:created,updated=:updated WHERE email=:email",["email"=>$this->email,
"firstname"=>$this->firstname,"lastname"=>$this->lastname,"username"=>$this->username,"email"=>$this->email,
"pasword"=>$this->pasword,"status"=>$this->status,"reseturl"=>$this->reseturl,"created"=>$this->created,"updated"=>$this->updated,
"ipaddress"=>$this->ipaddress]);

}
}


 public function deleteUser($id){
 $this->delete("DELETE* FROM userid WHERE id=:id",["id"=>$this->id]);
}
       
       
        }