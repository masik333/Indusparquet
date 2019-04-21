 
$('.upload-wrap input[type=file]').change(function(){
    var id = $(this).attr("id");
    var newimage = new FileReader();
    newimage.readAsDataURL(this.files[0]);
    newimage.onload = function(e){
      $('.uploadpreview.' + id ).css('background-image', 'url(' + e.target.result + ')' );
      $('#image-0' + id ).val("1");
    }
  });

  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#image-preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#01").change(function() {
  readURL(this);
});