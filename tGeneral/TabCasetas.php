<?php

// <a id="mostrarOcultar" class="boton" >+</a>
?>
 <br>
 <div id = "boton" ><button id ="mosOculCasetas" type="button" class="btn btn-primary btn-rounded nuevoRegistro">Nuevo</button>
</div>
<div id="divformularioCaseta" class="Formulario" >
	<div class="form-group"> 
		<form class ="form Formulario" id="formularioCaseta" name ="fo3" action="crud/noEsUnPhpFalso.php"  method="POST" accept-charset="utf-8">

				<div class="form-row">
				<div class="input validate rs1">
					<input type="hidden" id ="Casetas" name="Casetas" value="Casetas">
					<label class="labelViaje principal" >Empleado     </label>
					<input type="text" placeholder="nombre" id="nombre" class="nombre inputFormu form-control" name="nombre" autocomplete="off" value="<?php echo $user->getNombre();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" >Departamento    </label>
					<input type="text" id="Departamento" class="nombre inputFormu form-control" name="Departamento" autocomplete="off" value="<?php echo $user->getDepartamento();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal"  >Fecha de Gasto</label>
					<input type="text" placeholder="Fecha de Gasto" id="fechaGastoCaseta" class="datepicker inputFormu form-control" name="fechaComprobante" autocomplete="off" required>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal Varchar" id="labelEstancia" >Placa</label>
					<input type="text" placeholder="Placa" id="PlacaCaseta" class="inputFormu form-control" name="Placa" autocomplete="off" required>
				</div>
				</div>   
				<hr class="someClass">

		
					<!--<hr class="someClass">-->
				<div class="form-row">
					<div class="form-group col-md-12 margenSup dibujarMargenes">
						<div class="centroDiv">
							<!-- <label class="label Bold principal" >Gastos Por Caseta</label> -->
						</div>
						<div id="TitulosCasetas" class="titulosPc_">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label class="labelViaje " >Destino</label>
								</div>
								<div class="form-group col-md-4">
									<label class="labelViaje  " >Importe</label>
								</div>
								<div class="form-group col-md-3">
									<label class="labelViaje  " >Cliente </label>
								</div>
								<div class="form-group col-md-1">
									
								</div>
							</div>
						</div>

						<div id=TbGastosCasetas>
							<div class="form-row">
								<hr class="someClass">
								<input type="hidden" id ="Casetas" name="Varchar04[]" value="GastosCasetas">
								<div class="form-group col-md-4">
									<label class="label Secundario" >Destino</label>
									<input type="text" placeholder="Destino" id="DestinoGasCaseta0" class="form-control Varchar" name="Varchar03[]" autocomplete="off" required>
								</div>
								<div class="form-group col-md-3">
									<label class="label Secundario" >Importe</label>
									<input type="number" step="0.01" placeholder="Importe"  id = "ImporteGasCaseta0" class=" lineaGasCaseta form-control Float" name="Float01[]" autocomplete="off" required >
								</div><div class="form-group col-md-4">
									<label class="label Secundario" >Cliente </label>
									<input type="text" placeholder="Cliente" id="clienteObjetivoGasCaseta0" class="clienteObjetivo form-control" name="clienteObjetivo[]" autocomplete="off" required></div>
								<div class="form-group col-md-1">
									
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label class="label Secundario" ></label>
							</div>
							<div class="form-group col-md-3">
									<label class="label " >Total Gastos Caseta</label>
									<input type="number" step="0.01" placeholder="Total"  id = "TotalGasCaseta" class=" TotalCompro form-control Float " readonly="">
							</div>
							<div class="form-group col-md-4">
									<label class="label Secundario" > </label>	
							</div>
							<div class="form-group col-md-1">
								
								<a id="add03" class="botonTot btn btn-primary ">+</a>
							</div>
						</div>
					</div>

				</div>
				<div class="form-row margenes">
					<hr class="someClass">
					<div class="form-group col-md-4">	
					<label class="labelFormu labelDeuda" ></label>					
					</div>
					<div class="form-group col-md-3">
						<label class="labelFormu deuda" > </label>
					</div>
					<div class="form-group col-md-2">
						<label class="labelFormu deudaCheck" > </label>
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-1">
						<label class="label" ></label>
						<input type="submit" name="Boton" class="btn btn-success disabled" value="Guardar" id ="enviarFormCaseta">
					</div>
				</div>
				<br>
				<div id="resultadoCaseta" class= "alert text-center" ></div>		
		</form>
	</div>
</div>

<script>
	var z=1; //variable de casetas 
	$(document).ready(function() {
		
		$("#enviarFormCaseta").attr('disabled','disabled');
		//de Casetas-------------------------------------------------------------------------------------------
		$("#add03").click(function(event) {
			maxRows =10;
			if(z <= maxRows){				
					agregarF03();	
			}
			/*if (z > 1){
						$("#TitulosCasetas").removeClass("titulosPc");
						$(".ocultoCaseta").addClass("muestraCaseta").removeClass("ocultoCaseta");
					} */
		});
		$("#TbGastosCasetas").on('click',"#removeF03",function(event) {
			$(this).parent('div').parent().remove(); //al estar dentro de un div, tenemos que subir un nivel
			calculoTotalGastosCaseta();
			z--;
			/*
			if (z<2){
				$("#TitulosCasetas").addClass("titulosPc");
				$(".muestraCaseta").addClass("ocultoCaseta").removeClass("muestraCaseta");
					}*/
			});
		//
		//de otros -------------------------------------------------------------------------------------------

		//----------------
		//$( ".datepicker" ).datepicker({dateFormat: "yy/mm/dd"});
		 monetario01();
		 restriccionTextoVarchar();
		 restriccionFecha();
    	 autoBusqueda();	
    	 CalculosPaginaCaseta();
    	
   });
