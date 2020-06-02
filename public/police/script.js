$(window).ready(function() {
      $('.textarea').summernote();

      fetch()
      count();
      // $(document).on("click", ".email-app-list .email-user-list li", function(e) {
      //     $(".app-content .email-app-details").toggleClass("show");
      // })
   });
   
   
   
   function fetch() {
       $.ajax({
           url: 'content.php',
           method: 'post',
           data: {
             fetch_content: 1,
             page_title: $('#page_title').val(),
             
           },
           // dataType: 'json',
           success: function(r) {
            $('#display').html(r)
            
           }
      });
   }
   function count() {
       $.ajax({
           url: 'content.php',
           method: 'post',
           data: {
             count: 1,
             // page_title: $('#page_title').val(),
             
           },
           dataType: 'json',
           success: function(r) {
            $('#countRequest').html(r.request)
            $('#countReplied').html(r.replies)
            
           }
      });
   }
   
   $(document).on('click', '#btn-reply', function(e) {
      if($('#advice').val() == ''){
         toastFail('Advice field is required!')
      }else{
         $.ajax({
              url: 'content.php',
              method: 'post',
              data: {
                advice: 1,
                id: $('#inputReply').val(),
                input: $('#advice').val(),
              },
              dataType: 'json',
              success: function(r) {
               console.log(r)
               if(r.msg == 'success'){
                  $('#reply').modal('hide');
                  toastSuccess("Advice Sent Successfully");
                  e.stopPropagation(),
                    $(".app-content .email-app-details").removeClass("show");
                  fetch();
                  count();
               }else{
                  $('#reply').modal('hide');
                  toastFail("Advice already given");
                  
               }
              
               
              }
         });
      }
      
   });

   $(document).on('click', '.media', function(e) {
      var id = $(this).data('id');
      // console.log(id)
      $.ajax({
           url: 'content.php',
           method: 'post',
           data: {
    // $this->advice = $args['advice'] ?? '';
             view: id,
             page_title: $('#page_title').val(),
             // sub_id: id,
             // sub_status: status,
           },
           dataType: 'json',
           success: function(r) {
            // console.log(r)
            $("#inputReply").val(r.case_id);
            $("#client_name").text(r.client_id);
            $("#case_name").text(r.case_name);
            $("#time").text(r.time);
            $("#case_description").text(r.case_description);
            $("#date").text(r.date);
            
           }
       });
   });