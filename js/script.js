$(function () {
     $("#chat").on("click", function() {
       alert('hello'); })
    $("#chat").on("click", function() {
       alert('hello');
         //$userid=userid=$(this).attr("data-userid");
        //$id=$(this).attr("data-id");
        // console.log(id);
        // console.log(userid);     
   $.ajax({
           url: "<?php echo site_url();?>/profile/chat",
            //dataType: "json",
            type: "POST",
            dataType: "json",
            //data: { userid:userid, id:id },
            success: function(data){
            alert('hello');
           },
   })
  })
})
    

