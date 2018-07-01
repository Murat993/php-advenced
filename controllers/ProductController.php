<?php


namespace app\controllers;


use app\base\App;
use app\models\Product;
use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    public function actionCard()
    {
        $id = App::call()->request->get('id');
        /** @var Product $product */
        $product = (new ProductRepository())->getOne($id);
        echo $this->render("product/card", ['product' => $product]);
    }

    public function actionIndex(){
        $items = (new ProductRepository())->getAll();
        echo $this->render("product/index", ['items' => $items]);
    }
}