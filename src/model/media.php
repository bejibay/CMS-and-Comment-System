
<?php 
require_once __DIR__."/crudmodel.php";

class Media extends Crudmodel{
    // define the class properties

public $id = null;
public $url = "";

public function __construct($data=array()){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['url']))$this->url=filter_var($data['url'],FILTER_VALIDATE_URL);
}

// define the class properties
public function creatMedia($image,$seourl){
    $uploadok = 1;
    // get dynamic url
    $dynamicpage = new Dynanicpage($_POST);
    $url = $dynamicpage->getSEOurl($seourl);
    
    //get the target imagetype and  extension
    $ext = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
    //get image direvctory and target image name
    $targetdir = "uploads/";
    $targetname = $targetdir.'/'.$year.'/'.$month.'/'.$url.'/'.'.$ext';

    //check if it is an image
    $check = getimagesize($image['tmp_name']);
    if($check[2]){echo "it is an image-"."check['mime]";$uploadok = 1;}
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


    //check if file exist
    if(file_exists($targetname)){echo "file already exists"; $uploadok = 0;}
    else{$uploadok = 1;}

     //check if directory exists;
     $date = date_format($_POST['date'],'Y-m-d');
     $uploaddate = explode('-',$date);
     list($year, $month, $date) = $uploaddate;
     $targetdir = 'uploads'.'/'.$year.'/'.$month;
     if(!file_exists($targetdir)){mkdir($targetdir);
    if($upoladok = 1 && is_uploaded_file($targetname)){move_uploaded_file($image['tmp_name'],$targetname);}
    }
    else{if($upoladok = 1 && is_uploaded_file($targetname)){move_uploaded_file($image['tmp_name'],$targetname);}}

$this->insert("INSERT INTO media(id,url,ext)VALUES(:id,:url,:ext)",["id"=>$this->id,"url"=>$this->url,'ext'=>$ext]);
    
        }
   

public function readAllMedia(){
$result = $this->select("SELECT * FROM media");
if($result) return $result;
else{return false;}
}

public function readAMedia($url){
$this->url = $url;
$result = $this->select("SELECT* FROM media WHERE url=:url",["url"=>$this->url]);
if($result) return $result;
else{return false;}

}



public function updateAMedia($id,$data){
$result1 = $this->readAMedia($url);
$this->id = $result1['id'];
$result2 = $this->update("UPDATE media SET url=:url WHERE id =:id",["id"=>$this->id,"url"=>$this->url]);
if($result2) return $result2;
else{return false;}
}

public function deleteMedia($url){
$this->url = $url;
$result =  $this->delete("DELETE* FROM media WHERE url=:url",["url"=>$this->url]);
if($result) return $result;
else{return false;}
}
       
       
        }     