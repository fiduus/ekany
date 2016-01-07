<?php
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use app\models\Status;
use app\models\StatusSearch;
/* @var $this yii\web\View */

//$this->title =  Yii::t('app','My Yii Application');
?>
<div class="site-index">
    <div class="jumbot" style="text-align:center;color:darkblue;">
      <h1><?= Yii::t('app','Welcome in your site'); ?></h1>       
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2 style="color:red;"><?= Yii::t('app','Last items'); ?></h2>

               <?php
/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

                    $this->title = Yii::t('app','Statuses');
                    $this->params['breadcrumbs'][] = $this->title;
                    ?>
                    <div class="status-index">                     
                  <?php  echo ListView::widget( [
                        'dataProvider' => $dataProvider,
                        'itemView' => '_item',
                    ] ); ?>                                      
                                       
                     </div>     
                                              
            </div>          
          </div>
    </div>
</div>
