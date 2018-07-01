<?php
namespace app\models;
use app\models\DataEntity;
/**
* 
*/
class Users extends DataEntity
{
	public $id;
	public $name;
	public $email;
	public $password;

	public function __construct($id = null, $name = null, $email = null, $password = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password; 
    }

}