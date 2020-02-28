<?php
   $connSelect = new DB(); 
   $arrayTransportes= [];
// <a id="mostrarOcultar" class="boton" >+</a>
?>
 <br>
<div id = "boton" ><button id ="mostrarOcultar" type="button" class="btn btn-primary btn-rounded nuevoRegistro">Nuevo</button>
</div>
<div id="formularioGeneral" >
	<div class="form-group"> 
		<form class ="form" id="formularioAEnviar" name ="fo3" action="crud/noEsUnPhpFalso.php"  method="POST" accept-charset="utf-8">
			<div class="form-row">
				<input type="hidden" id ="Departamento" name="Departamento" value="<?php echo $user->getDepartamento();?>">
				<div class="input validate rs1">
					<label class="labelFormu labelViaje " >Empleado     </label>
					<input type="text" placeholder="nombre" id="nombre" class="nombre inputFormu form-control" name="nombre" autocomplete="off" value="<?php echo $user->getNombre();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelFormu labelViaje" id="labelFechaCompro" >  Fecha de Comprobacion    </label>
					<input type="text" placeholder="Fecha de Comprobacion" id="fechaComprobante" class="datepicker inputFormu form-control" name="fechaComprobante" autocomplete="off" required>
				</div>
				<div class="input validate">

				</div>
			</div>
				<p></p>		   
				<hr class="someClass">
				<div id="particular">	
			<div id="container">
				<input type="hidden" id ="Transporte" name="Transporte" value="Transporte">
				 	<div class="form-row">
					    <div class="form-group col-md-1">
						    <label class="labelFormu labelViaje" >Registro</label>
							<input type="text" placeholder="Fecha" id="Fecha01" class="datepicker  Fecha form-control" name="Fecha01[]" autocomplete="off" required >
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Transporte</label>
							<!--<input type="text" placeholder="Tipo de Transporte" id="Varchar01" class="Varchar01  form-control" name="Varchar01[]" autocomplete="off" required> -->
							<?php 
								$sql ='Select Transporte from transporte';
								echo '<select id="Varchar01" class="form-control Varchar01" name="Varchar01[]" required >';
								$resultSelect = $connSelect->connect()->prepare($sql);
								$resultSelect->execute();
								foreach($resultSelect->fetchAll() as $row ){
									echo "<option value='".$row['Transporte']."'>".$row['Transporte']."</option>";
									array_push($arrayTransportes,$row['Transporte']); //se agrega al array para no volver a hacer consulta sql para los demas registros		
								} 
								echo "</select>";
							?>
							<!-- -->
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Costo</label>
							<input type="number" step="0.01" placeholder="Costo" id="Float01" class="CostoTransporte Float01  form-control" name="Float01[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Abordaje</label>	
							<input type="text" placeholder="Lugar de Abordaje" id="Varchar02" class="Varchar02  form-control" name="Varchar02[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Descenso</label>
							<input type="text" placeholder="Lugar de Descenso" id="Varchar03" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" required>
					    </div>
					    <div class="form-group col-md-2">
						    <label class="labelFormu labelViaje" >Cliente</label>	
							<input type="text" placeholder="Cliente" id="clienteObjetivo" class="clienteObjetivo  form-control" name="clienteObjetivo[]" autocomplete="ÑÖcompletes"  required>
					    </div>
					    <div class="form-group col-md-1">  	
					    </div>
				 	</div>
			</div>		
				<hr class="someClass">
				<div class="form-row">
					<div class="form-group col-md-1">
					</div>
					<div class="form-group col-md-2">
						<label class="labelFormu" >Total</label>	
					</div>
					<div class="form-group col-md-2">
						<input type="number" step="0.01" id="TotalTrans" class="Float01  form-control"  autocomplete="off" readonly>
					</div>
					<div class="form-group col-md-2">
						
					</div>
					<div class="form-group col-md-2 ">

					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-1">
						
					</div>
				</div>
				<div class="form-row">
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
					<div class="form-group col-md-2 ">

					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-1">
						<a id="add" class="botonAdd btn btn-primary ">+</a>
					</div>
				</div>
				<hr class="someClass">
				<div class="form-row margenSup" >
					<div class="form-group col-md-12">
						<div class="form-group col-md-10">
						    <label class="labelFormu labelViaje" >Nota</label>	
							<input type="text" placeholder="Nota" id="Nota" class="Varchar02  form-control" name="Nota" autocomplete="off" >
					    </div>
					</div>
				</div>
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
						<input type="submit" name="Boton" class="EnvioFormulario" value="Guardar">
					</div>
				</div>
				<br>
				<div id="result" class= "alert text-center" ></div>
			<br>
			</div>
		</form>
	</div>
