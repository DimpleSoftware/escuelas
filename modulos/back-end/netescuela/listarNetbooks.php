<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administradores de Redes</title>
<?php include_once("../headerAdmin.php");
?>

<?php 	
	
	#Paginaci�n	
	$limit=25;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	#incluyo clases
	include_once($docRootSitio."modelo/Netbook.php");			
	include_once($docRootSitio."modelo/Marca.php");
	
	#nuevo objeto
	$net1 = new Netbook();				
	$mar1 = new Marca();

	$_netbooks = $net1->listarNetbooks($offset,$limit,$campoOrder,$order);	
	
	#getCantRegistros
	$cantRegistros = $net1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);
 	
?>
        <!-- Bootstrap Core CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $httpHostSitio?>plantilla/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Administradores de Redes</a>
            </div>
          
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <!--Menu----------->
          <!--Menu----------->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menu.php");?>    
                            </div>
            <!--Fin Menu----------------->
            <!-- /.navbar-collapse -->
            <!--Fin Menu----------------->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

         </div>
            <!-- /.container-fluid ------------------------------------------------------------------------------------------------------>

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Remanente Netbooks
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Netbooks
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

	
	                    <button type="button" class="btn btn-primary" onclick="window.open('<?php echo $httpHostSitio?>modulos/back-end/migraciones/migracionTransferirAlumno.php')" href=<?php echo $httpHostSitio?>modulos/back-end/netescuela/listarNetbooks.php>Remanente Netbook</button>
	                    <button type="button" class="btn btn-success">Prestamos Netbook</button> 	                    
	                     <button type="button" class="btn btn-warning">Marcas</button>
	
	  <table class="table table-bordered table-hover table-striped">
          
                                        <thead>
                                            <tr>
                                                <th>Numero De Serie</th>
                                               <th>Curso</th>
                                               <th>Marca De La Netbook</th>
                                               <th>Accion</th>

                                            </tr>
                                        </thead>
                                        <tbody>
          	<?php for($i=1;$i<=count($_netbooks);$i++){	
          		$_marca = $mar1->listarMarca($_netbooks[$i]['MarcaNetbook']);
								
			?>                              
			
		
                                            <tr>
                                                <td><?php echo $_netbooks[$i]['numSerie']?></td>
                                                <td><?php echo $_netbooks[$i]['curso']?></td>
                                                <td><?php echo $_marca['nombre']?></td>
                                                
                <td>     
                                           	
						<form method="post" action="modificarNetbook.php">
							<input type="hidden" name="Netbook" value="<?php echo $_netbooks[$i]['id']?>">
							<input type="submit" class="btn btn-default"" value="Editar">
						</form>
					
				
				
					<form method="post" action="eliminarNetbook.php">
						<input type="hidden" name="Netbook" value="<?php echo $_netbooks[$i]['id']?>">
						<input type="submit" value="Eliminar" class="btn btn-primary"
						onclick="return confirm('Est seguro que desea eliminar la escuela <?php echo $_netbooks[$i]['cueEscuela']?>?');">
					</form>
				</td>
				
                                            </tr>

            
                                        </tbody>
            
            <?php }?>
                                    </table>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
        </div><!-- Fin container-fluid ------------------------------------------------------------------------------------------------------>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
