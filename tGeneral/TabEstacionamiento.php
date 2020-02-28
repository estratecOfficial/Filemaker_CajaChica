<?php

// <a id="mostrarOcultar" class="boton" >+</a>
?>
 <br>
 <div id = "boton" ><button id ="mosOculEstaciona" type="button" class="btn btn-primary btn-rounded nuevoRegistro">Nuevo</button>
</div>
<div id="divformularioEstacionamiento" class="Formulario" >
	<div class="form-group"> 
		<form class ="form Formulario" id="formularioEstacionamiento" name ="fo3" action="crud/noEsUnPhpFalso.php"  method="POST" accept-charset="utf-8">
				<div class="form-row">
				<div class="input validate rs1">
					<input type="hidden" id ="Estacionamiento" name="Estacionamiento" value="Estacionamiento">
					<label class="labelViaje principal" >Empleado     </label>
					<input type="text" placeholder="nombre" id="nombre" class="nombre inputFormu form-control" name="nombre" autocomplete="off" value="<?php echo $user->getNombre();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" >Departamento    </label>
					<input type="text" id="Departamento" class="nombre inputFormu form-control" name="Departamento" autocomplete="off" value="<?php echo $user->getDepartamento();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal"  >Fecha de Gasto</label>
					<input type="text" placeholder="Fecha de Gasto" id="fechaGasto" class="datepicker inputFormu form-control" name="fechaComprobante" autocomplete="off" required>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal Varchar" id="labelEstancia" >Placa</label>
					<input type="text" placeholder="Placa" id="Placa" class="inputFormu form-control" name="Placa" autocomplete="off" required>
				</div>
				</div>   
				<hr class="someClass">

				<div class="form-row">

					<div class="form-group col-md-12 centroDiv margenSup">
						<!-- <label class="labelViaje Bold principal" >Estacionamiento </label> -->
						<div id="TitulosEstacionamiento" class="titulosPc_">
							<div class="form-row">
								<div class="form-group col-md-3">
									<label class="labelViaje " >Estacionamiento </label>
								</div>
								<div class="form-group col-md-1">
									<label class="labelViaje " >Comprobante </label>
								</div>
								<div class="form-group col-md-2">
									<label class="labelViaje " >Cliente </label>
								</div>
								<div class="form-group col-md-1">
									<label class="labelViaje " >Llegada </label>
								</div>
								<div class="form-group col-md-1">
									<label class="labelViaje " >Salida </label>
								</div>
								<div class="form-group col-md-1">
									<label class="labelViaje " >Precio Hora </label>
								</div>
								<div class="form-group col-md-1">
									<label class="labelViaje " >Precio Fraccion </label>
								</div>
								<div class="form-group col-md-1">
									<label class="labelViaje " >Total </label>
								</div>
								<div class="form-group col-md-1">
								</div>
							</div>
						</div> 
						<div>
				
						</div>
					</div>
				</div>
				<div id="particular">	
					<div id="TbEstacionamiento">
								<div class="form-row menosInfe"  >
							<hr class="someClass">
							<input type="hidden" id ="Estacionamiento" name="Varchar04[]" value="Estacionamiento">
							<div class="form-group col-md-3">
								<label class="label Secundario" >Estacionamiento</label> 
								<input type="text" placeholder="Estacionamiento" id="Estacionamiento" class="form-control Varchar" name="Varchar03[]" autocomplete="off" required>
							</div>
							<div class="form-group col-md-1">
								<label class="label Secundario" >Comprobante</label>
								<input type="checkbox" id="Comprobante_0" name="Comprobante0" value="Comprobante" class="Comprobante form-control">
								<br>
							</div>
							<div class="form-group col-md-2">
								<label class="label Secundario" >Cliente </label>
								<input type="text" placeholder="Cliente" id="clienteObjetivo" class="clienteObjetivo form-control" name="clienteObjetivo[]" autocomplete="off" required>
							</div>
							<div class="form-group col-md-1">
								<label class="label Secundario" >Llegada</label>
								<input type="time" id="Llegada_0" name="Hora01[]" class="Hora Inicio TiempoSin Llegada 0 form-control" required></div>
							<div class="form-group col-md-1">
								<label class="label Secundario" >Salida</label>
								<input type="time" id="Salida_0" name="Hora02[]" class="Hora Fin TiempoSin Salida 0 form-control" required></div>
							<div class="form-group col-md-1">
								<label class="label Secundario" >Precio Hora</label>
								<input type="number" step="0.01" placeholder="Hora" id= "hora_0" class="HoraPrecio form-control Float linea0" name="Float01[]" autocomplete="off" required>
							</div>
							<div class="form-group col-md-1">
								<label class="label Secundario" >Precio Fraccion</label>
								<input type="number" step="0.01" placeholder="Fraccion"  id= "fracc_0" class="FraccPrecio form-control Float linea0" name="Float02[]" autocomplete="off" required>
							</div>
							<div class="form-group col-md-1">
								<label class="label Secundario" >Total</label>
								<input type="number" step="0.01" id= "total_0" class="Total0 tot form-control Float" name="Total[]" autocomplete="off" readonly>
							</div>
							<div class="form-group col-md-1">
							</div>
						</div>
					</div>
					<div class="form-row" >
						<div class="form-group col-md-9">
						</div>
						<div class="form-group col-md-1">	
						</div>
						<div class="form-group col-md-1">	
						</div>
						<div class="form-group col-md-1">
								
						   		<a id="add02" class="botonTot btn btn-primary ">+</a>
							</div>
					</div>
					<div class="form-row" >
						<div class="form-group col-md-9">
							<label class="label izquierda " >Totales </label> 
						</div>
						<div class="form-group col-md-1">
							<label class="label " >Comprobable </label> 
							<input type="number" step="0.01" id = "totalEstacioCompro" class="TotalCompro tot form-control Float " name="Total[]" autocomplete="off" readonly>
						</div>
						<div class="form-group col-md-1 centroDiv">
							<label class="label  " >General </label> 
							<input type="number" step="0.01" id = "totalEstacioGene" class="Total0 tot form-control Float " name="Total[]" autocomplete="off" readonly>
						</div>
						<div class="form-group col-md-1">
							<label class="label " > </label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
						</div>
						<div class="form-group col-md-2">
							
						</div>
						<div class="form-group col-md-2">
							
						</div>
						<div class="form-group col-md-2">
								
							
						</div>
						<div class="form-group col-md-3">
							<label class="labelFormu labelDeuda" ></label>
						</div>
						<div class="form-group col-md-1">
							<label class="labelFormu deuda" > </label>
							
						</div>
						<div class="form-group col-md-1">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
						</div>
						<div class="form-group col-md-2">
							
						</div>
						<div class="form-group col-md-2">
							
						</div>
						<div class="form-group col-md-2">
						</div>
						<div class="form-group col-md-2 ">

						</div>
						<div class="form-group col-md-2">
							<label class="labelFormu deudaCheck" > </label>
						</div>
						<div class="form-group col-md-1">

						</div>
					</div>				
					
					<div class="form-row margenes">
						<hr class="someClass">
						<div class="form-group col-md-2">
							<!-- <label class="label Bold centro" >Total Comprobable</label> -->
						</div>
						<div class="form-group col-md-2">

						</div>
						<div class="form-group col-md-2">
							<!--<label class="label Bold centro" style ="text-align: right;">Total General</label> -->
						</div>
						<div class="form-group col-md-2">

						</div>
						<div class="form-group col-md-3">

						</div>
						<div class="form-group col-md-1">
								<label class="label" ></label>
								<input type="submit" name="Boton" class="btn btn-success disabled" value="Guardar" id ="enviarFormEstaciona">
						</div>
					</div>

					<br>
					<div id="resultadoEstacionamiento" class= "alert text-center" ></div>
				</div>
		</form>
	</div>
