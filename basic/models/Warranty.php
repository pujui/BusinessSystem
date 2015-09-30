<?php
namespace app\models;

use app\models\baseModel;

class warranty extends baseModel{
    
    private $table_user;
    
    public function __construct(){
        $this->table_user = DB_PREFIX_BS . 'user';
    }
    
}