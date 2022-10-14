
<?php 
require ("model/crudmodel.php");
class Media extends Crudmodel{
    // define the class properties

public $id = null;
public $url = "";

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['url']))$this->url=filter_var($data['url'],FILTER_VALIDATE_URL);
}

// define the class properties
public function creatMedia(){
    $this->insert("INSERT INTO userd(id,url)VALUES(:id,:url)",["id"=>$this->id,"url"=>$this->url]),
    
        }
   

public function readAllMedia(){
$this->select("SELECT * FROM media");
}

public function readAMedia($id){
$this->select("SELECT* FROM media WHERE id=:id",["id"=>$this->id]);

}



public function updateAMedia($id,$data){
 $this->update("UPDATE media SET url=:url WHERE id =:id",["id"=>$tis->id]);

}

public function deleteMedia($id){
 $this->delete("DELETE* FROM media WHERE id=:id",["id"=>$this->id]);
}
       
       
        }     