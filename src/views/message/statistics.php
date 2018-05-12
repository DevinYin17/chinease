<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Statistics';
?>
<style>

.breadcrumb {
  padding-top: 80px;
}

.tr {
  font-size: 0;
}

.td {
  font-size: 18px;
  line-height: 40px;
  display: inline-block;
  width: 300px;
  border: 1px solid #777;
  vertical-align: top;
  text-align: center;
}

</style>
<div class="message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php foreach ($model as $item) {
          ?>
            <div class="tr">
              <div class="td">
                <?= $item['from'] ?>
              </div>
              <div class="td">
                <?= $item['count'] ?>
              </div>
            </div>
          <?php
        } ?>

    </p>



</div>
