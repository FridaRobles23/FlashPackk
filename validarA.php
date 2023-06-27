<?php
$email=$_POST['email'];
$password=$_POST['password'];
session_start();
$_SESSION['email']=$email;

$conexion=mysqli_connect("localhost","root","","flashpack");

$consulta="SELECT * FROM administradores where email='$email' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    echo "<script>alert('Inicio de Sesión correcto'); window.location='indexA.php'</script>";
}else{
    ?>
    <?php
    include("index.php");
    ?>
    <script>alert('No existe el Administrador'); window.location='index.php'</script>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>