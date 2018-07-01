<?php 
namespace app\models\repositories;
use \app\models\Repository;
use \app\models\Users;
/**
* 
*/
class ProductRepository extends Repository
{
	  public static function getTableName()
	 {
	 	return 'user';
	 }

	  public static function getEntityClass()
	 {
	 	return Users::class;
	 }
}
