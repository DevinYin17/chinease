<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

.breadcrumb {
  padding-top: 80px;
}

.user-search .form-group {
  display: inline-block;
  width: 150px;
}
</style>
<div class="user-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'password',
            'isAdmin',
            //'resume',
            //'resume_id',
            //'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
