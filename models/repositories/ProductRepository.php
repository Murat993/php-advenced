<?php
namespace app\models\repositories;
use \app\models\Repository;
use \app\models\Product;
/**
* 
*/
class ProductRepository extends Repository
{
	  public static function getTableName()
	 {
	 	return 'product';
	 }

	  public static function getEntityClass()
	 {
	 	return Product::class;
	 }
}

