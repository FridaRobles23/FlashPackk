<?php include 'Headers/header.php' ?>
<center>

<?php
include("material.php");
$a=new material();
$a->conexion();
$a->modificarMat2($_REQUEST['idmaterial'],$_REQUEST['material'],$_REQUEST['precio']);
$a->desconectar();
?>


<br> <br>
	      <ul>
          <a href="listarMat.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>