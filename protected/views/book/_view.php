<?php
/* @var $this BookController */
/* @var $data Book */
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

    <?php if ($data->authors): ?>
        <b><?php echo CHtml::encode($data->getAttributeLabel('Authors')); ?>:</b>
        <?php
        foreach ($data->authors as $author) {
            echo CHtml::link(CHtml::encode($author->name), array('author/view', 'id' => $author->id)) . " ";
        }
        ?>
        <br/>
    <?php endif; ?>

    <?php if ($data->customers): ?>
        <b><?php echo CHtml::encode($data->getAttributeLabel('Customers')); ?>:</b>
        <?php
        foreach ($data->customers as $customer) {
            echo CHtml::link(CHtml::encode($customer->name), array('customer/view', 'id' => $customer->id)) . " ";
        }
        ?>
        <br/>
    <?php endif; ?>

</div>