<?php 
session_start();
$db = mysqli_connect("localhost","root","","admin_db");

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['pass'])) { $pass=$_POST['pass']; if ($pass =='') { unset($pass);} }

if (empty($login) or empty($pass))
{ 
exit ("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='Refresh' content='0; URL=/?error=Вы ввели не всю информацию, венитесь назад и заполните все поля!'></head></html>");
}
$login = stripslashes($login);
$login = htmlspecialchars($login);

$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);

$login = trim($login);
$pass = trim($pass);


$result = mysqli_query($db, "INSERT INTO users (login, pass) VALUES ('$login','$pass')"); 
var_dump($result);
if (!empty($result))
{
exit ("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='Refresh' content='0; URL=/'></head></html>");
}
 
?>