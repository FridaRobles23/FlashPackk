<?php include 'Headers/header.php' ?>
<center>	
<?php
include("administradores.php");
$adm=new administradores();
$adm->conexion();
$adm->modificarAdm2($_REQUEST['idAdmin'],$_REQUEST['nombre'],$_REQUEST['email'],$_REQUEST['password']);
$adm->cerrar();
?>
	
    
<br> <br>
	      <ul>
          <a href="listarAdm.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>