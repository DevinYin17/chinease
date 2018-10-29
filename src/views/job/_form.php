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

    <input class="fileupload" data-id="job-image_1" type="file" name="files[]" multiple>
    <div id="progress-job-image_1">
        <div class="bar" style="width: 0%;"></div>
    </div>
    <?= $form->field($model, 'image_1')->textInput(['maxlength' => true]) ?>

    <input class="fileupload" data-id="job-image_2" type="file" name="files[]" multiple>
    <div id="progress-job-image_2">
        <div class="bar" style="width: 0%;"></div>
    </div>
    <?= $form->field($model, 'image_2')->textInput(['maxlength' => true]) ?>

    <input class="fileupload" data-id="job-image_3" type="file" name="files[]" multiple>
    <div id="progress-job-image_3">
        <div class="bar" style="width: 0%;"></div>
    </div>
    <?= $form->field($model, 'image_3')->textInput(['maxlength' => true]) ?>

    <input class="fileupload" data-id="job-image_4" type="file" name="files[]" multiple>
    <div id="progress-job-image_4">
        <div class="bar" style="width: 0%;"></div>
    </div>
    <?= $form->field($model, 'image_4')->textInput(['maxlength' => true]) ?>

    <input class="fileupload" data-id="job-image_5" type="file" name="files[]" multiple>
    <div id="progress-job-image_5">
        <div class="bar" style="width: 0%;"></div>
    </div>
    <?= $form->field($model, 'image_5')->textInput(['maxlength' => true]) ?>

    <input class="fileupload" data-id="job-image_6" type="file" name="files[]" multiple>
    <div id="progress-job-image_6">
        <div class="bar" style="width: 0%;"></div>
    </div>
    <?= $form->field($model, 'image_6')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
