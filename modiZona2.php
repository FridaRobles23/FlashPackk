<?php include 'Headers/header.php' ?>
<center>

<?php
include("zonas.php");
$a=new zonas();
$a->conexion();
$a->modificarZona2($_REQUEST['idzona'],$_REQUEST['zona'],$_REQUEST['precio']);
$a->desconectar();
?>


<br> <br>
	      <ul>
          <a href="listarZona.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>