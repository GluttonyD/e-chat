<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 04.04.2018
 * Time: 21:14
 */

namespace app\models;


use yii\base\Model;

class AddUser extends Model
{
    public $nickname;

    public function rules(){
        return [
            [['nickname'],'required'],
            [['nickname'],'string'],
            [['nickname'],'notOnline']
        ];
    }

    public function notOnline($attribute,$params){
        /**
         * @var User $user
         */
        $user=User::find()->where(['nickname'=>$this->nickname])->one();
        if($user->isOnline){
            $this->addError($attribute,'Пользователь с таким именем уже выполнил вход');
        }
    }
    public function auth(){
        /**
         * @var $user User
         */
        $user=User::find()->where(['nickname'=>$this->nickname])->one();
        if($user!=null && $this->validate()){
            \Yii::$app->user->login($user);
            $user->isOnline=true;
            $user->save();
            return true;
        }
        if($this->validate()){
            $user=new User();
            $user->nickname=$this->nickname;
            $user->isOnline=true;
            $user->save();
//            $user=User::find()->where(['nickname'=>$this->nickname])->one();
            \Yii::$app->user->login($user);
            return true;
        }
        return false;
    }
}