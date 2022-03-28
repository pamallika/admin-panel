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





$result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
if (empty($myrow['pass']))
{
exit ("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='Refresh' content='0; URL=/?error=Введённый вами логин или пароль неверный.'></head></html>");
}
else {
if ($myrow['pass']==$pass) {
$_SESSION['login']=$myrow['login'];
$_SESSION['id']=$myrow['id'];
$_SESSION['pass']=$myrow['pass'];
exit("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='Refresh' content='0; URL=/'></head></html>");
}

else {
exit ("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta http-equiv='Refresh' content='0; URL=/?error=Извините, введённый вами логин или пароль неверный.'></head></html>");
}
}
?>