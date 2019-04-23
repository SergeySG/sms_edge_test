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

<div class="row">
    <div class="col-md-6">

        <?= $form->field($model, 'date_from')->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'date_to')->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
    </div>
</div>

    <?= $form->field($model, 'usr_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Users::find()->all(), 'usr_id', 'usr_name'), ['prompt'=>"Select User"]) ?>

    <?= $form->field($model, 'cnt_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Countries::find()->all(), 'cnt_id', 'cnt_title'), ['prompt'=>"Select Country"]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
