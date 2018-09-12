<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PicturesTag $picturesTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $picturesTag->picture_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $picturesTag->picture_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pictures Tags'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="picturesTags form large-9 medium-8 columns content">
    <?= $this->Form->create($picturesTag) ?>
    <fieldset>
        <legend><?= __('Edit Pictures Tag') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
