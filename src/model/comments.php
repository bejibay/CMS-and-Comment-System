
<?php 
require_once __DIR__."/crudmodel.php";

class Comment extends Crudmodel{
    // define the class properties
public $id = null;
public $email = "";
public $dynamicpages_id = null;
public $comments= "";

public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['email']))$this->email=filter_var($data['email'],FILTER_VALIDATE_EMAIL);
if(isset($data['dynamicpages_id']))$this->dynamicpagea_id=int($data['dynamicpages_id']);
if(isset($data['comments']))$this->content=trim(stripslashes(htmlspecialchars(['comments'])));

}

// define the class properties
public function createComment($data=[]){
    if(isset($data['email']) && isset($data['comments'])){
    $dynamicpages = new Dynamicpages($_POST);
    $url = $_GET['url'];
    $result1 = $dynamicpages->displayAdynamicPage($url);
    $this->dynamicpages_id = $result1['id'];
    $result = $this->insert("INSERT INTO comments(id,dynamicpages_id,email,comments)
    VALUES(:id,:name,:dynamicpages_id ,:email, :comments)",["id"=>$this->id,"dynamicpages_id"=>$this->dynamicpages_id,
    "email"=>$this->email, "comments"=>$this->comments,"created"=>$this->created]);
    if($result) return $result;
    else{return false;}
    }
        }
   

public function readComments(){
$result = $this->select("SELECT * FROM comment");
if($result)return $result;
else{return false;}
}

public function readAComment($id){
$this->id = $id;
if(isset($id)){
$result = $this->select("SELECT* FROM comment WHERE id = :id", ["id"=>$this->id]);
if($result)return $result;
else{return false;}
}
}



public function updateComment($id,$data =[]){
    $this->id = $id;
    if(isset($data['comments'])){
$result = $this->update("UPDATE comment SET dynamicpages_id =:dynamicpages_id, email:email, comments = :comments WHERE id=:id",
 ["dynamicpages_id"=>$this->dynamicpages_id,"email"=>$this->email, "comments"=>$this->comments,]);
if($result)return $result;
else{return false;}
    }
}

public function deleteComment($id){
$this->id = $id;
if(isset($id)){
 $result = $this->delete("DELETE* FROM comment WHERE id=:id",["id"=>$this->id]);
if($result)return $result;
        else{return false;} 
}
 }
       
    }   