</div>
<script>
		var y=1; //variable de estacionamiento

	$(document).ready(function() {
		
		$("#enviarFormEstaciona").attr('disabled','disabled');
		
		//de Estacionamiento-------------------------------------------------------------------------------------------
		$("#add02").click(function(event) {
			maxRows =10;
			if(y <= maxRows){				
					agregarF02();
			}
		});
		$("#TbEstacionamiento").on('click',"#removeF02",function(event) {
			$(this).parent('div').parent().remove(); //al estar dentro de un div, tenemos que subir un nivel
			calcularTotal();
			calcularCompro();
			console.log("inicio calculo total");
			y--;
			});
		//--------------------------------------------------------------------------------------------------------------
		//-------------------------------------------------------------------------------------------
		
		//$( ".datepicker" ).datepicker({dateFormat: "yy/mm/dd"});
		 monetario01();
		 restriccionTextoVarchar();
		 restriccionFecha();
    	 autoBusqueda();	
    	 CalculosPagina();
    	 //calculoTotalGene();
   });
//---------------Funciones fuera de documentment


		function restriccionTextoVarchar(){
			//funcion que solo permite guardar numeros y decimales
			$(".Varchar,.clienteObjetivo,.inputFormu").on('input',function(){
				console.log ("se presiona un input Var");
				this.value = this.value.replace(/[^0-9a-zA-Z, .áéíñóúüÁÉÍÑÓÚÜ_-]/g, "");
			});
		}
		function restriccionFecha(){
			//funcion que solo permite guardar numeros y decimales
			$(".datepicker").keydown(function (event) {
				event.preventDefault();
			});
		}
		
