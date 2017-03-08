<?
unset($_SESSION['login']);
setcookie('login');
?>

<?php 
$login = $_POST['login']; 
$senha = $_POST['senha']; 
mysql_connect('localhost', 'root', '12345678'); 
mysql_select_db('minicurso'); 

$verifica = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar"); 
if (mysql_num_rows($verifica)<=0)
{echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');
window.location.href='INDEX.HTML';</script>"; die(); }
else
{
setcookie("login",$login);
header("Location:index.php"); 
} 
?> 
