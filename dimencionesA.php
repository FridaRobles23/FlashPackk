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
	<form action="ctrldim.php" method="post">
        <h2>Alta  de Dimenciones</h2>
        <div class="form-outline mb-4"><input class="controls" type="text" name="dimenciones" placeholder="Ingrese dimenciones" required><br></div>
        <div class="form-outline mb-4"><input class="controls" type="number" step="0.01" name="precio" placeholder="Ingrese Precio" required><br></div>
			
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