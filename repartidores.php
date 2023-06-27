<?php
class repartidores
{
	private $nombre;
	private $telefono;
	private $email;
	private $password;
	private $idVehiculo;
	private $idCel;


	public function inicializar($nombre, $telefono, $email, $password, $idVehiculo, $idCel)
	{
		$this->nombre = $nombre;
		$this->telefono = $telefono;
		$this->email = $email;
		$this->password = $password;
		$this->idVehiculo = $idVehiculo;
		$this->idCel = $idCel;
	}

	public function conexion()
	{
		$con = mysqli_connect("localhost", "root", "", "flashpack") or die("Existen Problemas con la Base de Datos");
		return $con;
	}

	public function insertarRep()
	{
		$registro = mysqli_query($this->conexion(), "select nombre,telefono,email,password,idVehiculo,idCel
		  from repartidores where email='$this->email'") or die("problemas en el select: " . mysqli_error($this->conexion()));
		if ($reg = mysqli_fetch_array($registro)) {
			echo "El Repartidor ya existe.";
		} else {
			mysqli_query($this->conexion(), "insert into repartidores(nombre,telefono,email,password,idVehiculo,idCel) values ('$this->nombre','$this->telefono','$this->email','$this->password','$this->idVehiculo','$this->idCel')")
				or die("problemas en el insert" . mysqli_error($this->conexion()));
			echo "Repartidor registrado.";
		}
	}


	public function listarRep()
	{
		$registros = mysqli_query($this->conexion(), "select * from repartidores") or die(mysqli_error($this->conexion()));
		echo '<center>';
		echo '<h2> REPARTIDORES</h2><br>';
		echo '<table  border=2>
		<tr><td>
		<form action="repartidoresA.php" method="post">
		<input type="submit" value="Agregar">
		<input type="hidden" name="opc" value="1">
		</form></td>
		</tr>
		</table>';
		echo '<div class="table-responsive">';
		echo '<table id="tablaR" class="color table" border="3">';
		echo '<thead class="thead-dark"><tr><th>ID Repartidor</th><th>Nombre</th><th>Teléfono</th><th>E-mail</th><th>Password</th><th>ID Vehículo</th><th>ID Celular</th><th>Modificar</th><th>Borrar</th><th>Consultar</th></tr></thead>';
		echo '<tbody>';

		while ($reg = mysqli_fetch_array($registros)) {
			echo '<tr><td align="center">' . $reg['idRepartidor'] . '</td>';
			echo '<td align="center">' . $reg['nombre'] . '</td>';
			echo '<td align="center">' . $reg['telefono'] . '</td>';
			echo '<td align="center">' . $reg['email'] . '</td>';
			echo '<td align="center">' . $reg['password'] . '</td>';
			echo '<td align="center">' . $reg['idVehiculo'] . '</td>';
			echo '<td align="center">' . $reg['idCel'] . '</td>';
			echo '<td align="center">
        <form action="ctrlRep.php" method="post">
            <input type="submit" value="Modificar">
            <input type="hidden" name="opc" value="2">
            <input type="hidden" name="opcion" value="1">
            <input type="hidden" name="idRepartidor" value="' . $reg['idRepartidor'] . '">
        </form>
    </td>';
			echo '<td align="center">
        <form action="ctrlRep.php" method="post">
            <input type="submit" value="Borrar">
            <input type="hidden" name="opc" value="4">
            <input type="hidden" name="opcion" value="1">
            <input type="hidden" name="idRepartidor" value="' . $reg['idRepartidor'] . '">
        </form>
    </td>';
			echo '<td align="center">
        <form action="ctrlRep.php" method="post">
            <input type="submit" value="Consultar">
            <input type="hidden" name="opc" value="3">
            <input type="hidden" name="opcion" value="1">
            <input type="hidden" name="idRepartidor" value="' . $reg['idRepartidor'] . '">
        </form>
    </td>';
			echo '</tr>';
		}

		echo '</tbody></table>';

		echo '</div>';
	}
	public function consultarRep($idRepartidor)
	{
		$con = mysqli_connect("localhost", "root", "", "flashpack") or die("Existen Problemas con la Base de Datos");

		$registro = mysqli_query($con, "select idRepartidor,nombre,telefono,email,password,idVehiculo,idCel from repartidores where idRepartidor='$idRepartidor'") or die(mysqli_error($con));
		echo "<br>";
		echo "<br>";
		echo "<b><H3>CONSULTA DE REPARTIDOR</H3></b>";
		echo "<br>";
		echo "<hr/>";
		if ($reg = mysqli_fetch_array($registro)) {
			echo "ID Repartidor:" . $reg['idRepartidor'] . "<br>";
			echo "Nombre:" . $reg['nombre'] . "<br>";
			echo "Telefono:" . $reg['telefono'] . "<br>";
			echo "Email:" . $reg['email'] . "<br>";
			echo "Password:" . $reg['password'] . "<br>";
			echo "ID Vehiculo:" . $reg['idVehiculo'] . "<br>";
			echo "ID Celular:" . $reg['idCel'] . "<br>";
		} else {
			echo "Este Repartidor no existe";
		}
	}
	public function borrarRep($idRepartidor)
	{
		$con = mysqli_connect("localhost", "root", "", "flashpack") or die("Existen Problemas con la Base de Datos");

		$registro = mysqli_query($con, "select idRepartidor,nombre,telefono,email,password,idVehiculo,idCel
	  from repartidores where idRepartidor='$idRepartidor'") or die(mysqli_error($con));
	  echo "<br>";
	  echo "<br>";
	  echo "<b><H3>CONSULTA DE REPARTIDOR ELIMINADO</H3></b>";
	  echo "<br>";
	  echo "<hr/>";
		if ($reg = mysqli_fetch_array($registro)) {
			echo "ID Repartidor:" . $reg['idRepartidor'] . "<br>";
			echo "Nombre:" . $reg['nombre'] . "<br>";
			echo "Telefono:" . $reg['telefono'] . "<br>";
			echo "Email:" . $reg['email'] . "<br>";
			echo "Password:" . $reg['password'] . "<br>";
			echo "ID Vehiculo:" . $reg['idVehiculo'] . "<br>";
			echo "ID Celular:" . $reg['idCel'] . "<br>";


			mysqli_query($con, "delete from repartidores where idRepartidor='$idRepartidor'") or die(mysqli_error($con));
			echo '<br>Se efectuo el borrado del Repartidor:' . $reg['nombre'];
		}
	}
	public function LlenarListaRep(){
		$registros = mysqli_query($this->conexion(), "SELECT * FROM repartidores") or die("Problemas en el select repartidor" . mysqli_error($this->conexion()));
		while ($reg = mysqli_fetch_array($registros)) {
			echo "<option value='$reg[0]'>$reg[1]</option>";
		}
	}



	public function modificarRep($idRepartidor)
	{
		$registro = mysqli_query($this->conexion(), "select * from repartidores where idRepartidor='$idRepartidor'")
			or die(mysqli_error($this->conexion()));
		if ($reg = Mysqli_fetch_array($registro)) {
			echo '<div class="table-responsive">';
			echo '<form action="modiRep2.php" method="POST">';
			echo '<table class="color">';
			echo '<td>ID Repartidor :</td>';
			echo '<td>';
			echo '<input type="text" name="idRepartidor" value="' . $reg['idRepartidor'] . '">';
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Nombre:</td>';
			echo '<td>';
			echo '<input type="text" name="nombre" value="' . $reg['nombre'] . '">';
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Telefono :</td>';
			echo '<td>';
			echo '<input type="number" name="telefono" value="' . $reg['telefono'] . '">';
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>E-mail :</td>';
			echo '<td>';
			echo '<input type="mail" name="email" value="' . $reg['email'] . '">';
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Password :</td>';
			echo '<td>';
			echo '<input type="password" name="password" value="' . $reg['password'] . '">';
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>ID Vehiculo: </td>';
			echo '<td><select name="idVehiculo">';
			include 'vehiculos.php';
			$a = new vehiculos();
			$a->LlenarListaVeh();
			echo '</td></select>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>ID Celular: </td>';
			echo '<td><select name="idCel">';
			include 'celulares.php';
			$a = new celulares();
			$a->LlenarListaCel();
			echo '</td></select>';
			echo '</tr>';
			echo '<tr>';
			echo '<td><input type="submit" name="operar" value="Modificar"></td>';
			echo '</tr>';
			echo '</table>';
			echo '</form>';
			echo '</div>';
		} else {
			echo "No existe registro";
		}
	}
	public function modificarRep2($idRepartidor, $nombre, $telefono, $email, $password, $idVehiculo, $idCel)
	{
		$registro = mysqli_query($this->conexion(), "UPDATE repartidores set idRepartidor='$idRepartidor', nombre='$nombre',telefono='$telefono',email='$email',password='$password',idVehiculo='$idVehiculo',idCel='$idCel' where idRepartidor='$idRepartidor'")
			or die("Error al modificar " . mysqli_error($this->conexion()));
		echo "<h3>REPARTIDOR MODIFICADO</h3>";
		echo "<br>";
		echo "<hr/>";
		$registro = mysqli_query($this->conexion(), "select a.idRepartidor,a.nombre,a.telefono,a.email,a.password,c.idVehiculo, c.idCel from repartidores a inner join vehiculos c on a.idVehiculo=c.idVehiculo a inner join celulares a.idCel=c.idCel and idRepartidor='$idRepartidor'")
			or die(mysqli_error($this->conexion()));
		if ($reg = mysqli_fetch_array($registro)) {
			echo "ID Repartidor:" . $reg['idRepartidor'] . "<br>";
			echo "Nombre:" . $reg['nombre'] . "<br>";
			echo "Telefono:" . $reg['telefono'] . "<br>";
			echo "Email:" . $reg['email'] . "<br>";
			echo "Password:" . $reg['password'] . "<br>";
			echo "ID Vehiculo:" . $reg['idVehiculo'] . "<br>";
			echo "ID Celular:" . $reg['idCel'] . "<br>";
		}
	}

	public function desconectar()
	{
		mysqli_close($this->conexion());
	}
}
