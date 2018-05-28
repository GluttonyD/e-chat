<?php
/**
 * @var $this yii\web\View
 * @var $chat app\models\ChatView
 * @var $message app\models\Message
 * @var $user app\models\User
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

$this->title = 'Чат';
?>
<body>
<div id="messages" class="messages_area"></div>
<div class="online_users">
    <p><font color="#f8f8ff">Пользователи онлайн</font></p>
    <div id="users">
    </div>
</div>
<div>
    <form method="post" action="/chat/index" class="form-inline">
        <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
        <div class="form-group" style="width: 90%">
            <input id="input1" type="text" name="MessageForm[text]" class="input" value="">
        </div>
        <div class="form-group">
            <button id="send_message" type="submit" class="btn btn-primary btn-block btn-large" name="login-button">
                Написать
            </button>
        </div>
    </form>
    <div id="connection">

    </div>
</div>
</body>