

// config codes

<?php 

 Class User{
// define the class properties
public $id = null;
public $name = null;
public $email = null;
public $username =null;
public $password = null;
public $reseturl =null;
public $pubdate =null;
public $ip = null;

public function __construct($data=array){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['name']))$this->name=$data['name'];
if(isset($data['email']))$this->email=$data['email'];
if(isset($data['username']))$this->username=$data['username'];
if(isset($data['reseturl']))$this->reseturl=$data['reseturl'];
if(isset($data['pubdate']))$this->pubdate=$data['pubdate']:
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
public static function getUser($username,$password){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="SELECT* FROM user where (username=:username OR email=:username)AND password=:password";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":username",$_POST['username'], PDO::PARAM_STR);
$stmt->bindValue(":email",$_POST['username'], PDO::PARAM_STR);
$stmt->bindValue(":password",$_POST['password'], PDO::PARAM_STR);
$row = stmt->fetch();
$conn = null;
if($row) $user = new User($row);

}
public function insert(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = "INSERT INTO user(name,email,username,reseturl,pubdate,ip)
VALUES(:name,:email,:username,:reseturl,:pubdate,:ip)";
$stmt=conn->prepare($sql);
, PDO::PARAM_STR);
$stmt->bindValue(":name",$this->name,bindValue(":name" PDO::PARAM_STR);
$stmt->bindValue(":email",$this->email, PDO::PARAM_STR);
$stmt->bindValue(":username",$this->username, PDO::PARAM_STR);
$stmt->bindValue(":reseturl",$this->reseturl, PDO::PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_STR);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_STR);
$stmt->execute;
$this->id =$conn->lastInsertId();
$conn = null;
}
public function update(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = " UPDATE posts SET title = :title,description=:description,
summary=:summary,content=:content,url=:url,imageurl=:imageurl,
image_extension=:image_extension,categoryID=:categoryID,pubdate=:pubdate,ip=:ip";
$stmt=$conn->prepare($sql):
$stmt->bindValue(":title", $this->title, PDO::PARAM_STR);
$stmt->bindValue(":description", $this->description, PDO:PARAM_STR);
$stmt->bindValue(":summary",$this->summary, PDO::PARAM_STR);
$stmt->bindValue(":content",$this->content, PDO::PARAM_STR);
$stmt->bindValue(":url",$this->url, PDO::PARAM_STR);
$stmt->bindValue(":imageurl",$this->imageurl, PDO::PARAM_STR);
$stmt->bindValue(":image_extension",$this->image_extension, PDO::PARAM_STR);
$stmt->bindValue(":categoryID",$this->categoryID, PDO::PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_STR);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_STR);
$stmt->execute;
$conn=null;

}
public function delete(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="DELETE FROM posts where url=:url LIMIT 1";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":url",$this->url, PDO::PARAM_STR);
$conn=null;



}






?>















