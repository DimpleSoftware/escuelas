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
	
	include_once($docRootSitio."modelo/Tecnico.php");	
	include_once($docRootSitio."modelo/EstadosTecnico.php");	

	$tec1 = new Tecnico();
	$est1 = new Estado();	
		
	$_tecnico = $tec1->listarTecnico($_POST['Tecnico']);
	$_estados = $est1->listarEstados();
	
	#Estado
	if($_POST['estado']){
		$_estado = $est1->listarEstados($_POST['estado']);
	}
	else{
		$_estado['nombre'] = "Elija un Estado";
	}

	#idTecnico
	if($_POST['idTecnico']){
		$idTecnico = $_POST['idTecnico'];
	}
	else{		
		$idTecnico = $_tecnico['id'];
	}
		
	#nombre
	if($_POST['nombreAlumno']){
		$nombreAlumno = $_POST['nombreAlumno'];
	}
	else{		
		$nombreAlumno = $_tecnico['nombreAlumno'];
	}
	
	#curso
	if($_POST['curso']){
		$curso = $_POST['curso'];
	}
	else{		
		$curso = $_tecnico['curso'];
	}
	
	#cuil
	if($_POST['cuil']){
		$cuil = $_POST['cuil'];
	}
	else{		
		$cuil = $_tecnico['cuil'];
	}
	
	#numeroSerie
	if($_POST['numeroSerie']){
		$numeroSerie = $_POST['numeroSerie'];
	}
	else{		
		$numeroSerie = $_tecnico['numeroSerie'];
	}	

	#marca
	if($_POST['marca']){
		$marca = $_POST['marca'];
	}
	else{		
		$marca = $_tecnico['marca'];
	}
	
	#problema
	if($_POST['problema']){
		$problema = $_POST['problema'];
	}
	else{		
		$problema = $_tecnico['problema'];
	}	
	
	#fecha
	if($_POST['fecha']){
		$fecha = $_POST['fecha'];
	}
	else{		
		$fecha = $_tecnico['fecha'];
	}
	
	#nada
	if($_POST['nada']){
		$nada = $_POST['nada'];
	}
	else{		
		$nada = $_tecnico['estado'];
	}
	$_estadoanterior = $est1->listarEstado($_tecnico['estado']);
		
	#idreclamo
	if($_POST['idreclamo']){
		$idreclamo = $_POST['idreclamo'];
	}
	else{		
		$idreclamo = $_tecnico['idreclamo'];
	}
	
	
	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $tec1->validarTecnico($_POST);
		
		if(!$mensaje){						
			$_tecnico = $tec1->setEstado2($_POST['estado']);
			if($_POST['estado']==3 OR $_POST['estado']==4)
			{
			$update = $tec1->modificarTecnico();
			$update = $tec1->modificarEstado($idTecnico);
			header("location: listarTecnicos.php?update=$update"); 	
			exit();	
			}
			else
			{
			$update = $tec1->modificarTecnico();
			header("location: listarTecnicos.php?update=$update"); 	
			exit();		
			}		
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
<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Marca" value="<?php echo $tec1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $tec1->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
	
		
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--codigo-->
		<input type="hidden" style="width:195px;height:18px;" readonly="readoonly();" name="idTecnico" value="<?php echo $idTecnico?>" /> <br />
		
		<!--Nombre Alumno-->
		<div class="form-group">
        <label>Nombre Alumno:*</label><input class="form-control"  name="nombreAlumno" value="<?php echo $nombreAlumno?>">
        </div>
		<!--Curso-->
		<div class="form-group">
        <label>Curso:*</label><input class="form-control"  name="curso" value="<?php echo $curso?>">
        </div>
		<!--Cuil-->
		<div class="form-group">
        <label>Cuil:*</label><input class="form-control"  name="cuil" value="<?php echo $cuil?>">
        </div>
		<!--Numero De Serie-->
		<div class="form-group">
        <label>Numero De Serie:*</label><input class="form-control"  name="numeroSerie" value="<?php echo $numeroSerie?>">
        </div>
		<!--Marca-->
		<div class="form-group">
        <label>Marca:*</label><input class="form-control"  name="marca" value="<?php echo $marca?>">
        </div>
		<!--Problema-->
		<div class="form-group">
        <label>Problema:*</label><input class="form-control"  name="problema" value="<?php echo $problema?>">
        </div>
		<!--Estado Anses-->
		<div class="form-group">
        <label>Estado Anses:*</label><input class="form-control"  name="idreclamo" value="<?php echo $idreclamo?>">
        </div>
		<!--Fecha-->
		<div class="form-group">
        <label>Fecha:*</label><input class="form-control"  name="fecha" value="<?php echo $fecha?>">
        </div>
		<!--Estado Anterior-->
		<div class="form-group">
        <label>Estado Anterior:*</label><input class="form-control"  name="nada" value="<?php echo $_estadoanterior['nombre']?>">
        </div>
		<!--Estado-->
		<label>Estado: *</label> 
		<select class="form-control" name="MarcaNetbook">
            <option selected value="<?php echo $_estado['id']?>"><?php echo $_estado['nombre']?></option>
			<?php for($i=1;$i<=count($_estados);$i++){?>
			<option value="<?php echo $_estados[$i]['id']?>"><?php echo $_estados[$i]['nombre']?></option>
		<?php }?>
		</select><br>
		<!--submit-->
		<input type="submit" value="Modificar"> * Campos obligatorios
	
	</form>
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
