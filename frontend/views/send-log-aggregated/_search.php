<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SendLogAggregatedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="send-log-aggregated-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ag_log_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'usr_id') ?>

    <?= $form->field($model, 'cnt_id') ?>

    <?= $form->field($model, 'total_successful') ?>

    <?php // echo $form->field($model, 'total_failed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
