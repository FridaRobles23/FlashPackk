<?php include 'Headers/header.php' ?>


<!-- Section: Design Block -->
<div class="container">
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: urlrl('../img/F1.jpg');
        height: 150px;
        "></div>
         <!-- Background image -->

         <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Iniciar Sesión</h2>

                        <form action="sesionEx.php" method="POST">

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" name="email" class="form-control" />
                                <label class="form-label" for="form3Example3">Correo</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="password" class="form-control" />
                                <label class="form-label" for="form3Example4">Contraseña</label>
                            </div>

                            <!-- Checkbox -->


                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Iniciar Sesión</button>
                            <p><a href="loginA.php">Iniciar sesión como Administrador?</a></p>
                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>o regístrate!</p>
                                <a class="btn btn-primary" href="registrar.php"> Registrar!</a>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</div>

<!-- Section: Design Block -->


