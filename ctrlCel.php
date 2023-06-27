<?php include 'Headers/header.php' ?>
<center>
<?php
include 'celulares.php';

$a = new celulares();
$a->conexion();
switch($_REQUEST['opc']){
	case 1: 
    $a->inicializar($_REQUEST['modelo'],$_REQUEST['marca'],$_REQUEST['color']);
		$a->ingresarCel();
	break;
	case 2: 
  $a ->modificarCel($_REQUEST['idCel']);
    break;
	case 3:
	$a ->consultarCel($_REQUEST['idCel']);
    break;
	case 4:
	$a ->borrarCel($_REQUEST['idCel']);
    break;
}
$a -> desconectar();
?>
<br> <br>
	      <ul>
          <a href="listarCel.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>
