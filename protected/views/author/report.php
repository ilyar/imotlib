<?php

$this->breadcrumbs = array(
    'Author' => array('index'),
    'Report',
);

?>

<h1><?php echo $title; ?></h1>

<?php $this->widget('zii.widgets.CListView', array('dataProvider' => $dataProvider, 'itemView' => '_view')); ?>
