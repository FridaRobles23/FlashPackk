<?php
class administradores{
private $nombre;
private $email;
private $password;

  public function inicializar($nombre,$email, $password){
    $this -> nombre = $nombre;
    $this -> email = $email;
    $this -> password = $password;
   }

  public function conexion(){
    $con = mysqli_connect("localhost","root","","flashpack") or die("existen problemas con la base de datos");
      return $con;
   }

  public function insertar(){ 
$registro=mysqli_query($this->conexion(),"select nombre,email,password
      from administradores where email='$this->email'") or die("problemas en el select: ".mysqli_error($this->conexion()));
      if($reg=mysqli_fetch_array($registro)){
          echo "El administrador ya existe.";
      }else{  
      mysqli_query($this -> conexion(),"insert into administradores(nombre,email,password) values ('$this->nombre','$this->email','$this->password')") 
      or die("problemas en el insert".mysqli_error($this -> conexion()));
    echo "Administrador registrado.";
   }
   }
   
public function listaradm(){
         $con = mysqli_connect("localhost","root","","flashpack") or die("existen problemas con la base de datos");
      $registro=mysqli_query($con, "select * from administradores")or die(mysql_error($con));
     
      echo '<center>';
      echo '<h1 class="titulos" >ADMINISTRADORES</h1><br>';
echo '<table  border=3>
  <tr><td>
  <form action="administradoresA.php" method="post">
  <input type="submit" value="agregar">
  <input type="hidden" name="opc" value="1">
  </form></td>
  </tr>
  </table>';
  echo '<div class="table-responsive">';
  echo '<table id="tablaR" class="color table" border="3">';
  echo '<thead class="thead-dark"><tr><th>ID Admin</th><th>Nombre</th><th>E-mail</th><th>Password</th><th> Modificar</th><th>Consultar</th><th>Borrar</th></tr></thead>';
  echo '<tbody>';

      while($reg=mysqli_fetch_array($registro)) {
          echo'<tr><td aling="center">'.$reg['idAdmin'].'</td>';
          echo'<td aling="center">'.$reg['nombre'].'</td>';
          echo'<td aling="center">'.$reg['email'].'</td>';
          echo'<td aling="center">'.$reg['password']."</td>
    <td><form action='ctrlAdmin.php' method='post'>
    <input type='submit' value='modificar'>
    <input type='hidden' name='opc' value='2'>
    <input type='hidden' name='opcion' value='1'>
    <input type='hidden' name='idAdmin' value=".$reg['idAdmin'].">
    </form></td>    
    <td aling='center'>
    <form action='ctrlAdmin.php' method='post'>
    <input type='submit' value='consultar'>
    <input type='hidden' name='opc' value='3'>
    <input type='hidden' name='opcion' value='1'>
    <input type='hidden' name='idAdmin' value=".$reg['idAdmin'].">
    </form></td>    
    <td aling='center'>
    <form action='ctrlAdmin.php' method='post'>
    <input type='submit' value='borrar'>
    <input type='hidden' name='opc' value='4'>
    <input type='hidden' name='opcion' value='1'>
    <input type='hidden' name='idAdmin' value=".$reg['idAdmin'].">
    </form></td>
    </tr>";
}
echo'</tbody></table>';
echo'</div>';

 }  
 
    public function consultaradm($idAdmin){
         $con = mysqli_connect("localhost","root","","flashpack") or 
         die("existen problemas con la base de datos");
      $registro =mysqli_query($con, "select idAdmin, nombre,email,password from administradores where idAdmin='$idAdmin'")or die(mysql_error($con));
       if($reg=mysqli_fetch_array($registro)){
          
          echo "ID Admin: ".$reg['idAdmin']."<br>";        
          echo "Nombre: ".$reg['nombre']."<br>";
          echo "correo: ".$reg['email']."<br>";
          echo "Password: ".$reg['password']."<br>";
  }
  else{
  echo "No existe Administrador";
  }
   }
   public function borraradm($idAdmin){
         $con = mysqli_connect("localhost","root","","flashpack") or 
         die("existen problemas con la base de datos");
      $registro =mysqli_query($con, "select idAdmin, nombre, email, password from administradores where  idAdmin='$idAdmin'")or die(mysql_error($con));
       if($reg=mysqli_fetch_array($registro)){    
          echo "Datos del Admnistrador Eliminado<br>";   
          echo "ID Admin: ".$reg['idAdmin']."<br>";        
          echo "Nombre: ".$reg['nombre']."<br>";
          echo "E-mail: ".$reg['email']."<br>";
          echo "Password: ".$reg['password']."<br>";
          
    mysqli_query($con, "delete from administradores where idAdmin='$idAdmin'")or die(mysql_error($con));
       echo "<br> Se borro adecuadamente el administrador: " .$reg['nombre'];
   
  }
  else{
  echo "no existe administrador con ese id";
  }
   }

    

public function modificaradm($idAdmin){
$registro=mysqli_query($this->conexion(),"select * from administradores where idAdmin='$idAdmin'")
or die(mysqli_error($this -> conexion()));
if($reg=mysqli_fetch_array($registro)){
    echo '<div class="table-responsive">';
echo '<form action="midiAdm2.php" method="post">';
   echo '<table class="color">';
   echo '<td>ID Admin:</td>';
   echo '<td>';
   echo '<input type="hiden" name="idAdmin" value="'.$reg['idAdmin'].'">';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td>Nombre:</td>';
   echo '<td>';
   echo '<input type="text" name="nombre" value="'.$reg['nombre'].'">';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td>E-mail: </td>';
   echo '<td>';
   echo '<input type="mail" name="email" value="'.$reg['email'].'">';
    echo '<tr>';
   echo '<td>Password:</td>';
   echo '<td>';
   echo '<input type="password" name="password" value="'.$reg['password'].'">';
   echo '</td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td><input type="submit" name="operar" value="modificar"></td>';
   echo '</tr>';
   echo '</table>';
   echo '</form>';
   echo '</div>';

}else{
echo "no existe registro";
}
}
public function modificaradm2($idAdmin,$nombre,$email, $password){
$registro=mysqli_query($this->conexion(),"update administradores set nombre='$nombre', email='$email', password='$password' where idAdmin='$idAdmin'")
or die("error al modificar ".mysqli_error($this->conexion()));
echo "Administrador modificado";
echo "<br>";
echo "<br>";
echo "<hr/>";
$registro=mysqli_query($this->conexion(),"select idAdmin, nombre,email, password from administradores where idAdmin='$idAdmin'")
or die(mysqli_error($this->conexion()));
if($reg=mysqli_fetch_array($registro)){
    echo "ID Admin: ".$reg['idAdmin']."<br>";        
    echo "Nombre: ".$reg['nombre']."<br>";
    echo "E-mail: ".$reg['email']."<br>";
    echo "Password: ".$reg['password']."<br>";
}
}
        
public function cerrar(){
     mysqli_close($this->conexion());
    }
}
?>

