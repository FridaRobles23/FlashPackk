<?php include 'Headers/header.php' ?>
<center>
<?php
include 'material.php';

$a = new material();
$a->conexion();
switch($_REQUEST['opc']){
	case 1: 
    $a->inicializar($_REQUEST['material'],$_REQUEST['precio']);
		$a->ingresarMat();
	break;
	case 2: 
  $a ->modificarMat($_REQUEST['idmaterial']);
    break;
	case 3:
	$a ->consultarMat($_REQUEST['idmaterial']);
    break;
	case 4:
	$a ->borrarMat($_REQUEST['idmaterial']);
    break;
}
$a -> desconectar();
?>
<br> <br>
	      <ul>
          <a href="listarMat.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>
