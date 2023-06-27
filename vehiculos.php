<?php
	class vehiculos{
		private $modelo;
		private $tipo;
		private $placa;
		private $capacidad;

  public function inicializar($modelo, $tipo, $placa, $capacidad){
	$this->modelo=$modelo;
	$this->tipo=$tipo;
	$this->placa=$placa;
	$this->capacidad=$capacidad;
   }

  public function conexion(){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
      return $con;
   }

  public function ingresarVehiculos(){
      mysqli_query($this -> conexion(),"INSERT INTO vehiculos(modelo,tipo,placa,capacidad) values ('$this->modelo','$this->tipo','$this->placa','$this->capacidad')") 
	  or die("Problemas en el insert".mysqli_error($this -> conexion()));
    echo "Vehiculo registrado";
   }



   public function insertarVehiculos(){ 
	$registro=mysqli_query($this->conexion(),"select vehiculos
		  from vehiculos where placa='$this->placa'") or die("Problemas en el Select: ".mysqli_error($this->conexion()));
		  if($reg=mysqli_fetch_array($registro)){
			  echo "El vehiculos ya existe";
		  }else{  
		  mysqli_query($this -> conexion(),"INSERT INTO vehiculos(modelo, tipo,placa,capacidad) values ('$this->modelo','$this->tipo','$this->placa','$this->capacidad')") 
		  or die("Problemas en el insert".mysqli_error($this -> conexion()));
		echo "Vehiculo registrado.";
	   }
	   }



     public function listarVehiculos(){
		$con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
		$registro=mysqli_query($con, "select * from vehiculos")or die(mysql_error($con));
	   
		echo '<center>';
		echo '<BR><BR><h1 class="titulos" >Vehiculos</h1><br>';
  echo '<table  border=3>
	<tr><td>
	<form action="vehiculosA.php" method="post">
	<input type="submit" value="Agregar">
	<input type="hidden" name="opc" value="1">
	</form></td>
	</tr>
	</table>';
	echo '<div class="table-responsive">';
	echo '<table id="tablaR" class="color table" border="3">';
	echo '<thead class="thead-dark"><tr><th>ID Vehiculo</th><th>Modelo</th><th>Tipo</th><th>Placa</th><th>Capacidad</th><th> Modificar</th><th>Consultar</th><th>Borrar</th></tr></thead>';
	echo '<tbody>';

		while($reg=mysqli_fetch_array($registro)) {
			echo'<tr><td aling="center">'.$reg['idVehiculo'].'</td>';
			echo'<td aling="center">'.$reg['modelo'].'</td>';
			echo'<td aling="center">'.$reg['tipo'].'</td>';
			echo'<td aling="center">'.$reg['placa'].'</td>';
			echo'<td aling="center">'.$reg['capacidad']."</td>
	  <td><form action='ctrlVehiculos.php' method='post'>
	  <input type='submit' value='Modificar'>
	  <input type='hidden' name='opc' value='2'>
	  <input type='hidden' name='idVehiculo' value=".$reg['idVehiculo'].">
	  </form></td>    
	  <td aling='center'>
	  <form action='ctrlVehiculos.php' method='post'>
	  <input type='submit' value='Consultar'>
	  <input type='hidden' name='opc' value='3'>
	  <input type='hidden' name='idVehiculo' value=".$reg['idVehiculo'].">
	  </form></td>	
	  <td aling='center'>
	  <form action='ctrlVehiculos.php' method='post'>
	  <input type='submit' value='Borrar'>
	  <input type='hidden' name='opc' value='4'>
	  <input type='hidden' name='idVehiculo' value=".$reg['idVehiculo'].">
	  </form></td>
	  </tr>";
  }
  echo'</tbody></table>';
  echo'</div>';
  
  
   }  
   
	 public function consultarVehiculos($idVehiculo){
	  $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	  
	 $registro=mysqli_query($con,"select idVehiculo,modelo,tipo,placa,capacidad from vehiculos where idVehiculo='$idVehiculo'")or die(mysqli_error($con));
	 echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE VEHICULO</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		  echo "ID Vehiculo: ".$reg['idVehiculo']."<br>";	
		  echo "Modelo: ".$reg['modelo']."<br>";	  
		  echo "Tipo: ".$reg['tipo']."<br>";
		  echo "Placa: ".$reg['placa']."<br>";
		  echo "Capacidad: ".$reg['capacidad']."<br>";

	  
  }else{
	  echo "Este Vehiculo no existe";
  }
}
  public function borrarVehiculos($idVehiculo){
	 $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	 
	 $registro=mysqli_query($con,"select idVehiculo,modelo,tipo,placa,capacidad
	  from vehiculos where idVehiculo='$idVehiculo'")or die(mysqli_error($con));
	  echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE VEHICULO ELIMINADO</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		echo "ID Vehiculo: ".$reg['idVehiculo']."<br>";	
		  echo "Modelo: ".$reg['modelo']."<br>";	  
		  echo "Tipo: ".$reg['tipo']."<br>";
		  echo "Placa: ".$reg['placa']."<br>";
		  echo "Capacidad: ".$reg['capacidad']."<br>";
		  
		  mysqli_query($con,"delete from vehiculos where idVehiculo='$idVehiculo'")or die(mysqli_error($con));
		  echo '<br>Se efectuo el borrado del Vehiculo con la placa:'.$reg['placa'];  	  
  }
  }


  public function modificarVehiculos($idVehiculo){
	$registro=mysqli_query($this->conexion(),"select * from vehiculos where idVehiculo='$idVehiculo'")
	or die(mysqli_error($this -> conexion()));
	if($reg=Mysqli_fetch_array($registro)){
	echo '<form action="modiVeh2.php" method="POST">';
	   echo '<table>';
	   echo '<td>ID:</td>';
	   echo '<td>';
	   echo '<input type="hiden" name="idVehiculo" value="'.$reg['idVehiculo'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td>Modelo:</td>';
	   echo '<td>';
	   echo '<input type="text" name="modelo" value="'.$reg['modelo'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td>Tipo:</td>';
	   echo '<td>';
	   echo '<input type="text" name="tipo" value="'.$reg['tipo'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td>Placa:</td>';
	   echo '<td>';
	   echo '<input type="text" name="placa" value="'.$reg['placa'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td>Capacidad:</td>';
	   echo '<td>';
	   echo '<input type="text" name="capacidad" value="'.$reg['capacidad'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td><input type="submit" name="operar" value="Modificar"></td>';
	   echo '</tr>';
	   echo '</table>';
	   echo '</form>';
	}else{
	echo "No existe registro";
	}
	}
	public function modificarVeh2($idVehiculo, $modelo,$tipo, $placa, $capacidad){
		$registro=mysqli_query($this->conexion(),"UPDATE vehiculos set  idVehiculo='$idVehiculo', modelo='$modelo',tipo='$tipo', placa='$placa',capacidad='$capacidad'  where idVehiculo='$idVehiculo'")
		or die("Error al modificar ".mysqli_error($this->conexion()));
		echo "<br>";
		echo "<br>";
		echo "<b><H3>VEHICULO MODIFICADO</H3></b>";
		echo "<br>";
		echo "<hr/>";
		$registro=mysqli_query($this->conexion(),"select idVehiculo, modelo, tipo, placa, capacidad from vehiculos where idVehiculo='$idVehiculo'")
		or die(mysqli_error($this->conexion()));
		if($reg=mysqli_fetch_array($registro)){
			echo "ID Vehiculo: ".$reg['idVehiculo']."<br>";	
			echo "Modelo: ".$reg['modelo']."<br>";	  
			echo "Tipo: ".$reg['tipo']."<br>";
			echo "Placa: ".$reg['placa']."<br>";
			echo "Capacidad: ".$reg['capacidad']."<br>";
		}
		}

	  public function LlenarListaVeh(){
	  $registros=mysqli_query($this->conexion(),"SELECT * FROM vehiculos") or die ("Problemas en el select".mysqli_error($this->conexion()));
	  
	  while ($reg=mysqli_fetch_array($registros)) {
		echo "<option value='$reg[0]'>$reg[1]</option>";
	  }
	}

	public function desconectar(){
		mysqli_close($this->conexion());
	 }
   }
   ?>