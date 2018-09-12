<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PicturesTag[]|\Cake\Collection\CollectionInterface $picturesTags
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pictures Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="picturesTags index large-9 medium-8 columns content">
    <h3><?= __('Pictures Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('picture_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($picturesTags as $picturesTag): ?>
            <tr>
                <td><?= $picturesTag->has('picture') ? $this->Html->link($picturesTag->picture->id, ['controller' => 'Pictures', 'action' => 'view', $picturesTag->picture->id]) : '' ?></td>
                <td><?= $picturesTag->has('tag') ? $this->Html->link($picturesTag->tag->title, ['controller' => 'Tags', 'action' => 'view', $picturesTag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $picturesTag->picture_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $picturesTag->picture_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $picturesTag->picture_id], ['confirm' => __('Are you sure you want to delete # {0}?', $picturesTag->picture_id)]) ?>
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
