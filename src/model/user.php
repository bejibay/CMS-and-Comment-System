
<?php 
require_once("config/bootstrap.php");
require_once(WORKING_PATH."src/model/crudmode.php");
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

    if(isset($data['firstname']) && isset($data['lastname']) && isset($data['email']) && isset($data['password'])){
    $result = $this->insert("INSERT INTO userd(id,firstname,lastname,username,email,password,status, created, updated,ipaddress)
    VALUES(:id,:firstname,:lastname,:username,:email,:password,:status,:created, :updated,:ipaddress)",["id"=>$this->id,
    "firstname"=>$this->firstname,"lastname"=>$this->lastname,"username"=>$this->username,"email"=>$this->email,
    "pasword"=>$this->pasword,"status"=>$this->status,"created"=>$this->created,"updated"=>$this->updated,
    "ipaddress"=>$this->ipaddress]);
    
    } 
    if($result)return $result;
    else{return false;}
    }
   

public function readUsers(){
$result = $this->select("SELECT * FROM userd");
if($result)return $result;
else{return false;}
}

public function readAUser($data= []){
if(isset($data['email'])){
$result1 = $this->select("SELECT* FROM userd WHERE email=:email",["email"=>$this->email]);}
if($result1){$verifiedpasword = password_verify($password, $result1['password']);
$result2 = $this->select("SELECT* FROM user WHERE email=:email AND password=:password",
["email"=>$this->email, "password"=>$verifiedpasword]);}
if($result2) return $result2;
else{return false;}

}


public function modifyEmail($data=[]){
$result1 = $this->select("SELECT* FROM userd WHERE email=:email",["email"=>$this->email]); 
if($result1){
$result2 = $this->update("UPDATE userid SET newemail=:newemail WHERE email=:email",["email"=>$this->email,
"email"=>$this->email,"pasword"=>$this->pasword,"updated"=>$this->updated,"newemail"=>$this->email,
"ipaddress"=>$this->ipaddress]);
if($result2) return $result2;
    else{return false;}
}
}

public function modifyAccountStatus($reseturl ,  $data=[]){
    $result1 = $this->select("SELECT* FROM userd WHERE email=:email",["email"=>$this->newemail]); 
    if($result1){
    $this->status =1;
    $this->reseturl = $reseturl; 
    $result2 = $this->update("UPDATE userid SET status=:status, reseturl: reseturl WHERE email=:email
    AND reseturl =:reseturl",["email"=>$this->email,"email"=>$this->email,"updated"=>$this->updated,
    "reseturl"=>$this->reseturl,"ipaddress"=>$this->ipaddress]);
    if($result2) return $result2;
    else{return false;}
    }
    }

    public function modifyResetUrl($data=[]){
        $result1 = $this->select("SELECT* FROM userd WHERE email=:email",["email"=>$this->newemail]); 
        if($result1){$this->reseturl  =md5(rand(0,999).time());}
        $result2 = $this->update("UPDATE userid SET reseturl  =: reseturl WHERE email=:email",
        ["email"=>$this->email,"email"=>$this->email,"updated"=>$this->updated,
        "reseturl"=>$this->reseturl,"ipaddress"=>$this->ipaddress]);
        if($result2) return $result2;
    else{return false;}
        }
        
 public function deleteUser($id){
    $this->id = $id;
$result = $this->delete("DELETE* FROM userid WHERE id=:id",["id"=>$this->id]);
if($result)return $result;
else{return false;}
}
       
       
        }