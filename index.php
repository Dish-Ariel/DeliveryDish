<?php
    require "utils/database/conexionDB.php";
    require "utils/session/sesion.php";
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>

    <body>
        <?php
            require 'utils/views/navegador.php';
        ?>

        <main role="main">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="display-4">Octopus 1.0</h1>
                    <p class="lead text-muted">Herramienta creada por arquitectura para gestionar y realizar entrega de pedidos.</p>
                    <p>
                        <a class="btn btn-primary" href="/acceso/conexion.php">Acceso</a>
                        <a class="btn btn-primary" href="/acceso/registro.php">Registro</a>
                    </p>
                </div>
            </section>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="https://dummyimage.com/255x150/000/fff" alt="Imagen">
                                <div class="card-body">
                                    <p class="card-text">Atención al cliente.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">ir</button>
                                        </div>
                                        <small class="text-muted">activo</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="https://dummyimage.com/255x150/000/fff" alt="Imagen">
                                <div class="card-body">
                                    <p class="card-text">Manuales e instructivos.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">ver</button>
                                        </div>
                                        <small class="text-muted">08/01/2020</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="https://dummyimage.com/255x150/000/fff" alt="Imagen">
                                <div class="card-body">
                                    <p class="card-text">Contenido digital.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">ver</button>
                                        </div>
                                        <small class="text-muted">08/04/2020</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </main>
    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>