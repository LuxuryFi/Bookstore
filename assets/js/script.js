$(document).ready(function () {

  function readURL(input) {
    if (input.files) {
      
      var fileAmount = input.files.length;
      for (var i = 0; i < fileAmount; i++){
        var reader = new FileReader();
        
        reader.onload = function (e) {
          $($.parseHTML('<div>')).attr('class', 'image-item').append('.images-box');
          $($.parseHTML('<img>')).attr('src', e.target.result).append('.image-item');
        }
        reader.readAsDataURL(input.files[i]); // convert to base64 string
      }

    }
  }


    //Chọn file thì sẽ show ảnh thumbnail lên
    $('#avatar').on('change',function () {
        readURL(this);
    });

  CKEDITOR.replace('description', {
    //đường dẫn đến file ckfinder.html của ckfinder
    filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
    //đường dẫn đến file connector.php của ckfinder
    filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });

  CKEDITOR.replace('content', {
    filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
    //đường dẫn đến file connector.php của ckfinder
    filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  })



  $('.file-upload').file_upload();
  
  $('.mdb-select').materialSelect();
});
