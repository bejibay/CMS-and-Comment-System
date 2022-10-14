
<?php 
require ("model/crudmodel.php");
class Staticpages extends Crudmodel{
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
    if(isset($data['id']))$this->id=int($data['id']);
    if(isset($data['url']))$this->url=filter_var($data['url'],FILTER_VALIDATE_URL);
    if(isset($data['title']))$this->title=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['title']);
    if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['description']);
    if(isset($data['content']))$this->content=trim(stripslashes(htmlspecialchars(['content'])));
    if(isset($data['created']))$this->created=date($data['created'],"Y-m-d");
    if(isset($data['updated']))$this->created=date($data['created'],"Y-m-d");
    if(isset($data['ipaddress']))$this->ipaddress=int($data['ipaddress']);
    }
    
    
// define the class properties

public function createStaticPage(){
    $this->insert("INSERT INTO  staticpage(id,url,,title,description ,content, created, updated,ipaddress)
    VALUES(:id,:url,:title,:description , :content,:created, :updated,:ipaddress)",["id"=>$this->id,"url"=>$this->url,
    "title"=>$this->title,"description"=>$this->description,"content"=>$this->content,"created"=>$this->created,
    "updated"=>$this->updated,"ipaddress"=>$this->ipaddress]),
    
        }

        public function readStaticPages(){
            $this->select("SELECT * FROM staticpage");
        }
            
            public gunction readAStaticPage($id){
            $this->select("SELECT* FROM staticpage WHERE id=:id",["id"=>$this->id]);
            
            }
            
            
               
    public function updateCategory($id,%data){
     $this->update("UPDATE staticpage SET id=:id,title=:titlde,description=:description,content=:content,
     created:created,updated=:updated, ipaddress=:ipaddres WHERE id =:id",["id"=>$this->id,"url"=>$this->url,
    "title"=>$this->title,"description"=>$this->description,"content"=>$this->content,"created"=>$this->created,
    "updated"=>$this->updated,"ipaddress"=>$this->ipaddress]);
        }
                
                
        public function displaystaticpage($url){
            $this=>select("SELECT* FROM staticpage WHERE url=:url",["url"=>$this->url]);  
           }          


public function deleteStaticPage($id){
 $this->delete("DELETE* FROM staticpage WHERE id=:id",["id"=>$this->id]);
}
}
    
       
       
       
       
       
           