<link rel="stylesheet" href="style.css">
<?php
session_start();
$db = mysqli_connect("localhost","root","","admin_db"); 
if (isset($_COOKIE['login']) and isset($_COOKIE['pass']))
{ 
    $_SESSION['pass']=$_COOKIE['pass'];
    $_SESSION['login']=$_COOKIE['login'];
    $_SESSION['id']=$_COOKIE['id']; 
}
$login = $_SESSION['login'];

$user_sql = mysqli_query($db,"SELECT * FROM users WHERE login='$login'");
$info_user = mysqli_fetch_array($user_sql);
if($info_user['isadmin'] == '1') {
  $user_admin = $info_user['isadmin'];
}
else {
  if($info_user['isadmin']) {
    $user_admin = $info_user['isadmin'];
  }
  else {
    $user_admin = '0';
  }

}
$user_id = $info_user['id'];



?>


<?php if(!empty($user_id)){
  echo '<a href="/exit.php">Выход</a>'; 
  echo $_SESSION['id'];
  echo $_SESSION['login']; 

}
?>
<form action="login.php" method="post" class="form_login">
    <h3>Авторизация</h3>
  <input name="login" type="text"  placeholder="Логин" required="required" >
  <input name="pass" type="password" required="required" placeholder="Пароль" >
  <button type="submit">Войти</button>
</form>
<form action="reg.php" method="post" class="form_login">
    <h3>Регистрация</h3>
  <input name="login" type="text" placeholder="Логин" required="required" >
  <input name="pass" placeholder="Пароль" type="password" required="required" >
  <button type="submit">Регистрация</button>
</form>

<form action="add.php" method="post" class="form_login">
     <h3>Создать заявку</h3>
  <input placeholder="Основная информация" name="text" type="text"  required="required" >
  <input placeholder="Дополнительно" name="info" type="text" required="required" >
  <button type="submit">Создать</button>
</form>

