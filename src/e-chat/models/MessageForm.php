<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 04.04.2018
 * Time: 22:35
 */

namespace app\models;


use yii\base\Model;

class MessageForm extends Model
{
    public $text;

    public function rules()
    {
        return [
            [['text'], 'string'],
            [['text'], 'required']
        ];
    }

    public function addMessage(){
        if($this->validate()){
            $message=new Message();
            $message->text=$this->text;
            $message->author_nickname=User::getUsername(\Yii::$app->user->getId());
            $message->save();
            return true;
        }
        return false;
    }
}