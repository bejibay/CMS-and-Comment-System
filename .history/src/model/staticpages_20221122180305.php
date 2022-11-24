
<?php 
require_once __DIR__."/crudmodel.php";

class Staticpage extends Crudmodel{
    // define the class properties
public $id = null;
public $url = "";
public $title = "";
public $description = "";
public $content = "";
public $created = null;
public $updated = null;
public $ipaddress = null;
    
public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
    if(isset($data['url']))$this->url=filter_var($data['url'],FILTER_VALIDATE_URL);
    if(isset($data['title']))$this->title=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['title']);
    if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['description']);
    if(isset($data['content']))$this->content=trim(stripslashes(htmlspecialchars($data['content'])));
    if(isset($data['created']))$this->created=$data['created'];
    if(isset($data['updated']))$this->created=$data['created'];
    if(isset($data['ipaddress']))$this->ipaddress=$data['ipaddress'];
    }
    
    
// define the class properties

public function createStaticPage($data = []){
$result ="";
    $url = $this->getSEOurl($data['title']);
    if(isset($data['title']) && isset($data['description']) && isset($data['content']) && isset($data['created'])
    && isset($data['ipaddress'])){
   $result = $this->insert("INSERT INTO  staticpage(url,title,description ,content, created,ipaddress)
    VALUES(:url,:title,:description,:content,:created,:ipaddress)",["url"=>$url,"title"=>$this->title,
    "description"=>$this->description,"content"=>$this->content,"created"=>$this->created,"ipaddress"=>$this->ipaddress]);
    }
if($result) return $result;
else{return false;}       
}

        public function readStaticPages(){
           $result =  $this->select("SELECT * FROM staticpage");
           if($result)return $result;
           else{return false;}
        }
            
            public function readAStaticPage($id){
                $this->id =$id;
            if(isset($id)){
            $this->select("SELECT* FROM staticpage WHERE id=:id",["id"=>$this->id]);
}
            if(isset($result)) return $result;
            else{return false;}
}
            
            
               
    public function updateStsaticPage($id,$data =[]){
        $this->url = $this->getSEOurl($data['title']); 
        $this->id = $id ;
        if(isset($data['title']) && isset($data['description']) && isset($data['content'])){
     $result = $this->update("UPDATE staticpage SET id=:id,title=:titlde,description=:description,content=:content,
     created:created,updated=:updated, ipaddress=:ipaddres WHERE id =:id",["id"=>$this->id,"url"=>$this->url,
    "title"=>$this->title,"description"=>$this->description,"content"=>$this->content,"created"=>$this->created,
    "updated"=>$this->updated,"ipaddress"=>$this->ipaddress]);
        }
        }
                
 public function displayStaticPage($urlpage){
$urlpage = $this->url;
if(isset($urlpage)){
$result = $this->select("SELECT * FROM staticpage WHERE url=:url",["url"=>$this->url]); 
if($result)return $result;
else{return false;} 
} 
 }        


public function deleteStaticPage($id){
    $this->id = $id;
    if(isset($id)){
 $this->delete("DELETE FROM staticpage WHERE id=:id",["id"=>$this->id]);
}
 if($result) return $result;
 else{return false;}
}
}
    
       
       
       
       
       
           