$(document).ready(function() {
	var my_columns = [];
	var data =[];
//    $("#display").click(function() {                

      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "contactform/CustomerData.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){ 
        	data = JSON.parse(response);
        	$('#example').dataTable( {
                "aaData": data,
                "columns": [
                    { "data": "ID" },
                    { "data": "NAME" },
                    { "data": "EMAIL" },
                    { "data": "MOBILE" },
                    { "data": "MESSAGE" },
                    { "data": "COMPANY" },
                    { "data": "REQUEST_DATE" }
                ]
            })
        
        	
        	
//        	my_columns.push(data);
//        	console.log(data);
////            $("#responsecontainer").html(data); 
//        	$('#example').DataTable(data);
        }

    });
});
//});