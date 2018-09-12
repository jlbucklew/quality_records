<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ncr[]|\Cake\Collection\CollectionInterface $ncrs
 */
?>


            <!-- SIDE NAV CONTENT GOES HERE -->



      <nav class="col-lg-2 col-md-3 col-sm-12 d-md-block sidebar" id="leftNav">
        <div class="sidebar-sticky">
          
          <ul class="nav flex-column">
                <li><?= $this->Html->link(__('New Ncr'), ['action' => 'add'], ['role' => 'button', 'class' => 'btn btn-primary btn-sm active', 'aria-pressed' => 'true', 'style' => 'width: 100%;']) ?></li>
                <br>
                <h6>Actions</h6>
                <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
          </ul>
        </div>
      </nav>


      <div class="col-lg-10 col-md-9">
        <div class="row">
          <div class="col-md-12" id="pageAlert">
            <!-- CUSTOM PAGE ALERT CONTENT GOES HERE -->
<!--             <div class="alert alert-dismissable alert-warning">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×
              </button>
              <h4>
                Alert!
              </h4> <strong>Warning!</strong> Best check yo self, you're not looking too good. <a href="#" class="alert-link">alert link</a>
            </div> -->
          </div>
        </div>
        <div class="row">
          <div class="col-12 ncrs index columns content" id="mainContent">
                        <!-- MAIN PAGE CONTENT GOES HERE -->
            <h3><?= __('Ncrs') ?></h3>
            <br>


            <table class="table table-hover">
              <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('job_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ncr_number') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ncr_issued_for') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('reported_date') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ncrs as $ncr): ?>
                <tr>
                    <td><?= $ncr->has('job') ? $this->Html->link($ncr->job->job_number, ['controller' => 'Jobs', 'action' => 'view', $ncr->job->id]) : '' ?></td>
                    <td><?= $this->Number->format($ncr->ncr_number) ?></td>
                    <td><?= h($ncr->ncr_issued_for) ?></td>
                    <td><?= h($ncr->reported_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ncr->id], ['role' => 'button', 'class' => 'btn btn-primary btn-sm active', 'aria-pressed' => 'true']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ncr->id], ['role' => 'button', 'class' => 'btn btn-warning btn-sm active', 'aria-pressed' => 'true']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ncr->id], ['role' => 'button', 'class' => 'btn btn-danger btn-sm active', 'aria-pressed' => 'true'], ['confirm' => __('Are you sure you want to delete # {0}?', $ncr->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>


          </div>
        </div>
        <div class="row justify-content-center" id="paginatorContent">
          <!-- START -- PAGINATOR CONTENT GOES HERE -->
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
          <!-- END -- PAGINATOR CONTENT GOES HERE -->
        </div>
      </div>




