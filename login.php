<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	 <style>
 h1{
    color:#8080FF;
    background-color:#FF6A6A;
    margin-top:-7;
    text-shadow:1px 2px 3px #800080;
    padding:25px;
    font-size:60px;
    margin-left:-8;
    margin-right:-1;
    }
    input[type=submit],input[type=text]{
    background-color:#FF6A6A;
    border:2px solid #800080;
    border-radius:9px;
    color:#fff;
    }
    input[type=submit],input[type=password]{
    background-color:#FF6A6A;
    border:2px solid #800080;
    border-radius:9px;
    color:#fff;
    }
    fieldset{
    margin-top:-40;
    background-color:#FFFFC0;
     margin-left:-8;
    margin-right:-1;
    }body{
    background-color:#8080FF;
    }#p1{
    color:green;
    }#p2{
    color:red;
    }th{
    color:#800080;
    }td{
    color:#000080;
    }#p3{
    color:#FF00FF;
    }#p4{
    color:#800000;
    }  h3{
    font-size:30px;
    color:#FFFFFF;
    margin-top:90;
    }
 </style>
</head>
<body>
	<center>
<h1>Sistema Controle de Produtos</h1>
<fieldset>
<form method="post" action="">
	Login:
	<input type="text" name="login" required><br><br>
	Senha:
	<input type="password" name="senha" required minlength="8" maxlength="8" ><br><br>
 	<input type="submit" value="Entrar">
 	</center>
</form>
</fieldset>
<h3 align="center">&copy Amem!</h3>
<?php
include_once "conexao.php";
if ((isset($_POST['login']))==0 and (isset($_POST['senha']))==0) {

}else{
    $senha = $_POST['senha'];
    $login = $_POST['login'];
$sql="select * from funcionario where nome='$login' and senha='$senha'";
$result=mysql_query($sql,$con);
$res=mysql_num_rows($result);
if($res){
	$linha=mysql_fetch_array($result);
	session_start();
	$_SESSION['id']=$linha['id_funcionario'];
	$_SESSION['nome']=$linha['nome'];
	echo "<script> window.location=' index.php'</script>";		
}else{
    echo "<script>alert('Login ou Senha invalidos')</script>";
}
}
?>
</body>
</html>