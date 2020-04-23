<br>
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 25rem;">
        <div class="card-header">
            <h3>
                <?php 
                    if(isset($error_parametrizable_title)){
                        echo $error_parametrizable_title;
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
                        if(isset($error_parametrizable_msg)){
                            echo $error_parametrizable_msg;
                        }else{
                            echo "Error en el aplicativo";
                        }
                    ?>
                </p>
                <br>
                <a class="btn btn-success btn-sm" href="/"></a>
            </form>
        </div>
    </div>
</div>