<?php 
$login = $_POST['login'];
$alterado = $_POST['alterado'];

mysql_connect('localhost', 'root', '12345678'); 
mysql_select_db('minicurso'); 

//------------------------------------  MODIFICAR  ----------------------------------------------------------    

if(isset($_POST['alterar'])){
$verifica = mysql_query("UPDATE usuarios SET login='$alterado' WHERE login='$login'") or die("erro ao selecionar"); 
setcookie('login');
setcookie("login",$alterado);
header('Location:index.php');
}

//------------------------------------   EXCLUIR    ----------------------------------------------------------    

if(isset($_POST['excluir'])) {
$verifica = mysql_query("DELETE FROM usuarios WHERE login = '$login'") or die("erro ao selecionar"); 
setcookie('login');
header('Location:index.html');
exit;}    
?>