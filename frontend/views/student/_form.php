<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

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
    <?php
        echo $form->field($model, 'birthday')->widget(Select2::classname(), [
            'data' => $arr,
            'options' => ['placeholder' => 'سال تولد'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>

    <?php
        $arr2=[ 'کمتر از سیکل' => 'کمتر از سیکل', 'سیکل' => 'سیکل', 'دیپلم' => 'دیپلم', 'فوق دیپلم' => 'فوق دیپلم', 'لیسانس' => 'لیسانس', 'فوق لیسانس' => 'فوق لیسانس', 'دکتری' => 'دکتری', 'فوق دکتری' => 'فوق دکتری', 'بیشتر از دکتری' => 'بیشتر از دکتری', ];
    ?>
    <?php
        echo $form->field($model, 'certificate')->widget(Select2::classname(), [
            'data' => $arr2,
            'options' => ['placeholder' => 'مدرک تحصیلی '],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
