<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pic') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'base_title') ?>

    <?php // echo $form->field($model, 'base_type') ?>

    <?php // echo $form->field($model, 'base_group') ?>

    <?php // echo $form->field($model, 'base_location') ?>

    <?php // echo $form->field($model, 'benefits') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'information') ?>

    <?php // echo $form->field($model, 'requirement') ?>

    <?php // echo $form->field($model, 'responsibility') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
