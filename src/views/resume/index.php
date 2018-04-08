<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resumes';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.resume-search .form-group {
  display: inline-block;
  width: 150px;
}

tr td:last-child,
tr th:last-child {
  display: none;
}
</style>
<div class="resume-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Resume', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            [
              'attribute' => 'resume',
              'value' => function ($model, $key, $index, $column) {
                       return Html::a($model->resume, $model->resume);
               },
              'format' => 'raw',
            ],
            'date',
            //'email:email',
            //'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
