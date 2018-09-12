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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ncr->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ncr->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ncrs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
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

<div class="row">
    <div class="col-md-12">
        <div class="ncrs form content">
            <?= $this->Form->create($ncr) ?>
            <fieldset>
                <legend><?= __('Edit Ncr') ?></legend>
                <div class="form-row">
                    <div class="col-3">
                        <?= $this->Form->control('job_id', ['options' => $jobs]); ?>
                    </div>
                    <div class="col-3">
                        <?= $this->Form->control('part_po'); ?>
                    </div>
                    <div class="col-3">
                        <?= $this->Form->control('vendor'); ?>
                    </div>
                    <div class="col-3">
                        <?= $this->Form->control('ncr_number'); ?>
                    </div>
                </div>
                <?= $this->Form->control('ncr_issued_for'); ?>



        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

    </div>
</div>
<div class="row">
    <div class="col-md-12">
            <!-- <?//= $this->Form->control('pictures._ids', ['options' => $pictures]); ?> -->

<div class="row">
    <div class="col-auto">
<label class="control-label" for="pictureSelectContainer">Pictures</label>
</div>




<div class="col-auto">
<div id="addRemovePicturesBtn" class="btn-group btn-group-sm" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPicturesModal">Add Pictures</button>
  <button type="button" class="btn btn-danger">Remove Pictures</button>
</div>
</div>
</div>








<!-- Modal -->
<div class="modal fade" id="addPicturesModal" tabindex="-1" role="dialog" aria-labelledby="addPicturesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPicturesModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">




<div class="pictureSelectContainer clearfix" id="pictureSelectContainer">
<?php
$i = 0;
if (!empty($ncr->pictures)) {
    foreach ($ncr->pictures as $item) {
        $pictureSelected[$i] = intval($item->id);
        $i = $i + 1;
    }
} else {
    $pictureSelected[0] = 0;
}
foreach ($jobNumber as $key => $number) {
    $jobPictureFolder = $number;
}
foreach ($pictures as $picture) {
    $pictureID = intval($picture['id']);
if($pictureSelected[0] != 0){
    if (in_array($pictureID, $pictureSelected)) {
        $checkedState = ' checked ';
    } else {
        $checkedState = ' ';
    }
} else {
    $checkedState = ' ';
}
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






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>











<div class="pictureSelectContainer clearfix" id="pictureSelectContainer">
<?php
$i = 0;
if (!empty($ncr->pictures)) {
    foreach ($ncr->pictures as $item) {
        $pictureSelected[$i] = intval($item->id);
        $i = $i + 1;
    }
} else {
    $pictureSelected[0] = 0;
}
foreach ($jobNumber as $key => $number) {
    $jobPictureFolder = $number;
}
foreach ($pictures as $picture) {
    $pictureID = intval($picture['id']);
if($pictureSelected[0] != 0){
    if (in_array($pictureID, $pictureSelected)) {
        $checkedState = ' checked ';
    } else {
        $checkedState = ' ';
    }
} else {
    $checkedState = ' ';
}
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


            <?= $this->Form->control('discrepancy'); ?>
            <?= $this->Form->control('tag_attached'); ?>
            <?= $this->Form->control('supervisor_made_aware'); ?>
            <?= $this->Form->control('reported_by'); ?>
            <?= $this->Form->control('reported_date', ['empty' => true]); ?>
            <?= $this->Form->control('disposition_notes'); ?>
            <?= $this->Form->control('dispositioned_by'); ?>
            <?= $this->Form->control('dispositioned_date', ['empty' => true]); ?>
            <?= $this->Form->control('reworked_by'); ?>
            <?= $this->Form->control('reworked_date', ['empty' => true]); ?>
            <?= $this->Form->control('new_ncr_number'); ?>
            <?= $this->Form->control('reinspection_notes'); ?>
            <?= $this->Form->control('tag_removed'); ?>
            <?= $this->Form->control('reinspected_by'); ?>
            <?= $this->Form->control('reinspected_date', ['empty' => true]); ?>
            <?= $this->Form->control('reinspection_result'); ?>
            <?= $this->Form->control('disposition_selection'); ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
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




