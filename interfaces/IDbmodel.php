<?php
namespace app\interfaces;

interface IDbModel{
    /**
     * @param integer $id
     * @return mixed
     */
    public static function getOne($id);

    public static function getAll();

    public static function getTableName();
}