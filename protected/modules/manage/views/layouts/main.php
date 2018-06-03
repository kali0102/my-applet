<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection">
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo">管理后台</div>
    </div><!-- header -->

    <div id="mainmenu">
        <?php

        $this->widget('zii.widgets.CMenu', array(
            'items' => array(
                ['label' => '控制台', 'url' => ['/manage'], 'active' => $this->id == 'default'],

                ['label' => '*', 'url' => 'javascript:;'],
                ['label' => '书签', 'url' => ['/manage/item'], 'active' => $this->id == 'item'],
                ['label' => '网站', 'url' => ['/manage/site'], 'active' => $this->id == 'site'],

                ['label' => '*', 'url' => 'javascript:;'],
                ['label' => '文章', 'url' => ['/manage/archive'], 'active' => $this->id == 'archive'],
                ['label' => '分类', 'url' => ['/manage/category'], 'active' => $this->id == 'category'],
                ['label' => '评论', 'url' => ['/manage/comment'], 'active' => $this->id == 'comment'],

                ['label' => '*', 'url' => 'javascript:;'],
                ['label' => '所属', 'url' => ['/manage/group'], 'active' => $this->id == 'group'],
                ['label' => '账号', 'url' => ['/manage/account'], 'active' => $this->id == 'account'],


//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ));

        ?>
    </div><!-- mainmenu -->
    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
            'homeLink' => CHtml::link('控制台', ['/manage'])
        )); ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        <!--		Copyright &copy; --><?php ////echo date('Y'); ?><!-- by My Company.<br/>-->
        <!--		All Rights Reserved.<br/>-->
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>
