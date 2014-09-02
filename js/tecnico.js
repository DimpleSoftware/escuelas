
function agregar(id){	
	var objDestino = document.getElementById("datos");	
	var objForm = document.getElementById("formAgregarTecnico");	
	
	if(objForm.numSerie.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "numSerie="+objForm.numSerie.value;
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/tecnico/datos.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else 
	{
	xmlhttp = nuevoAjax();

	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/tecnico/error.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
}


function oculta(){

div = document.getElementById('palabra');
div.style.display='none';

div2 = document.getElementById('algo');
div2.style.display='none';

}

function netbook(id){	
	var objDestino = document.getElementById("datosNetbook");	
	var objForm = document.getElementById("formAgregarNetbook");	
	
	if(objForm.numSerie.value!=0 ){
	
	xmlhttp = nuevoAjax();

	var parametros = "numSerie="+objForm.numSerie.value;
	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/prestamo/datosNetbook.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	else {
	
	xmlhttp = nuevoAjax();

	xmlhttp.open("POST",objForm.dire.value+"modulos/back-end/prestamo/error.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objDestino.innerHTML=xmlhttp.responseText;					
		}
	}	
	xmlhttp.send(parametros);
	}
	
}