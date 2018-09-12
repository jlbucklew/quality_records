var selectedPictureId;

$('#enlargePicture').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  selectedPictureId = button.data('whatever')
  document.getElementById(selectedPictureId).className = "carousel-item active";
  var modal = $(this)
})



$(document).ready(function(){
  // $("#pictureCarousel").on('slide.bs.carousel', function () {
  //   alert('A new slide is about to be shown!');
  // });

  // $('#pictureCarousel').on('slide.bs.carousel', function () {
  //   document.getElementById(selectedPictureId).className = "carousel-item";
  // })

  $('#enlargePicture').on('hidden.bs.modal', function (event) {
    document.getElementById(selectedPictureId).className = "carousel-item";

  var x = document.getElementsByClassName('carousel-item active');
  x[0].className='carousel-item'; 

  })

});













