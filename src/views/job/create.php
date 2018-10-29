<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = 'Create Job';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

.breadcrumb {
  padding-top: 80px;
}

.bar {
    height: 18px;
    background: green;
}
</style>
<div class="job-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <input class="fileupload" data-id="job-pic" type="file" name="files[]" multiple>
    <div id="progress-job-pic">
        <div class="bar" style="width: 0%;"></div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
