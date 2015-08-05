<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Fulbright Science School/Backend Admin';
?>
<div class="site-index">

    <div class="jumbotron">
        

        <h2 id="admin">Welcome Admin</h2>

        
    </div>

    <div class="body-content" align="center">

     <!-- Section for User Creation on front end -->
     <?= Html::a('Create Account', ['site/signup'], ['class'=>'btn btn-success']) ?>


     <!-- Section for Uploading and Editing of Gallery -->
     <?= Html::a('Update Gallery', ['gallery/index'], ['class'=>'btn btn-success']) ?>

     <!-- Section for the Grades Viewer -->
     <?= Html::a('Update Grades', ['grade/index'], ['class'=>'btn btn-success']) ?>

    </div>
</div>
