<?php 	include_once("../headerAdmin.php");		

	include_once($docRootSitio."modelo/Curso.php");		
		
	$cur1 = new Curso();
	
	$_curso = $cur1->listarCurso($_GET['Curso']);
	
?>

	<title>
			Listar Curso
	</title>
	
	
<div id="container" >
	<div id="main" >	
	

	<?php  include("barraCurso.php") ?>				

	<h3>Detalle De La Curso</h3>	
	<table id="mytable" cellspacing="0" cellpadding="0">
		<tr>
			<th class="alt">Nombre</th>
			<td><?php echo $_curso['nombre']?></td>
		</tr>
	</table>	
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->


<?php  include("../footerAdmin.php") ?>
