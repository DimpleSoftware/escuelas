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

//	if($_SESSION['Rol']!=1){
	//	echo "<h2>No tienes permisos para ingresar a esta pagina.<h2>";
		//exit();	
	//}
?>

<?php 	
	
	#Paginacion	
	$limit=25;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$campoOrder = "nombreEscuela";
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	#incluyo clases
	include_once($docRootSitio."modelo/DatosEscuela.php");		
	include_once($docRootSitio."modelo/Fecha.php");	
	include_once($docRootSitio."modelo/Rol.php");	
		
	#nuevo objeto
	$datoesc = new DatosEscuela();			
	$fe1 = new Fecha();	
	$rol1 = new Rol();	
		
	$_datos = $datoesc->listarDatosEscuelas($offset,$limit,$campoOrder,$order);	
	
	#getCantMenu
	$cantRegistros = $datoesc->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit); 	
			
?>

<div id="container" >
	<div id="main" >				
	
			
		
	<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>Los datos se agregaron exitosamente.</h4>
		<?php }?>
		
		<?php if($_GET['delete']==1){?>
			<h4>Los datos se eliminaron de la Base de Datos.</h4>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<h4>La escuela se modifico exitosamente.</h4>
		<?php }?>
	</div>
	
	
	
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
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menu.php");?>    
                            </div>
            <!--Fin Menu----------------->
            <!-- /.navbar-collapse -->
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
                            Datos Escuelas
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Datos Escuela
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
           <p>
	
	                  
	                    <button type="button" class="btn btn-primary" onclick="window.open('<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/agregarDatosEscuelas.php')" >  Agregar Datos</button>
	                    
	                    
	                </p>
          

          
          
          <table class="table table-bordered table-hover table-striped">
          
                                        <thead>
                                            <tr>
                                                <th>Nombre Director</th>
                                               <th>Numero Escuela</th>
                                               <th>Nombre Escuela</th>
                                               <th>Direccion</th>
                                                <th>Accion</th>

                                            </tr>
                                        </thead>
                                        <tbody>
          	<?php for($i=1;$i<=count($_datos);$i++){	
								
			?>                              
			
		
                                            <tr>
                                                <td><?php echo $_datos[$i]['nombreDirector']?></td>
                                                <td><?php echo $_datos[$i]['numeroEscuela']?></td>
                                                <td><?php echo $_datos[$i]['nombreEscuela']?></td>
                                                <td><?php echo $_datos[$i]['domicilioEscuela']?></td>
                <td>     
                                           	
						<form method="post" action="modificarDatosEscuela.php">
							<input type="hidden" name="DatosEscuela" value="<?php echo $_datos[$i]['id']?>">
							<input type="submit" class="btn btn-default"" value="Editar">
						</form>
					
				
				
					<form method="post" action="eliminarDatosEscuela.php">
						<input type="hidden" name="DatosEscuela" value="<?php echo $_datos[$i]['id']?>">
						<input type="submit" value="Eliminar" class="btn btn-primary"
						onclick="return confirm('Est seguro que desea eliminar la escuela <?php echo $_datos[$i]['cueEscuela']?>?');">
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
