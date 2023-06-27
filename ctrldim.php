<?php include 'Headers/header.php' ?>
<center>
<?php
include 'dimenciones.php';

$a = new dimenciones();
$a->conexion();
switch($_REQUEST['opc']){
	case 1: 
    $a->inicializar($_REQUEST['dimenciones'],$_REQUEST['precio']);
		$a->ingresarD();
	break;
	case 2: 
  $a ->modificarD($_REQUEST['iddimenciones']);
    break;
	case 3:
	$a ->consultarD($_REQUEST['iddimenciones']);
    break;
	case 4:
	$a ->borrarD($_REQUEST['iddimenciones']);
    break;
}
$a -> desconectar();
?>
<br> <br>
	      <ul>
          <a href="listarD.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>