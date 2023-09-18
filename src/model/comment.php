
<?php 

require_once WORKING_DIR_PATH."src/model/crudmodel.php";

class Comment extends Crudmodel {

public $id;
public $name;
public $email;
public $website;
public $post_id;
public $comment;

public $ipaddress;

// define __construct function to initialise the class properties

public function __construct($data=[]){
parent::__construct();
if(isset($data['id']) && is_int($data['id']))$this->id=$data['id'];
if(isset($data['email']))$this->email=filter_var($data['email'],FILTER_VALIDATE_EMAIL);
if(isset($data['post_id']) && is_int($data['post_id']))$this->post_id
=$data['post_id'];
if(isset($data['website']))$this->website=filter_var($data['website'],FILTER_VALIDATE_URL);
if(isset($data['comment']))$this->comment=trim(stripslashes(htmlspecialchars($data['comment'])));
if(isset($data['ipaddress']) && is_int($data['ipaddress']))$this->ipaddress = $data['ipaddress'];

}
       
}   