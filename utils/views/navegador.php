<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="/">Octopus</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php 
            if(isset($_SESSION['id_usuario'])){ 
                if(isset($_SESSION['estatus_usuario']) && $_SESSION['estatus_usuario']=="Activo"){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Órdenes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/orden/seleccion.php">Crear orden</a>
                        <!--a class="dropdown-item" href="/orden/miRestaurante.php">de mi restaurante</a-->
                    </div>
                </li>
                <!--li class="nav-item">
                    <a class="nav-link disabled" href="/acceso/conexion.php">Estatus</a>
                </li-->
            <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/acceso/conexion.php">Estatus "<b><?php echo $_SESSION['estatus_usuario'];?></b>"</a>
                </li>
            <?php }
            } ?>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">

                <?php if(isset($_SESSION['correo_usuario'])){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['correo_usuario'];?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <!--a class="dropdown-item" href="/ordenes/admin/main.php">Admin</a>

                            <a class="dropdown-item" href="/ordenes/misRestaurantes.php">Mis restaurantes</a>

                            <a class="dropdown-item" href="/ordenes/misOrdenes.php">Mis órdenes</a>
                            <div class="dropdown-divider"></div-->

                            <a class="dropdown-item" href="/acceso/desconexion.php">Cerrar sesión</a>
                        </div>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/acceso/conexion.php">Acceso</a>
                    </li>
                    <!--li class="nav-item">
                        <a class="nav-link" href="/acceso/registro.php">Registro</a>
                    </li-->
                <?php } ?>
            </ul>
        </form>
    </div>
</nav>