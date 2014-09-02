<?php
if($_POST['Libro'])
	{
		$fotos="libros/";
		include_once("../../../../utiles/principal.php");		
		include_once($docRootSitio."modelo/Libro.php");	
	
			$lib1 = new Libro();	
	
				$_libro = $lib1->listarLibro($_POST['Libro']);
					$delete = $lib1->eliminarLibro($_POST['Libro']);

						unlink($fotos.$_libro['nombreImagen']);
						unlink($_libro['preview']);
	
			header("location: listarLibros.php?delete=$delete"); 	
		exit();
}
else
{
	echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
	exit();	
}
?>