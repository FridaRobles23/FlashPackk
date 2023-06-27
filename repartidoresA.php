<?php include 'Headers/header.php' ?>
   
<!-- Section: Design Block -->
<div class="container">
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: url('../img/F1.jpg');
        height: 150px;"></div>
         <!-- Background image -->

         <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
	<form action="ctrlRep.php" method="post">
        <h2>Alta Repartidor</h2>
        <div class="form-outline mb-4"><input class="controls" type="text" name="nombre" placeholder="Ingrese Nombre" required><br></div>
        <div class="form-outline mb-4"><input class="controls" type="number" name="telefono" placeholder="Ingrese Telefono" required><br></div>
        <div class="form-outline mb-4"><input class="controls" type="mail" name="email" placeholder="Ingrese Email" required><br></div>
        <div class="form-outline mb-4"><input class="controls" type="password" name="password" placeholder="Ingrese Contraseña" required><br></div>
        Vehiculo:
			<select name="idVehiculo" required>
			<?php
			include ("vehiculos.php");
			$d=new vehiculos();
			$d->conexion();
			$d->LlenarListaVeh();
			$d->desconectar();
			?>
			</select>
        Celular:
			<select name="idCel" required>
			<?php
			include ("celulares.php");
			$d=new celulares();
			$d->conexion();
			$d->LlenarListaCel();
			$d->desconectar();
			?>
			</select>
			<br>
			<input type='hidden' name='opc' value='1'>
			<input class="btn btn-primary btn-block mb-4" type="submit" name="Registrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</center>
    
    <?php include 'Headers/footer.php' ?>