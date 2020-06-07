$(document).ready(function() {
	var my_columns = [];
//    $("#display").click(function() {                

      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "customercontact/customerData.php",             
        success: function(response){ 
        	$('#example').dataTable( {
                "aaData": response,
                "columns": [
                    { "data": "cust_id","width": "2%" },
                    { "data": "name","width": "10%" },
                    { "data": "email","width": "10%" },
                    { "data": "mobile","width": "10%" },
                    { "data": "message","width": "38%" },
                    { "data": "company","width": "20%" },
                    { "data": "datetime","width": "10%" }
                ],
                "autoWidth": false,
                "responsive": true,
            });
        }
    });
});
//});