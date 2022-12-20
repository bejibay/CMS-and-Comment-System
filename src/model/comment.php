
<?php 
require_once __DIR__."/crudmodel.php";

class Comment extends Crudmodel{

    // define the class properties
public $id = null;
public $name = "";
public $email = "";
public $website = null;
public $dynamicpage_id = null;
public $comment= "";

// define __construct function to initialise the class properties
public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['email']))$this->email=filter_var($data['email'],FILTER_VALIDATE_EMAIL);
if(isset($data['dynamicpage_id']) && is_int($data['dynamicpage_id']))$this->dynamicpage_id
=($data['dynamicpage_id']);
if(isset($data['website']))$this->website=filter_var($data['website'],FILTER_VALIDATE_URL);
if(isset($data['comment']))$this->content=trim(stripslashes(htmlspecialchars(['comment'])));
}

// define the class methods below

public function createPageComment($urlpage,$data=[]){
if(isset($urlpage) && isset($data['name']) && isset($data['email'])  && isset($data['comment'])){
$dynamicpage = new Dynamicpages($data);
$result1 = $dynamicpage->readDynamicPage($urlpage);
$dynamicpage_id = $result1['id'];
$result2 = $this->insert("INSERT INTO comment(dynamicpage_id,name,email,website,comment)
VALUES(:dynamicpage_id,:name,:email,:website,:comment)",["dynamicpage_id"=>$dynamicpage_id,
"name"=>$this->name,"email"=>$this->email, "website"=>$this->website,"comment"=>$this->comment]);
if($result2) return $result2;
else{return false;}
}
}
   

public function readPageComments($urlpage){
if(isset($urlpage)){
$result = $this->select("SELECT comment* FROM comment INNER JOIN dynamicpage ON comment.dynamicpage_id
= dynamicpage.id WHERE dynamicpage.url = :url",["url"=>$urlpage]);
if($result)return $result;
else{return false;}
}
}

public function readComment($id){
if(isset($id)){
$result = $this->select("SELECT* FROM comment WHERE id = :id", ["id"=>$id]);
if($result)return $result;
else{return false;}
}
}

public function updateComment($id,$data =[]){
if(isset($id) && isset($data['comment'])){
$result = $this->update("UPDATE comment SET  comment = :comment WHERE id=:id",
 ["comment"=>$this->comment]);
if($result)return $result;
else{return false;}
    }
}

public function deleteComment($id){
if(isset($id)){
 $result = $this->delete("DELETE FROM comment WHERE id=:id LIMIT 1",["id"=>$id]);
if($result)return $result;
 else{return false;} 
}
 }
       
}   