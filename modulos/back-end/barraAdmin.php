<?php				
	#incluyo clase
	include_once($docRootSitio."modelo/Modulo.php");	
	
	
?>		

<link rel="stylesheet" type="text/css" href="<?php echo $httpHostSitio?>css/estiloMenu.css">	
	

		
<ul id="button"> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/administradores/agregarAdministrador.php">Usuarios</a></li>
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/datosEscuelas/listarDatosEscuelas.php">Datos Escuela</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php">Alumnos</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/alumnosSNetbook/listarAlumnosSinNetbook.php">A.sin netbook</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/cursos/listarCursos.php">Cursos</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/tecnico/listarTecnicos.php">Servicio Tecnico</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/marcas/listarMarcas.php">Marcas Netbook</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/netescuela/listarNetbooks.php">Remanente Netbook</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/prestamo/listarPrestamos.php">Prestamos Netbook</a></li> 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/comodatos/generarComodatoAlumno.php">Comodatos</a></li>
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/migraciones/migracionTransferirAlumno.php">Migraciones</a></li>
 
<li><a href="<?php echo $httpHostSitio?>modulos/back-end/migraciones/migracionTransferirAlumno.php">Robos</a></li>
<li><a href="<?php echo $httpHostSitio?>utiles/ctrlLogout.php">Salir</a></li>
</ul>
		</li>
		
	</ul>
	
	
	<div style="clear:both;"></div>
	
	
	