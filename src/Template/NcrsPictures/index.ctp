<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NcrsPicture[]|\Cake\Collection\CollectionInterface $ncrsPictures
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ncrs Picture'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ncrs'), ['controller' => 'Ncrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ncr'), ['controller' => 'Ncrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ncrsPictures index large-9 medium-8 columns content">
    <h3><?= __('Ncrs Pictures') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ncr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('picture_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ncrsPictures as $ncrsPicture): ?>
            <tr>
                <td><?= $ncrsPicture->has('ncr') ? $this->Html->link($ncrsPicture->ncr->id, ['controller' => 'Ncrs', 'action' => 'view', $ncrsPicture->ncr->id]) : '' ?></td>
                <td><?= $ncrsPicture->has('picture') ? $this->Html->link($ncrsPicture->picture->id, ['controller' => 'Pictures', 'action' => 'view', $ncrsPicture->picture->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ncrsPicture->ncr_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ncrsPicture->ncr_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ncrsPicture->ncr_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncrsPicture->ncr_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
