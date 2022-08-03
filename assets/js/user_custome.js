window.addEventListener('DOMContentLoaded', event =>{

    const userTableIdName = document.getElementById('userTableId');
    if(userTableIdName){
           new simpleDatatables.DataTable(userTableIdName);
    }

});

$(document).ready(function(){
  $(".changeUserStatus").click(function(){
    if(confirm("do you really want to change status?")){
		//var status = $(this).attr("data-status");
		var userid = $(this).attr("data-userid");
		var site_url = $("#site_url").val();
		var path = site_url+"/User/updateStatus/";
		//var dataString = "user_id="+userid+"&user_status="+status;
		//alert(status);
		 //alert(statusid);
		 //alert(site_url);
		 var new_class = '';
		 var old_class = '';
		$.ajax({
			type:"POST",
			url:path,
			data:{user_id: userid},
			//contentType: "",
			dataType: "json",
			success: function(result){
                 alert(result);
				// console.log(result);
				if(result==0){
                    
				}
				else if(result==0){
					//alert("Something was wrong");
					var obj = json.parse(result);
					alert(obj.newClass)
					$(".statusBtn"+userid).removeClass(obj.oldClass);
					$(".statusBtn"+userid).addClass(obj.newClass);
				}
			}

		});
	}
  });
});
