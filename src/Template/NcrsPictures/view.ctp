<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NcrsPicture $ncrsPicture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ncrs Picture'), ['action' => 'edit', $ncrsPicture->ncr_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ncrs Picture'), ['action' => 'delete', $ncrsPicture->ncr_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncrsPicture->ncr_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ncrs Pictures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ncrs Picture'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ncrs'), ['controller' => 'Ncrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ncr'), ['controller' => 'Ncrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ncrsPictures view large-9 medium-8 columns content">
    <h3><?= h($ncrsPicture->ncr_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ncr') ?></th>
            <td><?= $ncrsPicture->has('ncr') ? $this->Html->link($ncrsPicture->ncr->id, ['controller' => 'Ncrs', 'action' => 'view', $ncrsPicture->ncr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture') ?></th>
            <td><?= $ncrsPicture->has('picture') ? $this->Html->link($ncrsPicture->picture->id, ['controller' => 'Pictures', 'action' => 'view', $ncrsPicture->picture->id]) : '' ?></td>
        </tr>
    </table>
</div>
