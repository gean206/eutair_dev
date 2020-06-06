<?php
date_default_timezone_set('Asia/Kolkata');
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : null;
$message = isset($_POST['message']) ? $_POST['message'] : null;
$company = isset($_POST['company']) ? $_POST['company'] : null;
$currentDateTime = date('d-m-Y h:i:s A', time());

// Location to file
$db = $_SERVER["DOCUMENT_ROOT"] . "/contactform/contacts.accdb";
if (!file_exists($db))
{
    die('Error finding access database');
}
// Connection to ms access
$conn = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$db;");

try
{
    $sql = "INSERT INTO customers (NAME, EMAIL, MOBILE, MESSAGE, COMPANY, REQUEST_DATE) VALUES (:name, :email, :mobile,:msg, :company, :date);";
    $query = $conn->prepare($sql);
    $inst = $query->execute(array(
        ":name" => $name,
        ":email" => $email,
        ":mobile" => $mobile,
        ":msg" => $message,
        ":company" => $company,
        ":date" => $currentDateTime
    ));
    if($inst > 0){
	echo "success";
    }
}
catch(PDOExepction $e)
{
    echo $e->getMessage();
}

?>
