<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administradores de Redes</title>
<?php 	include_once("../headerAdmin.php");


include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");
include_once($docRootSitio."modelo/Alumno.php");
include_once($docRootSitio."modelo/Marca.php");
include_once($docRootSitio."modelo/Curso.php");
include_once($docRootSitio."modelo/Turno.php");
include_once($docRootSitio."modelo/Tecnico.php");
include_once($docRootSitio."modelo/Prestamo.php");
include_once($docRootSitio."modelo/DatosEscuela.php");
	
	$alu1 = new Alumno();
	$escuela = new DatosEscuela();
	$cur1 = new Curso();
	$_escuelas = $escuela->listarDatosEscuelas($offset,$limit,$campoOrder,$order);	
	
	$_cursos = $cur1->listarCursos();
	
	#Curso
	if($_POST['curso']){
		$_curso = $cur1->listarCurso($_POST['curso']);
	}
	else{
		$_curso['nombre'] = "Elija Un Curso Para El Alumno";
	}
	
	#Escuela
	if($_POST['nombreEscuela']){
	  	$_escuelas = $escuela->listarDatosEscuela($_POST['nombreEscuela']);
	}
	else{
		$_escuelas['nombre'] = "Elija una Escuela";
	}
	
?>

<?php /*	if($_POST["bandera"]){			
		
	//	$mensaje = $alu1->validarAlumno($_POST);
		
		if(!$mensaje){						
			//$alu1->agregarAlumno();		
		//	header("location: listarAlumnos.php?insert=1"); 	
			exit();		
		}		
	}	*/	
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
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo $httpHostSitio?>index.php"><i class="fa fa-fw fa-dashboard"></i> General</a>
                    </li>
                      <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/listarDatosEscuelas.php"><i class="fa fa-fw fa-edit"></i> Datos Escuela</a>
                    </li>
                  
                    <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php"><i class="fa fa-fw fa-bar-chart-o"></i>Alumnos</a>
                    </li>
                    
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Consultas</a>
                    </li>
                    <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/migraciones/formActas.php"><i class="fa fa-fw fa-edit"></i> Formularios y Actas</a>
                    </li>
                    <li>
                        <a href="<?php echo $httpHostSitio?>modulos/back-end/marcas/listarMarcaNetbooks.php"><i class="fa fa-fw fa-desktop"></i>Netbook</a>
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

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Migracion Alumno
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Migraciones
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
         
           <p>
	
	                  
	                   <button type="button" class="btn btn-primary" onclick="window.open('<?php echo $httpHostSitio?>modulos/back-end/migraciones/migracionTransferirAlumno.php')" >  Acta Migracion</button>
	                    <button type="button" class="btn btn-success" onclick="window.open('<?php echo $httpHostSitio?>modulos/back-end/migraciones/generarEnmienda.php')" >Enmienda Migracion</button> 	                    
	                     <button type="button" class="btn btn-warning">Comodatos</button>
	                    <button type="button" class="btn btn-danger">Cesion Definitiva</button>
	
	                    
	                </p>
         	<form  action="<?php echo $httpHostSitio?>modulos/back-end/migraciones/formMigracionTransferir.php" method="post" enctype="multipart/form-data" target="_blank">
         
         <div class="form-group">
                                <label>Escuela Origen</label>

                                <select class="form-control" name="datosEscuela">
                                   <option selected value="<?php echo $_escuelas['id']?>"><?php echo $_escuelas['nombreEscuela']?></option>
					<?php for($i=1;$i<=count($_escuelas);$i++){?>
						<option value="<?php echo $_escuelas[$i]['id']?>"><?php echo $_escuelas[$i]['nombreEscuela']?></option>
					<?php }?>

                                </select>
                            </div>
         
         <div class="form-group">
        <label>Cuil Alumno:*</label><input class="form-control"  name="cuilAlumno" value="<?php echo $_POST['cuilAlumno']?>">
        </div>
       
		    <button type="submit" class="btn btn-default" >Generar</button>
       
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
