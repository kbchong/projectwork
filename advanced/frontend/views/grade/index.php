<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\GradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (Yii::$app->user->identity->type == 'Student') { ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions'=>function($model) {
                            if($model->grade_remarks < 70) {
                                return ['class'=>'danger'];
                            } else if ( $model->grade_remarks > 69) {   
                                return ['class'=>'success'];    
                            }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'grade_subject',
                'grade_quarter_number',
                'grade_remarks',
                //'grade_date_created',
                // 'user_id',
            ],
        ]); ?>

    <?php } else { ?>

        <p>
            <?= Html::a('Add Grade', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions'=>function($model) {
                            if($model->grade_remarks < 70) {
                                return ['class'=>'danger'];
                            } else if ( $model->grade_remarks > 69) {   
                                return ['class'=>'success'];    
                            }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                [
                    'attribute' => 'user_id',
                    'value' => 'user.full_name',
                ],
                'grade_subject',
                'grade_quarter_number',
                'grade_remarks',
                //'grade_date_created',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    <?php } ?>

</div>
