<?php 
class Base{
// define the class properties
public $id = null;
public $firstname = "";
public $lastname = "";
public $username = "";
public $email = "";
public $password = "";
public $status = null;
public $created = null;
public $updated = null;
public $ipaddress = null;
public $url = "";
public $title = "";
public $description = "";
public $content = "";
public $url = null; 
public $name = "";
public $biography = "";
public $user_id = null;
public $category_id = null;
public $media_id = null;
public $author_id = null;
public $dynamicpages_id = null;
public $comments= "";

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['firstname']))$this->firstname=preg_match("/[a-Z]{2}/",$data['firstname']);
if(isset($data['lastname']))$this->lastname=preg_match("/[a-Z]{2}/",$data['lastname']);
if(isset($data['username']))$this->username=preg_match("/[a-Z]{5}/");
if(isset($data['email']))$this->email=filter_var($data['email'],FILTER_VALIDATE_EMAIL);
if(isset($data['password']))$this->password=int($data['password']);
if(isset($data['status']))$this->status=int($data['status']);
if(isset($data['created']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['updated']))$this->created=date($data['created'],"Y-m-d");
if(isset($data['ipaddress']))$this->ipaddress=int($data['ipaddress']);
if(isset($data['url']))$this->url=filter_var($data['url'],FILTER_VALIDATE_URL);
if(isset($data['title']))$this->title=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['title']);
if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['description']);
if(isset($data['content']))$this->content=trim(stripslashes(htmlspecialchars(['content'])));
if(isset($data['name']))$this->name=preg_match("/[a-Z]{3}/",$data['name']);
if(isset($data['biography']))$this->biography=trim(stripslashes(htmlspecialchars(['biography'])));
if(isset($data['category_id']))$this->category_id=int($data['category_id']);
if(isset($data['media_id']))$this->media_id=int($data['media-id']);
if(isset($data['author_id']))$this->author_id=int($data['author_id']);
if(isset($data['dynamicpages_id']))$this->dynamicpagea_id=int($data['dynamicpages_id']);
if(isset($data['comments']))$this->content=trim(stripslashes(htmlspecialchars(['comments'])));
}
public function storeFormValues($params)
{$this->__construct($params);
if(isset($params['pubdate'])){
$pubdate=explode('-', $params['pubdate']);
if(count($pubdate)==3){
list($y,$m,$d)=$pubdate;
$pubdate=mktime(0,0,0,$d,$m,$y);
}
}
}

public function connect(){
    try{$conn = new PDO(DSN, USERNAME, PASSWORDR);
    $conn-setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!$conn) {die("failed connection". mysqli_connect_errno());}
    return $conn;
     }
catch(PDOException $e){echo $e->getMessage();}
}

public function insert($query,$params=array()){
 $stmt->preapare($query);
 $this->executestatement($query,$params);
 $result = $LastInsertId;
 return $result;
}


public function executestatement($query, $params){
$stmt->prepare($query,$params);
$result =$stmt->execute();
return $result;

}

public function select($query, $params){
    $stmt->preapare($query);
    $this->executestatement($query,$params);
    $result = fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

public function update($query, $params){
    $stmt->preapare($query);
    $this->executestatement($query,$params);
    $result = rowCount();
    return $result;

}

public function delete($query,$params)(
    $stmt->preapare($query);
    $this->executestatement($query,$params);
    $result = rowCount();
    return $result;
)

}
?>















