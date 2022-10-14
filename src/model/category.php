
<?php 
require ("model/crudmodel.php");
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

// define the class properties


public function createcategory(){
    $this->insert("INSERT INTO userd(id,name,description , created, updated,ipaddress)
    VALUES(:id,:name,:description , :created, :updated,:ipaddress)",["id"=>$this->id,"name"=>$this->name,
    "description"=>$this->description,"created"=>$this->created,"updated"=>$this->updated,"ipaddress"=>$this->ipaddress]),
    
        }
   

public function readCategories(){
$this->select("SELECT * FROM category");
}

public function readAcategory($id){
$this->select("SELECT* FROM category WHERE id=:1d", ["id"=>$this->id,]);

}



public function updateCategory($id,$data = []){
$result = $this->update("UPDATE category SET name=:name, description =:description, created =:created, updated :updated, 
ipaddress=:ipadress WHERE id =:id" ["name"=>$this->name,"description"=>$this->description,"created"=>$this->created,
"updated"=>$this->updated,"ipaddres"=>$this->ipaddres,"id"=>$this->id,]);
}

 public function deleteCategory($id){
$this->delete("DELETE* FROM category WHERE id=:id",["id"=>$this->id]);
       
       }
}        