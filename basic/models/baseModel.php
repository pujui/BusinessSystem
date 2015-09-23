<?php
namespace app\models;

define('DB_PREFIX_BS', 'business_system.');

class baseModel{

    protected static $_db = null;

    public function __construct(){
        $this->init();
    }

    private function init(){
        if(self::$_db === null){
            self::$_db = \Yii::$app->db;
        }
    }

    protected function createCommand($sql = ''){
        return self::$_db->createCommand($sql);
    }

}