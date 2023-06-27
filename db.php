<?php
class flashpack{
    public function conexion(){
        $conexion = mysqli_connect('localhost', 'root', '', 'flashpack')
        or die(mysql_error($mysqli));
        return $conexion;
    }
    public function IniciarSesion($email, $password){
        $registro=mysqli_query($this->conexion(),"SELECT email, password
        FROM clientes WHERE email='$email'")
            or die ("<script>alert('No existe Correo'); window.location='index.php'</script>".mysqli_error($this->conexion() ) );

        if($reg=mysqli_fetch_array($registro)){
            if($password==$reg['password']){
                echo "<script>alert('Inicio de Sesión Correcto'); window.location='indexC.php'</script>";
            }else{
                echo "<script>alert('Inicio de Sesión Incorrecto'); window.location='index.php'</script>";
            }            
        }else{
            $registro=mysqli_query($this->conexion(),"SELECT email, password
            FROM repartidores WHERE email='$email'")
            or die ("<script>alert('No existe Correo'); window.location='index.php'</script>".mysqli_error($this->conexion() ) );

            if($reg=mysqli_fetch_array($registro)){
            if($password==$reg['password']){
                echo "<script>alert('Inicio de Sesión Correcto'); window.location='indexR.php'</script>";              
            }else{
                echo "<script>alert('Inicio de Sesión Incorrecto'); window.location='index.php'</script>";

            }
        }
    }
    }
    public function desconectar(){
        mysqli_close($this->conexion());
    }
}
?>