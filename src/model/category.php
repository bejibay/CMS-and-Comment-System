
<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Contentgo/config/bootstrap.php";

require_once WORKING_DIR_PATH."/src/model/crudmodel.php";
class Category extends Crudmodel{
    // define the class properties

public $id = null;
public $name = "";
public $description = "";
public $created = null;
public $updated = null;
public $ipaddress = null;


public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['name']))$this->name=preg_match("/[a-Z]{3}/",$data['name']);
if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['description']);
if(isset($data['created']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['updated']))$this->updated=date($data['updated'],"Y-m-d");
if(isset($data['ipaddress']))$this->ipaddress=int($data['ipaddress']);
}

// define the class properties


public function createCategory($data = []){
    if(isset($data['name'])&& isset($data['description']) && isset($data['created'])){
   $result =  $this->insert("INSERT INTO category(name,description , created, updated,ipaddress)
    VALUES(:name,:description , :created, :updated,:ipaddress)",["name"=>$this->name,
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
    if(isset($id)){
$result = $this->select("SELECT* FROM category WHERE id=:1d", ["id"=>$this->id,]);
if($result)return $result;
else{return false;}
}
}



public function updateCategory($id,$data = []){
    if(isset($id) && isset($data['name']) && isset($data['description']) && isset($updated)){
$result = $this->update("UPDATE category SET name=:name, description =:description, updated = :updated, 
ipaddress=:ipadress WHERE id =:id", ["name"=>$this->name,"description"=>$this->description,
"updated"=>$this->updated,"ipaddres"=>$this->ipaddress,"id"=>$this->id,]);
}
if($result)return $result;
else{return false;}
}

 public function deleteCategory($id){
    if(isset($id)){
$result = $this->delete("DELETE* FROM category WHERE id=:id",["id"=>$this->id]);
    }
    if($result) return $result;
    else{return false;}
       }
}        