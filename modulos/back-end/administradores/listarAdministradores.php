<?php include_once("../headerAdmin.php");
	if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta p&aacute;gina.<h2>";
		exit();	
	}
?>

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
		$campoOrder = "fecha";
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	#incluyo clases
	include_once($docRootSitio."modelo/Administrador.php");		
	include_once($docRootSitio."modelo/Fecha.php");	
	include_once($docRootSitio."modelo/Rol.php");	
		
	#nuevo objeto
	$ad1 = new Administrador();			
	$fe1 = new Fecha();	
	$rol1 = new Rol();	
		
	$_administradores = $ad1->listarAdministradores($offset,$limit,$campoOrder,$order);	
	
	#getCantMenu
	$cantRegistros = $ad1->getCantAdministradores();	
	$cantPaginas = ceil($cantRegistros/$limit); 	
			
?>

<div id="container" >
	<div id="main" >				
	
		<?php include("barraAdministradores.php") ?>	
		
	<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>El Administrador se agregó exitosamente.</h4>
		<?php }?>
		
		<?php if($_GET['delete']==1){?>
			<h4>El Administrador se eliminó de la Base de Datos.</h4>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<h4>El Administrador se modificó exitosamente.</h4>
		<?php }?>
	</div>
	
	<?php if(count($_administradores)){?>		
	
	<table id="mytable" cellspacing="0" cellpadding="0">
			<tr>
				<th class="specalt">
				<a href="listarAdministradores.php?campoOrder=apellido&order=<?php echo $order?>">	
				<center><b>Nombre</b></center>
				</a>
				</th>
				<th>
					<center><b>Apellido</b></center>
				</th>
				<th>
					<center><b>Rol</b></center>
				</th>
				<th>
					<center><b>Nombre De Usuario</b></center>
				</th>
				<th>
					<center><b>Contraseña</b></center>
				</th>
				<th>
					<center><b>Acciones</b></center>
				</th>
			</tr>
		
		<?php for($i=1;$i<=count($_administradores);$i++){	
		$_rol = $rol1->listarRol($_administradores[$i]['Rol']);
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
				<th <?php echo $classTh?> >
					<?php echo $_administradores[$i]['nombre']?></a>
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_administradores[$i]['apellido']?> 
				</th>					
				<th <?php echo $classTh?> >
					<?php echo $_rol['nombre']?> 					
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_administradores[$i]['nombreUsuario']?>									
				</th>	
				<th <?php echo $classTh?> >
					<?php echo $_administradores[$i]['clave']?>									
				</th>
				
				<th <?php echo $classTh?> >
					<div id="celdaAcciones">
						<form method="post" action="modificarAdministrador.php">
							<input type="hidden" name="Administrador" value="<?php echo $_administradores[$i]['id']?>">
							<input type="submit" value="Editar">
						</form>
					</div>
				
				<div id="celdaAcciones">
					<form method="post" action="eliminarAdministrador.php">
						<input type="hidden" name="Administrador" value="<?php echo $_administradores[$i]['id']?>">
						<input type="submit" value="Eliminar" 
						onclick="return confirm('¿Está seguro que desea eliminar el administrador <?php echo $_administradores[$i]['nombreUsuario']?>?');">
					</form>
				</div>
					</a>
				</th>
			</tr>			
			<?php }?>
		</table>
	<div id="paginacion">
	<?php 					
	if(!is_numeric($_GET['pagina']) || $_GET['pagina']<=1){		
	 	$_GET['pagina'] = 1;				
	}
	else{		
		$paginaAnterior=$_GET['pagina']-1;
		
		if(isset($_GET['campoOrder']) && isset($_GET['order'])){
			$campoOrder = $_GET['campoOrder'];+
			$order = $_GET['order'];
			$criteriosOrder = "&campoOrder=$campoOrder&order=$order";
		}
		?>			
		<a href="listarAdministradores.php?pagina=<?php echo $paginaAnterior?><?php echo $criteriosOrder?>">Anterior</a>	
	<?php }?>
	
	P&aacute;gina <?php echo $_GET['pagina']?>/<?php echo $cantPaginas?> de <?php echo $cantRegistros?> registros
	
	<?php if($_GET['pagina']<$cantPaginas){
		$paginaSiguiente=$_GET['pagina']+1;
		
		if(isset($_GET['campoOrder']) && isset($_GET['order'])){
			$campoOrder = $_GET['campoOrder'];+
			$order = $_GET['order'];
			$criteriosOrder = "&campoOrder=$campoOrder&order=$order";
		}
				
	?>		
		
		<a href="listarAdministradores.php?pagina=<?php echo $paginaSiguiente?><?php echo $criteriosOrder?>">Siguiente</a>	
		
	<?php }?>	
	</div>
	
	<?php }
	else{?>
		<h4>No existen Administradores en la Base de Datos.</h4>
	<?php }?>
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
