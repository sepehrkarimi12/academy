<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'sid')->dropDownList(
        ArrayHelper::map($model->getAllStudents(),
            'id',
            function($model) {
                return $model->fname.' '.$model['lname'];
            }
        ),
        ['prompt'=>'نام دانشجو را انتخاب کنید ...','id'=>'studentId']
    )?>

    <?= $form->field($model,'cid')->dropDownList([],
        ['prompt'=>'نام درس را انتخاب کنید ...','id'=>'courses']
    )?>

    <div class="list-group">
      <a href="#" id="" class="list-group-item disabled">
          <h4>هزینه درس ها</h4>
      </a>
      <div id="costs">
      </div>
    </div>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php 
$script = <<< JS
//here you right all your javascript stuff
$('#studentId').change(function(){
    var studentId = $(this).val();
    $.get('../payment/get-registered-courses', { id : studentId }, function(data){
        var data = $.parseJSON(data);

        //remove options of course select
        $('#courses')
            .find('option')
            .remove()
            .end()
            .append('<option value="">نام درس را انتخاب کنید ...</option>')
            .val('whatever')
        ;

        //remove costs of courses
        $( "#costs" ).empty();

        $.each(data, function( k, v ) {
          $.each(v, function( k, v ) {
              //alert( "Key: " + k + ", Value: " + v['cname'] );

              $('#courses').append("<option value=" + v['id'] + ">" + v['cname'] + "</option>");

              $('#costs').append("<a class=" + "list-group-item" + ">" + v['cname'] + " : " + v['cost'] + "</a>");

            });
        });

    });
});
JS;
$this->registerJS($script);
?>
