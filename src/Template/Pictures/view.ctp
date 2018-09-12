<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Picture $picture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Picture'), ['action' => 'edit', $picture->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Picture'), ['action' => 'delete', $picture->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picture->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pictures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ncrs'), ['controller' => 'Ncrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ncr'), ['controller' => 'Ncrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pictures view large-9 medium-8 columns content">
    <h3><?= h($picture->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $picture->has('job') ? $this->Html->link($picture->job->id, ['controller' => 'Jobs', 'action' => 'view', $picture->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture') ?></th>
            <td><?= h($picture->picture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture Name') ?></th>
            <td><?= h($picture->picture_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture Title') ?></th>
            <td><?= h($picture->picture_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture Dir') ?></th>
            <td><?= h($picture->picture_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture Type') ?></th>
            <td><?= h($picture->picture_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($picture->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture Size') ?></th>
            <td><?= $this->Number->format($picture->picture_size) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ncrs') ?></h4>
        <?php if (!empty($picture->ncrs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Ncr Number') ?></th>
                <th scope="col"><?= __('Ncr Issued For') ?></th>
                <th scope="col"><?= __('Part Po') ?></th>
                <th scope="col"><?= __('Vendor') ?></th>
                <th scope="col"><?= __('Discrepancy') ?></th>
                <th scope="col"><?= __('Tag Attached') ?></th>
                <th scope="col"><?= __('Supervisor Made Aware') ?></th>
                <th scope="col"><?= __('Reported By') ?></th>
                <th scope="col"><?= __('Reported Date') ?></th>
                <th scope="col"><?= __('Disposition Notes') ?></th>
                <th scope="col"><?= __('Dispositioned By') ?></th>
                <th scope="col"><?= __('Dispositioned Date') ?></th>
                <th scope="col"><?= __('Reworked By') ?></th>
                <th scope="col"><?= __('Reworked Date') ?></th>
                <th scope="col"><?= __('New Ncr Number') ?></th>
                <th scope="col"><?= __('Reinspection Notes') ?></th>
                <th scope="col"><?= __('Tag Removed') ?></th>
                <th scope="col"><?= __('Reinspected By') ?></th>
                <th scope="col"><?= __('Reinspected Date') ?></th>
                <th scope="col"><?= __('Reinspection Result') ?></th>
                <th scope="col"><?= __('Disposition Selection') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($picture->ncrs as $ncrs): ?>
            <tr>
                <td><?= h($ncrs->id) ?></td>
                <td><?= h($ncrs->job_id) ?></td>
                <td><?= h($ncrs->ncr_number) ?></td>
                <td><?= h($ncrs->ncr_issued_for) ?></td>
                <td><?= h($ncrs->part_po) ?></td>
                <td><?= h($ncrs->vendor) ?></td>
                <td><?= h($ncrs->discrepancy) ?></td>
                <td><?= h($ncrs->tag_attached) ?></td>
                <td><?= h($ncrs->supervisor_made_aware) ?></td>
                <td><?= h($ncrs->reported_by) ?></td>
                <td><?= h($ncrs->reported_date) ?></td>
                <td><?= h($ncrs->disposition_notes) ?></td>
                <td><?= h($ncrs->dispositioned_by) ?></td>
                <td><?= h($ncrs->dispositioned_date) ?></td>
                <td><?= h($ncrs->reworked_by) ?></td>
                <td><?= h($ncrs->reworked_date) ?></td>
                <td><?= h($ncrs->new_ncr_number) ?></td>
                <td><?= h($ncrs->reinspection_notes) ?></td>
                <td><?= h($ncrs->tag_removed) ?></td>
                <td><?= h($ncrs->reinspected_by) ?></td>
                <td><?= h($ncrs->reinspected_date) ?></td>
                <td><?= h($ncrs->reinspection_result) ?></td>
                <td><?= h($ncrs->disposition_selection) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ncrs', 'action' => 'view', $ncrs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ncrs', 'action' => 'edit', $ncrs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ncrs', 'action' => 'delete', $ncrs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncrs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($picture->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($picture->tags as $tags): ?>
            <tr>
                <td><?= h($tags->id) ?></td>
                <td><?= h($tags->title) ?></td>
                <td><?= h($tags->created) ?></td>
                <td><?= h($tags->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
