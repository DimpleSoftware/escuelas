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
#Paginación	
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
	include_once("../headerAdmin.php");
	include_once($docRootSitio."modelo/Alumno.php");			
	include_once($docRootSitio."modelo/Curso.php");
	include_once($docRootSitio."modelo/Turno.php");
	
	#nuevo objeto
	$alu1 = new Alumno();				
	$cur1 = new Curso();
	$tur1 = new Turno();

	$_alumnos = $alu1->listarAlumnosSinNetbook($offset,$limit,$campoOrder,$order);	
	
	#getCantRegistros
	$cantRegistros = $alu1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);
		
	
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
                            Alumno
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Alumno
                            </li>
                        </ol>
                    </div>
                </div>       
						<p>
                 <button type="button" class="btn btn-primary" onclick="location = ('<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/agregarAlumnoSinNetbook.php')" > Agregar Alumnos Sin Netbook</button>
                 <button type="button" class="btn btn-success" onclick="location =('<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/listarAlumnosSinNetbook.php')" >Listar Alumnos Sin Netbook</button> 	                    
        </p>	
	   <!-- /.row -->
		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--alumno-->
		<div class="form-group">
        <label>Nombre:*</label><input class="form-control"  name="nombre" value="<?php echo $_POST['nombre']?>">
        </div>
		
		<!--Cuil-->
		<div class="form-group">
        <label>Cuil:*</label><input class="form-control"  name="cuil" value="<?php echo $_POST['cuil']?>">
        </div>
		
		<!--Direccion-->
		<div class="form-group">
        <label>Direccion:*</label><input class="form-control"  name="direccion" value="<?php echo $_POST['direccion']?>">
        </div>
		
		<!--Curso-->
		<label>Curso: *</label> 
		<select class="form-control" name="curso">
            <option selected value="<?php echo $_curso['id']?>"><?php echo $_curso['nombre']?></option>
			<?php for($i=1;$i<=count($_cursos);$i++){?>
			<option value="<?php echo $_cursos[$i]['id']?>"><?php echo $_cursos[$i]['nombre']?></option>
		<?php }?>
		</select>
	
		<!--escuela-->
		<div class="form-group">
        <label>Escuela:*</label><input class="form-control"  name="escuela" value="<?php echo $_POST['escuela']?>">
        </div>
		
		<!--Turno-->
		<label>Turno: *</label> 
		<select class="form-control" name="turno">
            <option selected value="<?php echo $_turno['id']?>"><?php echo $_turno['nombre']?></option>
			<?php for($i=1;$i<=count($_turnos);$i++){?>
			<option value="<?php echo $_turnos[$i]['id']?>"><?php echo $_turnos[$i]['nombre']?></option>
		<?php }?>
		</select>
		
		<!--nombrePadre-->
		<div class="form-group">
        <label>Nombre Del Padre:*</label><input class="form-control"  name="nombrePadre" value="<?php echo $_POST['nombrePadre']?>">
        </div>
		
		<!--Cuil padre-->
		<div class="form-group">
        <label>Cuil Del Padre:*</label><input class="form-control"  name="cuilPadre" value="<?php echo $_POST['cuilPadre']?>">
        </div>
		
		<!--submit-->
		<input type="submit" value="Agregar"> * Campos obligatorios
		
		</fieldset>
	</form>				
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
