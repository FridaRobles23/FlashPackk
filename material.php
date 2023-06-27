<?php
	class material{
		private $material;
		private $precio;

  public function inicializar($material,$precio){
	$this->material=$material;
	$this->precio=$precio;
   }

  public function conexion(){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
      return $con;
   }

  public function ingresarMat(){
      mysqli_query($this -> conexion(),"INSERT INTO material(material,precio) values ('$this->material','$this->precio')") 
	  or die("Problemas en el insert".mysqli_error($this -> conexion()));
      echo "<br>";
    echo "Material registrado";
   }



   public function insertarMat(){ 
	$registro=mysqli_query($this->conexion(),"select material,precio 
		  from material where material='$this->material'") or die("Problemas en el Select: ".mysqli_error($this->conexion()));
		  if($reg=mysqli_fetch_array($registro)){
			  echo "El Material ya existe";
		  }else{  
		  mysqli_query($this -> conexion(),"INSERT INTO material(material,precio) values ('$this->material','$this->precio')") 
		  or die("Problemas en el insert".mysqli_error($this -> conexion()));
		echo "Material registrado.";
	   }
	   }



     public function listarMat(){
		$con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
		$registro=mysqli_query($con, "select * from material")or die(mysql_error($con));
	   
		echo '<center>';
		echo '<BR><BR><h2>MATERIAL</h2><br>';
  echo '<table  border=3>
	<tr><td>
	<form action="materialA.php" method="post">
	<input type="submit" value="Agregar">
	<input type="hidden" name="opc" value="1">
	</form></td>
	</tr>
	</table>';
	echo '<div class="table-responsive">';
	echo '<table id="tablaR" class="color table" border="3">';
	echo '<thead class="thead-dark"><tr><th>ID Material</th><th>Material</th><th>Precio</th><th>Modificar</th><th>Consultar</th><th>Borrar</th></tr></thead>';
	echo '<tbody>';	
	while($reg=mysqli_fetch_array($registro)) {
			echo'<tr><td aling="center">'.$reg['idmaterial'].'</td>';
			echo'<td aling="center">'.$reg['material'].'</td>';
			echo'<td aling="center">'.$reg['precio']."</td>
	  <td><form action='ctrlmat.php' method='post'>
	  <input type='submit' value='Modificar'>
	  <input type='hidden' name='opc' value='2'>
	  <input type='hidden' name='idmaterial' value=".$reg['idmaterial'].">
	  </form></td>    
	  <td aling='center'>
	  <form action='ctrlmat.php' method='post'>
	  <input type='submit' value='Consultar'>
	  <input type='hidden' name='opc' value='3'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idmaterial' value=".$reg['idmaterial'].">
	  </form></td>	
	  <td aling='center'>
	  <form action='ctrlmat.php' method='post'>
	  <input type='submit' value='Borrar'>
	  <input type='hidden' name='opc' value='4'>
	  <input type='hidden' name='opcion' value='1'>
	  <input type='hidden' name='idmaterial' value=".$reg['idmaterial'].">
	  </form></td>
	  </tr>";
  }
  echo'</tbody></table>';
  echo'</div>';
  
   }  
   
	 public function consultarMat($idmaterial){
	  $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
	  
	 $registro=mysqli_query($con,"select idmaterial,material,precio from material where idmaterial='$idmaterial'")or die(mysqli_error($con));
	 echo "<br>";
	 echo "<br>";
	 echo "<b><H3>CONSULTA DE MATERIAL</H3></b>";
	 echo "<br>";
	 echo "<hr/>";
	  if($reg=mysqli_fetch_array($registro)){
		  echo "ID Material: ".$reg['idmaterial']."<br>";		  
		  echo "Material: ".$reg['material']."<br>";
		  echo "Precio: ".$reg['precio']."<br>";

  }else{
	  echo "Este Material no existe";
  }
}
public function borrarMat($idmaterial){
    $con = mysqli_connect("localhost","root","","flashpack") or die("Existen Problemas con la Base de Datos");
    
    $registro=mysqli_query($con,"select idmaterial,material,precio
     from material where idmaterial='$idmaterial'")or die(mysqli_error($con));
     echo "<br>";
    echo "<br>";
    echo "<b><H3>CONSULTA DE MATERIAL ELIMINADO</H3></b>";
    echo "<br>";
    echo "<hr/>";
     if($reg=mysqli_fetch_array($registro)){
        echo "ID Material: ".$reg['idmaterial']."<br>";		  
        echo "Material: ".$reg['material']."<br>";
		echo "Precio: ".$reg['precio']."<br>";
         
         mysqli_query($con,"delete from material where idmaterial='$idmaterial'")or die(mysqli_error($con));
         echo '<br>Se efectuo el borrado del Material:'.$reg['material'];  	  
 }
 }


  public function modificarMat($idmaterial){
	$registro=mysqli_query($this->conexion(),"select * from material where idmaterial='$idmaterial'")
	or die(mysqli_error($this -> conexion()));
	if($reg=Mysqli_fetch_array($registro)){
	echo '<form action="modiMat2.php" method="POST">';
	   echo '<table>';
	   echo '<tr>';
	    echo '<td>ID:</td>';
   		echo '<td>';
   		echo '<input type="hiden" name="idmaterial" value="'.$reg['idmaterial'].'">';
   		echo '</td>';
   		echo '</tr>';

	   echo '<tr>';
	   echo '<td>Material:</td>';
	   echo '<td>';
	   echo '<input type="text" name="material" value="'.$reg['material'].'">';
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
	public function modificarMat2($idmaterial, $material, $precio){
		$registro=mysqli_query($this->conexion(),"UPDATE material set  idmaterial='$idmaterial', material='$material', precio='$precio' where idmaterial='$idmaterial'")
		or die("Error al modificar ".mysqli_error($this->conexion()));
		echo "<br>";
		echo "<br>";
		echo "<b><H3>MATERIAL MODIFICADO</H3></b>";
		echo "<br>";
		echo "<hr/>";
		$registro=mysqli_query($this->conexion(),"select idmaterial, material, precio from material where idmaterial='$idmaterial'")
		or die(mysqli_error($this->conexion()));
		if($reg=mysqli_fetch_array($registro)){
            echo "ID Material: ".$reg['idmaterial']."<br>";		  
            echo "Material: ".$reg['material']."<br>";
			echo "Precio: ".$reg['precio']."<br>";
		}
		}

	  public function LlenarListaMat(){
	  $registros=mysqli_query($this->conexion(),"SELECT * FROM material") or die ("Problemas en el select".mysqli_error($this->conexion()));
	  
	  while ($reg=mysqli_fetch_array($registros)) {
		echo "<option value='$reg[0]'>$reg[1]</option>";
	  }
	}

	public function desconectar(){
		mysqli_close($this->conexion());
	 }
   }
   ?>