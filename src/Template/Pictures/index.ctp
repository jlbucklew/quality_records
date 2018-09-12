<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Picture[]|\Cake\Collection\CollectionInterface $pictures
 */
?>
      <nav class="col-lg-2 col-md-3 col-sm-12 d-md-block sidebar" id="leftNav">
        <!-- SIDE NAV CONTENT GOES HERE -->
        <?= $this->Html->link(__('New Picture'), ['action' => 'add']) ?>
        <?php echo $this->Form->create('picture', ['type' => 'file']) ?>
        <fieldset>
            <br>
            <?= $this->Form->control('job_id', ['options' => $jobs]); ?>
            <br>
            <?= $this->Form->control('ncrs._ids', ['options' => $ncrs]); ?>
            <br>
            <?= $this->Form->control('tags._ids', ['options' => $tags]); ?>
        </fieldset>
        <?= $this->Form->end() ?>
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
          <div class="col-md-12" id="mainContent">
                <!-- MAIN PAGE CONTENT GOES HERE -->
                <?php
                    $columns = 4;
                    $columnClass = 12/$columns;
                    $pictureCount = 1;
                    $pictureArray;

                    foreach ($pictures as $picture) {
                        $pictureJobNumber = $picture->job->job_number;
                        $pictureArray[$pictureCount] = '<div id="' . $picture->id . '" class="carousel-item"><img class="d-block w-100" src="' . $picture->picture_dir . $pictureJobNumber . '/' . 'md-' . $picture->picture_name . '" alt=""><div class="carousel-caption d-none d-md-block"><h5>' . $picture->job->job_number . '</h5><p>' . $picture->picture_name . '</p></div></div>';
                        $pictureCount = $pictureCount + 1;
                    }
                ?>
                <div class="modal fade" id="enlargePicture" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="pictureCarousel" class="carousel carousel-fade" data-ride="carousel" data-interval="0">
                                    <div class="carousel-inner">
                                        <?php
                                            foreach ($pictureArray as $carouselItem) {
                                                echo $carouselItem;
                                            }
                                        ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#pictureCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#pictureCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3><?= __('Pictures') ?></h3>
                <div class="row">
                    <?php foreach ($pictures as $picture) { ?>
                        <?php $pictureJobNumber = $picture->job->job_number; ?>
                        
                    <div class="col-<?= $columnClass; ?>" style="margin-bottom: 20px;">
                        <div class="accordion" id="accordion_<?= $picture->id; ?>">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="<?= $picture->picture_dir . $pictureJobNumber . '/' . 'md-' . $picture->picture_name; ?>" alt="Card image" style="padding-bottom: 1px;">
                                <div class="card-img-overlay" style="padding: 0px 0px 24px 0px;">
                                    <div style="background-color: white; opacity: 0.75; padding: 0px 5px 0px 5px;">
                                        <span>
                                            <?= $picture->has('job') ? $this->Html->link($picture->job->job_number, ['controller' => 'Jobs', 'action' => 'view', $picture->job->id]) : '' ?>
                                        </span>
                                        <span class="float-right">
                                            <?php echo $this->Fa->link('cloud-download-alt', __(''), ['action'=>'download', $picture->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $picture->id]) ?>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $picture->id]) ?>
                                            <?php echo $this->Fa->link('trash-alt', __(''), ['action'=>'delete', $picture->id], ['confirm' => __('Are you sure you want to delete this picture?')]) ?>
                                            <a href="#" data-toggle="collapse" data-target="#collapse_<?= $picture->id; ?>" aria-expanded="false" aria-controls="collapse_<?= $picture->id; ?>"><i class="fas fa-info-circle"></i></a>
                                        </span>
                                    </div>
                                    <a data-toggle="modal" href="#enlargePicture" role="button" data-whatever="<?= $picture->id; ?>">
                                        <div style="height: 100%;"></div>
                                    </a>
                                </div>
                                <div id="collapse_<?= $picture->id; ?>" class="collapse" aria-labelledby="heading_<?= $picture->id; ?>" data-parent="#accordion_<?= $picture->id; ?>">
                                <p class="card-text"><?= $picture->picture_name; ?></p>
                                <?php
                                $exif = exif_read_data(WWW_ROOT . $picture->picture_dir . $pictureJobNumber . '/' . 'md-' . $picture->picture_name, 0, true);
                                // echo '<p>Date Taken: ' . date("m-d-Y", strtotime($exif["EXIF"]["DateTimeOriginal"])) . '</p>';
                                // echo '<p>Time Taken: ' . date("g:i:s a", strtotime($exif["EXIF"]["DateTimeOriginal"])) . '</p>';
                                if(!empty($exif["EXIF"]["DateTimeOriginal"])) {
                                    $createdDateTime = strtotime($exif["EXIF"]["DateTimeOriginal"]);
                                    echo '<br>';
                                    echo '<p>Date Taken: ' . date("m-d-Y", $createdDateTime) . '</p>';
                                    echo '<br>';
                                    echo '<p>Time Taken: ' . date("g:i:s a", $createdDateTime) . '</p>';
                                }
                                if(!empty($exif["COMPUTED"]["Width"])) {
                                    $computedWidth = $exif["COMPUTED"]["Width"];
                                    echo '<br>';
                                    echo 'Computed Width: ' . $computedWidth;
                                }
                                if(!empty($exif["COMPUTED"]["Height"])) {
                                    $computedHeight = $exif["COMPUTED"]["Height"];
                                    echo '<br>';
                                    echo 'Computed Height: ' . $computedHeight;
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $pictureCount = $pictureCount + 1; } ?>
                </div>
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


















