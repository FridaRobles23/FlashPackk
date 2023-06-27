<?php include 'Headers/header.php' ?>
<center>
<?php
include("repartidores.php");
$a=new repartidores();
$a->conexion();
$a->modificarRep2($_REQUEST['idRepartidor'],$_REQUEST['nombre'],$_REQUEST['telefono'],$_REQUEST['email'],$_REQUEST['password'],$_REQUEST['idVehiculo'],$_REQUEST['idCel']);
$a->desconectar();
?>

<br> <br>
	      <ul>
          <a href="listarRep.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>