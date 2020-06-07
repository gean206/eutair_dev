<?php
date_default_timezone_set('Asia/Kolkata');
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : null;
$message = isset($_POST['message']) ? $_POST['message'] : null;
$company = isset($_POST['company']) ? $_POST['company'] : null;
$currentDateTime = date('Y-m-d h:i:s');

$host         = "148.72.232.104";
$username     = "tyk2qaq19wnc";
$password     = "Eutair@2020";
$dbname       = "eutair_schema";
/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);
/* Check connection  */
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}

try
{
    $sql = "INSERT INTO contacts (name, email, mobile, message, company, datetime) VALUES ('$name', '$email', '$mobile', '$message', '$company', '$currentDateTime');";
    if(mysqli_query($conn, $sql)){
	echo "success";
    }else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
}
catch(PDOExepction $e)
{
    echo $e->getMessage();
}

?>
