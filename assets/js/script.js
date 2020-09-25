$(document).ready(function () {

  $(function() {
    function readURL(input) {
      if (input.files) {
        var fileAmount = input.files.length;
        for (i = 0; i < fileAmount; i++){
          var reader = new FileReader();
          
          reader.onload = function (e) {
            // $($.parseHTML('<div>')).attr('class', 'image-item').appendTo('.images-box');
            // $($.parseHTML('<img>')).attr('src', e.target.result).appendTo('.images-box');

            $($.parseHTML('<img>')).attr('src', e.target.result).appendTo($.parseHTML('<div>')).attr('class', 'image-item').appendTo('.images-box');
            
          }
          reader.readAsDataURL(input.files[i]);    
         
        }
      }
    }

    $('#avatar').on('change',function () {
      readURL(this);
    });
    



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





  $('.image-item img').mouseover(function () {
    var href =  $(this).attr('src');
    $('.preview-box .preview-image img').attr('src',href); 
     
    $('.preview-box .images-box .preview-image img').css({
        'height' :  $(this).attr('height',$(this).height())
        
    });
    

    var abc = $('.preview-box .preview-image img').attr('src');
    console.log(abc);

    $('.preview-box .preview-image').css({
      'visibility': 'visible',
     
    });

    // setInterval(function(){ 
    //   $('.preview-box .preview-image').css('visibility','hidden');
    // }, 5000);
  });

  $('.preview-box .preview-image', this).mouseout(function () {
    $('.preview-box .preview-image').css('visibility','hidden');

  });



  $('.file-upload').file_upload();
  
  $('.mdb-select').materialSelect();
});
