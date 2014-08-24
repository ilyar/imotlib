<?php
/* @var $this AuthorController */
/* @var $data Author */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
    <?php echo CHtml::encode($data->create_time); ?>
    <br/>

    <?php if ($data->update_time): ?>
        <b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
        <?php echo CHtml::encode($data->update_time); ?>
        <br/>
    <?php endif; ?>

    <?php if ($data->books): ?>
        <b><?php echo CHtml::encode($data->getAttributeLabel('books')); ?>:</b>
        <?php
        foreach ($data->books as $book) {
            echo CHtml::link(CHtml::encode($book->name), array('book/view', 'id' => $book->id)) . " ";
        }
        ?>
        <br/>
    <?php endif; ?>

</div>