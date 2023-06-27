<?php
	class dimenciones{
		private $dimenciones;
		private $precio;

  public function inicializar($dimenciones,$precio){
	$this->dimenciones=$dimenciones;
	$this->precio=$precio;
   }

  public function conexion(){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
      return $con;
   }

  public function ingresarD(){
      mysqli_query($this -> conexion(),"INSERT INTO dimenciones(dimenciones,precio) values ('$this->dimenciones','$this->precio')") 
	  or die("Problemas en el insert".mysqli_error($this -> conexion()));
      echo "<br>";
    echo "Dimenciones registradas";
   }



   public function insertarD(){ 
	$registro=mysqli_query($this->conexion(),"select dimenciones,precio 
		  from dimenciones where dimenciones='$this->dimenciones'") or die("Problemas en el Select: ".mysqli_error($this->conexion()));
		  if($reg=mysqli_fetch_array($registro)){
			  echo "Las dimenciones ya existen";
		  }else{  
		  mysqli_query($this -> conexion(),"INSERT INTO dimenciones(dimenciones,precio) values ('$this->dimenciones','$this->precio')") 
		  or die("Problemas en el insert".mysqli_error($this -> conexion()));
		echo "dimenciones registradas.";
	   }
	   }



     public function listarD(){
		$con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
		$registro=mysqli_query($con, "select * from dimenciones")or die(mysql_error($con));
	   
		echo '<center>';
		echo '<BR><BR><h2>Dimenciones</h2><br>';
        echo '<table  border=3>
	<tr><td>
	<form action="dimencionesA.php" method="post">
	<input type="submit" value="Agregar">
	<input type="hidden" name="opc" value="1">
	</form></td>
	</tr>
	</table>';
	echo '<div class="table-responsive">';
	echo '<table id="tablaR" class="color table" border="3">';
	echo '<thead class="thead-dark"><tr><th>ID Dimenciones</th><th>dimenciones</th><th>Precio</th><th>Modificar</th><th>Consultar</th><th>Borrar</th></tr></thead>';
	echo '<tbody>';	
	while($reg=mysqli_fetch_array($registro)) {
			echo'<tr><td aling="center">'.$reg['iddimenciones'].'</td>';
			echo'<td aling="center">'.$reg['dimenciones'].'</td>';
			echo'<td aling="center">'.$reg['precio']."</td>
	  <td><form action='ctrldim.php' method='post'>
	  <input type='submit' value='Modificar'>
	  <input type='hidden' name='opc' value='2'>
	  <input type='hidden' name='iddimenciones' value=".$reg['iddimenciones'].">
	  </form></td>    
	  <td aling='center'>
	  <form action='ctrldim.php' method='post'>
	  <input type='submit' value='Consultar'>
	  <input type='hidden' name='opc' value='3'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='iddimenciones' value=".$reg['iddimenciones'].">
	  </form></td>	
	  <td aling='center'>
	  <form action='ctrldim.php' method='post'>
	  <input type='submit' value='Borrar'>
	  <input type='hidden' name='opc' value='4'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='iddimenciones' value=".$reg['iddimenciones'].">
	  </form></td>
	  </tr>";
  }
  echo'</tbody></table>';
  echo'</div>';
  
   }  
   
	 public function consultarD($iddimenciones){
	  $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	  
	 $registro=mysqli_query($con,"select iddimenciones,dimenciones,precio from dimenciones where iddimenciones='$iddimenciones'")or die(mysqli_error($con));
	 echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE DIMENCIONES</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		  echo "ID Dimenciones: ".$reg['iddimenciones']."<br>";		  
		  echo "Dimenciones: ".$reg['dimenciones']."<br>";
		  echo "Precio: ".$reg['precio']."<br>";

  }else{
	  echo "Estas dimenciones no existen";
  }
}
public function borrarD($iddimenciones){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
    
    $registro=mysqli_query($con,"select iddimenciones,dimenciones,precio
     from dimenciones where iddimenciones='$iddimenciones'")or die(mysqli_error($con));
     echo "<br>";
    echo "<br>";
    echo "<b><H3>CONSULTA DE DIMENCIONES ELIMINADO</H3></b>";
    echo "<br>";
    echo "<hr/>";
     if($reg=mysqli_fetch_array($registro)){
        echo "ID Dimenciones: ".$reg['iddimenciones']."<br>";		  
        echo "Dimenciones: ".$reg['dimenciones']."<br>";
		echo "Precio: ".$reg['precio']."<br>";
         
         mysqli_query($con,"delete from dimenciones where iddimenciones='$iddimenciones'")or die(mysqli_error($con));
         echo '<br>Se efectuo el borrado de las dimenciones:'.$reg['dimenciones'];  	  
 }
 }


  public function modificarD($iddimenciones){
	$registro=mysqli_query($this->conexion(),"select * from dimenciones where iddimenciones='$iddimenciones'")
	or die(mysqli_error($this -> conexion()));
	if($reg=Mysqli_fetch_array($registro)){
	echo '<form action="modiD2.php" method="POST">';
	   echo '<table>';
	   echo '<tr>';
	    echo '<td>ID:</td>';
   		echo '<td>';
   		echo '<input type="hiden" name="iddimenciones" value="'.$reg['iddimenciones'].'">';
   		echo '</td>';
   		echo '</tr>';

	   echo '<tr>';
	   echo '<td>Dimenciones:</td>';
	   echo '<td>';
	   echo '<input type="text" name="dimenciones" value="'.$reg['dimenciones'].'">';
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
	public function modificarD2($iddimenciones, $dimenciones, $precio){
		$registro=mysqli_query($this->conexion(),"UPDATE dimenciones set  iddimenciones='$iddimenciones', dimenciones='$dimenciones', precio='$precio' where iddimenciones='$iddimenciones'")
		or die("Error al modificar ".mysqli_error($this->conexion()));
		echo "<br>";
		echo "<br>";
		echo "<b><H3>MATERIAL MODIFICADO</H3></b>";
		echo "<br>";
		echo "<hr/>";
		$registro=mysqli_query($this->conexion(),"select iddimenciones, dimenciones, precio from dimenciones where iddimenciones='$iddimenciones'")
		or die(mysqli_error($this->conexion()));
		if($reg=mysqli_fetch_array($registro)){
            echo "ID Dimenciones: ".$reg['iddimenciones']."<br>";		  
            echo "Dimenciones: ".$reg['dimenciones']."<br>";
			echo "Precio: ".$reg['precio']."<br>";
		}
		}

	  public function LlenarListaD(){
	  $registros=mysqli_query($this->conexion(),"SELECT * FROM dimenciones") or die ("Problemas en el select".mysqli_error($this->conexion()));
	  
	  while ($reg=mysqli_fetch_array($registros)) {
		echo "<option value='$reg[0]'>$reg[1]</option>";
	  }
	}

	public function desconectar(){
		mysqli_close($this->conexion());
	 }
   }
   ?>