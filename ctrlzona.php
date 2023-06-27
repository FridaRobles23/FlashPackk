<?php include 'Headers/header.php' ?>
<center>
<?php
include 'zonas.php';

$a = new zonas();
$a->conexion();
switch($_REQUEST['opc']){
	case 1: 
    $a->inicializar($_REQUEST['zona'],$_REQUEST['precio']);
		$a->ingresarZona();
	break;
	case 2: 
  $a ->modificarZona($_REQUEST['idzona']);
    break;
	case 3:
	$a ->consultarZona($_REQUEST['idzona']);
    break;
	case 4:
	$a ->borrarZona($_REQUEST['idzona']);
    break;
}
$a -> desconectar();
?>
<br> <br>
	      <ul>
          <a href="listarZona.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>
