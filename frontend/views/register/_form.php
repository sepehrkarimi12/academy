<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Register */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'sid')->dropDownList(
        ArrayHelper::map($model->getAllStudents(),
            'id',
            function($model) {
                return $model->fname.' '.$model['lname'];
            }
    ),
        ['prompt'=>'نام استاد را انتخاب کنید ...']
    )?>

    <?= $form->field($model,'cid')->dropDownList(
        ArrayHelper::map($model->getAllCourses(),'id','cname'),
        ['prompt'=>'نام استاد را انتخاب کنید ...']
    )?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
