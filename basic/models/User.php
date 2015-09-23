<?php
namespace app\models;

use app\models\baseModel;

class User extends baseModel{
    
    private $table_user;
    
    public function __construct(){
        $this->table_user = DB_PREFIX_BS . 'user';
    }

    public function findUserById($userId){
        $sql = "SELECT * 
                FROM {$this->table_user} 
                WHERE userId=:userId";
        return $this->createCommand($sql)
                    ->bindValue(':userId', $userId)
                    ->queryAll()[0];
    }

    public function create($params){
        $sql = "INSERT INTO {$this->table_user}
                    (userAcc, userName, userPwd, isClosed)
                VALUES
                    (:userAcc, :userName, :userPwd, :isClosed)";
        $result = $this->createCommand($sql)
                        ->bindValues([
                            ':userAcc' => $params['userAcc'],
                            ':userName' => $params['userName'],
                            ':userPwd' => $this->generatePassword($params['userAcc'], $params['userPwd']),
                            ':isClosed' => '1',
                        ])
                        ->execute();
        return ($result > 0);
    }

    public function generatePassword($userAcc, $userPwd){
        return sha1($userAcc.':'.$userPwd);
    }

}
