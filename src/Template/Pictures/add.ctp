<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Picture $picture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ncrs'), ['controller' => 'Ncrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ncr'), ['controller' => 'Ncrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pictures form large-9 medium-8 columns content">
    <?php //echo $this->Form->create($picture, ['type' => 'file']) ?>
    <?php //echo $this->Form->create('picture', ['type' => 'file', 'class' => 'dropzone']) ?>
    <?php echo $this->Form->create('picture', ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Picture') ?></legend>
        <?= $this->Form->control('job_id', ['options' => $jobs]); ?>
        <!-- <div class="fallback"> -->
            <?= $this->Form->input('picture[]', ['type' => 'file', 'class' => 'file', 'multiple', 'label' => __('Select Images')]); ?>
        <!-- </div> -->
        <?= $this->Form->control('ncrs._ids', ['options' => $ncrs]); ?>
        <?= $this->Form->control('tags._ids', ['options' => $tags]); ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>





</div>