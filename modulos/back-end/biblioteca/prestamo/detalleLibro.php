<?php 
include_once("../../headerAdmin.php");
include_once($docRootSitio."modelo/Alumno.php");
include_once($docRootSitio."modelo/Libro.php");

$alu1 = new Alumno();
$lib1 = new Libro();

$nombreLib = $_POST['libro'];
$_libro = $lib1->listarLibro($nombreLib);
$_alumnos = $alu1->listarAlumnos();
$nombreLibro = $_libro['nombre'];
$fecha = date("d-m-Y");
$nuevafecha = strtotime ( '+5 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( "d-m-Y" , $nuevafecha );

?>
<fieldset>
<legend>Detalle</legend>
	<form method="post" id="formPrestamo" name="formPrestamo">
	<input type="hidden" name="bandera" value="1">
	<input type="hidden" name="idlibro" value="<?php echo $nombreLib?>">
	<input type="hidden" name="curso" value="<?php echo $cursito?>">
	<input type="hidden" name="nombreLib" value="<?php echo $nombreLibro?>">
	<input type="hidden" name="fecha" value="<?php echo $fecha?>">
	<input type="hidden" name="nuevafecha" value="<?php echo $nuevafecha?>">
	
		<center><table id="mytable" cellspacing="0" cellpadding="0">
			<tr>
				<th >					
					<center>Alumno</center>			
				</th>
				<th >					
					<center>Curso</center>			
				</th>
				<th >					
					<center>Nombre Libro</center>			
				</th>
				<th >					
					<center>Prestamo</center>			
				</th>
				<th >					
					<center>Devolucion</center>			
				</th>
				<th >					
					<center>Accion</center>			
				</th>
			</tr>	
		
			<tr>		
			<td <?php echo $class?> >		
			<select name="alumno" onchange="Curso();" style="width:130px;">
					<option selected value="<?php echo $_alumno['id']?>"><?php echo $_alumno['nombre']?></option>
					<?php for($i=1;$i<=count($_alumnos);$i++){?>
						<option value="<?php echo $_alumnos[$i]['id']?>"><?php echo $_alumnos[$i]['nombre']?></option>
					<?php }?>
			</select> <br />	
			</td>
			<td <?php echo $class?> >
				<center><div id="cursito"></div></center>
			</td>	
				<td <?php echo $class?> >
				<center><?php echo $nombreLibro?></center>
			</td>
				</td>	
				<td <?php echo $class?> >
				<center><?php echo $fecha?></center>
			</td>
				</td>	
				<td <?php echo $class?> >
				<center><?php echo $nuevafecha?></center>
			</td>
			<td <?php echo $class?> >
				<div id="celdaAcciones">
					<input type="submit" value="Prestar">
				</div>
			</td>
		</tr>
		</table>
		</center>
	</form>
</fieldset>