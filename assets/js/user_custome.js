window.addEventListener('DOMContentLoaded', event =>{

    const userTableIdName = document.getElementById('userTableId');
    if(userTableIdName){
           new simpleDatatables.DataTable(userTableIdName);
    }

});

 $("#changeStatus").click(function(){
    alert('dxccc');
});


$(document).ready(function () {
    $("#test").CreateMultiCheckBox({ width: '230px',
               defaultText : 'Select Below', height:'250px' });
  });