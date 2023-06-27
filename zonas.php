<?php
	class zonas{
		private $zona;
		private $precio;

  public function inicializar($zona,$precio){
	$this->zona=$zona;
	$this->precio=$precio;
   }

  public function conexion(){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
      return $con;
   }

  public function ingresarZona(){
      mysqli_query($this -> conexion(),"INSERT INTO zonas(zona,precio) values ('$this->zona','$this->precio')") 
	  or die("Problemas en el insert".mysqli_error($this -> conexion()));
      echo "<br>";
    echo "Zona registrada";
   }



   public function insertarZona(){ 
	$registro=mysqli_query($this->conexion(),"select zonas,precio
		  from zonas where idzona='$this->idzona'") or die("Problemas en el Select: ".mysqli_error($this->conexion()));
		  if($reg=mysqli_fetch_array($registro)){
			  echo "La Zona ya existe";
		  }else{  
		  mysqli_query($this -> conexion(),"INSERT INTO zonas(zona,precio) values ('$this->zona','$this->precio')") 
		  or die("Problemas en el insert".mysqli_error($this -> conexion()));
		echo "Zona registrada.";
	   }
	   }



     public function listarZona(){
		$con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
		$registro=mysqli_query($con, "select * from zonas")or die(mysql_error($con));
	   
		echo '<center>';
		echo '<BR><BR><h2>ZONAS</h2><br>';
  echo '<table  border=3>
	<tr><td>
	<form action="zonasA.php" method="post">
	<input type="submit" value="Agregar">
	<input type="hidden" name="opc" value="1">
	</form></td>
	</tr>
	</table>';
	echo '<div class="table-responsive">';
	echo '<table id="tablaR" class="color table" border="3">';
	echo '<thead class="thead-dark"><tr><th>ID Zona</th><th>Zona</th><th>Precio</th><th> Modificar</th><th>Consultar</th><th>Borrar</th></tr></thead>';
	echo '<tbody>';	
	while($reg=mysqli_fetch_array($registro)) {
			echo'<tr><td aling="center">'.$reg['idzona'].'</td>';
			echo'<td aling="center">'.$reg['zona'].'</td>';
			echo'<td aling="center">'.$reg['precio']."</td>
	  <td><form action='ctrlzona.php' method='post'>
	  <input type='submit' value='Modificar'>
	  <input type='hidden' name='opc' value='2'>
	  <input type='hidden' name='idzona' value=".$reg['idzona'].">
	  </form></td>    
	  <td aling='center'>
	  <form action='ctrlzona.php' method='post'>
	  <input type='submit' value='Consultar'>
	  <input type='hidden' name='opc' value='3'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idzona' value=".$reg['idzona'].">
	  </form></td>	
	  <td aling='center'>
	  <form action='ctrlzona.php' method='post'>
	  <input type='submit' value='Borrar'>
	  <input type='hidden' name='opc' value='4'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idzona' value=".$reg['idzona'].">
	  </form></td>
	  </tr>";
  }
  echo'</tbody></table>';
  echo'</div>';
  
  
   }  
   
	 public function consultarZona($idzona){
	  $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	  
	 $registro=mysqli_query($con,"select idzona,zona,precio from zonas where idzona='$idzona'")or die(mysqli_error($con));
	 echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE ZONA</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		  echo "ID Zona: ".$reg['idzona']."<br>";		  
		  echo "Zona: ".$reg['zona']."<br>";
		  echo "Precio: ".$reg['precio']."<br>";

  }else{
	  echo "Esta zona no existe";
  }
}
public function borrarZona($idzona){
	$con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	
	$registro=mysqli_query($con,"select idzona,zona,precio
	 from zonas where idzona='$idzona'")or die(mysqli_error($con));
	 echo "<br>";
	echo "<br>";
	echo "<b><H3>CONSULTA DE ZONA ELIMINADA</H3></b>";
	echo "<br>";
	echo "<hr/>";
	 if($reg=mysqli_fetch_array($registro)){
		echo "ID Zona: ".$reg['idzona']."<br>";		  
		echo "Zona: ".$reg['zona']."<br>";
		echo "Precio: ".$reg['precio']."<br>";
		 
		 mysqli_query($con,"delete from zonas where idzona='$idzona'")or die(mysqli_error($con));
		 echo '<br>Se efectuo el borrado de la zona:'.$reg['zona'];  	  
 }
 }



  public function modificarZona($idzona){
	$registro=mysqli_query($this->conexion(),"select * from zonas where idzona='$idzona'")
	or die(mysqli_error($this -> conexion()));
	if($reg=Mysqli_fetch_array($registro)){
	echo '<form action="modiZona2.php" method="POST">';
	   echo '<table>';
	   echo '<tr>';
	    echo '<td>ID:</td>';
   		echo '<td>';
   		echo '<input type="hiden" name="idzona" value="'.$reg['idzona'].'">';
   		echo '</td>';
   		echo '</tr>';

	   echo '<tr>';
	   echo '<td>Zonas:</td>';
	   echo '<td>';
	   echo '<input type="text" name="zona" value="'.$reg['zona'].'">';
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
	public function modificarZona2($idzona, $zona, $precio){
		$registro=mysqli_query($this->conexion(),"UPDATE zonas set  idzona='$idzona', zona='$zona', precio='$precio'  where idzona='$idzona'")
		or die("Error al modificar ".mysqli_error($this->conexion()));
		echo "<br>";
		echo "<br>";
		echo "<b><H3>ZONA MODIFICADA</H3></b>";
		echo "<br>";
		echo "<hr/>";
		$registro=mysqli_query($this->conexion(),"select idzona, zona, precio from zonas where idzona='$idzona'")
		or die(mysqli_error($this->conexion()));
		if($reg=mysqli_fetch_array($registro)){
            echo "ID Zona: ".$reg['idzona']."<br>";		  
            echo "Zona: ".$reg['zona']."<br>";
			echo "Precio: ".$reg['precio']."<br>";
		}
		}

	  public function LlenarListaZona(){
	  $registros=mysqli_query($this->conexion(),"SELECT * FROM zonas") or die ("Problemas en el select".mysqli_error($this->conexion()));
	  
	  while ($reg=mysqli_fetch_array($registros)) {
		echo "<option value='$reg[0]'>$reg[1]</option>";
	  }
	}

	public function desconectar(){
		mysqli_close($this->conexion());
	 }
   }
   ?>