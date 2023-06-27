<?php include 'Headers/header.php' ?>
<center>
<?php
include 'vehiculos.php';

$a = new vehiculos();
$a->conexion();
switch($_REQUEST['opc']){
	case 1: 
    $a->inicializar($_REQUEST['modelo'],$_REQUEST['tipo'],$_REQUEST['placa'],$_REQUEST['capacidad']);
		$a->ingresarVehiculos();
	break;
	case 2: 
  $a ->modificarVehiculos($_REQUEST['idVehiculo']);
    break;
	case 3:
	$a ->consultarVehiculos($_REQUEST['idVehiculo']);
    break;
	case 4:
	$a ->borrarVehiculos($_REQUEST['idVehiculo']);
    break;
}
$a -> desconectar();
?>
<br> <br>
	      <ul>
          <a href="listarVeh.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>
