<?php include 'Headers/header.php' ?>
<center>

<?php
include("celulares.php");
$a=new celulares();
$a->conexion();
$a->modificarCel2($_REQUEST['idCel'],$_REQUEST['modelo'],$_REQUEST['marca'],$_REQUEST['color']);
$a->desconectar();
?>


<br> <br>
	      <ul>
          <a href="listarCel.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>