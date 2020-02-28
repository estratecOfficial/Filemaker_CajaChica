<?php
  $connSelect = new DB(); 
  $arrayTransportes= [];
// <a id="mostrarOcultar" class="boton" >+</a>
?>
 <br>
<div id = "boton" ><button id ="mosOculGastos" type="button" class="btn btn-primary btn-rounded nuevoRegistro">Nuevo</button>
</div>
<div id="formularioGeneral05" >
	<div class="form-group"> 
		<form class ="form" id="formularioValeProvisional" name ="fo3" action="crud/noEsUnPhpFalso.php"  method="POST" accept-charset="utf-8">
			<div class="form-row">
				<!-- <input type="hidden" id ="DepartamentoVale" name="Departamento" value="<?php echo $user->getDepartamento();?>"> -->
				<div class="input validate rs1">
					<label class="labelFormu labelViaje " >Empleado     </label>
					<input type="text" placeholder="nombre" id="nombreValePro" class="nombre inputFormu form-control" name="nombre" autocomplete="off" value="<?php echo $user->getNombre();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelFormu labelViaje" id="labelFechaComproValePro" >  Fecha de Solicitud    </label>
					<input type="text" placeholder="Fecha de Solicitud" id="fechaComprobanteValePro" class="inputFormu form-control" name="fechaComprobante" autocomplete="off" required>
				</div>
					<div class="input validate rs1">
					<label class="labelFormu labelViaje" id="labelFechaLimite" >  Fecha Limite    </label>
					<input type="text"  id="fechaLimiteValePro" class="inputFormu form-control" name="Fecha01" autocomplete="off" readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" >Departamento    </label>
					<input type="text" id="Departamento" class="nombre inputFormu form-control" name="Departamento" autocomplete="off" value="<?php echo $user->getDepartamento();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" id="informa" >   </label>
					
				</div>
			</div>
				<p></p>		   
				<hr class="someClass">
				<div id="particular">	
			<div id="container">
				<input type="hidden" id ="ValeProvisional" name="ValeProvisional" value="ValeProvisional">
				 	<div class="form-row">					   
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Tipo</label>
							<!--<input type="text" placeholder="Tipo de Transporte" id="Varchar01" class="Varchar01  form-control" name="Varchar01[]" autocomplete="off" required> -->
							<input type="text" id="DepartamentoValePro" class="Varchar02 nombre inputFormu form-control" name="Varchar02[]" autocomplete="off" value="ValeProvisional" readonly>
							<!-- -->
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Costo</label>
							<input type="number" step="0.01" placeholder="Costo" id="Float01ValePro" class=" Float01  form-control" name="Float01[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-4">
						    <label class="labelFormu labelViaje" >Concepto</label>	
							<input type="text" placeholder="Concepto" id="Varchar02ValePro" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Autorizo</label>	
							<input type="text" placeholder="Autorizo " id="Varchar02ValePro" class="Varchar04  form-control" name="Varchar04[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Cliente</label>	
							<input type="text" placeholder="Cliente" id="clienteObjetivoValePro" class="clienteObjetivo  form-control" name="clienteObjetivo[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-1">  	
					    </div>
				 	</div>
			</div>		
				<hr class="someClass">
				<div class="form-row margenSup" >
					<div class="form-group col-md-1">
					</div>
					<div class="form-group col-md-2">	
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-1">
						<input type="submit" name="Boton" class="EnvioFormulario btn btn-success disabled" value="Guardar" id="enviarFormGastos">
					</div>
				</div>
				<br>
				<label>El usuario no podra tener mas de una solicitud activa</label>
				<br>
				<label>Las solicitudes deben ser comprobadas dentro de los 3 dias habiles siguientes a la fecha de expedicion, de lo contrario se procedera a DESCONTAR via nomina</label>
				<label id=advertencia class="centroDiv " style ="width: 100% ; color:red;" ></label> 
				<div id="resultadoValeProvisional" class= "alert text-center" ></div>
			<br>
			</div>
		</form>
	</div>
