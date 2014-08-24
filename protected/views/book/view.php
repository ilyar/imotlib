<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs = array(
    'Books' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Book', 'url' => array('index')),
    array('label' => 'Create Book', 'url' => array('create')),
    array('label' => 'Update Book', 'url' => array('update', 'id' => $model->id)),
    array(
        'label' => 'Delete Book',
        'url' => '#',
        'linkOptions' => array(
            'submit' => array('delete', 'id' => $model->id),
            'confirm' => 'Are you sure you want to delete this item?'
        )
    ),
    array('label' => 'Manage Book', 'url' => array('admin')),
);
?>

<h1>#<?php echo $model->id . " " . $model->name; ?></h1>

<?php $this->renderPartial('_view', array('data' => $model)); ?>

