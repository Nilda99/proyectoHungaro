<?php
    //  Arrancar la session para guardar los datos
    session_start();

    //  Se comprueba si existe alguna error para mostrarlo en la vista
    $error = (isset($_GET['error']) ? $_GET['error'] : false);
    $nombreError = '';

    

    $tamanoMatriz = (isset($_SESSION['tamanoMatriz']) ? (int)$_SESSION['tamanoMatriz'] : 3);
    $matriz = (isset($_SESSION['matriz']) ? $_SESSION['matriz'] : array(array(1, 4, 6, 3), array(9, 7, 10, 9), array(4, 5, 11, 7), array(8, 7, 8, 5)));
    $tab = (isset($_SESSION['tab']) ? (int)$_SESSION['tab'] : 1);
    $resultadoProcesarMatriz = (isset($_GET['resultadoProcesarMatriz']) ? (int)$_GET['resultadoProcesarMatriz'] : 0);
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
                        <i></i>
                        El método húngaro</a>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">Tabla de costos</div>
                        <div class="panel-body">
                            <p>El tamaño de la matriz es de <b><?=$tamanoMatriz;?></b></p>

                            <!-- Mostrar matriz -->
                            <form action="actualizarMatriz.php">
                                <input type="hidden" name="tamanoMatriz" value="<?=$tamanoMatriz;?>"/>

                                <h4>Cargar la tabla de costos</h4>
                                <p>Actualizar la cantidad de variables de la tabla de costos<br/></p>
                                <div class="input-group input-group-sm col-xs-offset-4 col-xs-4">
                                    <input type="number" name="tamanoMatrizActualizado" value="<?=(int)$tamanoMatriz;?>" min="3" max="20" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></button>
                                    </span>
                                </div>
                                <br/>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-condensed table-hover">
                                        <thead>
                                            <tr>
                                                <th width="50" class="success text-center">-</th>
                                                <?php  for ($i = 1; $i <= $tamanoMatriz; $i++) : ?>
                                                    <th class="success text-center">x<?=$i?></th>
                                                <?php endfor; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i <= $tamanoMatriz; $i++) : ?>
                                            <tr>
                                                <th class="success text-center">y<?=$i?></th>
                                                <?php  for ($j = 1; $j <= $tamanoMatriz; $j++) : ?>
                                                    <td>
                                                        <input required name="matriz[<?=($i -1)?>][<?=($j - 1)?>]" class="form-control input-sm" type="number" value="<?=(int)$matriz[($i - 1)][($j - 1)]?>">
                                                    </td>
                                                <?php endfor; ?>
                                            </tr>
                                            <?php endfor; ?>
                                        <tbody>
                                    </table>
                                </div>

                                <div class="input-group input-group-sm col-xs-offset-4 col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block" name="botonProcesarMatriz">Procesar matriz</button>
                                </div>
                            </form>

                            <br/>

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
        $('#botonProcesarMatriz').click(function () {
            $('#resultadoProcesarMatriz').load('procesarMatriz.php');
        });
    </script>

	</body>
</html>
