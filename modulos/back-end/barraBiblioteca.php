<?php				
	#incluyo clase
	include_once($docRootSitio."modelo/Modulo.php");	
	#creo objeto
	$m1 = new Modulo();	
	#o = ModuloPadre
	$_modulosPadres = $m1->listarModulos_ModuloPadre(0);		
	
	${"background".ucfirst(nombreModulo())} = "background:#f2f2f2";
	
?>		
	
<script>
	sfHover = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
</script>	
		
	<ul id="padre">
		<?php for($i=1;$i<=count($_modulosPadres);$i++){
			if($_modulosPadres[$i]['nombre']!="administradores"){		
		?>
			<li >
			<?php if($_modulosPadres[$i]['esHoja']=='s'){?>
				<a href="<?php echo $httpHostSitio?>modulos/back-end/<?php echo $_modulosPadres[$i]['nombre']?>/listar<?php echo agregarMayuscula($_modulosPadres[$i]['nombre'])?>.php">
				<?php echo $_modulosPadres[$i]['descripcion']?> </a>
			<?php }else{?>
				<?php echo $_modulosPadres[$i]['descripcion']?>	
			<?php }?>
				<ul id="hijos">
				<?php if($_modulosPadres[$i]['esHoja']=='s'){?>
				
					<li><a href="<?php echo $httpHostSitio?>modulos/back-end/<?php echo $_modulosPadres[$i]['nombre']?>/agregar<?php echo agregarMayuscula($_modulosPadres[$i]['nombreObjeto'])?>.php">Agregar <?php echo $_modulosPadres[$i]['nombreObjeto']?></a></li>
					<li><a href="<?php echo $httpHostSitio?>modulos/back-end/<?php echo $_modulosPadres[$i]['nombre']?>/listar<?php echo agregarMayuscula($_modulosPadres[$i]['nombre'])?>.php">Listar <?php echo $_modulosPadres[$i]['descripcion']?></a></li>
					
				<?php }?>
				<?php	#modulosHijos
					$_modulosHijos = $m1->listarModulosHijos($_modulosPadres[$i]['id']);
					for($j=1;$j<=count($_modulosHijos);$j++){
						if($_modulosHijos[$j]['esAutonomo']=='s'){?>
						<li><a href="<?php echo $httpHostSitio?>modulos/back-end/<?php echo $_modulosPadres[$i]['nombre']?>/<?php echo $_modulosHijos[$j]['nombre']?>/listar<?php echo agregarMayuscula($_modulosHijos[$j]['nombre'])?>.php"><?php echo $_modulosHijos[$j]['descripcion']?></a>
						 <ul>
							<?php	if($_modulosHijos[$j]['esHoja']=='s'){?>
									<li><a href="<?php echo $httpHostSitio?>modulos/back-end/<?php echo $_modulosPadres[$i]['nombre']?>/<?php echo $_modulosHijos[$j]['nombre']?>/agregar<?php echo agregarMayuscula($_modulosHijos[$j]['nombreObjeto'])?>.php">Agregar <?php echo $_modulosHijos[$j]['nombreObjeto']?></a></li>
									<li><a href="<?php echo $httpHostSitio?>modulos/back-end/<?php echo $_modulosPadres[$i]['nombre']?>/<?php echo $_modulosHijos[$j]['nombre']?>/listar<?php echo agregarMayuscula($_modulosHijos[$j]['nombre'])?>.php">Listar <?php echo $_modulosHijos[$j]['nombre']?></a></li>								
									
								<?php }?>
						 </ul>
						</li>							
					<?php }	}?>				
				</ul>		
			</li>				
		<?php }}?>
			
		
		<li>			
		 Libros
		 <ul id="hijos" style="width:180px;">				
			<?php if($_SESSION['Rol']==2){?>					
			<li style="padding:0px 5px 0px 0px;">			
			<a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php"> Alumnos </a>
			
			<ul id="hijos" style="width:200px;">				
				<li><a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/agregarAlumno.php" style="width:200px;">Agregar Alumno</a></li>
				<li><a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php" style="width:200px;">Listar Alumnos</a></li>										
			</ul>		
			</li>							
			<?php }?>
				</ul>
		</li>

		<li>			
		 Prestamo
		 <ul id="hijos" style="width:180px;">				
			<?php if($_SESSION['Rol']==2){?>					
			<li style="padding:0px 5px 0px 0px;">			
			<a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php"> Alumnos </a>
			
			<ul id="hijos" style="width:200px;">				
				<li><a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/agregarAlumno.php" style="width:200px;">Agregar Alumno</a></li>
				<li><a href="<?php echo $httpHostSitio?>modulos/back-end/alumnos/listarAlumnos.php" style="width:200px;">Listar Alumnos</a></li>										
			</ul>		
			</li>							
			<?php }?>
				</ul>
		</li>
	
			<li>			
				<a style="margin-left:25px;" href="<?php echo $httpHostSitio?>utiles/ctrlLogout.php">Salir</a>			
			</li>
			
		 </ul>		 
		</li>
		
	</ul>

	<div style="clear:both;"></div>