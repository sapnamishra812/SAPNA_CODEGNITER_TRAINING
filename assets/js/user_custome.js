window.addEventListener('DOMContentLoaded', event =>{

    const userTableIdName = document.getElementById('userTableId');
    if(userTableIdName){
           new simpleDatatables.DataTable(userTableIdName);
    }

});

$(document).ready(function(){
  $(".changeUserStatus").click(function(){
    if(confirm("do you really want to change status?")){
		var userid = $(this).attr("data-userid");
		var site_url = $("#site_url").val();
		var path = site_url+"/User/updateStatus/";
		 var new_class = '';
		 var old_class = '';
		$.ajax({
			type:"POST",
			url:path,
			data:{user_id: userid},
			success: function(result){
				var obj = JSON.parse(result);
				if(obj.success=='0'){
                    alert('Unable to update ');
				}
				else if(obj.success=='1'){
					$(".statusBtn"+userid).removeClass(obj.oldClass);
					$(".statusBtn"+userid).addClass(obj.newClass);
					$(".statusBtn"+userid).text(obj.status);
				}
			}

		});
	}
  });
});
