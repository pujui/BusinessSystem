<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    
    public function actionIndex()
    {
        $user = new \app\models\User;
        return $this->render('index');
    }
    
}
