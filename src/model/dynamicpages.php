
<?php 
require_once __DIR__."/crudmodel.php";

class Dynamicpage extends Crudmodel{
    // define the class properties
public $id = null;
public $url = "";
public $title = "";
public $description = "";
public $content = "";
public $category_id = null;
public $media_id = null;
public $author_id = null;
public $created = null;
public $updated = null;
public $ipaddress = null;

// __construct function to initialise class properties
public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['title']) && preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['title']))
$this->title= $data['title'];
if(isset($data['description']) && preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['description']))
$this->description = $data['description'];
if(isset($data['content']))$this->content=trim(stripslashes(htmlspecialchars($data['content'])));
if(isset($data['category_id']) && is_int($data['category_id']))$this->category_id = $data['category_id'];
if(isset($data['author_id']) && is_int($data['author_id']))$this->author_id =$data['author_id'];
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->updated = $data['updated'];
if(isset($data['ipaddress']))$this->ipaddress = $data['ipaddress'];
}



// define the class methods below

public function createDynamicPage($data=[]){

if(isset($data['title']) && isset($data['description']) && isset($data['content']) && 
isset($data['category_id']) && isset($data['author_id']) && isset($data['created']) & isset($data['ipaddress'])){
$url = $this->getSEOUrl($data['title']);
$result =  $this->insert("INSERT INTO dynamicpage(url,title, description, content,category_id,author_id,
created,ipaddress)VALUES(:url,:title,:description,:content,:category_id,:author_id,
:created,:ipaddress)",["url"=>$url,"title"=>$this->title,
"description"=>$this->description,"content"=>$this->content,"category_id"=>$this->category_id,
"author_id"=>$this->author_id ,"created"=>$this->created,"ipaddress"=>$this->ipaddress]);
if($result)return $result;
else{return false;}
}
}
 

public function readDynamicPages(){
$result = $this->select("SELECT * FROM dynamicpage");
if($result)return $result;
else{return false;}
}


public function updateDynamicPage($url,$data = []){
if(isset($url)  && isset($data['title'])  && isset($data['description']) && isset($data['content']) &&
isset($data['category_id']) && isset($data['author_id']) && isset($data['updated']) && isset($data['ipaddress'])){
$result = $this->update("UPDATE dynamicpage SET title=:title,description=:description,content=:content,
category_id=:category_id,author_id=:author_id,updated=:updated,ipaddress=:ipaddress WHERE url =:url",
["url"=>$url,"title"=>$this->title,"description"=>$this->description,"content"=>$this->content,
"category_id"=>$this->category_id,"author_id"=>$this->author_id,"updated"=>$this->updated,
"ipaddress"=>$this->ipaddress]);
    
    if($result) return $result;
    else{return false;}
}
}

public function readDynamicPage($urlpage){
$url = $urlpage;
if(isset($urlpage)){
$result = $this->select("SELECT* FROM dynamicpage WHERE url=:url",["url"=>$url]);  
if($result)return $result;
else{return false;}
}
}

public function deleteADynamicPage($url){
if(isset($url)){
$result = $this->delete("DELETE* FROM dynamicpage WHERE url=:url",["url"=>$url]);
if($result)return $result;
else{return false;}
}
}
 }
           