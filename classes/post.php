<?php 
class Post{
// define the class properties
public $id = null;
public $title = null;
public $description = null;
public $summary =null;
public $content = null;
public $url = null; 
public $imageurl = null;
public $categoryId = null;
public $pubdate =null;
public $ip = null;

public function __construct($data=array){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['title']))$this->title=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['title']);
if(isset($data['description']))$this->description=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['description']);
if(isset($data['summary']))$this->summary=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['summary']);
if(isset($data['content']))$this-content=trim(stripslashes(htmlspecialchars(['content'])));
if(isset($data['url']))$this->url=$data['url'];
if(isset($data['categoryId']))$this->categoryId=int($data['categoryId']);
if(isset($data['imageurl']))$this->imageurl=$data['imageurl'];
if(isset($data['pubdate']))$this-pubdate=int($data['pubdate']);
if(isset($data['ip']))$this->ip=int($data['ip']);

}

public function storeFormValues($params)
{$this->__construct($params);
if(isset($params['pubdate']){
$pubdate=explode('-', $params['pubdate']);
if(count($pubdate)==3){
list($pubdate)=($y,$m,$d);
$pubdate=mktime(0,0,0,$d,$m,$y);
}
}
}
public static function getById($id){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="SELECT*, UNIX_TIMESTAMP(pubdate) AS pubdate where id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":id",$this->id, PDO::PARAM_INT);
$stmt->execute;
$row = stmt->fetch();
$conn = null;
if($row) $post = new Post($row);

}
public static function getlist(){
$sql="SELECT*, UNIX_TIMESTAMP(pubdate) AS pubdate FROM post ORDER BY pubdate DESC";
$stmt=$conn->prepare($sql);
$stmt->execute;
$row = stmt->fetchAll(PDO:FETCH_ASSOC);
$conn = null;
if($row) $post = new Post($row);
}

public function insert(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = "INSERT INTO post(title,description,summary,content,url,imageurl,categoryID,pubdate,ip)
VALUES(:title,:description,:summary,:content,:url,:imageurl,:imageurl,:categoryID,:pubdate,:ip)";
$stmt=conn->prepare($sql);
$stmt->bindValue(":title",$this->title, PDO::PARAM_STR);
$stmt->bindValue(":description",$this->description, PDO::PARAM_STR);
$stmt->bindValue(":summary",$this->summary, PDO::PARAM_STR);
$stmt->bindValue(":content",$this->content, PDO::PARAM_STR);
$stmt->bindValue(":url",$this->url, PDO::PARAM_STR);
$stmt->bindValue(":imageurl",$this->imageurl, PDO::PARAM_STR);
$stmt->bindValue(":categoryId",$this->categoryId, PDO::PARAM_INT);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_INT);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_INT);
$stmt->execute;
$this->id =$conn->lastInsertId();
$conn = null;
}
public function update(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = " UPDATE post SET title = :title,description=:description,
summary=:summary,content=:content,url=:url,imageurl=:imageurl,categiryId=:categoryId,pubdate=:pubdate,ip=:ip where :id=id";
$stmt=$conn->prepare($sql):
$stmt->bindValue(":title", $this->title, PDO::PARAM_STR);
$stmt->bindValue(":description", $this->description, PDO:PARAM_STR);
$stmt->bindValue(":summary",$this->summary, PDO::PARAM_STR);
$stmt->bindValue(":content",$this->content, PDO::PARAM_STR);
$stmt->bindValue(":url",$this->url, PDO::PARAM_STR);
$stmt->bindValue(":imageurl",$this->imageurl, PDO::PARAM);
$stmt->bindValue(":categoryId",$this->categoryId, PDO::PARAM_INT);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_INT);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_INT);
$stmt->execute;
$conn=null;

}
public function delete(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="DELETE FROM post where id=:id LIMIT 1";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":id",$this->id, PDO::PARAM_INT);
$conn=null;
}
?>















