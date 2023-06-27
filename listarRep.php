<?php include 'Headers/header.php' ?>
<center>
    <?php
    include("repartidores.php");

    $s = new repartidores();
    $s->conexion();
    $s->listarRep();
    $s->desconectar();
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
        <a href="indexA.php"> REGRESAR ↩ </a>
    </ul>

</center>
<?php include 'Headers/footer.php' ?>