<?php
/**
 * @var $this yii\web\View
 * @var $user app\models\AddUser
 * @var $repeat
 */
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\helpers\Url;
$this->title='Вход';
$config = array();
array_push($config, '/chat/auth');
?>

<body>
<div class="login">
    <h1>Вход</h1>
    <form method="post" class="hui" action="<?= Url::to($config) ?>">
        <input class='input' type="text" name="AddUser[nickname]" placeholder="Введите никнейм" >
        <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
        <?= Html::submitButton('Войти в чат', ['class' => 'btn btn-primary btn-block btn-large', 'name' => 'login-button']) ?>
    </form>
</div>
    <?php if($user->hasErrors()){ ?>
        <?php foreach ($user->errors as $error) {?>
            <?php foreach ($error as $item) {?>
                <p><font color="#f8f8ff"><?= $item ?></font></p>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</body>

