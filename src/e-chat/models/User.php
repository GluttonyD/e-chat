<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
* This is the model class for table "user".
 *
 * @property int $id
* @property string $nickname
 * @property boolean $isOnline
 * @property int $last_seen

*/

class User extends ActiveRecord implements IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public static function getUsername($id){
        $tmp=self::findIdentity($id);
        return $tmp->nickname;
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
    }


    public  static function offilne($user){
        /**
         * @var User $user
         */
        $user->isOnline=false;
        $user->save();
    }
    public static function isLogin(){
        if(\Yii::$app->user->isGuest){
            return false;
        }
        return \Yii::$app->user->identity;
    }
    public function updateLastSeen(){
        $this->last_seen=time();
        $this->save();
    }
}