///--------------------------------------		
	
function CalculosPagina(){
		$(".Hora").click(function(){
			total=0;		
			
			val = $(this).val();
			id= $(this).attr("id");
			clase = $(this).attr("class");
			
		});

		$(".Hora").change(function(){
			val = $(this).val();
			id= $(this).attr("id");
			id = id.substr(-2);
		});

		$(".HoraPrecio,.FraccPrecio").keyup(function(){
			id= $(this).attr("id");
			id=id.split("_")[1];
			val1 = $("#hora_"+id).val();
			val1 = (val1 == null || val1 == undefined || val1 == ""|| val1 == " ") ? 0 : val1;
			val2 = $("#fracc_"+id).val();
			val2 = (val2 == null || val2 == undefined || val2 == ""|| val2 == " ") ? 0 : val2;
			total = parseFloat(val1)+parseFloat(val2);
			total= total;
			$("#total_"+id).val(total);
	
		});
		$(".HoraPrecio,.FraccPrecio").keyup(function(){
			calcularTotal();
		});
		$(".HoraPrecio,.FraccPrecio").keyup(function(){
			calcularCompro();
		});
		$(".Comprobante").click(function(event) {
			calcularCompro();
		});
		
		$(".Float").keyup(function(){
		});
};
	
//---------------------------------------
function agregarF02(){ //crear dinamicamente Estacionamiento

			//console.log(y);
		var html ='<div class ="oculto"><div class="form-row menosInfe" id="form-row_'+y+'" ><hr class="someClass"><input type="hidden" id ="Estacionamiento" name="Varchar04[]" value="Estacionamiento"><div class="form-group col-md-3"><label class="label Secundario" >Estacionamiento</label> <input type="text" placeholder="Estacionamiento" id="Estacionamiento" class="form-control Varchar" name="Varchar03[]" autocomplete="off" required></div><div class="form-group col-md-1"><label class="label Secundario" >Comprobante</label><input type="checkbox" id="Comprobante_'+y+'" name="Comprobante'+y+'" value="Comprobante" class="Comprobante form-control"><br></div><div class="form-group col-md-2"><label class="label Secundario" >Cliente </label><input type="text" placeholder="Cliente" id="clienteObjetivo" class="clienteObjetivo form-control" name="clienteObjetivo[]" autocomplete="off" required></div><div class="form-group col-md-1"><label class="label Secundario" >Llegada</label><input type="time" id="Llegada_'+y+'" name="Hora01[]" class="Hora Inicio TiempoSin Llegada'+y+' form-control" required></div><div class="form-group col-md-1"><label class="label Secundario" >Salida</label><input type="time" id="Salida_'+y+'" name="Hora02[]" class="Hora Fin TiempoSin Salida'+y+' form-control" required></div><div class="form-group col-md-1"><label class="label Secundario" >Precio Hora</label><input type="number" step="0.01" placeholder="Hora" id= "hora_'+y+'" class="HoraPrecio form-control Float linea'+y+'" name="Float01[]" autocomplete="off" required></div><div class="form-group col-md-1"><label class="label Secundario" >Precio Fraccion</label><input type="number" step="0.01" placeholder="Fraccion"  id= "fracc_'+y+'" class="FraccPrecio form-control Float linea'+y+'" name="Float02[]" autocomplete="off" required></div><div class="form-group col-md-1"><label class="label Secundario" >Total</label><input type="number" step="0.01" id= "total_'+y+'" class="Total'+y+' tot form-control Float" name="Total[]" autocomplete="off" readonly></div><div class="form-group col-md-1"><button type="button" id="removeF02" class="btn btn-danger .glyphicon .glyphicon-ban-circle btn-block">X</button></div></div></div>';

		$("#TbEstacionamiento").append(html);
			monetario01(); // al agregarse un nuevo elemento, se tiene que agregar la funcion tambien
			restriccionTextoVarchar();
			$('.oculto').show(1000);
			autoBusqueda();
			CalculosPagina();
			y++;
}
//-----------------------------------------------------------------------

