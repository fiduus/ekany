<?php
  use yii\helpers\Html;
?>
 
<h1><?=(Yii::t('app','Your Status Update'))?></strong></h1>
<p><label><?=(Yii::t('app','Text'))?></label>:</p>
  <?= Html::encode($model->text) ?>
<br /><br />
<p><label>Permissions</label>:</p>
<?php
echo $model->getPermissionsLabel($model->permissions);
?>
