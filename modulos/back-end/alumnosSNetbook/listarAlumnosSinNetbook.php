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
<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>El Alumno Se Agrego Exitosamente.</h4>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<h4>El Alumno Se Modificó Exitosamente.</h4>
		<?php }?>
			
		<?php if($_GET['delete']==1){?>
			<h4>El Alumno Se eliminó de la Base de Datos.</h4>
		<?php }?>
	</div>	
	<?php
	if(!isset($_GET['order']) || $_GET['order']=="DESC"){
			$order = "ASC";
		}
		else{
			$order = "DESC";
		}		

	if(count($_alumnos)){?>	
							
	             <div class="row">
                   
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Alumnos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                      		
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cuil</th>
												<th>Direccion</th>
												<th>Escuela</th>
                                                <th>Curso</th>
												<th>Turno</th>
												<th>Nombre Padre</th>
                                                <th>Cuil Padre</th>
												<th>Marca Netbook</th>
                                                <th>Numero De Serie</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
        		
		<?php for($i=1;$i<=count($_alumnos);$i++){			
		$_curso = $cur1->listarCurso($_alumnos[$i]['curso']);
		$_turno = $tur1->listarturno($_alumnos[$i]['turno']);		
		if($_alumnos[$i]['MarcaNetbook']==0)
		{
		$marca = "No Posee";
		$serie = "No Posee";
		}
		
			if($i%2==0){
					$class="class='alt'";
					$classTh="class='specalt'";
				}
				else{
					$class="";
					$classTh="class='spec'";
				}
		?>			
		<tr>			
			<td><?php echo $_alumnos[$i]['nombre']?></td>	
			<td><?php echo $_alumnos[$i]['cuil']?></td>
			<td><?php echo $_alumnos[$i]['direccion']?></td>
			<td><?php echo $_alumnos[$i]['escuela']?></td>
			<td><?php echo $_curso['nombre']?></td>
			<td><?php echo $_turno['nombre']?></td>
			<td><?php echo $_alumnos[$i]['nombrePadre']?></td>
			<td><?php echo $_alumnos[$i]['cuilPadre']?></td>
			<td><?php echo $marca ?></td>
			<td><?php echo $serie?></td>
			<td>
			<form method="post" action="modificarAlumnoSinNetbook.php">
				<input type="hidden" name="Alumno" value="<?php echo $_alumnos[$i]['id']?>">
				<input type="submit" class="btn btn-default"" value="Editar">
			</form>
			<form method="post" action="eliminarAlumnoSinNetbook.php">
				<input type="hidden" name="Alumno" value="<?php echo $_alumnos[$i]['id']?>">
				<input type="submit" value="Eliminar" class="btn btn-primary"
				onclick="return confirm('Est seguro que desea eliminar el alumno <?php echo $_alumnos[$i]['nombre']?>?');">
			</form>
		</tr>
		<?php }}?>
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
