
<?php 
require ("model/crudmodel.php");
class Comment extends Crudmodel{
    // define the class properties

public $id = null;
public $dynamicpages_id = null;
public $comments= "";

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['dynamicpages_id']))$this->dynamicpagea_id=int($data['dynamicpages_id']);
if(isset($data['comments']))$this->content=trim(stripslashes(htmlspecialchars(['comments'])));

// define the class properties
public function createComment(){
    $this->insert("INSERT INTO comment(id,dynamicpages_id,comments)
    VALUES(:id,:name,:dynamicpages_id , :comments)",["id"=>$this->id,"dynamicpages_id"=>$this->dynamicpages_id,
    "comments"=>$this->comments,"created"=>$this->created]);
    
        }
   

public function readComment(){
$this->select("SELECT * FROM comment");
}

public function readAComment($id){
$this->select("SELECT* FROM comment WHERE id = :id", ["id"=>$this->id]);

}



public function updateComment($id,%data){
 $this->update("UPDATE cooment SET dynamicpages_id =:dynamicpages_id, comments = :comments WHERE id=:id",
 ["dynamicpages_id"=>$this->dynamicpages_id,"comments"=>%this->comments]);

}

public function deleteComment($id){
        $this->delete("DELETE* FROM comment WHERE id=:id",["id"=>$this->id]);
       
       
           }
       
       
}   