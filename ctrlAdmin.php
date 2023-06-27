<?php include 'Headers/header.php' ?>
<center>
<?php
include 'administradores.php';
$adm = new administradores();
$adm->conexion();

switch($_REQUEST['opc']){
	case 1: 
    $adm->inicializar($_REQUEST['nombre'],$_REQUEST['email'],$_REQUEST['password']);
	$adm -> insertar();
	break;
	case 2: 
  $adm ->modificarAdm($_REQUEST['idAdmin']);
    break;
	case 3:
	$adm ->consultarAdm($_REQUEST['idAdmin']);
    break;
	case 4:
	$adm ->borrarAdm($_REQUEST['idAdmin']);
    break;
}
$adm -> cerrar();
?>
<br> <br>
	      <ul>
          <a href="listarAdm.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>