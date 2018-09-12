<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ncrs'), ['controller' => 'Ncrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ncr'), ['controller' => 'Ncrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobs view large-9 medium-8 columns content">
    <h3><?= h($job->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Job Number') ?></th>
            <td><?= h($job->job_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= h($job->customer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Station') ?></th>
            <td><?= h($job->station) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($job->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $job->state ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ncrs') ?></h4>
        <?php if (!empty($job->ncrs)): ?>
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
            <?php foreach ($job->ncrs as $ncrs): ?>
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
        <h4><?= __('Related Pictures') ?></h4>
        <?php if (!empty($job->pictures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Picture') ?></th>
                <th scope="col"><?= __('Picture Dir') ?></th>
                <th scope="col"><?= __('Picture Size') ?></th>
                <th scope="col"><?= __('Picture Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($job->pictures as $pictures): ?>
            <tr>
                <td><?= h($pictures->id) ?></td>
                <td><?= h($pictures->job_id) ?></td>
                <td><?= h($pictures->picture) ?></td>
                <td><?= h($pictures->picture_dir) ?></td>
                <td><?= h($pictures->picture_size) ?></td>
                <td><?= h($pictures->picture_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pictures', 'action' => 'view', $pictures->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pictures', 'action' => 'edit', $pictures->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pictures', 'action' => 'delete', $pictures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pictures->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
