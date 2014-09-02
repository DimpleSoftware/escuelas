<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administradores de Redes</title>
<?php
	include_once("../headerAdmin.php");
	if($_POST["bandera"]){	

	include_once($docRootSitio."modelo/Tecnico.php");	
	
	$tec1 = new Tecnico();		

			$tec1->setNombreAlumno($_POST['nombre']);
			$tec1->setNumeroSerie($_POST['serie']);
			$tec1->setMarca($_POST['MarcaNetbook']);
			$tec1->setProblema($_POST['problema']);
			$tec1->setIdReclamo($_POST['reclamo']);	
			$tec1->setFecha(date("Y-m-d"));
			$tec1->setEstado($_POST['estado']);	
	
		$mensaje = $tec1->validarTecnico($_POST);
		
		if(!$mensaje){			
			$tec1->setNombreAlumno($_POST['nombre']);
			$tec1->setNumeroSerie($_POST['serie']);
			$tec1->setMarca($_POST['MarcaNetbook']);
			$tec1->setProblema($_POST['problema']);
			$tec1->setIdReclamo($_POST['reclamo']);	
			$tec1->setFecha(date("Y-m-d"));
			$tec1->setEstado($_POST['estado']);	
			
			$tec1->agregarTecnico();		
			header("location: listarTecnicos.php?insert=1"); 	
			exit();		
		}		
	}		
	//include_once($docRootSitio."utiles/ctrlAcceso.php");	
     //echo $httpHostSitio ;
?> 
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $httpHostSitio?>plantilla/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $httpHostSitio?>plantilla/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
		<script src="<?php echo $httpHostSitio?>js/nuevoAjax.js" type="text/javascript"></script>	
<script src="<?php echo $httpHostSitio?>js/tecnico.js" type="text/javascript"></script>	

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
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo $httpHostSitio?>index.php"><i class="fa fa-fw fa-dashboard"></i> General</a>
                    </li>
                      <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/listarDatosEscuelas.php"><i class="fa fa-fw fa-edit"></i> Datos Escuela</a>
                    </li>
                  
                    <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/formAlumnos.php"><i class="fa fa-fw fa-bar-chart-o"></i>Alumnos</a>
                    </li>
                    
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Consultas</a>
                    </li>
                    <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/migraciones/formActas.php"><i class="fa fa-fw fa-edit"></i> Formularios y Actas</a>
                    </li>
                    <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/marcas/netbooks.php"><i class="fa fa-fw fa-desktop"></i>Netbook</a>
                    </li>
                                     
                    <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/tecnico/listarTecnicos.php"><i class="fa fa-fw fa-wrench"></i>Servicio Tecnico</a>
                    </li>
               
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

         </div>
            <!-- /.container-fluid ------------------------------------------------------------------------------------------------------>
     <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Servicio Tecnico
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Servicio Tecnico
                            </li>
                        </ol>
                    </div>
                </div> 
		<p>
                 <button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/tecnico/agregarTecnico.php')" > Cargar Netbook Servicio Tecnico</button>
                 <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/tecnico/listarTecnicos.php')" >Listar Netbooks Servicio Tecnico</button> 	                    
        </p>				
	   <!-- /.row -->
		<form enctype="multipart/form-data" method="post" id="formAgregarTecnico" name="formAgregarTecnico">

		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--Numero De Serie-->
		<div id="algo"><label>Numero De Serie: *</label>
 <input type="text" style="height:35px;width:195px;" name="numSerie" value="<?php echo $_POST['']?>" /></div>
		<input type="hidden" style="height:20px;width:195px;" name="dire" value="<?php echo $httpHostSitio?>" />
					<div id="palabra">	<p>
						<button type="button" class="btn btn-primary" onclick="agregar('<?php echo $_POST['numSerie']?>'),oculta();" >Agregar</button>
	                </p></div>
		<div id="datos"></div>

	</form>	<br>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">Ver Detalles <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
         
         
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
