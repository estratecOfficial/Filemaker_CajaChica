$(document).ready(function(e) {
//----------inicio de ready
	//console.log("se accede a Propios.js");
	RecargarTablaTransporte();

	$( ".datepicker" ).datepicker({
		'dateFormat':'yy/mm/dd',
    	'maxDate':'0',
    	'minDate':'-10',
		});

	//Transporte
	$('#formularioAEnviar').submit(function (ev) { //id del Form
		ev.preventDefault();
		console.log("se envia formulario Transporte");
		url = 'crud/recepcionGeneral.php'
		r = pregunta(event);
		//console.log(r);
		if (r == "True"){
			$('#result').html("se procede a agregar el formulario");
			$.ajax({
				type: $('#formularioAEnviar').attr('method'),  
				url: url,
				data: $('#formularioAEnviar').serialize(),
				success: function (data) {

					$('#result').removeClass("alert-success alert-danger");
					$('#result').addClass("alert-success");
					$('#result').html(data);
			  		RecargarTablaTransporte();
			  		
			  		limpiarFormulario();
			  		$(".folioValeProvisional").empty(); //limpia el select de ValesProvisionales
			  		//console.log("bandera de folios")
			  		selectPrestamoProvisional();
			  		//selectValesProvisionales(); //llena de nuevo el select
				} 
			});
		}else if (r == "False"){
			$('#result').html("Formulario NO Agregado");
		}
		ev.preventDefault();
	});	
//--------------------------Envio de Formulario Viaje---------------------	
	$("#formularioViaje").submit(function (ev) { //id del Form
		ev.preventDefault();
		console.log("se envia formulario Viaje");
		url = 'crud/recepcionGeneral.php'
		r = pregunta(event);
		//console.log(r);
		if (r == "True"){
			$('#resultadoViaje').html("se procede a agregar el formulario");
			$.ajax({
				type: $('#formularioViaje').attr('method'),  
				url: url,
				data: $('#formularioViaje').serialize(),
				success: function (data) {
					//console.log(data);
					$('#resultadoViaje').removeClass("alert-success alert-danger");
					$('#resultadoViaje').addClass("alert-success");
					$('#resultadoViaje').html(data);
					RecargarTablaViajes();
					selectPrestamoProvisional();

			  		//RecargarTablaTransporte();
			  		limpiarFormularioViaje();
				} 
			});
		}else if (r == "False"){
			$('#resultadoViaje').html("Formulario NO Agregado");
		}
		ev.preventDefault();
	});	

//--------------------------Envio de Formulario vale---------------------	
//------	
	$("#formularioVale").submit(function (ev) { //id del Form
		ev.preventDefault();
		console.log("se envia formulario Vale");
		url = 'crud/recepcionGeneral.php'
		r = pregunta(event);
		//console.log(r);
		if (r == "True"){
			$('#resultadoVale').html("se procede a agregar el formulario");
			$.ajax({
				type: $('#formularioVale').attr('method'),  
				url: url,
				data: $('#formularioVale').serialize(),
				success: function (data) {
					//console.log(data);
					$('#resultadoVale').removeClass("alert-success alert-danger");
					$('#resultadoVale').addClass("alert-success");
					$('#resultadoVale').html(data);
					RecargarTablaVales();
					selectPrestamoProvisional();
			  		//RecargarTablaTransporte();
			  		limpiarFormularioVale();
				} 
			});
		}else if (r == "False"){
			$('#resultadoVale').html("Formulario de Credito No Agregado");
		}
		ev.preventDefault();
	});	

//--------------------------Envio de Formulario Vale Provisional--------------------	

$("#formularioValeProvisional").submit(function (ev) { //id del Form
		ev.preventDefault();
		console.log("se envia formulario de vale provisional");
		url = 'crud/recepcionGeneral.php'
		r = pregunta(event);
		//console.log(r);
		if (r == "True"){
			$('#resultadoValeProvisional').html("se procede a agregar el formulario de vale provisional");
			$.ajax({
				type: $('#formularioValeProvisional').attr('method'),  
				url: url,
				data: $('#formularioValeProvisional').serialize(),
				success: function (data) {
					//console.log(data);
					$('#resultadoValeProvisional').removeClass("alert-success alert-danger");
					$('#resultadoValeProvisional').addClass("alert-success");
					$('#resultadoValeProvisional').html(data);
					RecargarTablaValesProvisionales();
					selectPrestamoProvisional();
				} 
			});
		}else if (r == "False"){
			$('#resultadoValeProvisional').html("Formulario de Vale Provisional no agregado");
		}
		ev.preventDefault();
	});	
////--------------------------Envio de Formulario Estacionamiento---------------------	

	$("#formularioEstacionamiento").submit(function (ev) { //id del Form
		ev.preventDefault();
		console.log("se envia formulario de Estacionamiento");
		url = 'crud/recepcionGeneral.php'
		r = pregunta(event);
		//console.log(r);
		if (r == "True"){
			$('#resultadoEstacionamiento').html("se procede a agregar el formulario");
			$.ajax({
				type: $('#formularioEstacionamiento').attr('method'),  
				url: url,
				data: $('#formularioEstacionamiento').serialize(),
				success: function (data) {
					//console.log(data);
					$('#resultadoEstacionamiento').removeClass("alert-success alert-danger");
					$('#resultadoEstacionamiento').addClass("alert-success");
					$('#resultadoEstacionamiento').html(data);
					RecargarTablaEstacionamiento();
			  		limpiarFormularioEstacionamiento();
			  		selectPrestamoProvisional();
				} 
			});
		}else if (r == "False"){
			$('#resultadoEstacionamiento').html("Formulario NO Agregado");
		}
		ev.preventDefault();
	});	
	///--------------------------EnvioCasetas---------------------------------
	$("#formularioCaseta").submit(function (ev) { //id del Form
		ev.preventDefault();
		console.log("se envia formulario de Caseta");
		url = 'crud/recepcionGeneral.php'
		r = pregunta(event);
		//console.log(r);
		if (r == "True"){
			$('#resultadoCaseta').html("se procede a agregar el formulario");
			$.ajax({
				type: $('#formularioCaseta').attr('method'),  
				url: url,
				data: $('#formularioCaseta').serialize(),
				success: function (data) {
					//console.log(data);
					$('#resultadoCaseta').removeClass("alert-success alert-danger");
					$('#resultadoCaseta').addClass("alert-success");
					$('#resultadoCaseta').html(data);
					//RecargarTablaEstacionamiento();
			  		//RecargarTablaTransporte();
			  		RecargarTablaCasetas();
			  		limpiarFormularioCaseta();
			  		selectPrestamoProvisional();
			  		//limpiarFormularioEstacionamiento();
				} 
			});
		}else if (r == "False"){
			$('#resultadoCaseta').html("Formulario NO Agregado");
		}
		ev.preventDefault();
	});	

//--------------------------Botones de Recarga de Tabla--------------------	

	$("#BtnReload01").on('click',function(){
		RecargarTablaTransporte();
		return false;
	});

	$("#BtnReload02").on('click',function(){
		RecargarTablaEstacionamiento();
		return false;
	});
		$("#BtnReload03").on('click',function(){
		RecargarTablaViajes();
		return false;
	});
		$("#BtnReload04").on('click',function(){
		RecargarTablaVales();
		return false;
	});
		$("#BtnReload05").on('click',function(){
		RecargarTablaValesProvisionales();
		return false;
	});
		$("#BtnReload06").on('click',function(){
		RecargarTablaCasetas();
		return false;
	});
//------------------------------------------------------------------------------------

	seleccionPestaña();


	$("#mytabs").bootstrapDynamicTabs();

  	cambioHijo(e);
  	//boton="mostrarOcultar";
  	mostrarOcultar(boton="mostrarOcultar");
  	mostrarOcultar(boton="mosOculViaje");
  	mostrarOcultar(boton="mosOculEstaciona");
  	mostrarOcultar(boton="mosOculOtros");
  	mostrarOcultar(boton="mosOculGastos");
  	mostrarOcultar(boton="mosOculCasetas");
  	
  	
    $(".alert").alert();
});
//-----------------------Funciones Fuera de (document).ready---------------------------


