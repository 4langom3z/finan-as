<style>
*
{
font-family: cursive; 
margin: 0px;
padding: 0px;
}
.abrir
{
border: 1px solid gainsboro;
height: 30;
background-image: url(img/baixo.png);
background-size: 30px;
background-position: center;
background-repeat: no-repeat;
}
.fechar
{
border: 1px solid gainsboro;
height: 30;
background-image: url(img/cima.png);
background-size: 30px;
background-position: center;
background-repeat: no-repeat;
}
</style>

<script type="text/javascript">
function mostra(){document.getElementById("drop").style.display="block"}
function esconde(){document.getElementById("drop").style.display="none"}
</script>

<?php 
$login_cookie = $_COOKIE['login']; 
if(isset($login_cookie))
{
echo"Bem-Vindo, $login_cookie.<br>"; 
echo"Essas informações PODEM ser acessadas por você <br>"; 
        
echo"<form method='post' action='modificar.php'>";   
echo"<input type='hidden' value='$login_cookie' name='login' required>";

    
echo"<input type='text' value='$login_cookie' name='alterado' required>";
echo"<input type='submit' value='Alterar' name='alterar'>";
echo"<input type='submit' value='Excluir' name='excluir'>";
echo"</form>";

echo"<center>";
echo "<form method='post' action='index.php'>";
echo "<input id='login' name='login' type='text'>";
echo "<input type='submit' value='Buscar'  id='buscar' name='buscar'>";
echo "</form>";
    
date_default_timezone_set('America/Belem');
$data = date("d/m/y");
    
echo"
<h1>O que comprei hoje?</h1>
<form method='POST' action='cadastro.php'>
<input type='text' value='$data' name='data'><input type='text' name='despesa' placeholder='Despesa'><input type='text' name='valor' placeholder='Valor'>
Fixa<input type='checkbox' name='fixa' value='sim'>
<input type='submit' value='Inserir' name='cadastrar'><br>
</form><br>
";    

echo"<a href='#' onclick='javascript:mostra()'><div class='abrir'></div></a>
Março<div id='drop' style='display:none'>";
    
$login = $_POST['login'];
mysql_connect('localhost', 'root', '12345678'); 
mysql_select_db('financas');     
$select=mysql_query("select * from fluxo WHERE fixa = ''");
$cont = mysql_num_rows($select);
echo"Despesas flutuantes <br>$cont registros encontrados<br>";
while($row=mysql_fetch_array($select)){
echo "<form method='POST' action='EXCLUIR.PHP'>
<input type='text' name='login' value='$row[data]' readonly><input type='text' name='id' value='$row[despesa]' readonly><input type='text' name='login' value='$row[valor]' readonly>
<input type='hidden' name='id' value='$row[id]' readonly>
<input type='submit' value='Excluir' name='excluir'>
</form>";
$ftotal += $row[valor];
}
echo "Total flutuantes: R$ $ftotal<br>";

    
$login = $_POST['login'];
mysql_connect('localhost', 'root', '12345678'); 
mysql_select_db('financas');     
$select=mysql_query("select * from fluxo where fixa = 'sim'");
$cont = mysql_num_rows($select);
echo"Despesas Fixas <br>$cont registros encontrados<br>";
while($row=mysql_fetch_array($select)){
echo "<form method='POST' action='excluir.php'>
<input type='text' name='login' value='$row[data]' readonly><input type='text' name='id' value='$row[despesa]' readonly><input type='text' name='login' value='$row[valor]' readonly>
<input type='hidden' name='id' value='$row[id]' readonly>
<input type='submit' value='Excluir' name='excluir'>
</form>";
$fixtotal += $row[valor];
}
echo "Total Fixas: R$ $fixtotal<br>";
    
$hoje = date("d");
$total = $fixtotal+$ftotal;
echo "<br>DESPESA MÉDIA DIÁRIA: R$ ";echo $total/$hoje;

echo "<br><br>PREVISÃO PARA ESTE MÊS: R$ ";echo $total/$hoje * 30;

echo"</center>";
 
    
echo"<a href='#' onclick='javascript:esconde()'><div class='fechar'></div></a></div>";
    
    
echo"<a href='?logout'>SAIR</a>"; 
if(isset($_GET['logout'])) {
setcookie('login');
header('Location:index.html');
exit;}    
}
else
{
echo"Bem-Vindo, convidado <br>"; 
echo"Essas informações NÃO PODEM ser acessadas por você"; 
echo"<br><a href='index.html'>Faça Login</a> Para ler o conteúdo"; 
} 
?>