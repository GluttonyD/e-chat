<?php
/* @var $this \yii\web\View */

use app\assets\AppAsset;

/* @var $content string */
?>

<? AppAsset::register($this);?>

<? $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $this->title ?></title>
    <? $this->head() ?>
</head>
<? $this->beginBody() ?>

<?= $content ?>

<? $this->endBody() ?>
</html>
<? $this->endPage() ?>
