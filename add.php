<?php 
session_start();
$db = mysqli_connect("localhost","root","","admin_db");
    
$uchastniki = $_POST['uchastniki'];
$uchastniki = htmlspecialchars($uchastniki);
 
$date = $_POST['date'];
$date = htmlspecialchars($date);

$location = $_POST['location'];
$location = htmlspecialchars($location);

$zona = $_POST['zona'];
$zona = htmlspecialchars($zona);

$dop = $_POST['dop'];
$dop = htmlspecialchars($dop);

$result = mysqli_query($db, "INSERT INTO zayavki (dop) VALUES ('$dop')"); 

exit ("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='Refresh' content='0; URL=/'></head></html>");

?>