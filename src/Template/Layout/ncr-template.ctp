<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ncr $ncr
 */
?>
<nav class="col-lg-2 col-md-3 col-sm-12 d-md-block sidebar" id="leftNav">
<!-- START -- SIDE NAV CONTENT GOES HERE -->
  <li class="heading"><?= __('Actions') ?></li>
  <li><?= $this->Html->link(__('Edit Ncr'), ['action' => 'edit', $ncr->id]) ?> </li>
  <li><?= $this->Form->postLink(__('Delete Ncr'), ['action' => 'delete', $ncr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncr->id)]) ?> </li>
  <li><?= $this->Html->link(__('List Ncrs'), ['action' => 'index']) ?> </li>
  <li><?= $this->Html->link(__('New Ncr'), ['action' => 'add']) ?> </li>
  <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
  <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
  <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?> </li>
  <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?> </li>
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


    
    <!-- END -- MAIN PAGE CONTENT GOES HERE -->
  </div>
</div>
<div class="row justify-content-center" id="paginatorContent">
  <!-- START -- PAGINATOR CONTENT GOES HERE -->
  <!-- END -- PAGINATOR CONTENT GOES HERE -->
</div>
</div>