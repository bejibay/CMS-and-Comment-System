
<?php 
require_once __DIR__."/crudmodel.php";

class Dynamicpage extends Crudmodel{
    // define the class properties
public $id = null;
public $url = "";
public $title = "";
public $description = "";
public $content = "";
public $category_id ;
public $media_id ;
public $author_id;
public $created = null;
public $updated = null;
public $ipaddress = null;

public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['title']))$this->title=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['title']);
if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['description']);
if(isset($data['content']))$this->content=trim(stripslashes(htmlspecialchars($data['content'])));
if(isset($data['category_id']) && is_int($data['category_id']))$this->category_id = $data['category_id'];
if(isset($data['author_id']) && is_int($data['author_id']))$this->author_id =$data['author_id'];
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->created = $data['created'];
if(isset($data['ipaddress']))$this->ipaddress = $data['ipaddress'];
}



// define the class properties
public function createDynamicPage($data=[]){

if(isset($url) && isset($data['title']) && isset($data['description']) && isset($data['content'])&& isset($data['category_id'])
&& isset($data['author_id']) ){$url = $this->getSEOurl($data['title']);
$result =  $this->insert("INSERT INTO dynamicpage(url,title, description, content,category_id,author_id,
created,ipaddress)VALUES(:url,:title,:description,:content,:category_id,:author_id,
:created,:ipaddress)",["url"=>$url,"title"=>$this->title,
"description"=>$this->description,"content"=>$this->content,"category_id"=>$this->category_id,
"author_id"=>$this->author_id ,"created"=>$this->created,"ipaddress"=>$this->ipaddress]);
}
if($result)return $result;
else{return false;}
        }
   

public function readDynamicPages(){
$result = $this->select("SELECT * FROM dynamicpage");
if($result)return $result;
else{return false;}
}

public function readDynamicPage($id){
$this->id = $id;
$result = $this->select("SELECT* FROM dynamicpage WHERE id=:id",["id"=>$this->id]);
if($result) return $result;
else{return false;}
}



public function updateDynamicPage($id,$data = []){
    if(isset($id)  && isset($data['title'])  && isset($data['decription']) && isset($data['content'])){
        $$this->url = $this->getSEOUrl($data['title']);
$result = $this->update("UPDATE dynamicpage SET url=:url,title=:title,description=:description,content=:content,
category_id=:category_id,media_id=:media_id,author_id=:author_id,created=:created,updated=:updated,
ipaddress=:ipaddress",["id"=>$this->id,"url"=>$this->url,"title"=>$this->title,
"description"=>$this->description,"content"=>$this->content,"category_id"=>$this->category_id,
"media_id"=>$this->media_id,"author_id"=>$this->author_id,"created"=>$this->created,"updated"=>$this->updated,
"ipaddress"=>$this->ipaddress]);
    }
    if($result) return $result;
    else{return false;}
}

public function displayDynamicpage($url){
    $url = $this->url;
    if(isset($url)){
$result = $this->select("SELECT* FROM dynamicpage WHERE url=:url",["url"=>$this->url]);  
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
           