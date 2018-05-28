<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 04.04.2018
 * Time: 21:09
 */

namespace app\controllers;


use app\models\AddUser;
use app\models\ChatView;
use app\models\Message;
use app\models\MessageForm;
use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Cookie;

class ChatController extends Controller
{

    public function beforeAction($action)
    {
        /**
         * @var User $user
         */
        if($user=User::isLogin()) {
            $user->updateLastSeen();
        }
        return parent::beforeAction($action);
    }

    public function actionAuth(){
        $this->layout = 'blank';
        if(Yii::$app->user->isGuest) {
            $user = new AddUser();
            if ($user->load(Yii::$app->request->post()) && $user->auth()) {
                return $this->redirect('/chat/index');
            }
            return $this->render('auth', [
                'user' => $user,
            ]);
        }
        else{

            return $this->redirect(['/chat/index']);
        }
    }

    public function actionIndex(){
        ChatView::setMessageCookies();
        if(!Yii::$app->user->isGuest) {
            $chat = new ChatView();
            $chat->newMessage = new MessageForm();
            $success = false;
            if ($chat->newMessage->load(Yii::$app->request->post()) && $chat->newMessage->addMessage()) {
                $success = true;
            }
            $chat->getMessages();
            $chat->getOnlineUsers();
            return $this->render('chat_main', [
                'chat' => $chat
            ]);
        }
        else{
            return $this->redirect('/chat/auth');
        }
    }

    public function actionSend(){
        $chat=new ChatView();
        $chat->newMessage=new MessageForm();
        if ($chat->newMessage->load(Yii::$app->request->post()) && $chat->newMessage->addMessage()) {
            return true;
        }
        return false;
    }

    public function actionUpdate(){
        return ChatView::updateUsers();
    }

    public function actionIsNewMessages(){
        return ChatView::updateMessages();
    }
}