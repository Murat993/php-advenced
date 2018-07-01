<?php

namespace app\models;
use app\models\DataEntity;
use app\helpers\Url;

class Product extends DataEntity
{
    public $id;
    public $name;
    public $price;
    public $brand;
    public $description;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $customer
     */
    public function __construct($id = null, $name = null, $price = null, $brand = null, $description = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
        $this->description = $description;
 
    }

    public function getUrl()
    {
        if($this->id){
            return (new Url())->generate("product", "card", ['id' => $this->id]);
        }
        return false;
    }

    public function getShortDescription()
    {
        return mb_substr($this->description, 0 ,20);
    }
}