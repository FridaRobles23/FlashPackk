<?php include 'Headers/header.php' ?>
<center>
<?php
include 'peso.php';

$a = new peso();
$a->conexion();
switch($_REQUEST['opc']){
	case 1: 
    $a->inicializar($_REQUEST['peso'],$_REQUEST['precio']);
		$a->ingresarPeso();
	break;
	case 2: 
  $a ->modificarPeso($_REQUEST['idpeso']);
    break;
	case 3:
	$a ->consultarPeso($_REQUEST['idpeso']);
    break;
	case 4:
	$a ->borrarPeso($_REQUEST['idpeso']);
    break;
}
$a -> desconectar();
?>
<br> <br>
	      <ul>
          <a href="listarPeso.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>
