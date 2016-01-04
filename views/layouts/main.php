<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use webvimark\modules\UserManagement\components\GhostNav;
use webvimark\modules\UserManagement\UserManagementModule;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app','My Company'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
      'encodeLabels'=>false,
      'activateParents'=>true,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
                    ['label' => Yii::t('app','Status'), 'url' => ['/status/create']],
                    //['label' => Yii::t('app','About'), 'url' => ['/site/about']],
                    ['label' => Yii::t('app','Contact'), 'url' => ['/site/contact']],          
                    ['label' => 'Backend routes',
                    'items'=>UserManagementModule::menuItems()],
                   [ 'label' => 'Frontend routes',
                    'items'=>[
                   Yii::$app->user->isGuest ?                         
                   ['label'=>Yii::t('app','Login'), 'url'=>['/user-management/auth/login']]:
                   ['label'=>Yii::t('app','Logout'),(' . Yii::$app->user->identity->username . '),'url'=>['/user-management/auth/logout']],
                   ['label'=>Yii::t('app','Registration'), 'url'=>['/user-management/user/create']],
                   ['label'=>Yii::t('app','Change on password'), 'url'=>['/user-management/auth/change-own-password']],
                   ['label'=>Yii::t('app','Password recovery'), 'url'=>['/user-management/auth/password-recovery']],
                   ['label'=>Yii::t('app','E-mail confirmation'), 'url'=>['/user-management/auth/confirm-email']],
            ],
        ],
    ],
]);
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
