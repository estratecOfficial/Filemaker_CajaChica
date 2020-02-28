function selectPrestamoProvisional(){
	$.post('crud/importeDeGastos.php', 
       function (data){
          c = JSON.parse(data);
          //se separa, uno para invocar y el otro para llenar, la idea es llamarlo una vez y rellenar varias
          llenadoPrestamoProvisional(c);
       });
}
function llenadoPrestamoProvisional(c){
	/*$('.folioValeProvisional').append('<option value="Nuevo">Nuevo</option>'); */
	//console.log("se invoca el llenado");
	$.each(c, function(i, item){
		if(item.importe >0){
			$(".deuda").html("");
			$(".labelDeuda").html("");
			$(".deudaCheck").html("");
			//console.log("el usuario debe pagar");
			var newRow ='<input type ="text" id="DeudaCredito" class="form-control DeudaCredito" name="DeudaCredito" readonly value="'+item.importe+'">';
			$('.deuda').append(newRow);
			var newrow ='<input type="hidden" id ="FolioDeuda" name="FolioDeuda" value="'+item.folio+'">';
			$('.deuda').append(newrow);
			$('.labelDeuda').append("El usuario debe comprobar");
			var newrow ='<input type="checkbox" name="checkDeuda" class="form-control" value="Si"> ¿Desea anexar este comprobante para ello?';
			$('.deudaCheck').append(newrow);
		}else{
			$(".deuda").html("");
			$(".labelDeuda").html("");
			$(".deudaCheck").html("");
		}
	});
}
