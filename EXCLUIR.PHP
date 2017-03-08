<?php 
$id = $_POST['id'];

mysql_connect('localhost', 'root', '12345678'); 
mysql_select_db('financas'); 

$verifica = mysql_query("DELETE FROM fluxo WHERE id = '$id'") or die("erro ao selecionar"); 

header('Location:index.php');
?>