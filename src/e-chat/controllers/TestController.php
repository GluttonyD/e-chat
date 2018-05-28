<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 06.04.2018
 * Time: 14:49
 */

namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        echo 'here';
    }

    public function actionMamaMia($a=null){
        if($a!=0){
            return json_encode(['success'=>true,'result'=>$a*$a]);
        }else{
            return json_encode(['success'=>false,'result'=>null]);
        }
    }
}