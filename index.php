<?php
$tamanoMatriz;
$matriz;
$filas;
$columnas;
if (isset($_REQUEST['columnas'])) {
    $columnas = $_REQUEST['columnas'];
}
if (isset($_REQUEST['filas'])) {
    $filas = $_REQUEST['filas'];
}




?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>FOC</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">

<body>
    <!-- Nav bar -->
    <!--<nav class="navbar navbar-default" id="header-navbar">-->

    <div class="navbar-header">
        <a class="navbar-brand">

             </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <!--	</nav>-->
    <!-- /Nav bar -->

    <!-- Content -->
    <div class="container">

    </div>

    </div>
    <div class="col-xs-12 col-sm-8">
        <div class="panel panel-success">
            <div class="panel-heading">-----------------/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/**/************************METODO DEL HUNGARO********************************/*/*/*/*/*/*/*/*/**/*------------</div>
            <div class="panel-body">


                <!-- Mostrar matriz -->
                <form action="" method="post">
                    <input type="hidden" name="tamanoMatriz" value="<?= $tamanoMatriz; ?>" />
                    <!-- <h4>Cargar la tabla de costos</h4> -->
                    <!-- <p>Actualizar la cantidad de variables de la tabla de costos<br /></p> -->
                    <div class="input-group input-group-sm col-xs-offset-4 col-xs-4">
                        <input type="number" name="filas" value="" min="3" max="20" class="form-control">
                        <input type="number" name="columnas" value="" min="3" max="20" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></button>
                        </span>
                    </div>
                </form>
                <br />
                <form action="actualizarMatriz.php">
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th width="50" class="success text-center">-</th>
                                    <?php for ($i = 1; $i <= $columnas; $i++) : ?>
                                        <th class="success text-center">x<?= $i ?></th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i <= $filas; $i++) : ?>
                                    <tr>
                                        <th class="success text-center">y<?= $i ?></th>
                                        <?php for ($j = 1; $j <= $columnas; $j++) : ?>
                                            <td>
                                                <input name="matriz[<?= ($i - 1) ?>][<?= ($j - 1) ?>]" class="form-control input-sm" type="number">
                                            </td>
                                        <?php endfor; ?>
                                    </tr>
                                <?php endfor; ?>
                            <tbody>
                        </table>
                    </div>

                    <div class="input-group input-group-sm col-xs-offset-4 col-xs-4">
                        <button type="submit" class="btn btn-success btn-block" name="botonProcesarMatriz">Procesar matriz</button>
                    </div>
                </form>

                <br />

                <div id="resultadoProcesarMatriz">
                    <?php
                    if ($resultadoProcesarMatriz) {
                        require('procesarMatriz.php');
                    }
                    ?>
                </div>
                <!-- Mostrar matriz -->
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- /Content -->

    <!-- jQuery 2.1.4 -->
    <script src="resources/js/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="resources/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#botonProcesarMatriz').click(function() {
            $('#resultadoProcesarMatriz').load('procesarMatriz.php');
        });
    </script>

</body>

</html>