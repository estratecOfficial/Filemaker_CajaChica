<?php
  $connSelect = new DB(); 
  $arrayTransportes= [];
// <a id="mostrarOcultar" class="boton" >+</a>
?>
 <br>

<div id="formularioGeneral04" >
	<div class="form-group"> 
		<form class ="form" id="formularioVale" name ="fo3" action="crud/noEsUnPhpFalso.php"  method="POST" accept-charset="utf-8">
			<div class="form-row">
				<!-- <input type="hidden" id ="DepartamentoVale" name="Departamento" value="<?php echo $user->getDepartamento();?>"> -->
				<div class="input validate rs1">
					<label class="labelFormu labelViaje " >Empleado     </label>
					<input type="text" placeholder="nombre" id="nombreVale" class="nombre inputFormu form-control" name="nombre" autocomplete="off" value="<?php echo $user->getNombre();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelFormu labelViaje" id="labelFechaComproVale" >  Fecha de Comprobacion    </label>
					<input type="text" placeholder="Fecha de Comprobacion" id="fechaComprobanteVale" class="datepicker inputFormu form-control" name="fechaComprobante" autocomplete="off" required>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" >Departamento    </label>
					<input type="text" id="Departamento" class="nombre inputFormu form-control" name="Departamento" autocomplete="off" value="<?php echo $user->getDepartamento();?>" required readonly>
				</div>
			</div>
				<p></p>		   
				<hr class="someClass">
				<div id="particular">	
			<div id="container">
				<input type="hidden" id ="Vale" name="Vale" value="NoComprobable">
				 	<div class="form-row">					   
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Concepto</label>
							<!--<input type="text" placeholder="Tipo de Transporte" id="Varchar01" class="Varchar01  form-control" name="Varchar01[]" autocomplete="off" required> -->
							<?php 
								$sql ='Select Concepto from concepto';
								echo '<select id="Varchar02" class="form-control Varchar02" name="Varchar02[]" required >';
								$resultSelect = $connSelect->connect()->prepare($sql);
								$resultSelect->execute();
								foreach($resultSelect->fetchAll() as $row ){
									echo "<option value='".$row['Concepto']."'>".$row['Concepto']."</option>";
									array_push($arrayTransportes,$row['Concepto']); //se agrega al array para no volver a hacer consulta sql para los demas registros		
								} 
								echo "</select>";
							?>
							<!-- -->
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Costo</label>
							<input type="number" step="0.01" placeholder="Costo" id="Float01Vale" class="CostoTransporte Float01  form-control" name="Float01[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-4">
						    <label class="labelFormu labelViaje" >Observaciones</label>	
							<input type="text" placeholder="Observaciones" id="Varchar02Vale" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Autorizo</label>	
							<input type="text" placeholder="Autorizo " id="Varchar02Vale" class="Varchar04  form-control" name="Varchar04[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Cliente</label>	
							<input type="text" placeholder="Cliente" id="clienteObjetivoVale" class="clienteObjetivo  form-control" name="clienteObjetivo[]" autocomplete="off" required>
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
						<label class="labelFormu labelDeuda" ></label>	
	
					</div>
					<div class="form-group col-md-2">
						<label class="labelFormu deuda" > </label>
					</div>
					<div class="form-group col-md-2">
						<label class="labelFormu deudaCheck" > </label>
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-1">
						<input type="submit" name="Boton" class="EnvioFormulario" value="Guardar">
					</div>
				</div>
				<br>
				<div id="resultadoVale" class= "alert text-center" ></div>
			<br>
			</div>
		</form>
	</div>
</div>
<script>
	var x=1;
	$(document).ready(function() {
			
		
		//$( ".datepicker" ).datepicker({dateFormat: "yy/mm/dd"});
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

function RecargarTablaVales(){
	console.log("Recarga Vales");
	$("#tabla04").load('crud/FolioUsuarioValesJson.php').delay(1000);
	var url="crud/BuscarFoliosVales.php";
	$("#TbUsuariosValesFolios tbody").html("");
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
			+"<td>"+arregloEnviar.concepto+"</td>"
			+"<td>$"+arregloEnviar.importe+"</td>"
			// +"<td>"+arregloEnviar.tipoFormulario+"</td>"
			+"<td>"+'<form action="PDF/Tabla04.php" method=post><input name="folio" type="hidden" value='+Folio+'><input type="submit" class="btn btn-info btn-PDF" value=PDF /></form>'+"</td>";
			+"</tr>";
			$(newRow).appendTo("#TbUsuariosValesFolios tbody");
		});
		$('#TbUsuariosValesFolios').DataTable({
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
////////////////////////////////////
</script>
<?php 
 //$connSelect = null;
 ?>



