$(document).ready(function(){
  $(".updateStatusUser").click(function(){
      var status = $(this).text();
      var user_id = $(this).attr("user_id");
      $.ajax({
          type: "POST",
          url: "/admin/user/update-status-user",
          data: {status: status, user_id: user_id},
          success: function(resp){
              // console.log(resp);
              if(resp['status'] == 'Active'){
                  $('#user-'+user_id).html('<a class="updateStatusUser" href="javascript:void(0)">Active</a>');
              }else if(resp['status'] == 'Inactive'){
                  $('#user-'+user_id).html('<a class="updateStatusUser" href="javascript:void(0)">Inactive</a>')
              }
          },
          error: function(){
              alert("Error updateStatusUser");
          } 
      });
  });

  //--Delete Record using js-sweet-alert:
  $(".confirmDelete").click(function(){
      var record = $(this).attr("record");
      var record_id = $(this).attr("record_id");
      Swal.fire({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this data!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: 'Yes, Delete it!'
      }).then((result) => {
          console.log(result);
          if(result.value){
              window.location.href = "/admin/"+record+"/hapus/"+record_id;
          }
      });
  });
});