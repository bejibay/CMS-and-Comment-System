
<?php 
 class Category{
// define the class properties
public $id = null;
public $name = null;
public $description = null;
public $pubdate =null;
public $ip = null;

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['name']))$this->name=trim(stripslashes(htmlspecialchars($data['name'])));
if(isset($data['description']))$this->description=trim(stripslashes(htmlspecialchars($data['description'])));
if(isset($data['pubdate']))$this->pubdate=int($data['pubdate']);
if(isset($data['ip']))$this->ip=int($data['ip']);
}

public function storeFormValues($params)
{$this->__construct($params);
if(isset($params['pubdate'])){
$pubdate=explode('-', $params['pubdate']);
if(count($pubdate)==3){
list($y,$m,$d) = $pubdate;
$pubdate=mktime(0,0,0,$d,$m,$y);
}
}
}
public static function getById($id){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="SELECT*, UNIX_TIMESTAMP(pubdate) AS pubdate FROM category where id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":id",$this->id, PDO::PARAM_INT);
$stmt->execute;
$row = $stmt->fetch();
$conn = null;
if($row) $category = new Category($row);
}
public function insert(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = "INSERT INTO category(name,description,pubdate,ip)
VALUES(:name,:description,:pubdate,:ip)";
$stmt=$conn->prepare($sql);
$stmt->bindValue(": name", $this->name, PDO::PARAM_STR);
$stmt->bindValue(":description",$this->description, PDO::PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_INT);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_INT);
$stmt->execute;
$this->id =$conn->lastInsertId();
$conn = null;
}
public function update(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql = " UPDATE category SET name= :name,description=:description,pubdate=:pubdate,ip=:ip";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
$stmt->bindValue(":description", $this->description, PDO::PARAM_STR);
$stmt->bindValue(":pubdate",$this->pubdate, PDO::PARAM_INT);
$stmt->bindValue(":ip",$this->ip, PDO::PARAM_INT);
$stmt->execute;
$conn=null;

}
public function delete(){
$conn= new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$sql="DELETE FROM category where id=:id LIMIT 1";
$stmt=$conn->prepare($sql);
$stmt->bindValue(":id",$this->id, PDO::PARAM_INT);
$conn=null;
}
}
?>












































