  <?php
    include 'db.php';

    $validar = new flashpack();
    $validar -> conexion();
    $validar -> IniciarSesion($_REQUEST['email'], $_REQUEST['password']);
    $validar -> desconectar();

?>