//-----
function seleccionPestaña(){ // con el fin de No cargar la pagina con pedidos que NO se requieran, se divide en pestañas
	$("#menu00",".menu00").on("click",function(){
		//console.log("acceso a pestaña 1");
	});

	$("#menu01").on("click",function(){
		//console.log("acceso a pestaña 2");
		RecargarTablaEstacionamiento();
		//dibujar tabla de Viajes
	});

	$("#menu02").on("click",function(){
		//console.log("acceso a pestaña 3");
		RecargarTablaViajes();	
	});

	$("#menu03").on("click",function(){
		//console.log("acceso a pestaña 4");
		RecargarTablaVales();
	});
	$("#menu04").on("click",function(){
		//console.log("acceso a pestaña 5");
		RecargarTablaValesProvisionales();
	});
	$("#menu05").on("click",function(){
		//console.log("acceso a pestaña 6");
		RecargarTablaCasetas();
		//RecargarTablaValesProvisionales();
	});

	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
  var target = $(e.target).attr("href");
  alert('clicked on tab' + target);
})


}

function cambioHijo(e){
	//console.log("inicio de cambiohijoooo");
   $('#TbUsuariosEditarTransporte tbody').on('keyup change', '.child input, .child select, .child textarea', function(e){
       var $el = $(this);
       var rowIdx = $el.closest('ul').data('dtr-index');
       var colIdx = $el.closest('li').data('dtr-index');
       var cell = table.cell({ row: rowIdx, column: colIdx }).node();
       $('input, select, textarea', cell).val($el.val());
       if($el.is(':checked')){ 
          $('input', cell).prop('checked', true);
       } else {
          $('input', cell).removeProp('checked');
       }
   });
}
function pregunta(event){
	if (confirm('¿Esta seguro de que desea Enviar los registros Nuevos? NO es posible la Edicion ó Eliminacion de manera posterior')){ 
           return "True";
            }else {
            	event.preventDefault();
            	return "False";
            } 
}
//-----------------------------------------------------------------------
function mostrar($Formu){
	
	$("#"+Formu).show(1000);
}
function ocultar($Formu){
	$("#"+Formu).hide(1000);
}
function mostrarOcultar($boton){
	//console.log("valor enviado id:"+boton);
	$("#"+boton).click(function(){

		ana=$(this).attr("id");
			if(ana=="mostrarOcultar")
				Formu="formularioGeneral";
			else if(ana=="mosOculViaje")
				Formu="formularioViaje";
			else if(ana=="mosOculEstaciona")
				Formu="formularioEstacionamiento";
			else if(ana=="mosOculOtros")
				Formu="formularioVale";
			else if(ana=="mosOculGastos")
				Formu="formularioValeProvisional";
			else if(ana=="mosOculCasetas")
				Formu="formularioCaseta";
			else 
				console.log("¿quee?");


		//console.log($(this).attr("id"));
		//var boton = document.querySelector("#mostrarOcultar");
		if ($(this).text() == "Nuevo" ) { //si el boton dice "Nuevo"
			//console.log("ejecutar visual de deuda");
			selectPrestamoProvisional();
			$(this).text("Cancelar");
			$(this).removeClass("btn btn-primary btn-rounded").addClass("btn btn-warning btn-rounded");
			mostrar(Formu);
		}else{
			//Formu="formularioGeneral";
			ocultar(Formu);
			limpiarFormulario()
			$(this).text("Nuevo");
			$(this).removeClass("btn btn-warning btn-rounded").addClass("btn btn-primary btn-rounded");
		}
	});
}
//-------------------------------------------------------------------------
function limpiarFormulario(){
	$('#formularioAEnviar').get(0).reset();
}
function limpiarFormularioViaje(){
	$('#formularioViaje').get(0).reset();
}
function limpiarFormularioEstacionamiento(){
	$('#formularioEstacionamiento').get(0).reset();
}
function limpiarFormularioVale(){
	$('#formularioVale').get(0).reset();
}
function limpiarFormularioValeProvisional(){
	$('#formularioValeProvisional').get(0).reset();
}
function limpiarFormularioCaseta(){
	$('#formularioCaseta').get(0).reset();
}
//-------------------------
	function monetario(){
			//funcion que solo permite guardar numeros y decimales
			$(".Float01").on('input',function(){
				this.value = this.value.replace(/[^0-9\.]/g,'');
			});
		}
//----------------------
		function restriccionTexto(){
			//funcion que solo permite guardar numeros y decimales
			$(".Varchar01,.Varchar02,.Varchar03,.Varchar04,.clienteObjetivo").on('input',function(){
				this.value = this.value.replace(/[^0-9a-zA-Z, .áéíñóúüÁÉÍÑÓÚÜ_-]/g, "");
			});
		}
		