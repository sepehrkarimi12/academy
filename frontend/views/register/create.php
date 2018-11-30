<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Register */

$this->title = Yii::t('app', 'Create Register');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
