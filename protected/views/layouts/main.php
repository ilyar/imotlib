<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<!-- page -->
<body>
<div class="container" id="page">

    <!-- header -->
    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div>

    <!-- mainmenu -->
    <div id="mainmenu">
        <?php $this->widget(
            'zii.widgets.CMenu',
            array(
                'items' => array(
                    array('label' => 'Books', 'url' => array('/book/index')),
                    array('label' => 'Authors', 'url' => array('/author/index')),
                    array('label' => 'Customer', 'url' => array('/customer/index')),
                    array('label' => 'Report book', 'url' => array('/book/report')),
                    array('label' => 'Random books', 'url' => array('/book/report&mode=random&limit=5')),
                    array('label' => 'Report author', 'url' => array('/author/report')),
                    array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    array(
                        'label' => 'Logout (' . Yii::app()->user->name . ')',
                        'url' => array('/site/logout'),
                        'visible' => !Yii::app()->user->isGuest
                    )
                ),
            )
        ); ?>
    </div>

    <!-- breadcrumbs -->
    <?php if (isset($this->breadcrumbs)) {
        $this->widget(
            'zii.widgets.CBreadcrumbs',
            array('links' => $this->breadcrumbs)
        );
    } ?>

    <!-- content -->
    <?php echo $content; ?>
    <div class="clear"></div>

    <!-- footer -->
    <div id="footer"></div>

</div>
</body>
</html>
