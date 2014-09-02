<h1><font color="#6C3600">Ocurrieron los siguientes errores</font></h1>


<font color="#6C3600"><b>Archivo</b> </font></label><?php echo $e->getFile()?>  <br /><br />
<font color="#6C3600"><b>L&iacute;nea</b> </font></label><?php echo $e->getLine()?><br /><br />
<font color="#6C3600"><b>SqlQuery</b> </font> </label><?php echo $error['consulta']?><br /><br />
<font color="#6C3600"><b>MySql error</b> </font> </label><?php echo $error['mysql']?><br /><br />
<font color="#6C3600"><b>Traza</b> </font></label><?php echo $e->getTraceAsString()?><br /><br />

<font color="#6C3600"><b>Mensaje de error</b> </font> </label><?php echo $e->getMessage()?><br /><br />

	

