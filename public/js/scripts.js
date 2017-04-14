
  if ($('.btn-deleteM').length) {
      $('.btn-deleteM').click(function() {

         if(confirm("Are you sure to delete this maker?")){
         var id = $(this).data('id');
         var form = $('#form-delete');
         var action = form.attr('action').replace('MAKER_ID', id);
         var row =  $(this).parents('tr');
         
         row.fadeOut(1000);
         
        
         $.post(action, form.serialize(), function(result) {
            if (result.success) {
               setTimeout (function () {
                  row.delay(1000).remove();
                  alert(result.msg);
               }, 1000);                
            } else {
               row.show();
            }
         }, 'json');
      }//end confirm
      });
   }
