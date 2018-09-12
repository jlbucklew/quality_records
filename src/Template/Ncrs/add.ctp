<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ncr $ncr
 */
?>
<?php

?>
      <nav class="col-md-2 d-none d-md-block sidebar" id="leftNav">
        <!-- SIDE NAV CONTENT GOES HERE -->
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Ncrs'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
        </ul>
      </nav>
      <div class="col-md-10">
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
          <div class="col-md-12" id="mainContent">
                        <!-- MAIN PAGE CONTENT GOES HERE -->
<div class="ncrs form large-9 medium-8 columns content">
    <?= $this->Form->create($ncr) ?>

    <fieldset>
        <legend><?= __('New NCR') ?></legend>
        <br>
            
            <div class="form-row">
            <div class="col-3">
                <?= $this->Form->control('job_id', ['options' => $jobs]); ?>
            </div>
            <div class="col-4">
                <?= $this->Form->control('part_po'); ?>
            </div>
            <div class="col-5">
                <?= $this->Form->control('vendor'); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <?= $this->Form->control('ncr_issued_for'); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <?= $this->Form->control('discrepancy'); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">





<div class="pictureSelectContainer clearfix" id="pictureSelectContainer">
<?php
foreach ($pictures as $picture) {
    $pictureID = intval($picture['id']);
    $pictureNameExt = $picture['picture_name'];
    $temp = explode('.', $pictureNameExt);
    $pictureName = reset($temp);
?>
    <div class="frm_checkbox" id="frm_checkbox_<?= $pictureID; ?>">
    <label class="imgCheckBoxLabel" for="<?= $pictureID; ?>" style="background: url('/job_pictures/<?= $jobPictureFolder; ?>/sm-<?= $pictureNameExt; ?>') 8px 8px no-repeat;">
    <input<?= $checkedState; ?>class="imgCheckBox" type="checkbox" name="pictures[_ids][]" id="<?= $pictureID; ?>" value="<?= $pictureID; ?>"/></label>
    </div>

<?php
}
?>
</div>






                <?= $this->Form->control('pictures._ids', ['options' => $pictures]); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-3">
                <!-- <?//= $this->Form->control('tag_attached'); ?> -->

<label>Tag Attached</label><br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="ta" id="ta1" value="ta1">
  <label class="form-check-label" for="ta1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="ta" id="ta2" value="ta2">
  <label class="form-check-label" for="ta2">No</label>
</div>


            </div>
            <div class="col-3">
                <!-- <?//= $this->Form->control('supervisor_made_aware'); ?> -->


<label>Supervisor Made Aware</label><br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sma" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sma" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">No</label>
</div>

            </div>
            <div class="col-6">
                <?= $this->Form->control('reported_by'); ?>
            </div>
        </div>
    </fieldset>
        <div class="form-row">
            <div class="col-12" style="padding-top: 25px;">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>

    
    <?= $this->Form->end() ?>
</div>


          </div>
        </div>
        <div class="row justify-content-center" id="paginatorContent">
          <!-- START -- PAGINATOR CONTENT GOES HERE -->
          <!-- END -- PAGINATOR CONTENT GOES HERE -->
        </div>
      </div>





