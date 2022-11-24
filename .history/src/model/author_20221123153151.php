
<?php

require_once __DIR__."/crudmodel.php";


class Author extends Crudmodel{
// define the class properties

public $id = null;
public $userdata_id = null;
public $biography = null;
public $created = null;
public $updated = null;
public $ipaddress = null;

// construct function to initialise  the properties
public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['biography']))$this->biography=trim(stripslashes(htmlspecialchars($data['biography'])));
if(isset($data['userdata_id']) && is_int($data['userdata_id']))$this->userdata_id = $data['userdata_id'];
if(isset($data['created']))$this->created=$data['created'];
if(isset($data['updated']))$this->created=$data['created'];
if(isset($data['ipaddress']))$this->ipaddress = $data['ipaddress'];

}


// define the all the class methods

public function createAuthor($data= []){
if(isset($data['biography']) && isset($data['ipaddress']))
{
$result = $this->insert("INSERT INTO author(`biography`,`userdata_id`,`ipaddress`)VALUES(:biography,:userdata_id,
:ipaddress)",["biography"=>$this->biography,"userdata_id"=>$this->userdata_id,"ipaddress"=>$this->ipaddress]);
}
if($result) return $result;
 else{return false;}
}
    


 public function readAuthors(){
 $result = $this->select("SELECT* FROM author");
 if(!empty($result))return $result;
 else{return false;}
}

public function readAuthor($id){
 $this->id= $id;
if(isset($id)){
$result = $this->select("SELECT* FROM author WHERE id=:id",["id"=>$this->id]);
}
if(!empty($result)) return  $result;
else{return false;}
}
   



public function updateAuthor($id,$data=[]){
$this->id = $id;
if(isset($id) && isset($data['biography']) && isset($data['updated'])){
 $result = $this->update("UPDATE author SET biography=:biography, updated=:updated WHERE id=:id",[
    "biography"=>$this->biography,"update"=>$this->updated, "id"=>$this->id]);
 }
 if(!empty($result))return $result;
 else{return false;}
}

    
public function deleteAuthor($id){
$this->id = $id;
if(isset($id)){
$result = $this->delete("DELETE* FROM author WHERE id =:id",["id"=>$this->id]);}
if(!empty($result))return $result;
else{return false;}
}
}
