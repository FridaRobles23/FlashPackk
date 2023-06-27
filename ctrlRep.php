<?php include 'Headers/header.php' ?>
<center>
<?php
include 'repartidores.php';

$a=new repartidores();
$a->conexion();
switch($_REQUEST['opc']){
	case 1:
		$a->inicializar($_REQUEST['nombre'],$_REQUEST['telefono'],$_REQUEST['email'],$_REQUEST['password'],$_REQUEST['idVehiculo'],$_REQUEST['idCel']);
		$a->insertarRep();
	break;
	case 2:
		$a->modificarRep($_REQUEST['idRepartidor']);
	break;
	case 3:
		$a->consultarRep($_REQUEST['idRepartidor']);
	break;
	case 4:
		$a->borrarRep($_REQUEST['idRepartidor']);
	break;
}
$a->desconectar();
?>
<br> <br>
	      <ul>
          <a href="listarRep.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>