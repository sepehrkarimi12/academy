<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?php
        $arr=[]; 
        for($i=1300; $i<=1397; $i++)
            $arr+=[$i=>$i];
    ?>
    <?= $form->field($model,'birthday')->dropDownList($arr,['prompt'=>'سال تولد'])?>

    <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'certificate')->dropDownList([ 'کمتر از سیکل' => 'کمتر از سیکل', 'سیکل' => 'سیکل', 'دیپلم' => 'دیپلم', 'فوق دیپلم' => 'فوق دیپلم', 'لیسانس' => 'لیسانس', 'فوق لیسانس' => 'فوق لیسانس', 'دکتری' => 'دکتری', 'فوق دکتری' => 'فوق دکتری', 'بیشتر از دکتری' => 'بیشتر از دکتری', ], ['prompt' => 'مدرک تحصیلی']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
