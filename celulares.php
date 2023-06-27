<?php
	class celulares{
		private $modelo;
		private $marca;
		private $color;

  public function inicializar($modelo, $marca, $color){
	$this->modelo=$modelo;
	$this->marca=$marca;
	$this->color=$color;
   }

  public function conexion(){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
      return $con;
   }

  public function ingresarCel(){
      mysqli_query($this -> conexion(),"INSERT INTO celulares(modelo,marca,color) values ('$this->modelo','$this->marca','$this->color')") 
	  or die("Problemas en el insert".mysqli_error($this -> conexion()));
    echo "Celular registrado";
   }



   public function insertarCel(){ 
	$registro=mysqli_query($this->conexion(),"select celulares
		  from celulares where idCel='$this->idCel'") or die("Problemas en el Select: ".mysqli_error($this->conexion()));
		  if($reg=mysqli_fetch_array($registro)){
			  echo "El Celular ya existe";
		  }else{  
		  mysqli_query($this -> conexion(),"INSERT INTO celulares(modelo,marca,color) values ('$this->modelo','$this->marca','$this->color')") 
		  or die("Problemas en el insert".mysqli_error($this -> conexion()));
		echo "Celular registrado.";
	   }
	   }



     public function listarCel(){
		$con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
		$registro=mysqli_query($con, "select * from celulares")or die(mysql_error($con));
	   
		echo '<center>';
		echo '<BR><BR><h2>Celulares</h2><br>';
  echo '<table  border=3>
	<tr><td>
	<form action="celularesA.php" method="post">
	<input type="submit" value="Agregar">
	<input type="hidden" name="opc" value="1">
	</form></td>
	</tr>
	</table>';
	echo '<div class="table-responsive">';
	echo '<table id="tablaR" class="color table" border="3">';
	echo '<thead class="thead-dark"><tr><th>ID Celular</th><th>Modelo</th><th>Marca</th><th>Color</th><th> Modificar</th><th>Consultar</th><th>Borrar</th></tr></thead>';
	echo '<tbody>';	
	while($reg=mysqli_fetch_array($registro)) {
			echo'<tr><td aling="center">'.$reg['idCel'].'</td>';
			echo'<td aling="center">'.$reg['modelo'].'</td>';
			echo'<td aling="center">'.$reg['marca'].'</td>';
			echo'<td aling="center">'.$reg['color']."</td>
	  <td><form action='ctrlCel.php' method='post'>
	  <input type='submit' value='Modificar'>
	  <input type='hidden' name='opc' value='2'>
	  <input type='hidden' name='idCel' value=".$reg['idCel'].">
	  </form></td>    
	  <td aling='center'>
	  <form action='ctrlCel.php' method='post'>
	  <input type='submit' value='Consultar'>
	  <input type='hidden' name='opc' value='3'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idCel' value=".$reg['idCel'].">
	  </form></td>	
	  <td aling='center'>
	  <form action='ctrlCel.php' method='post'>
	  <input type='submit' value='Borrar'>
	  <input type='hidden' name='opc' value='4'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idCel' value=".$reg['idCel'].">
	  </form></td>
	  </tr>";
  }
  echo'</tbody></table>';
  echo'</div>';
  
  
   }  
   
	 public function consultarCel($idCel){
	  $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	  
	 $registro=mysqli_query($con,"select idCel,modelo,marca,color from celulares where idCel='$idCel'")or die(mysqli_error($con));
	 echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE CELULAR</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		  echo "ID Celular: ".$reg['idCel']."<br>";		  
		  echo "Modelo: ".$reg['modelo']."<br>";
		  echo "Marca: ".$reg['marca']."<br>";
		  echo "Color: ".$reg['color']."<br>";

	  
  }else{
	  echo "Este Celular no existe";
  }
}
  public function borrarCel($idCel){
	 $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	 
	 $registro=mysqli_query($con,"select idCel,modelo,marca,color
	  from celulares where idCel='$idCel'")or die(mysqli_error($con));
	  echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE CELULAR ELIMINADO</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		echo "ID Celular: ".$reg['idCel']."<br>";		  
		  echo "Modelo: ".$reg['modelo']."<br>";
		  echo "Marca: ".$reg['marca']."<br>";
		  echo "Color: ".$reg['color']."<br>";
		  
		  mysqli_query($con,"delete from celulares where idCel='$idCel'")or die(mysqli_error($con));
		  echo '<br>Se efectuo el borrado del Celular:'.$reg['modelo'];  	  
  }
  }


  public function modificarCel($idCel){
	$registro=mysqli_query($this->conexion(),"select * from celulares where idCel='$idCel'")
	or die(mysqli_error($this -> conexion()));
	if($reg=Mysqli_fetch_array($registro)){
	echo '<form action="modiCel2.php" method="POST">';
	   echo '<table>';
	   echo '<td>ID:</td>';
	   echo '<td>';
	   echo '<input type="hiden" name="idCel" value="'.$reg['idCel'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td>Modelo:</td>';
	   echo '<td>';
	   echo '<input type="text" name="modelo" value="'.$reg['modelo'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td>Marca:</td>';
	   echo '<td>';
	   echo '<input type="text" name="marca" value="'.$reg['marca'].'">';
	   echo '</td>';
	   echo '</tr>';
	   echo '<tr>';
	   echo '<td>Color:</td>';
	   echo '<td>';
	   echo '<input type="text" name="color" value="'.$reg['color'].'">';
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
	public function modificarCel2($idCel, $modelo, $marca, $color){
		$registro=mysqli_query($this->conexion(),"UPDATE celulares set  idCel='$idCel', modelo='$modelo',marca='$marca',color='$color'  where idCel='$idCel'")
		or die("Error al modificar ".mysqli_error($this->conexion()));
		echo "<br>";
		echo "<br>";
		echo "<b><H3>CELULAR MODIFICADO</H3></b>";
		echo "<br>";
		echo "<hr/>";
		$registro=mysqli_query($this->conexion(),"select idCel, modelo, marca, color from celulares where idCel='$idCel'")
		or die(mysqli_error($this->conexion()));
		if($reg=mysqli_fetch_array($registro)){
            echo "ID Celular: ".$reg['idCel']."<br>";		  
            echo "Modelo: ".$reg['modelo']."<br>";
            echo "Marca: ".$reg['marca']."<br>";
            echo "Color: ".$reg['color']."<br>";
		}
		}

	  public function LlenarListaCel(){
	  $registros=mysqli_query($this->conexion(),"SELECT * FROM celulares") or die ("Problemas en el select".mysqli_error($this->conexion()));
	  
	  while ($reg=mysqli_fetch_array($registros)) {
		echo "<option value='$reg[0]'>$reg[1]</option>";
	  }
	}

	public function desconectar(){
		mysqli_close($this->conexion());
	 }
   }
   ?>