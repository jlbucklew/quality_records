<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NcrsPicture $ncrsPicture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ncrsPicture->ncr_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ncrsPicture->ncr_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ncrs Pictures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ncrs'), ['controller' => 'Ncrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ncr'), ['controller' => 'Ncrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ncrsPictures form large-9 medium-8 columns content">
    <?= $this->Form->create($ncrsPicture) ?>
    <fieldset>
        <legend><?= __('Edit Ncrs Picture') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
