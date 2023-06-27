<?php
	class peso{
		private $peso;
		private $precio;

  public function inicializar($peso,$precio){
	$this->peso=$peso;
	$this->precio=$precio;
   }

  public function conexion(){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
      return $con;
   }

  public function ingresarPeso(){
      mysqli_query($this -> conexion(),"INSERT INTO peso(peso,precio) values ('$this->peso','$this->precio')") 
	  or die("Problemas en el insert".mysqli_error($this -> conexion()));
      echo "<br>";
    echo "Peso registrado";
   }



   public function insertarPeso(){ 
	$registro=mysqli_query($this->conexion(),"select peso,precio
		  from peso where peso='$this->peso'") or die("Problemas en el Select: ".mysqli_error($this->conexion()));
		  if($reg=mysqli_fetch_array($registro)){
			  echo "El peso ya existe";
		  }else{  
		  mysqli_query($this -> conexion(),"INSERT INTO peso(peso,precio) values ('$this->peso','$this->precio')") 
		  or die("Problemas en el insert".mysqli_error($this -> conexion()));
		echo "peso registrado.";
	   }
	   }



     public function listarPeso(){
		$con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
		$registro=mysqli_query($con, "select * from peso")or die(mysql_error($con));
	   
		echo '<center>';
		echo '<BR><BR><h2>PESO</h2><br>';
  echo '<table  border=3>
	<tr><td>
	<form action="pesoA.php" method="post">
	<input type="submit" value="Agregar">
	<input type="hidden" name="opc" value="1">
	</form></td>
	</tr>
	</table>';
	echo '<div class="table-responsive">';
	echo '<table id="tablaR" class="color table" border="3">';
	echo '<thead class="thead-dark"><tr><th>ID Peso</th><th>Peso</th><th>Precio</th><th> Modificar</th><th>Consultar</th><th>Borrar</th></tr></thead>';
	echo '<tbody>';	
	while($reg=mysqli_fetch_array($registro)) {
			echo'<tr><td aling="center">'.$reg['idpeso'].'</td>';
			echo'<td aling="center">'.$reg['peso'].'</td>';
			echo'<td aling="center">'.$reg['precio']."</td>
	  <td><form action='ctrlpeso.php' method='post'>
	  <input type='submit' value='Modificar'>
	  <input type='hidden' name='opc' value='2'>
	  <input type='hidden' name='idpeso' value=".$reg['idpeso'].">
	  </form></td>    
	  <td aling='center'>
	  <form action='ctrlpeso.php' method='post'>
	  <input type='submit' value='Consultar'>
	  <input type='hidden' name='opc' value='3'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idpeso' value=".$reg['idpeso'].">
	  </form></td>	
	  <td aling='center'>
	  <form action='ctrlpeso.php' method='post'>
	  <input type='submit' value='Borrar'>
	  <input type='hidden' name='opc' value='4'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idpeso' value=".$reg['idpeso'].">
	  </form></td>
	  </tr>";
  }
  echo'</tbody></table>';
  echo'</div>';
  
  
   }  
   
	 public function consultarPeso($idpeso){
	  $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	  
	 $registro=mysqli_query($con,"select idpeso,peso,precio from peso where idpeso='$idpeso'")or die(mysqli_error($con));
	 echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE PESO</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		  echo "ID Peso: ".$reg['idpeso']."<br>";		  
		  echo "Peso: ".$reg['peso']."<br>";
		  echo "Precio: ".$reg['precio']."<br>";

  }else{
	  echo "Este Peso no existe";
  }
}
  public function borrarPeso($idpeso){
	 $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	 
	 $registro=mysqli_query($con,"select idpeso,peso,precio
	  from peso where idpeso='$idpeso'")or die(mysqli_error($con));
	  echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE PESO ELIMINADO</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		echo "ID Peso: ".$reg['idpeso']."<br>";		  
		  echo "Peso: ".$reg['peso']."<br>";
		  echo "Precio: ".$reg['precio']."<br>";
		  
		  mysqli_query($con,"delete from peso where idpeso='$idpeso'")or die(mysqli_error($con));
		  echo '<br>Se efectuo el borrado deL Peso:'.$reg['peso'];  	  
  }
  }


  public function modificarPeso($idpeso){
	$registro=mysqli_query($this->conexion(),"select * from peso where idpeso='$idpeso'")
	or die(mysqli_error($this -> conexion()));
	if($reg=Mysqli_fetch_array($registro)){
	echo '<form action="modiPeso2.php" method="POST">';
	   echo '<table>';
	   echo '<tr>';
	    echo '<td>ID:</td>';
   		echo '<td>';
   		echo '<input type="hiden" name="idpeso" value="'.$reg['idpeso'].'">';
   		echo '</td>';
   		echo '</tr>';

	   echo '<tr>';
	   echo '<td>Peso:</td>';
	   echo '<td>';
	   echo '<input type="text" name="peso" value="'.$reg['peso'].'">';
	   echo '</td>';
	   echo '</tr>';

	   echo '<tr>';
	   echo '<td>Precio:</td>';
	   echo '<td>';
	   echo '<input type="number" step="0.01" name="precio" value="'.$reg['precio'].'">';
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
	public function modificarPeso2($idpeso, $peso,$precio){
		$registro=mysqli_query($this->conexion(),"UPDATE peso set  idpeso='$idpeso', peso='$peso', precio='$precio'  where idpeso='$idpeso'")
		or die("Error al modificar ".mysqli_error($this->conexion()));
		echo "<br>";
		echo "<br>";
		echo "<b><H3>PESO MODIFICADO</H3></b>";
		echo "<br>";
		echo "<hr/>";
		$registro=mysqli_query($this->conexion(),"select idpeso, peso, precio from peso where idpeso='$idpeso'")
		or die(mysqli_error($this->conexion()));
		if($reg=mysqli_fetch_array($registro)){
            echo "ID Peso: ".$reg['idpeso']."<br>";		  
		  echo "Peso: ".$reg['peso']."<br>";
		  echo "Precio: ".$reg['precio']."<br>";
		}
		}

	  public function LlenarListaPeso(){
	  $registros=mysqli_query($this->conexion(),"SELECT * FROM peso") or die ("Problemas en el select".mysqli_error($this->conexion()));
	  
	  while ($reg=mysqli_fetch_array($registros)) {
		echo "<option value='$reg[0]'>$reg[1]</option>";
	  }
	}

	public function desconectar(){
		mysqli_close($this->conexion());
	 }
   }
   ?>