<br>
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 25rem;">
        <div class="card-header">
            <h3>
                <?php 
                    if(isset($error_parametrizable_titu)){
                        echo $error_parametrizable_titu;
                    }else{
                        echo "Error";
                    }
                ?>
            </h3>
        </div>
        <div class="card-body">
            <form>
                <p class="lead text-muted">
                    <?php 
                        if(isset($error_parametrizable_mens)){
                            echo $error_parametrizable_mens;
                        }else{
                            echo "Error en el aplicativo";
                        }
                    ?>
                </p>
                <br>
                <a class="btn btn-success btn-sm" href="<?php echo isset($error_parametrizable_enlc)?$error_parametrizable_enlc:"/";?>"><?php echo isset($error_parametrizable_botn)?$error_parametrizable_botn:"ir al inicio";?></a>
            </form>
        </div>
    </div>
</div>