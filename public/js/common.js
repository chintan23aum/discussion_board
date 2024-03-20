$(document).ready(function(){
   //load thread

});

function LoadThreads(categoryId=0,userId=0){

   $.ajax({
      url: '/thread',
      type: 'POST',
      data: {'category': categoryId, 'user': userId},
      success: function (response) {
         // Handle the response
         console.log(response.html);
         $("#body_content").html(response.html);
      },
      error: function (xhr, status, error) {
         console.error(xhr.responseText);
      }
   });
}