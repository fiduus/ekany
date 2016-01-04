<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model,Yii::t( 'app','message')) ?>

    <?= $form->field($model, Yii::t('app','permissions')) ?>

    <?= $form->field($model, Yii::t('app','created_at')) ?>

    <?= $form->field($model, Yii::t('app','updated_at')) ?>

    <div class="form-group">
        <?= Html::submitButton (Yii::t('app','Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
