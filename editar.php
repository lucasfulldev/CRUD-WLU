<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">




    <script type="text/javascript" src="jquery-3.2.1.js"></script>
 <script src="jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
 $("#valor").maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })
</script>
</head>
	<?php
    include_once 'conexao.php';
    $sql='select * from produto where codigo='.$_GET['editar'];
    $result=mysql_query($sql,$con);
    $linha=mysql_fetch_array($result);
    ?>
<style>
table{
  width: 100%;
}
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}body{
  background-image: url(bg.jpg);
  background-size: 100%;
  background-repeat: no-repeat;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 25%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}
.modal {
    display: none;
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
    padding-top: 60px;
}
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 0% auto; 
    border: 1px solid #888;
    width: 100%;
    margin-top:0; 
}
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;

    }
}
</style>
<body>
<center>
<div id="id01" class="modal" >
	</center>

  <form class="modal-content animate" <?php echo "<form action= 'evento.php?editar=".$linha['codigo']."'method='post'>";?>

    <?php
 session_start();
 if(isset($_SESSION['id'])==0 and isset($_SESSION['nome'])==0){
  echo "<script> window.location='login.php'</script>";
}else{
  $nome=$_SESSION['nome'];
  echo "<h3>usuario: $nome <a href='login.php'>sair</a></h3>";
}
?>
    <div class="imgcontainer">
      <span onclick="window.location='index.php'" class="close" title="fechar">&times;</span>
     <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
    <div class="container"><br>
      Produto:<br>
         <input type="text"  name="produto" value="<?php echo $linha['nome'];?>" required><p></p>
        Preço:<br>
         <input type="text" id="valor" name="preco" value="<?php echo $linha['preco'];?>" required><p></p>
         <br>
      <button type="submit">Editar</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
    	<center>
      <button type="button" onclick="window.location='index.php'" class='cancelbtn'>Cancel</button>
  		</center>
    </div>
  </form>
</div>
</body>
</html>

