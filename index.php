<!DOCTYPE html>
<?php
 session_start();
 if(isset($_SESSION['id'])==0 and isset($_SESSION['nome'])==0){
  echo "<script> window.location='login.php'</script>";
}else{
  $nome=$_SESSION['nome'];
  echo "<h3>Usuario: $nome <a href='logout.php'>sair</a></h3>";
}
?>
<html>
<style>
table{
  width: 100%;
}h2,h1,h3{
  color: white;
  text-shadow: 3px,2px black;
}
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
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
    margin: 5% auto 15% auto; 
    border: 1px solid #888;
    width: 80%; 
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
}.mytab td:nth-child(odd) {
    background-color:#99ff99;
  }  
  .mytab td:nth-child(even) {
    background-color:#6a3a3a;
}a{
  color: black;
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


}.zebraUm{
  background-color: #90d493;
}.zebraDois{
 background-color: #8c5754;

}body{
  background-image: url(bg.jpg);
  background-size: 100%;
  background-repeat: no-repeat;
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   $('table tbody tr:odd').addClass('zebraUm');
   $('table tbody tr:even').addClass('zebraDois');
});


</script>
<script type="text/javascript">
$(function(){
 $("#valor").maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })
</script>

<script type="text/javascript" src="jquery-3.2.1.js"></script>
 <script src="jquery.maskMoney.js" type="text/javascript"></script>

<body>
<center>
<h2 title="nao fique parado!">Controle de Estoque!</h2>

<button onclick="document.getElementById('id01').style.
display='block'" style="width:auto;">Cadastra-se</button>
<button onclick="document.getElementById('id02').style.
display='block'" style="width:auto;">Registros</button>
</center>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action ="evento.php?cadastro=true" method = "post" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="fechar">&times;</span>
     <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
      <label><b>produto:</b></label>
      <input type="text"    placeholder="pesadao" name="produto" required onfocus ="funcaoporra(this)">

      <label><b>preço:</b></label>
      <input type="text" id="valor" placeholder="R$ 19,90" name="preco" required onfocus ="funcaoporra(this)">
        
      <button type="submit">Cadastrar!</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    	<center>
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  		</center>
    </div>
  </form>
</div>
    <div id="id02" class="modal">

    <form class="modal-content animate" action ="evento.php?cadastro=true" method = "post" >
        <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Voltar">&times;</span>

    </div>

    <div class="container">
      
    <div class="container" style="background-color:#f1f1f1">
      <table border="2" id="horario">
 <thead>
  
<tr>
  <th>id</th>
  <th>Produto</th>
  <th>Preço</th>
  <th>Funcionário</th>
  <th>Alterar</th>
  <th>Excluir</th>
</tr>

</thead>
<style type="text/css">

tbody tr:hover{background-color:#555;color:white};

 
</style>
<center>
    	<?php
            include_once "conexao.php";
            $sql = "select p.codigo, p.nome as np, p.preco, c.nome as nf from funcionario as c join produto as p on
            c.id_funcionario=p.id_funcionario";
            $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){
?>
<b>
<tbody id="horario">
       <tr>
           <td id='p3'> <?php  echo $linha['codigo'];?></td>
           <td> <?php echo $linha['np'];?></td>
           <td id='p4'> <?php echo $linha['preco'];?></td>
           <td> <?php echo $linha['nf'];?></td>       
           <td> <?php echo "<a id='p1' href = editar.php?editar=".$linha['codigo']." >editar </a>";?></td>
           <td> <?php echo "<a id='p2' href = evento.php?deletar=".$linha['codigo'].">excluir</a>";?></td>
       </tr>
</tbody>
</b>
<?php
          }//fim do while
          }//fim do if  
          mysql_close($con);
?>
</table> 
		<center>
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">voltar</button>
       </center>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('id02');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function funcaoporra(x) {
    x.style.background = "yellow";
}
</script>
</body>
</html>
