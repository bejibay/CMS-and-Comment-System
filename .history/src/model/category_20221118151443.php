
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
if(isset($data['created']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['updated']))$this->updated=date($data['updated'],"Y-m-d");
if(isset($data['ipaddress']))$this->ipaddress = $data['ipaddress'];
}

// define the class properties


public function createCategory($data = []){
    if(isset($data['name'])&& isset($data['description']) && isset($data['ipaddress'])){
   $result =  $this->insert("INSERT INTO category(name,description,created,updated,ipaddress)
    VALUES(:name,:description,:created,:updated,:ipaddress)",["name"=>$this->name,
    "description"=>$this->description,"created"=>$this->created,"updated"=>$this->updated,"ipaddress"=>$this->ipaddress]);
    }
    if($result)return $result;
    else{return false;}
    }
   

public function readCategories(){
$result = $this->select("SELECT * FROM category");
if($result)return $result;
else{return false;}
}

public function readAcategory($id){
$id = $this->id;
if(isset($id)){
$result = $this->select("SELECT* FROM category WHERE id=:1d", ["id"=>$this->id]);
if($result)return $result;
else{return false;}
}
}



public function updateCategory($id,$data = []){
    $id = $this->id;
    if(isset($id) && isset($data['name']) && isset($data['description']) && isset($data['updated'])){
$result = $this->update("UPDATE category SET name=:name, description =:description, updated = :updated, 
ipaddress=:ipadress WHERE id =:id", ["name"=>$this->name,"description"=>$this->description,
"updated"=>$this->updated,"ipaddres"=>$this->ipaddress,"id"=>$this->id,]);
}
if($result)return $result;
else{return false;}
}

 public function deleteCategory($id){
    $id = $this->id;
    if(isset($id)){
$result = $this->delete("DELETE* FROM category WHERE id=:id",["id"=>$this->id]);
    }
    if($result) return $result;
    else{return false;}
       }
}        