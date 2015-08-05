<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Section;
use backend\models\Level;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Add User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('success')) { ?>

        <div class="alert alert-success"><p>Added to the database!</p></div>

    <?php } else if(Yii::$app->session->hasFlash('failed')) { ?>

        <div class="alert alert-danger"><p>Not added to the database!</p></div>

    <?php } ?>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'type')->dropDownList([ 'Student' => 'Student', 'Teacher' => 'Teacher', ], ['prompt'=>"Select User Type"]
                ) ?>
                <?= $form->field($model, 'first_name') ?>
                <?= $form->field($model, 'last_name'); ?>
                <?= $form->field($model, 'age') ?>
                <?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt'=>"Select Gender"]
                ) ?>
                <?= $form->field($model, 'birthdate')->widget(
                    DatePicker::className(), [
                        // inline too, not bad
                         'inline' => false, 
                         // modify template for custom rendering
                        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
                <?= $form->field($model, 'address') ?>
                <?= $form->field($model, 'email') ?>
                <!-- <?= $form->field($model, 'level_id')->dropDownList(
                    ArrayHelper::map(Level::find()->all(),'id','level_name'),
                    [
                        'prompt'=>"Select Grade Level",
                        'onChange'=>'
                            $.post( "index.php?r=site/lists&id='.'"+$(this).val(), function(data) {
                                $( "select#signupform-section_id" ).html(data);
                            });',
                    ]
                ) ?> -->
                <?= $form->field($model, 'level_id')->dropDownList(
                    ArrayHelper::map(Level::find()->all(),'id','level_name'),
                    ['prompt'=>"Select Grade Level"]
                ) ?>
                <?= $form->field($model, 'section_id')->dropDownList(
                    ArrayHelper::map(Section::find()->all(),'id','section_name','level_desc'),
                    ['prompt'=>"Select Section Name"]
                ) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