//---------------Funciones fuera de documentment

		
//----------------
		function restriccionTextoVarchar(){
			//funcion que solo permite guardar numeros y decimales
			$(".Varchar,.clienteObjetivo,.inputFormu").on('input',function(){
				console.log ("se presiona un input Var");
				this.value = this.value.replace(/[^0-9a-zA-Z, .áéíñóúüÁÉÍÑÓÚÜ_-]/g, "");
			});
		}
		/*
		function restriccionFecha(){
			//funcion que solo permite guardar numeros y decimales
			$(".datepicker").keydown(function (event) {
				//console.log("evento en Fecha denegado");
				event.preventDefault();
			});
		}
		*/
		////-----------
		/*
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
		}	*/
///--------------------------------------		
	
function CalculosPaginaCaseta(){
		$(".lineaGasCaseta").keyup(function(){
			//console.log("suma  caseta");
			calculoTotalGastosCaseta();
		});
};
//---------------------------------------

//-----------------------------------------------------------------------
function agregarF03(){

			//console.log(z);
		var html ='<div class="form-row"><hr class="someClass"><input type="hidden" id ="Casetas" name="Varchar04[]" value="GastosCasetas"><div class="form-group col-md-4"><label class="label Secundario" >Destino</label><input type="text" placeholder="Destino" id="DestinoGasCaseta'+z+'" class="form-control Varchar" name="Varchar03[]" autocomplete="off" required></div><div class="form-group col-md-3"><label class="label Secundario" >Importe</label><input type="number" step="0.01" placeholder="Importe"  id = "ImporteGasCaseta'+z+'" class=" lineaGasCaseta form-control Float" name="Float01[]" autocomplete="off" required ></div><div class="form-group col-md-4"><label class="label Secundario" >Cliente </label><input type="text" placeholder="Cliente" id="clienteObjetivoGasCaseta'+z+'" class="clienteObjetivo form-control" name="clienteObjetivo[]" autocomplete="off" required></div><div class="form-group col-md-1"><button type="button" id="removeF03" class="btn btn-danger .glyphicon .glyphicon-ban-circle btn-block sinMargin">X</button></div></div>';

		$("#TbGastosCasetas").append(html);
			monetario01(); // al agregarse un nuevo elemento, se tiene que agregar la funcion tambien
			restriccionTextoVarchar();
			$('.oculto').show(1000);
			autoBusqueda();
			CalculosPaginaCaseta();
			z++;
}

//-----------------------------------------

		function calculoTotalGastosCaseta(){
				
				tot=0;
				$("#TotalGasCaseta").val("0");
				$("#enviarFormCaseta").addClass("disabled");
				$("#enviarFormCaseta").attr('disabled','disabled');
				$(".lineaGasCaseta").each(
	    		function(index, value) {
	    			console.log("evaluando:"+$(this).val());
		      		if ( $.isNumeric($(this).val())){
		      			tot = tot + parseFloat($(this).val());
		      			tot = tot.toFixed(2);
		      			tot = parseFloat(tot);
		      			//console.log(tot);
		      			$("#TotalGasCaseta").val(tot);
		      		}else if (tot == 0) {
		      			$("#TotalGasCaseta").val("0");
		      		}else {
		      			//$("#TotalGasCaseta").val("0");
		      		}
		      		totCaseta= $("#TotalGasCaseta").val();
		      		if (totCaseta > 0 ) {
					$('#enviarFormCaseta').removeClass("disabled");
					$("#enviarFormCaseta").removeAttr('disabled');
				}else{
				}
	      		}	
	      	);
		}
		

function RecargarTablaCasetas(){
	//console.log("inicio de caseta");
	$("#tabla06").load('crud/FolioUsuarioCasetasJson.php').delay(1000);
	var url="crud/BuscarFoliosCasetas.php";
	$("#TbUsuariosCasetasFolios tbody").html("");
	$.getJSON(url,function(arregloEnviar){
		$.each(arregloEnviar, function(i,arregloEnviar){

			/*
			if(arregloEnviar.tipoFormulario==1){
				arregloEnviar.tipoFormulario="Transporte"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			if(arregloEnviar.tipoFormulario==2){
				arregloEnviar.tipoFormulario="Viaje"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			if(arregloEnviar.tipoFormulario==6){
				arregloEnviar.tipoFormulario="Casetas"; //llegan numeros, por lo que hay que cambiarlo manualmente
			}
			*/
			Folio= arregloEnviar.folio;

			var newRow =
			"<tr>"
			+"<td>"+arregloEnviar.folio+"</td>"
			+"<td>"+arregloEnviar.fechaComprobante+"</td>"
			+"<td>$"+arregloEnviar.totalGeneral+"</td>"
			//+"<td>"+arregloEnviar.cliente+"</td>"
			// +"<td>"+"<a RowFolio="+Folio+" class='btn btn-success btn-edit' ><span class=' datosTabla glyphicon  glyphicon-edit'>Datos</span></a> "+"</td>"
			+"<td>"+'<form action="PDF/PDFCasetas.php" method=post target="popup"><input name="folio" type="hidden" value='+Folio+'><input type="submit" class="btn btn-info btn-PDF" value=PDF /></form>'+"</td>";
			+"</tr>";
			$(newRow).appendTo("#TbUsuariosCasetasFolios tbody");
		});
		$('#TbUsuariosCasetasFolios').DataTable({
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



