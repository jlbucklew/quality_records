      <nav class="col-lg-2 col-md-3 col-sm-12 d-md-block sidebar" id="leftNav">
        <!-- SIDE NAV CONTENT GOES HERE -->
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
$sourceImageWidth = 4032;
$sourceImageHeight = 6000;

$imageSizeLg = 1200;
$imageSizeMd = 600;
$imageSizeSm = 100;
$imageSizeXs = 60;

if($sourceImageWidth > $sourceImageHeight) {
    $orientation = 'horizontal';
    $imageSizes['orig']['height'] = $sourceImageHeight;
    $imageSizes['lg']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeLg);
    $imageSizes['md']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeMd);
    $imageSizes['sm']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeSm);
    $imageSizes['xs']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeXs);
    $imageSizes['orig']['width'] = $sourceImageWidth;
    $imageSizes['lg']['width'] = $imageSizeLg;
    $imageSizes['md']['width'] = $imageSizeMd;
    $imageSizes['sm']['width'] = $imageSizeSm;
    $imageSizes['xs']['width'] = $imageSizeXs;
} else {
    $orientation = 'vertical';
    $imageSizes['orig']['height'] = $sourceImageHeight;
    $imageSizes['lg']['height'] = $imageSizeLg;
    $imageSizes['md']['height'] = $imageSizeMd;
    $imageSizes['sm']['height'] = $imageSizeSm;
    $imageSizes['xs']['height'] = $imageSizeXs;
    $imageSizes['orig']['width'] = $sourceImageWidth;
    $imageSizes['lg']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeLg);
    $imageSizes['md']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeMd);
    $imageSizes['sm']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeSm);
    $imageSizes['xs']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeXs);
}

foreach($imageSizes as $key => $prefix) {
    echo $key;
    echo '<br>';
    echo 'Height: '.$prefix['height'];
    echo '<br>';
    echo 'Width: '.$prefix['width'];
    echo '<br><br>';
}


// foreach ($prefix as $size) {
//     echo $size;
//     foreach ($prefix as $label) {
//         echo $size.'-'.$label;
//     }
// }

// print_r($imageSizes);



// $imageSizes = [
//   ['orig',$imageHeight,$imageWidth],
//   ['lg',15,13],
//   ['md',5,2],
//   ['sm',17,15],
//   ['xs',17,15]
// ];



// foreach ($imageSizes as $size) {
//     $fileNamePrefix = $size;
//     $new_height = $size[0];
//     $new_width = $size[1];
//     echo $fileNamePrefix;
//     echo '<br>';
//     echo $new_height;
//     echo '<br>';
//     echo $new_width;
// }
?>











          </div>
        </div>
        <div class="row justify-content-center" id="paginatorContent">
          <!-- START -- PAGINATOR CONTENT GOES HERE -->
            
          <!-- END -- PAGINATOR CONTENT GOES HERE -->
        </div>
      </div>