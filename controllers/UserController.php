<?php 
namespace app\controllers;
use \app\controllers\Controller;
use app\models\repositories\UserRepository;
use app\services\Request;
/**
* 
*/
class UserController extends Controller
{

	public function actionIndex()
	{
		echo $this->render('user/index', []);
	}
}