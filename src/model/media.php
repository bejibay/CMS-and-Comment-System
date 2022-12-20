
<?php 
require_once __DIR__."/crudmodel.php";

class Media extends Crudmodel{
    // define the class properties

public $id = null;
public $url = "";
public $ipaddress = null;

public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['ipaddress']))$this->ipaddress=$data['ipaddress'];
if(isset($data['url']))$this->url=filter_var($data['url'],FILTER_VALIDATE_URL);
}

// define all the class methods below

public function uploadMedia($image,$seourl){
$uploadok = 1;
// get dynamic url
$dynamicpage = new Dynanicpage($_POST);
$url = $dynamicpage->getSEOUrl($seourl);
    
//get the target imagetype and  extension
$ext = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
//get image direvctory and target image name
$targetdir = "uploads/";
$targetname = $targetdir.$year.'/'.$month.'/'.$url.$ext;

 //check if it is an image
$check = getimagesize($image['tmp_name']);
if($check[2]){echo "it is an image-".$check['mime']; $uploadok = 1;}
else {echo "it is not an image"; $uploadok =0;}

    
  //get image sixe to be uploaded
$imagesize = $image['size'];
if($imagesize>5000){$uploadok = 0;}
else{$uploadok = 1;}

//check if image type exists
$imgtype= ['gif','pnd','tmp'];
if(in_array($imgtype,$ext)){
$uploadok = 1;}
else{$uploadok = 0;}


//check if file exists
if(file_exists($targetname)){echo "file already exists"; $uploadok = 0;}
else{$uploadok = 1;}

//check if directory exists;
if(isset($_POST['date']))$date =$_POST['date'];

$uploaddate = explode('-',$date);
list($year, $month, $date) = $uploaddate;
$targetdir = 'uploads'.'/'.$year.'/'.$month;
$result3 = "";
if(!file_exists($targetdir)){mkdir($targetdir);
if($uploadok = 1 && is_uploaded_file($targetname)){$result1 = move_uploaded_file($image['tmp_name'],$targetname);
if($result1)$result2 = $this->insert("INSERT INTO media(url,ext,ipaddress)VALUES(:url,:ext,:ipaddress)",
["url"=>$url,'ext'=>$ext,"ipaddress"=>$this->ipaddress]);
if($result2)$result3 = "files correctly uploaded";
 }
}
elseif(file_exists($targetdir)){if($uploadok = 1 && is_uploaded_file($targetname)){
$result1 = move_uploaded_file($image['tmp_name'],$targetname);
if($result1)$result2 = $this->insert("INSERT INTO media(url,ext,ipaddress)VALUES(:url,:ext,:ipaddress)",
["url"=>$url,'ext'=>$ext,"ipaddress"=>$this->ipaddress]);
if($result2)$result3 = "file correctly uploaded";
}
}
else{$result3 = "no file upload something went wrong";}
}
   

public function readMedias(){
$result = $this->select("SELECT * FROM media");
if($result) return $result;
else{return false;}
}

public function readMedia($url){
if(isset($url)){
$result = $this->select("SELECT* FROM media WHERE url=:url",["url"=>$url]);
if($result) return $result;
else{return false;}

}
}

public function deleteMedia($url){
if(isset($url)){
$result =  $this->delete("DELETE FROM media WHERE url=:url LIMIT 1",["url"=>$url]);
if($result) return $result;
else{return false;}
}
}
}     