<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 04.04.2018
 * Time: 22:34
 */

namespace app\models;


use yii\base\Model;
use yii\web\Cookie;
use Yii;

class ChatView extends Model
{
    /**
     * @var $messages Message
     * @var $newMessage MessageForm
     */
    public $messages;
    public $newMessage;
    public $onlineUsers;

    public function getMessages(){
        $this->messages=Message::find()->all();
    }
    public function getOnlineUsers(){
        $this->onlineUsers=User::find()->where(['isOnline'=>true])->all();
    }

    public static function updateUsers(){
        $array=array();
        $users=User::find()->where(['isOnline'=>true])->all();
        /**
         * @var User $user
         */
        $i=0;
        foreach ($users as $user){
            array_push($array,$user->nickname);
        }
        return json_encode($array);
    }

    public static function updateMessages(){
        $array=array(array());
        $cookie=Yii::$app->request->cookies;
        $messages=Message::find()->orderBy(['id'=>SORT_DESC])->all();
        $message_id=$cookie->getValue('message_id',1);
        /**
         * @var Message $message
         */
        $i=0;
        foreach ($messages as $message) {
            if($message->id>$message_id) {
                $array[$i]['author'] = $message->author_nickname;
                $array[$i]['text'] = $message->text;
                $i++;
            }
        }
        $newCookies=Yii::$app->response->cookies;
        $newCookies->add(new Cookie(['name'=>'message_id','value'=>$messages[0]->id]));
        if($array[0]) {
            $array=array_reverse($array);
            return json_encode($array);
        }
        return false;
    }

    public static function setMessageCookies(){
        $cookies=Yii::$app->request->cookies;
        $message_id=$cookies->getValue('message_id');
        $newCookies=Yii::$app->response->cookies;
        $newCookies->add(new Cookie(['name'=>'message_id','value'=>$message_id-50]));
    }
}