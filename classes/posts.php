

// config codes

<?php 

 Class Post{
// define the class properties
public $id = null;
public $title = null;
public $summary =null;
public $content = null;
public $url = null; 
public $imageurl = null;
public $image_extension = null;
public $categoryID = null;
public $pubdate =null;
public $ip = null;

public function __construct($data=array){
if(isset($data['id']))$this->id=int($data['id']);
if(isset($data['pubdate']))$this-pubdate=int($databases['pubdate']);
if(isset($data['title']))$this->title=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['id']);
if(isset($data['summary']))$this->summary=preg_replace("/[^\,\.\"\'\:\;\@\$\()a-Z0-9]/","",$data['id']);
if(isset($data['categoryID']))$this->categoryID=int($data['categoryID']);
if(isset($data['url']))$this->url=$data['url'];
if(isset($data['imageurl']))$this->imageurl=$data['imageurl'];
if(isset($data['image_extension']))$this->image_extension=$data['image_extension'];
if(isset($data['ip']))$this->ip=int($data['ip']);

}

public function storeFormValues($params)
{$this->__construct($params);
if(isset($params'[pubdate']){
$pubdate=explode('-', $params['pubdate']);
if(count($pubdate==3)){
list($pubdate=($x,$y,$z);
$pubdate=mktime(0,0,0,$x,$y,$z);
}
}


}

}






?>















