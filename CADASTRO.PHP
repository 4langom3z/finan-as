<?php 
$data = $_POST['data']; 
$despesa = $_POST['despesa']; 
$valor = $_POST['valor']; 
$fixa = $_POST['fixa']; 

mysql_connect('localhost', 'root', '12345678'); 
mysql_select_db('financas'); 

mysql_query("INSERT INTO fluxo (despesa,valor,data, fixa) VALUES ('$despesa','$valor','$data', '$fixa')"); 

header("Location:index.php"); 
?>
