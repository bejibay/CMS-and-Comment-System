
<?php 
require_once("config/bootstrap.php");
require_once(WORKING_PATH."src/model/crudmode.php");

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

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['title']))$this->title=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['title']);
if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['description']);
if(isset($data['content']))$this->content=trim(stripslashes(htmlspecialchars(['content'])));
if(isset($data['category_id']))$this->category_id=int($data['category_id']);
if(isset($data['media_id']))$this->media_id=int($data['media-id']);
if(isset($data['author_id']))$this->author_id=int($data['author_id']);
if(isset($data['created']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['updated']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['ipaddress']))$this->ipaddress=int($data['ipaddress']);
}


public function getSEOUrl($title){
    $title = $this->title;
    $title = explode(" ",$title);
    $title = array_slice($title,0,9);
    $title = implode("-" $title);
    return $title;
    }

// define the class properties
public function createADynamicPage($data=[]){
    $this->url = $this->getSEOurl($data['title']);
    if(isset($data['title']) && isset($data['description']) && isset($data['content'])){
    $result =  $this->insert("INSERT INTO dynamicpage(id,url,title , description, content,category_id,media_id,author_id,
    created,updated,ipaddress)VALUES(:id,:url,:title , :description, :content,:category_id,:media_id,:author_id,
    :created,:updated,:ipaddress)",["id"=>$this->id,"url"=>$this->url,"title"=>$this->title,
    "description"=>$this->description,"content"=>$this->content,"category_id"=>$this->category_id,"media_id"=>$this->media_id,
    "author_id"=>$this->author_id",created"=>$this->created,"updated"=>$this->updated,"ipaddress"=>$this->ipaddress]),
    }
    if($result)return $result;
    else{return false;}
        
    }
   

public function readDynamicPages(){
$result = $this->select("SELECT * FROM dynamicpage");
if($result)return $result;
else{return $false;}
}

public function readADynamicPage($id){
    $this->id = $id;
    if($id){
$result = $this->select("SELECT* FROM dynamicpage WHERE id=:id",["id"=>$this->id]);
}
    if($result) return $result;
    else(return false;)
}



public function updateDynamicPage($id,$data = []){
    if(isset($id) $ isset($data['title'])  && isset($data['decription']) && isset($data['content'])){
        $$this->url = $this->getSEOUrl($data['title']);
$result = $this->update("UPDATE dynamicpage SET url=:url,title=:title,description=:description,content=:content,
category_id=:category_id,media_id=:media_id,author_id=:author_id,created=:created,updated=:updated,ipaddress=:ipaddress",
["id"=>$this->id,"url"=>$this->url,"title"=>$this->title,
"description"=>$this->description,"content"=>$this->content,"category_id"=>$this->category_id,"media_id"=>$this->media_id,
"author_id"=>$this->author_id",created"=>$this->created,"updated"=>$this->updated,"ipaddress"=>$this->ipaddress]);
    }
    if($result) return $result;
    else{return false;}
}

public function displayADynamicpage($url){
    if(isset($url)){
        $this->url = $url;
 $result = $this=>select("SELECT* FROM dynamicpage WHERE url=:url",["url"=>$this->url]);  
    }
    if($result)return $result;
    else{return false;}
}

public function deleteADynamicPage($id){
    $this->id = $id;
    if(isset($id)){
$result = $this->delete("DELETE* FROM dynamicpage WHERE id=:id",["id"=>$this->id]);
        }
        if($result)return $result;
        else{return false;}
    }
       }
           