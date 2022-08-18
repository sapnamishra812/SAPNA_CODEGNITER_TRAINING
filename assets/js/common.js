$("#openStateModal").click(function(){
 $("#stateModal").modal('show');
});


$(".closeStateModal").click(function(){
	$("#stateModal").modal('hide');
})

//for save function 
$("#stateSave").click(function(){
	var state_name = $("#state_name").val();
	//another way to display value 
	//var $state_name = $("input[name='state_name']").val();
    //alert($state_name);

	//alert(state_name);
	var site_url = $("#site_url").val();
	 var path = site_url+"/States/addStatesAction/";
	if(state_name==''){
		//alert("Please enter state name");
		$("#state_error").text("Please enter state name"); 
		return false; //id which is show in input filed of tag
	}
	else{
		$.ajax({
           
			type: "POST",
			url:path,
			data:{statename: state_name},  //{controlename jo dena h : variable which defind in defind in js}
			success: function(result){
				 alert(result);
				// return false;
               if(result=='1'){
				   $("#state_error").text("This state already exit!");
			   }
			}
		});
	}
})
