jQuery(document).ready(function($){
    let mediaUploader;
    $('#profileBtn').on('click', function(){
       if(mediaUploader){
           mediaUploader.open();
           return;
       }

       mediaUploader = wp.media.frames.file_frame = wp.media({
           title: 'Choose a Profile Picture',
           button:{
               text: 'Choose Picture'
           },
           multiple: false
       });

       mediaUploader.on('select', function(){
           let attachment = mediaUploader.state().get('selection').first().toJSON();
           $('#profile').val(attachment.url);
       })

       mediaUploader.open();
    });
})