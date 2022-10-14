
<?php 
require ("model/crudmodel.php");
class Author extends Crudmodel{
    // define the class properties

public $id = null;
public $user_id = null;
public $biography = null;
public $created = null;
public $updated = null;
public $ipaddress = null;

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['biography']))$this->biography=trim(stripslashes(htmlspecialchars(['biography'])));
if(isset($data['user_id']))$this->user_id=int($data['user_id']);
if(isset($data['created']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['updated']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['ipaddress']))$this->ipaddress=int($data['ipaddress']);
}


// define the class properties
public function createAuthor(){
$this->insert("INSERT INTO author(`biography`,`user_id`,`created`,`updated`,`ipaddress`)VALUES(:biography,:user_id,
:created, :updated,:ipaddress)",["biography"=>$this->biography,"user_id"=>$this->user_id,"created"=>$this->created,
"updated"=>$this->updated,"ipaddress"=>$this->ipadrdess]);
    
}

public function readALLAuthors(){
 $this->select("SELECT* FROM author");
}

public function readAnAuthor($id){
    $this->select("SELECT* FROM author WHERE id=:id",["id"=>$this->id]);
   }
   



public function updateauthor($id,$data=[]){

 $this->update("UPDATE author SET biography=:biography, updated=:updated WHERE id=:id*"[
    "biography"=>$this->biography,"update"=>$this->upodated]);
}

    
public function deleteauthor($id){

$result = $this->delete("DELETE* FROM author WHERE id =:id",["id"=>$this->id]);
}