</div>
<script>
	var x=1;
	$(document).ready(function() {
		//selectPrestamoProvisional();
		var maxRows =13;			
		$("#add").click(function(event) {

			var t1 ='<div class = "oculto" ><div class="form-row menosInfe10"><hr class="someClass"><div class="form-group col-md-1"><label class="labelFormu Secundario" >Registro</label><input type="text" placeholder="Fecha" id="childFecha'+x+'" class="datepicker .columna Fecha form-control" name="Fecha01[]" autocomplete="off" required ></div><div class="form-group col-md-2"><label class="labelFormu Secundario" >Transporte</label>';
			var	t2='<select id="childVarchar01" class="form-control Varchar01" name="Varchar01[]" required >';
			var t3=<?php
				echo "'";
				foreach ($arrayTransportes as $key => $value) {
				echo '<option value="'.$value.'">'.$value.'</option>';
				}
				echo "'";
				?>
				;
			var t4='</select>';		
			var t5 = '</div><div class="form-group col-md-2"><label class="labelFormu Secundario" >Costo</label><input type="number" step="0.01" placeholder="Costo" id="childFloat01" class="CostoTransporte Float01 inputNewLine form-control" name="Float01[]" autocomplete="off" required></div><div class="form-group col-md-2"><label class="labelFormu Secundario" >Abordaje</label><input type="text" placeholder="Lugar de Abordaje" id="childVarchar02" class="Varchar02 inputNewLine form-control" name="Varchar02[]" autocomplete="off" required></div><div class="form-group col-md-2"><label class="labelFormu Secundario" >Descenso</label><input type="text" placeholder="Lugar de Descenso" id="childVarchar03" class="Varchar03 inputNewLine form-control" name="Varchar03[]" autocomplete="off" required></div><div class="form-group col-md-2"><label class="labelFormu Secundario" >Cliente</label><input type="text" placeholder="Cliente" id="childclienteObjetivo" class="clienteObjetivo inputNewLine form-control" name="clienteObjetivo[]" autocomplete="ÑÖcompletes"  required></div><div class="form-group col-md-1"><label class="labelFormu Secundario" ></label><button type="button" id="remove" class="btn btn-danger .glyphicon .glyphicon-ban-circle btn-block">X</button></div></div></div>';
			agregar(t1+t2+t3+t4+t5,maxRows);
			restriccionFecha();
		});

		$("#container").on('click',"#remove",function(event) {
			$(this).parent('div').parent().remove();
			EjecutarSuma();
			console.log("se ejecuta otra");
			x--;
			});
		//----------------
		$("#container").on('click',".datepicker",function(event) {
			});
		//----------------

		 monetario();
		 restriccionTexto();
		 restriccionFecha();
    	 autoBusqueda();
    	 sumarTransporte();
    	 
   	});
//---------------Funciones fuera de documentment
		function agregar(html,maxRows){
			if(x <= maxRows){				
				$("#container").append(html);
				$('.oculto').show(1000);
				$(".datepicker").datepicker({
					'dateFormat':'yy/mm/dd',
			    	'maxDate':'0',
			    	'minDate':'-10',
				});
				monetario(); // al agregarse un nuevo elemento, se tiene que agregar la funcion tambien
				restriccionTexto();
				autoBusqueda();
				sumarTransporte();
				x++;			
			}
		}
//----------------
		/*function monetario(){
			//funcion que solo permite guardar numeros y decimales
			$(".Float01").on('input',function(){
				this.value = this.value.replace(/[^0-9\.]/g,'');
			});
		}*/
//----------------
		/*
		function restriccionTexto(){
			//funcion que solo permite guardar numeros y decimales
			$(".Varchar01,.Varchar02,.Varchar03,.clienteObjetivo").on('input',function(){
				this.value = this.value.replace(/[^0-9a-zA-Z, .áéíñóúüÁÉÍÑÓÚÜ_-]/g, "");
			});
		}
		function restriccionFecha(){
			//funcion que solo permite guardar numeros y decimales
			$(".datepicker").keydown(function (event) {
				event.preventDefault();
			});
		}
		*/
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

function sumarTransporte(){
	
	$(".CostoTransporte").keyup(function(){
		EjecutarSuma();
		});
}
function EjecutarSuma(){
	total=0;		

			$(".CostoTransporte").each(
			function(index, value) {
				if ( $.isNumeric($(this).val())){
				    total = total + parseFloat($(this).val());
				    total = total.toFixed(2);
				    total = parseFloat(total);
				    }
			}	
		      	);
	      		$("#TotalTrans").val(total);
}
function RecargarTablaTransporte(){
	//console.log("Se envia por crud.js");
	//alert("modi");
	$("#tabla").load('crud/FolioUsuarioTransporteJson.php');
	var url="crud/BuscarFoliosTransporte.php";
	$("TbUsuariosFolios tbody").html("");
	$.getJSON(url,function(arregloEnviar){
		$.each(arregloEnviar, function(i,arregloEnviar){
			Folio= arregloEnviar.folio;
			var newRow =
			"<tr>"
			+"<td>"+arregloEnviar.folio+"</td>"
			+"<td>"+arregloEnviar.fechaComprobante+"</td>"
			+"<td>$"+arregloEnviar.totalfolio+"</td>"
			//+"<td>"+arregloEnviar.tipoFormulario+"</td>"
			+"<td>"
		  //+'<form action="PDF/PDFTransporte.php" method=post target="popup" ><input name="folio" type="hidden" value='+Folio+'><input type="submit" class="btn btn-info btn-PDF" value=PDF /></form>'
			+'<form action="PDF/PDFTransporte.php" method=post target="popup" ><input name="folio" type="hidden" value='+Folio+'><input type="submit" class="btn btn-info btn-PDF" value=PDF /></form>'
			+"</td>"
			+"</tr>";
			$(newRow).appendTo("#TbUsuariosFolios tbody");
		});
		$('#TbUsuariosFolios').DataTable({
			responsive: true,
			"language": {
		        "lengthMenu": "",
		        "zeroRecords": "No se encontraron resultados en una busqueda mayor a 15 dias",
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


//-------------------------------------------------------


</script>
<?php 
 $connSelect = null;
 ?>



