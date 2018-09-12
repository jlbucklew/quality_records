      <nav class="col-lg-2 col-md-3 col-sm-12 d-md-block sidebar" id="leftNav">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Active Link <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Link
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Link
              </a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Muted Text</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Link
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="col-lg-10 col-md-9">
        <div class="row">
          <div class="col-md-12" id="pageAlert">
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
						<!-- START -- MAIN PAGE CONTENT GOES HERE -->
						<form action="">
						  <div class="form-group" id="tooo">
						    <label for="pictureFilter">Filter Pictures By:</label>
						    <select class="form-control" id="pictureFilter" name="filter" onchange="updateFilter(this.value)">
						      <option value=""></option>
						      <option value="id&direction=asc">Picture ID</option>
						      <option value="job_id&direction=asc">Job ID</option>
						      <option value="picture_dir&direction=asc">Picture Directory</option>
						      <option value="picture_name&direction=asc">Picture Name</option>
						    </select>
						  </div>
						</form>

						<?= $this->Paginator->sort('id') ?>
						<?= $this->Paginator->sort('job_id') ?>
						<?= $this->Paginator->sort('picture_dir') ?>
						<?= $this->Paginator->sort('picture_name') ?>


						<?php

						$tag;


						if(isset($_GET['tag'])) {
							foreach($_GET['tag'] as $tag) {
								echo '<h1>' . $tag . '</h1>';

								$tag[0] = 13;

								echo '<h1>' . $tag[0] . '</h1>';

								if($tag . $tag[0] == 'tagExciter') {
									$exciterSelected = 'checked';
								} else {
									$exciterSelected = '';
								}
								if($tag == 'tagRotor') {
									$rotorSelected = 'checked';
								} else {
									$rotorSelected = '';
								}
								if($tag == 'tagIncoming') {
									$incomingSelected = 'checked';
								} else {
									$incomingSelected = '';
								}
							}
						} 
						?>


						<br><br>

						<form action="" method="_GET">
						<div class="form-check">
						  <?= '<input class="form-check-input" type="checkbox" value="tagExciter" id="tagExciter" name="tag[]" onChange="this.form.submit()"' . '' . '>'; ?>
						  <label class="form-check-label" for="tagExciter">
						    Exiter
						  </label>
						</div>
						<div class="form-check">
						  <?= '<input class="form-check-input" type="checkbox" value="tagIncoming" id="tagIncoming" name="tag[]" onChange="this.form.submit()"' . '' . '>'; ?>
						  <label class="form-check-label" for="tagIncoming">
						    Incoming
						  </label>
						</div>
						<div class="form-check">
						  <?= '<input class="form-check-input" type="checkbox" value="tagRotor" id="tagRotor" name="tag[]" onChange="this.form.submit()"' . '' . '>'; ?>
						  <label class="form-check-label" for="tagRotor">
						    Rotor
						  </label>
						</div>
						</form>

						<br><br>
						<?php


						foreach($pictures as $picture) {
							//debug($picture);
							//echo '<br>';
							//echo '<img src="'. '../../' . $picture->picture_dir . $picture->picture_name . '" style="width: 200px; height: auto; margin: 20px;">';
							//echo '<br>';
							foreach($picture->tags as $tag) {
								//echo '<br>';
								//echo $tag->title;

								if($tag->title == 'rotor') {
									echo $tag->title;
									echo '<img src="'. '../../' . $picture->picture_dir . $picture->picture_name . '" style="width: 200px; height: auto; margin: 20px;">';
									debug($picture);
									echo '<br>';
								}


							}
							//echo '<br>';
						}
						?>


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

