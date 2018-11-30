<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'tid')->dropDownList(
        ArrayHelper::map($model->getAllTeachers(),
            'id',
            function($model) {
                return $model->fname.' '.$model['lname'];
            }
    ),
        ['prompt'=>'نام استاد را انتخاب کنید ...']
    )?>

    <?= $form->field($model, 'startdate')->widget(jDate\DatePicker::className())->textInput(['class'=>'col-lg-12 form-control']) ?>

    <?= $form->field($model, 'enddate')->widget(jDate\DatePicker::className())->textInput(['class'=>'col-lg-12 form-control']) ?>

    <?= $form->field($model, 'starttime')->textInput(['maxlength' => true,'placeholder'=>'مثال  10:30']) ?>

    <?= $form->field($model, 'endtime')->textInput(['maxlength' => true,'placeholder'=>'مثال  11:30']) ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
