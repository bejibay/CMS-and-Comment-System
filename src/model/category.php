
<?php 
require_once __DIR__."/crudmodel.php";

class Category extends Crudmodel{
    // define the class properties

public $id = null;
public $name = "";
public $description = "";
public $created = null;
public $updated = null;
public $ipaddress = null;


public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['name']) && preg_match("/[a-zA-Z]{3}/",$data['name']))$this->name=$data['name'];
if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['description']);
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->updated = $data['updated'];
if(isset($data['ipaddress']))$this->ipaddress = $data['ipaddress'];
}


public function createCategory($data = []){
if(isset($data['name'])&& isset($data['description']) && isset($data['ipaddress'])){
$result =  $this->insert("INSERT INTO category(name,description,created,ipaddress)
VALUES(:name,:description,:created,:ipaddress)",["name"=>$this->name,
"description"=>$this->description,"created"=>$this->created,"ipaddress"=>$this->ipaddress]);
}
if($result)return $result;
else{return false;}
}
   

public function readCategories(){
$result = $this->select("SELECT * FROM category");
if($result)return $result;
else{return false;}
}

public function readCategory($id){
if(isset($id)){
$result = $this->select("SELECT* FROM category WHERE id=:id", ["id"=>$id]);
if($result)return $result;
else{return false;}
}
}


public function updateCategory($id,$data = []){
if(isset($id) && isset($data['name']) && isset($data['description']) && isset($data['updated'])
 && isset($data['ipaddress'])){
$result = $this->update("UPDATE category SET name =:name,description =:description,updated =:updated, 
ipaddress =:ipaddress WHERE id =:id",["name"=>$this->name,"description"=>$this->description,"updated"=>$this->updated,
"ipaddress"=>$this->ipaddress,"id"=>$id]);
if($result)return $result;
else{return false;}
}
}

public function deleteCategory($id){
if(isset($id)){
$result = $this->delete("DELETE* FROM category WHERE id=:id",["id"=>$id]);
if($result) return $result;
else{return false;}
}
}
}        