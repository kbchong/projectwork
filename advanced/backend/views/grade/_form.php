<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Grade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
                    ArrayHelper::map(User::find()->where(['type'=>'Student'])->all(),'id','full_name'),
                    ['prompt'=>"Select Name"]
                ) ?>

    <?= $form->field($model, 'grade_subject')->dropDownList([ 'Computer' => 'Computer', 'English' => 'English', 'Filipino' => 'Filipino', 'MAPEH' => 'MAPEH', 'Math' => 'Math', 'Science' => 'Science', ], ['prompt' => 'Select Subject']) ?>

    <?= $form->field($model, 'grade_quarter_number')->dropDownList([ '1st Quarter' => '1st Quarter', '2nd Quarter' => '2nd Quarter', '3rd Quarter' => '3rd Quarter', '4th Quarter' => '4th Quarter' ], ['prompt'=>"Select Quarter"]
                ) ?>

    <?= $form->field($model, 'grade_remarks')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
