<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ncr $ncr
 */
?>
<nav class="col-lg-2 col-md-3 col-sm-12 d-md-block sidebar" id="leftNav">
<!-- START -- SIDE NAV CONTENT GOES HERE -->
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ncr'), ['action' => 'edit', $ncr->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ncr'), ['action' => 'delete', $ncr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncr->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ncrs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ncr'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?> </li>
    </ul>
<!-- END -- SIDE NAV CONTENT GOES HERE -->
</nav>
<div class="col-lg-10 col-md-9">
<div class="row">
  <div class="col-md-12" id="pageAlert">
    <!-- START -- CUSTOM PAGE ALERT CONTENT GOES HERE -->
<!--             <div class="alert alert-dismissable alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        ×
      </button>
      <h4>
        Alert!
      </h4> <strong>Warning!</strong> Best check yo self, you're not looking too good. <a href="#" class="alert-link">alert link</a>
    </div> -->
    <!-- END -- CUSTOM PAGE ALERT CONTENT GOES HERE -->
  </div>
</div>
<div class="row">
  <div class="col-md-12" id="mainContent">
    <!-- START -- MAIN PAGE CONTENT GOES HERE -->

<div class="ncrs view content">
    <h3><?= h($ncr->ncr_number) ?></h3>
    <table class="table table-hover"">
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $ncr->has('job') ? $this->Html->link($ncr->job->job_number, ['controller' => 'Jobs', 'action' => 'view', $ncr->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ncr Issued For') ?></th>
            <td><?= h($ncr->ncr_issued_for) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Part Po') ?></th>
            <td><?= h($ncr->part_po) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendor') ?></th>
            <td><?= h($ncr->vendor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reported By') ?></th>
            <td><?= h($ncr->reported_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispositioned By') ?></th>
            <td><?= h($ncr->dispositioned_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reworked By') ?></th>
            <td><?= h($ncr->reworked_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reinspected By') ?></th>
            <td><?= h($ncr->reinspected_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disposition Selection') ?></th>
            <td><?= h($ncr->disposition_selection) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ncr->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ncr Number') ?></th>
            <td><?= $this->Number->format($ncr->ncr_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New Ncr Number') ?></th>
            <td><?= $this->Number->format($ncr->new_ncr_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reported Date') ?></th>
            <td><?= h($ncr->reported_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispositioned Date') ?></th>
            <td><?= h($ncr->dispositioned_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reworked Date') ?></th>
            <td><?= h($ncr->reworked_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reinspected Date') ?></th>
            <td><?= h($ncr->reinspected_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag Attached') ?></th>
            <td><?= $ncr->tag_attached ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supervisor Made Aware') ?></th>
            <td><?= $ncr->supervisor_made_aware ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag Removed') ?></th>
            <td><?= $ncr->tag_removed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reinspection Result') ?></th>
            <td><?= $ncr->reinspection_result ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Discrepancy') ?></h4>
        <?= $this->Text->autoParagraph(h($ncr->discrepancy)); ?>
    </div>
    <div class="row">
        <h4><?= __('Disposition Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($ncr->disposition_notes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reinspection Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($ncr->reinspection_notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pictures') ?></h4>
        <?php if (!empty($ncr->pictures)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-hover"">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Picture') ?></th>
                <th scope="col"><?= __('Picture Dir') ?></th>
                <th scope="col"><?= __('Picture Size') ?></th>
                <th scope="col"><?= __('Picture Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ncr->pictures as $pictures): ?>
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

    <!-- END -- MAIN PAGE CONTENT GOES HERE -->
  </div>
</div>
<div class="row justify-content-center" id="paginatorContent">
  <!-- START -- PAGINATOR CONTENT GOES HERE -->
  <!-- END -- PAGINATOR CONTENT GOES HERE -->
</div>
</div>







