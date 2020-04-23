<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceso</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <?php 
            require $_SERVER['DOCUMENT_ROOT'].'/utils/database/conexionDB.php';
            require $_SERVER['DOCUMENT_ROOT'].'/utils/session/sesion.php';
            require $_SERVER['DOCUMENT_ROOT'].'/utils/views/navegador.php';
        ?>
        <br>
        <div class="container">
            <?php
                //iniciarSesion("1","Ariel Andrade","token120941");
                if(isset($_SESSION['id_usuario'])){
                    header("Location:/index.php");
                }

                if(isset($_POST['acceder'])){
                    if(isset($_SESSION['id_usuario'])){
                        //header("Location:/index.php");
                    }else{
                        if(isset($_POST['correo']) && isset($_POST['contrasena'])){
                            $textQueryBody = "SELECT * FROM usuarios where correo = '".$_POST['correo']."' LIMIT 1";

                            $sqlBody = mysqli_query($con, $textQueryBody);
                            $have_rows = mysqli_num_rows($sqlBody);
                            
                            if($have_rows == 0){
                                $error = 'Usuario inexistente';
                            }else{
                                while($rowB = mysqli_fetch_assoc($sqlBody)){
                                    if($rowB['contrasena']==$_POST['contrasena']){
                                        if($rowB['estatus']!="Bloqueado"){
                                            iniciarSesion($rowB['idUsuario'],$rowB['nombre'],$rowB['rol'],$rowB['estatus'],$rowB['idRestaurante']);
                                            //header("Location:/");
                                        }else{
                                            $error = 'Usuario bloqueado, ponte en contacto con el administrador para mas información';
                                        }
                                    }else{
                                        $error = 'Contraseña incorrecta';
                                    }
                                }
                            }
                            
                            echo '<div class="alert alert-danger" role="alert">"Error : '.$error.'"
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                        }
                    }
                }
            ?>

        </div>
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    <h3 class="jumbotron-heading text-muted">Acceso</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <br>
                        <div class="form-row">
                            <div class="col-md-12 mb-12">
                                <label class="lead">Correo:</label>
                                <input type="text" class="form-control" name="correo" require>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12 mb-12">
                                <label class="lead">Contraseña:</label>
                                <input type="password" class="form-control" name="contrasena" require>
                            </div>
                        </div>
                        <br>
                        <p class="lead text-muted">No tienes una cuenta? <a href="/acceso/registro.php">crea una ahora</a></p>
                        <br>
                        <button class="btn btn-success btn-block" type="submit" name="acceder">Acceder</button>
                    </form>
                </div>
            </div>
        </div>
        
    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</html>