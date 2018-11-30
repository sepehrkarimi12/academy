<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TeacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'workfield') ?>

    <?= $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'cellphone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
