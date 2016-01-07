<?php

use yii\helpers\Html;
?>  
<fieldset disabled>
<div class="form-group">
<label for="disabledTextInput"><?=Yii::t('app','Title :')?><?= Html::a(Html::encode($model->id), ['status/view', 'id' => $model->id]);?> </label><div class='pub' style="color:darkgrey"><?= Yii::t('app','Published in')?>-<?=$model->created_at;?></div>
<textarea style="border-radius:15px;border:3px solid blue;background-color:white;color:black; " id="disabledTextInput" rows ="4" name='info1' class="form-control" ><?=$model->message;?></textarea>

</div>
</fieldset>
