<?php include 'Headers/header.php' ?>
<center>

<?php
include("dimenciones.php");
$a=new dimenciones();
$a->conexion();
$a->modificarD2($_REQUEST['iddimenciones'],$_REQUEST['dimenciones'],$_REQUEST['precio']);
$a->desconectar();
?>


<br> <br>
	      <ul>
          <a href="listarD.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>