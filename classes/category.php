

// config codes

<?php 

 Class Catwgory{
// define the class properties
public $id = null;
public $name = null;
public $description = null;
public $pubdate =null;
public $ip = null;

public function __construct($data=array){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['name']))$this-name=$databases['name'];
if(isset($data['description']))$this->description=$data['description'];
if(isset($data['pubdate']))$this->pubdate=int($data['url']);
if(isset($data['ip']))$this->ip=int($data['ip']);

}

public function storeFormValues($params)
{$this->__construct($params);
if(isset($params'[pubdate']){
$pubdate=explode('-', $params['pubdate']);
if(count($pubdate)==3){
list($pubdate)=($y,$m,$d);
$pubdate=mktime(0,0,0,$d,$m,$y);
}
}
}
public static function getById(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="SELECT*, UNIX_TIMESTAMP(pubdate) AS pubdate FROM pages where
 url=:url";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":url",$this->url, PDO::PARAM_STR);
$stmt->execute;
$row = stmt->fetch();
$conn = null;
if($row) $Post = new Post($row);

}
public function insert(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = "INSERT INTO category(name,description,pubdate,ip)
VALUES(:name,:description,:pubdate,:ip)";
$stmt=conn->prepare($sql);
, PDO::PARAM_STR);
$stmt->bindValue(": name", $this->name, PDO::PARAM_STR);
$stmt->bindValue(":description",$this->description, PDO::PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_STR);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_STR);
$stmt->execute;
$this->id =$conn->lastInsertId();
$conn = null;
}
public function update(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = " UPDATE posts SET name= :name,description=:description,pubdate=:pubdate,ip=:ip";
$stmt=$conn->prepare($sql):
$stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
$stmt->bindValue(":description", $this->description, PDO:PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_STR);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_STR);
$stmt->execute;
$conn=null;

}
public function delete(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="DELETE FROM posts where id=:id LIMIT 1";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":id",$this->id, PDO::PARAM_STR);
$conn=null;



}






?>












































