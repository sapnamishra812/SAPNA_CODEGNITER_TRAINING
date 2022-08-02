window.addEventListener('DOMContentLoaded', event =>{

    const userTableIdName = document.getElementById('userTableId');
    if(userTableIdName){
           new simpleDatatables.DataTable(userTableIdName);
    }

});

