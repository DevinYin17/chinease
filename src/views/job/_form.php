<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'benefits')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'information')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'requirement')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsibility')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
