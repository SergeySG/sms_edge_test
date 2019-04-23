<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SendLogAggregatedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Send Log Aggregateds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="send-log-aggregated-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Send Log Aggregated', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ag_log_id',
            'date',
            'usr_id',
            'cnt_id',
            'total_successful',
            //'total_failed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
