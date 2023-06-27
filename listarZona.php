<?php include 'Headers/header.php' ?>
<center>
<?php
include("zonas.php");

$d=new zonas();
$d->conexion();
$d->listarZona();
$d->desconectar();
?>
<br> <br>
	      <ul>
          <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
              
                let table = new DataTable('#tablaR', {
                    responsive: true
                });
            });
        </script>
          <a href="vistaCoti.php"> REGRESAR  ↩ </a>
      </ul>	
</center>
    <?php include 'Headers/footer.php' ?>