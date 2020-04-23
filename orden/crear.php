<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/utils/database/conexionDB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/utils/session/sesion.php';
    $id = 0;
    $textQueryBody = 'SELECT * FROM recursos where idPlantilla = '.$id.' ORDER BY tipo';
    $sqlBody = mysqli_query($con, $textQueryBody);
    $have_rows = mysqli_num_rows($sqlBody);
    $rows = [];
    while($rowB = mysqli_fetch_assoc($sqlBody)){
        array_push($rows,$rowB);
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nueva orden</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

        <link data-require="fontawesome@*" data-semver="4.5.0" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css" />

        <?php
            foreach($rows as $row){
                if($row["tipo"]=="script"){
        ?>
        <script src="<?php echo $row["recurso"]?>"></script>          
        <?php 
                }
            }   
        ?>
    </head>

    <body>
        <?php
            require $_SERVER['DOCUMENT_ROOT'].'/utils/views/navegador.php';
            foreach($rows as $row){
                if($row["tipo"]=="post"){
                    require $_SERVER['DOCUMENT_ROOT'].$row["recurso"];
                }
            }  
        ?>
        <?php
            foreach($rows as $row){
                if($row["tipo"]=="body"){
                    require $_SERVER['DOCUMENT_ROOT'].$row["recurso"];
                }
            }   
        ?>
    </body>

    <!--script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</html>