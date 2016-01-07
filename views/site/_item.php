<?php

use yii\helpers\Html;
?>  
<fieldset disabled>
<div class="form-group">
<label for="disabledTextInput"><?=Yii::t('app','Title :')?>- <?= Html::a(Html::encode($model->id), ['status/view', 'id' => $model->id]);?> </label>
<textarea style="border-radius:20px;border:3px solid blue;background-color:white;color:black; " id="disabledTextInput" rows ="4" name='info1' class="form-control" ><?=$model->message;?>-<?= Yii::t('app','Published in')?>-<?=$model->created_at;?>-<?=$model->created_by;?></textarea>

</div>
</fieldset>
