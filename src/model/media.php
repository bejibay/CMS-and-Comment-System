
<?php 
require_once WORKING_DIR_PATH."src/model/crudmodel.php";

class Media extends Crudmodel{

public $id;
public $url;
public $ipaddress;

public function __construct($data=array()){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['url']))$this->url=filter_var($data['url'],FILTER_VALIDATE_URL);
if(isset($data['ipaddress']))$this->ipaddress=$data['ipaddress'];

}


}     