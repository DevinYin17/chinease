<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = 'Update Job: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style>

.breadcrumb {
  padding-top: 80px;
}

</style>
<div class="job-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <input id="fileupload" type="file" name="files[]" multiple>
    <div id="progress">
        <div class="bar" style="width: 0%;"></div>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
