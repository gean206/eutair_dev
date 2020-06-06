<?php
$db = $_SERVER["DOCUMENT_ROOT"] . "/contactform/contacts.accdb";
if (!file_exists($db))
{
    die('Error finding access database');
}
// Connection to ms access
$conn = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$db;");
try{
$statement = $conn->prepare("SELECT * FROM customers");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
}catch(PDOExepction $e){
	echo $e->getMessage();
}
?>