</div>
<script>
	var x=1;
	habili=0;
	$(document).ready(function() {
	
	$("#enviarFormGastos").attr('disabled','disabled');

	$("#fechaComprobanteValePro").datepicker({
    	'dateFormat':'yy/mm/dd',
    	'maxDate':'0',
    	'minDate':'0',
   		 beforeShowDay: function(date) {
            return [date.getDay() ==1 || date.getDay() == 2 || date.getDay() ==3 || date.getDay() == 4 || date.getDay() == 5 ];
        },
    //'dateFormat':'dd-mm-yy',
    	onSelect: function(dateText){
	        var seldate = $(this).datepicker('getDate');
	        seldate = seldate.toDateString();
	        seldate = seldate.split(' ');

	        var date = $(this).datepicker('getDate');
	        var day  = date.getDate();
	        var month = date.getMonth() + 1;
	        var year =  date.getFullYear();
	        //console.log(day + '-' + month + '-' + year);
	        //dias = 3;
	        var fecha = new Date($(this).datepicker('getDate'));
	        //console.log ("La fecha es ["+fecha+"]");

	        var weekday=new Array();
	            weekday['Mon']="Lunes";
	            weekday['Tue']="Martes";
	            weekday['Wed']="Miércoles";
	            weekday['Thu']="Jueves";
	            weekday['Fri']="Viernes";
	            weekday['Sat']="Sábado";
	            weekday['Sun']="Domingo";
	        var dayOfWeek = weekday[seldate[0]];
	        //console.log(dayOfWeek);
	        if (dayOfWeek =="Lunes"){
	        	dias = 3;
	        	limite= "Jueves";
	        	//console.log(",paga maximo el Jueves");
	        }else if (dayOfWeek =="Martes") {
	        	dias = 3;
	        	limite= "Viernes";
	        	//console.log(",paga maximo el Viernes");
	        }else if (dayOfWeek =="Miércoles") {
	        	dias = 5 ;
	        	limite= "Lunes";
	        	//console.log(",paga maximo el Lunes");
	        }else if (dayOfWeek =="Jueves") {
	        	dias = 4;
	        	limite= "Lunes";
	        	//console.log(",paga maximo el Lunes");
	        }else if (dayOfWeek =="Viernes") {
	        	dias = 3;
	        	limite= "Lunes";
	        	//console.log(",paga maximo el Lunes");
	        }else if (dayOfWeek =="Sábado") {
	        	dias = 3;
	        	limite= "Martes";
	        	//console.log(",paga maximo el Martes");
	        }else if (dayOfWeek =="Domingo") {
	        	dias = 3;
	        	limite= "Miércoles";
	        	//console.log(",paga maximo el Miercoles");
	        }
	        if((dayOfWeek == "Sábado") || (dayOfWeek =="Domingo")){
	        	console.log("dia invalido");
	        }
	         fecha.setDate(fecha.getDate() + dias);
	        //console.log ("La nueva fecha modificada es: ["+fecha+"]");
	        var day  = fecha.getDate();
	        var month = fecha.getMonth() + 1;
	        var year =  fecha.getFullYear();

	         $("#fechaLimiteValePro").val(year+"/"+month+"/"+day);
	         $("#informa").html("tu dia limite es: " +limite+",  "+day+"/"+month+"/"+year);
	         $("#resultadoValeProvisional").html("tu dia limite es: " +limite+",  "+day+"/"+month+"/"+year);
    }
});
		 monetario();
		 restriccionTexto();
		 restriccionFecha();
    	 autoBusqueda();
    	 sumarTransporte();
   	});
//---------------Funciones fuera de documentment
		
//----------------
		function monetario(){
			//funcion que solo permite guardar numeros y decimales
			$(".Float01").on('input',function(){
				//console.log ("se presiona un monetario");
				this.value = this.value.replace(/[^0-9\.]/g,'');
			});
		}
