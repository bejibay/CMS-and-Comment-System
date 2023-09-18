<?php 

require_once WORKING_DIR_PATH."src/model/crudmodel.php";

class Post extends Crudmodel{
    
public $id;
public $url;
public $title;
public $description;
public $content;
public $category_id;
public $media_id;
public $created;
public $updated;
public $ipaddress;

// __construct function to initialise class properties
public function __construct($data=[]){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['title']) && preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['title']))
$this->title= $data['title'];
if(isset($data['description']) && preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['description']))
$this->description = $data['description'];
if(isset($data['content']))$this->content=trim(stripslashes(htmlspecialchars($data['content'])));
if(isset($data['category_id']) && is_int($data['category_id']))$this->category_id = $data['category_id'];
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->updated = $data['updated'];
if(isset($data['ipaddress']))$this->ipaddress = $data['ipaddress'];
}
}
           