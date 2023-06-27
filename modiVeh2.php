<?php include 'Headers/header.php' ?>
<center>

<?php
include("vehiculos.php");
$a=new vehiculos();
$a->conexion();
$a->modificarVeh2($_REQUEST['idVehiculo'],$_REQUEST['modelo'],$_REQUEST['tipo'],$_REQUEST['placa'],$_REQUEST['capacidad']);
$a->desconectar();
?>

<br> <br>
	      <ul>
          <a href="listarVeh.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>