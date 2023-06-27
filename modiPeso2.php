<?php include 'Headers/header.php' ?>
<center>

<?php
include("peso.php");
$a=new peso();
$a->conexion();
$a->modificarPeso2($_REQUEST['idpeso'],$_REQUEST['peso'],$_REQUEST['precio']);
$a->desconectar();
?>


<br> <br>
	      <ul>
          <a href="listarPeso.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>