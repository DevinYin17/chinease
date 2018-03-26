<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Job', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pic',
            'title',
            'date',
            'author',
            //'category',
            //'base_title',
            //'base_type',
            //'base_group',
            //'base_location',
            //'benefits',
            //'salary',
            //'information',
            //'requirement',
            //'responsibility',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
