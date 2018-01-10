<?php 
session_start();
unset($_SESSION['id']);
 unset($_SESSION['nome']);
session_destroy();
echo "<script>window.location='login.php'</script>";
 echo "<script>alert('222')</script>";
 ?>