<nav class="col-lg-2 col-md-3 col-sm-12 d-md-block sidebar" id="leftNav">
<!-- START -- SIDE NAV CONTENT GOES HERE -->
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