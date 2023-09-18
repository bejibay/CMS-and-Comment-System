
<?php 


require_once WORKING_DIR_PATH."/src/model/media.php";


//function codes to be called in index.php
// define all the class methods below

    function uploadMedia($image,$seourl){
    $uploadok = 1;
    // get dynamic url
    $dynamicpage = new Dynanicpage($_POST);
    $url = $dynamicpage->getSEOUrl($seourl);
        
    //get the target imagetype and  extension
    $ext = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
    //get image direvctory and target image name
    $targetdir = "uploads/";
    if(isset($_POST['date']))$date = $_POST['date'];
    $explodedate = explode("/",$date);
    list($year,$month,$date) = $explodedate;
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
    if(in_array($ext,$imgtype)){
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

    // Upload image and the image url 
    if(isset($url)  && isset($_POST['ipaddress'])) $newdata = ['url'=>$url,'ipaddress'=>$_POST['ipaddress']];
    $media = new Media($newdata);
    if(!file_exists($targetdir)){mkdir($targetdir);
    if($uploadok = 1 && is_uploaded_file($targetname)){$result1 = move_uploaded_file($image['tmp_name'],$targetname);
    if($result1)$result2 = $media->insert("INSERT INTO media(url,ext,ipaddress)VALUES(:url,:ext,:ipaddress)",
    ["url"=>$url,'ext'=>$ext,"ipaddress"=>$media->ipaddress]);
    if($result2)$result3 = "files correctly uploaded";
     }
    }
    elseif(file_exists($targetdir)){if($uploadok = 1 && is_uploaded_file($targetname)){
    $result1 = move_uploaded_file($image['tmp_name'],$targetname);
    if($result1)$result2 = $media->insert("INSERT INTO media(url,ext,ipaddress)VALUES(:url,:ext,:ipaddress)",
    ["url"=>$url,'ext'=>$ext,"ipaddress"=>$media->ipaddress]);
    if($result2)$result3 = "file correctly uploaded";
    }
    }
    else{$result3 = "no file upload something went wrong";}
    }
       
    
    function viewMedias(){
    $results = array();
    global $path;
    $results['title'] = "Media List";
    $results['description'] = "A list of The Media";
    $results['pageheading'] = "The Media Lists";
    if(isset($_SESSION['canRead']) && $_SESSION['canRead'] >0){
    if(isset($path['0']) && isset($path['1']) && isset($path['2']) && isset($path['3'])&& isset($path['4']) 
    && $path['3'] == "view" && $path['4'] == "medias"){
    $media = new Media();
    $results['success'] = $media->select("SELECT* FROM media");
    include (WORKING_DIR_PATH."/src/views/admin/view.php");
    
    }
    }
    }
    
    function viewMedia($url){
    if(isset($url)){$url = $_GET['url'];
    $newdata = ['url'=>$url];
    $media = new Media($newdata);
    $result = $media->select("SELECT* FROM media WHERE url=:url",["url"=>$url]);
    include (WORKING_DIR_PATH."/src/views/admin/editmedia.php");
    }
    }
    
    function deleteMedia($url){
    if(isset($url)){$url = $_GET['url'];
    $newdata = ['url'=>$url];
    $media = new Media($newdata);
    $result =  $media->delete("DELETE FROM media WHERE url=:url LIMIT 1",["url"=>$url]);
    include (WORKING_DIR_PATH."/src/views/admin/deletemedia.php");
    return $result;
    }
    }
?>
