jQuery(document).ready(function($){
    let mediaUploader;

    //on clicking media uploader button

    $('#profileBtn').on('click', function(){
       if(mediaUploader){              //if mediaUploader is not empty then open it
           mediaUploader.open();       //else create mediaUploader
           return;
       }

       //creating mediaUploader

       mediaUploader = wp.media.frames.file_frame = wp.media({
           title: 'Choose a Profile Picture',                         //media uploader page attributes
           button:{
               text: 'Choose Picture'
           },
           multiple: false                                          //false when choosing single media file
       });

       //After a media file is selected

       mediaUploader.on('select', function(){

           //gets the media file as an array object then converting them to json format:

           let attachment = mediaUploader.state().get('selection').first().toJSON();  

           // storing the url inside the input element value:

           $('#profile').val(attachment.url);                               
           
           //automatically displaying selected picture in the preview:

           $('#profile-picture-prev').css('background-image', 'url('+attachment.url+')');  
       })
      
       // have to open mediaUploader again to avoid double clicking the button
       mediaUploader.open();
    });

    // To Remove Profile Picture

    $('#picture-remove').on('click', function(){
          let con = confirm('Are You Sure?');
          if(con){
            $('#profile').val(''); 
            $('.sunset-general-form').submit();
          }
    })
})