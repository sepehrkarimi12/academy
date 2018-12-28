<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'آموزشگاه کامپیوتر',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'خانه', 'url' => ['/site/index']],
        ['label' => 'استاد ها', 'url' => ['/teacher'],'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'دانشجویان', 'url' => ['/student'],'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'درس ها', 'url' => ['/course'],'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'ثبت نام', 'url' => ['/register'],'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'پرداخت ها', 'url' => ['/payment'],'visible'=>!Yii::$app->user->isGuest],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ثبت اکانت', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'ورود', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'خروج (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><?= Html::encode('آموزشگاه کامپیوتر') ?> <?= Yii::$app->jdate->date('Y-m-d') ?> &copy; </p>

        <p class="pull-right">سپهر کریمی صدیق و علی خاندوزی</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