//----------------
		function restriccionTexto(){
			//funcion que solo permite guardar numeros y decimales
			$(".Varchar01,.Varchar02,.Varchar03,.clienteObjetivo").on('input',function(){
				//console.log ("se presiona un input");
				this.value = this.value.replace(/[^0-9a-zA-Z, .áéíñóúüÁÉÍÑÓÚÜ_-]/g, "");
			});
		}
		function restriccionFecha(){
			//funcion que solo permite guardar numeros y decimales
			$(".datepicker").keydown(function (event) {
				//console.log("evento en Fecha denegado");
				event.preventDefault();
			});
		}
		////-----------
		function autoBusqueda(){
			$('.clienteObjetivo').autocomplete({
		          source: function (request, response) {
		            $.ajax({
		              type: "POST",
		              minLength: 3,
              		  delay:1000,
		              url: "crud/search.php",
		              data: {
		                term: request.term,
		                type: "cliente"
		              },
		              success: response,
		              dataType: 'json',
		              minLength: 3,
		              delay: 1000
		            });
		          }
		        });
		}
////////////////////////////////////

function RecargarTablaValesProvisionales(){
	console.log("Recarga Vales Provisionales");
	$("#tabla05").load('crud/FolioUsuarioValesProvisionalesJson.php').delay(1000);
	var url="crud/BuscarFoliosValesProvisionales.php";
	$("#TbUsuariosValesProvisionalesFolios tbody").html("");
	$.getJSON(url,function(arregloEnviar){
		$.each(arregloEnviar, function(i,arregloEnviar){

			if(arregloEnviar.tipoFormulario==1){
				arregloEnviar.tipoFormulario="Transporte"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			if(arregloEnviar.tipoFormulario==2){
				arregloEnviar.tipoFormulario="Viaje"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			if(arregloEnviar.tipoFormulario==3){
				arregloEnviar.tipoFormulario="Estacionamiento y Casetas"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			if(arregloEnviar.tipoFormulario==4){
				arregloEnviar.tipoFormulario="Vales"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			Folio= arregloEnviar.folio;

			var newRow =
			"<tr>"
			+"<td>"+arregloEnviar.folio+"</td>"
			+"<td>"+arregloEnviar.fechaComprobante+"</td>"
			+"<td>"+arregloEnviar.fechaLimite+"</td>"
			+"<td>$"+arregloEnviar.importe+"</td>"
			+"<td>"+arregloEnviar.Estado+"</td>"
			// +"<td>"+arregloEnviar.tipoFormulario+"</td>"
			
			
			+"<td>"+'<form action="PDF/PDFValesProvisionales.php" method=post target="popup" ><input name="folio" type="hidden" value='+Folio+'><input type="submit" class="btn btn-info btn-PDF" value=PDF /></form>'
			
			+"</td>";
			+"</tr>";
			if(arregloEnviar.Estado == "Pendiente"){
				//console.log ("el usuario no puede solicitar uno nuevo");
				habili =1;
			}else {
				//console.log ("Registro diferente a 'Pendiente'");
			}
			$(newRow).appendTo("#TbUsuariosValesProvisionalesFolios tbody");
		});
		$('#TbUsuariosValesProvisionalesFolios').DataTable({
			responsive: true,
			"language": {
		        "lengthMenu": "",
		        "zeroRecords": "No se encontraron resultados en su busqueda",
		        "searchPlaceholder": "Buscar registros",
		        "info": "Registros de _START_ al _END_, total de  _TOTAL_ registros",
		        "infoEmpty": "No existen registros",
		        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
		        "search": "",
		        "paginate": {
		            "first": "Primero",
		            "last": "Último",
		            "next": "Siguiente",
		            "previous": "Anterior"
		    	},
    		}
		}); //se crea la tabla DESPUES de llenar los datos y ANTES DE SALIR DE LA FUNCION!
		restriccionSolicitud();
	});
	
}

function restriccionDia(){

	console.log("hoy es");
}
function restriccionSolicitud(){

	//console.log("habili vale:"+habili +" en que paso se realiza?");
	if(habili ==0){
		$("#advertencia").html("");
		$('#enviarFormGastos').removeClass("disabled");
		$("#enviarFormGastos").removeAttr('disabled');
	}
	else{
		$("#advertencia").html("El usuario tiene una solicitud por comprobar ");
		$("#enviarFormGastos").addClass("disabled");
		$("#enviarFormGastos").attr('disabled','disabled');
	}
}


////////////////////////////////////
</script>
<?php 
 //$connSelect = null;
 ?>



