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

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if(!empty($searchModel->date_from) && !empty($searchModel->date_to)):?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'date',
            'total_successful',
            'total_failed',
        ],
    ]); ?>
    <?php endif;?>


</div>
