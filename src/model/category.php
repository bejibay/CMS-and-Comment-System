
<?php 

require_once WORKING_DIR_PATH."/src/model/crudmodel.php";
class Category extends Crudmodel{
    
// define the class properties

public $id = "";
public $name;
public $description;
public $created;
public $updated;
public $ipaddress;


public function __construct($data=[]){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['name']) && preg_match("/[a-zA-Z]{3}/",$data['name']))$this->name=$data['name'];
if(isset($data['description']) && preg_replace("/[^\,\.\"\'\:\;\@\$\()a-zA-Z0-9]/","",$data['description']))
$this->description = $data['description'];
if(isset($data['created']))$this->created = $data['created'];
if(isset($data['updated']))$this->updated = $data['updated'];
if(isset($data['ipaddress']))$this->ipaddress = $data['ipaddress'];
}

}        