//-----------------------------------------
		function calcularTotal(){
			total=0;	
			$("#totalEstacioGene").val(total);	
			$(".HoraPrecio,.FraccPrecio").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalEstacioGene").val(total);
      		tot= $("#totalEstacioGene").val();
      		if (total > 0 ) {
					$('#enviarFormEstaciona').removeClass("disabled");
					$("#enviarFormEstaciona").removeAttr('disabled');

				}else{
					$("#enviarFormEstaciona").addClass("disabled");
					$("#enviarFormEstaciona").attr('disabled','disabled');
				}
		}

		function calcularCompro(){
			$("#totalEstacioCompro").val("0");
			tot=0;
				$(".HoraPrecio,.FraccPrecio").each(
	    		function(index, value) {
		      		if ( $.isNumeric($(this).val())){
		      			id= $(this).attr("id");
						id=id.split("_")[1];
						est= $("#Comprobante_"+id).prop('checked');
		      				if(est == true){
		      					tot = tot + parseFloat($(this).val());
				      			tot = tot.toFixed(2);
				      			tot = parseFloat(tot);
				      			$("#totalEstacioCompro").val(tot);
		      				}
		      		}else if (tot == 0) {
		      			$("#totalEstacioCompro").val("0");
		      		}
	      		}	
	      	);
		}
		
function RecargarTablaEstacionamiento(){
	$("#tabla02").load('crud/FolioUsuarioEstacionamientoJson.php').delay(1000);
	var url="crud/BuscarFoliosEstacionamiento.php";
	$("#TbUsuariosEstacionamientoFolios tbody").html("");
	$.getJSON(url,function(arregloEnviar){
		$.each(arregloEnviar, function(i,arregloEnviar){
			/*
			if(arregloEnviar.tipoFormulario==1){
				arregloEnviar.tipoFormulario="Transporte"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			if(arregloEnviar.tipoFormulario==2){
				arregloEnviar.tipoFormulario="Viaje"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			if(arregloEnviar.tipoFormulario==3){
				arregloEnviar.tipoFormulario="Estacionamiento"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			*/
			Folio= arregloEnviar.folio;

			var newRow =
			"<tr>"
			+"<td>"+arregloEnviar.folio+"</td>"
			+"<td>"+arregloEnviar.fechaComprobante+"</td>"
			+"<td>$"+arregloEnviar.totalCompro+"</td>"
			+"<td>$"+arregloEnviar.totalGeneral+"</td>"
			//+"<td>"+arregloEnviar.tipoFormulario+"</td>"
			+"<td>"+'<form action="PDF/PDFEstacionamiento.php" method=post target="popup" ><input name="folio" type="hidden" value='+Folio+'><input type="submit" class="btn btn-info btn-PDF" value=PDF /></form>'+"</td>";
			+"</tr>";
			$(newRow).appendTo("#TbUsuariosEstacionamientoFolios tbody");
		});
		$('#TbUsuariosEstacionamientoFolios').DataTable({
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
	});
}
//-----------------

</script>
<?php 

 ?>



