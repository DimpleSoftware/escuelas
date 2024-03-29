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
	include_once($docRootSitio."modelo/Netbook.php");		
	include_once($docRootSitio."modelo/Marca.php");	
		
	$net1 = new Netbook();			
	$mar1 = new Marca();	
	
	$_netbook = $net1->listarNetbook($_POST['Netbook']);	
	$_marcas = $mar1->listarMarcas();

	#numSerie
	if($_POST['numSerie']){
		$numSerie = $_POST['numSerie'];
	}
	else{		
		$numSerie = $_netbook['numSerie'];
	}
	
	#MarcaNetbook
	if($_POST['MarcaNetbook']){
		$_marca = $mar1->listarMarca($_POST['MarcaNetbook']);
		}
	else{
		if($_netbook['MarcaNetbook']!=0){
			$_marca = $mar1->listarMarca($_netbook['MarcaNetbook']);
		}
		else{
			$_marca['nombre'] = "Elija una Marca de Netbook para el alumnos";
		}
	}
	
	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $net1->validarNetbook($_POST);
		
		if(!$mensaje){						
			$update = $net1->modificarNetbook();	
			header("location: listarNetbooks.php?update=$update"); 	
			exit();		
		}		
	}	
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
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include_once($docRootSitio."utiles/menu.php");?>    
                            </div>
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
                            Modificar Netbook
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Netbook
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <p>
	
	                  
	                   
	                    <button type="button" class="btn btn-primary" onclick="window.open('<?php echo $httpHostSitio?>modulos/back-end/migraciones/migracionTransferirAlumno.php')" href=<?php echo $httpHostSitio?>modulos/back-end/netescuela/listarNetbooks.php>Remanente Netbook</button>
	                    <button type="button" class="btn btn-success">Prestamos Netbook</button> 	                    
	                     <button type="button" class="btn btn-warning">Marcas</button>
	
	                    
	                </p>
                
                <!--form-->
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Nettbok" value="<?php echo $net1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $net1->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
			
 	<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>
		
		<div class="form-group">
        <label>Numero De Serie: *</label><input class="form-control"  name="numSerie" value="<?php echo $numSerie?>">
        </div>
		   <div class="form-group">
                                <label>Marca Netbook: </label>

                                <select class="form-control" name="MarcaNetbook">
                                   <option selected value="<?php echo $_marca['id']?>"><?php echo $_marca['nombre']?></option>
					<?php for($i=1;$i<=count($_marcas);$i++){?>
						<option value="<?php echo $_marcas[$i]['id']?>"><?php echo $_marcas[$i]['nombre']?></option>
					<?php }?>

                                </select>
                            </div>
				<!--submit-->
		<input type="submit" class="btn btn-default" value="Modificar"> 
		</fieldset>	
	</form>				
	         
         
         
         
        
         
         
         
         
         
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
