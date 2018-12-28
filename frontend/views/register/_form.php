<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Register */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'sid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($model->getAllStudents(),
                    'id',
                    function($model) {
                        return $model->fname.' '.$model['lname'];
                    }
            ),
            'options' => ['placeholder' => 'نام دانشجو','dir'=>'rtl'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php
        echo $form->field($model, 'cid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($model->getAllCourses(),'id','cname'),
            'options' => [
                'placeholder' => 'نام درس',
                'id'=>'courseId',
                'dir'=>'rtl'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    <div class="list-group">
      <a href="#" id="" class="list-group-item disabled">
          <h4>مشخصات درس</h4>
      </a>
      <a href="#" id="cname" class="list-group-item">نام درس</a>
      <a href="#" id="startdate" class="list-group-item">تاریخ شروع</a>
      <a href="#" id="enddate" class="list-group-item">تاریخ پایان</a>
      <a href="#" id="starttime" class="list-group-item">زمان شروع کلاس</a>
      <a href="#" id="endtime" class="list-group-item">زمان پایان کلاس</a>
      <a href="#" id="cost" class="list-group-item">هزینه</a>
    </div>

<?php 
$script = <<< JS
//here you right all your javascript stuff
$('#courseId').change(function(){
    var courseId = $(this).val();
    $.get('../course/get-cource', { id : courseId }, function(data){
        var data = $.parseJSON(data);
        $( "#cname" ).html( 'نام درس : '+data.cname );
        $( "#startdate" ).html( 'تاریخ شروع : '+data.startdate );
        $( "#enddate" ).html( 'تاریخ پایان : '+data.enddate );
        $( "#starttime" ).html( 'زمان شروع کلاس : '+data.starttime );
        $( "#endtime" ).html( 'زمان پایان کلاس : '+data.endtime );
        $( "#cost" ).html( 'هزینه : '+data.cost );
    });
});
JS;
$this->registerJS($script);
?>

