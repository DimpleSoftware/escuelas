<?php
header('Content-Type: text/html; charset=ISO-8859-1');

	include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");		
	include_once($docRootSitio."modelo/Netbook.php");
	include_once($docRootSitio."modelo/Marca.php");	
	include_once($docRootSitio."modelo/Alumno.php");
	include_once($docRootSitio."modelo/Prestamo.php");
			
	$net1 = new Netbook();
	$mar1 = new Marca();
	$alu1 = new Alumno();
	$pre1 = new Prestamo();

	$_netbook = $net1->listarNetbookPrestamo($_POST['numSerie']);
	$_marca = $mar1->listarMarca($_netbook['MarcaNetbook']);
	$_alumnosinnetbooks = $alu1->listarAlumnosSinNetbook();
	
	#Estado
	if($_POST['Alumno']){
		$_alumnosinnetbook = $asn1->listarAlumnosS($_POST['alumno']);
	}
	else{
		$_alumnosinnetbook['nombre'] = "Elija Alumno";
	}

		if($_netbook['estado']==0 AND $_netbook['estado']!=null)
			{
				$_prestamo = $pre1->listarAlumnosPrestamos($_POST['numSerie']); 
				$_alumno = $alu1->listarAlumno($_prestamo['nombre']);
				$mensaje = "Netbook prestada a: ";
				?>
				<div id="mensaje"><?php echo $mensaje.''.$_alumno['nombre']?> </div>
				<?php
			}
		elseif($_netbook['estado']==1)
			{
				?>	
				<form enctype="multipart/form-data" method="post" id="formAgregarNetbook" name="formAgregarNetbook">
				<input type="hidden" name="bandera" value="1">		
				<?php $fechaHasta= date("Y-m-d", strtotime("+5 day")) ;?> 
				<div>	
					<label>Numero De Serie Netbook: *</label> <input type="text" style="height:20px;width:195px;" readonly="readonly();" name="numSerie" value="<?php echo $_netbook['numSerie']?>" /><br>
					<label>Marca: *</label> <input type="text" style="height:20px;width:195px;" readonly="readonly();" name="marca" value="<?php echo $_marca['nombre']?>" /><br>
					<label>Curso: *</label> <input type="text" style="height:20px;width:195px;" readonly="readonly();" name="curso" value="<?php echo $_netbook['curso']?>" /><br>
					<label>Fecha Prestamo: *</label> <input type="text" style="height:20px;width:195px;"  readonly="readonly();" name="fechaDesde" value="<?php echo date("Y-m-d")?>" /><br>
					<label>Fecha Devolucion: *</label> <input type="text" style="height:20px;width:195px;" name="fechaHasta" value="<?php echo $fechaHasta?>" /><br>
					<label>Alumno: *</label> 
						<select name="alumno" style="width:195px;height:20px;" >
						<option selected value="<?php echo $_alumnosinnetbook['id']?>"><?php echo $_alumnosinnetbook['nombre']?></option>
						<?php for($i=1;$i<=count($_alumnosinnetbooks);$i++){?>
						<option value="<?php echo $_alumnosinnetbooks[$i]['id']?>"><?php echo $_alumnosinnetbooks[$i]['nombre']?></option>
						<?php }?>
						</select> <br />
					<!--submit-->
					<input type="submit" name="botoncargar" value="Cargar"> * Campos obligatorios
				</div>
				</form>	
				<?php
			}	
		else
			{
				$men = "Esa netbook no esta cargada en el sistema";
				?>
				<div id="mensaje"><b><?php echo $men?></b> </div>
				<?php
			}
			?>