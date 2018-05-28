<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 11.04.2018
 * Time: 14:43
 */

namespace app\commands;


use app\models\Message;
use app\models\User;
use yii\console\Controller;
use Yii;

class DaemonController extends Controller
{
    public function actionTest()
    {
        Message::find()->one()->delete();
    }

    public function actionLogout()
    {
        $users=User::find()->all();
        /**
         * @var User $user
         */
        foreach ($users as $user){
            if($user->last_seen<time()-60){
                User::offilne($user);
            }
            else{
                $user->isOnline=true;
                $user->save();
            }
        }
    }

}