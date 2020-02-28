<?php
   $connSelect = new DB(); 
   $arrayTransportes= [];
// <a id="mostrarOcultar" class="boton" >+</a>
?>
 <br>
 <div id = "boton" ><button id ="mosOculViaje" type="button" class="btn btn-primary btn-rounded nuevoRegistro">Nuevo</button>
 </div>
<div id="divformularioViaje" class="Formulario" >
	<div class="form-group"> 
		<form class ="form Formulario" id="formularioViaje" name ="fo3" action="crud/noEsUnPhpFalso.php"  method="POST" accept-charset="utf-8">
			<div class="form-row">
				<input type="hidden" id ="Departamento" name="Departamento" value="<?php echo $user->getDepartamento();?>">
				<div class="input validate rs1">
					<label class="labelViaje principal" >Empleado     </label>
					<input type="text" placeholder="nombre" id="nombre" class="nombre inputFormu form-control" name="nombre" autocomplete="off" value="<?php echo $user->getNombre();?>" required readonly>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" >Fecha Comprobación</label>
					<input type="text" placeholder="Fecha de Comprobación" id="fechaViaje" class="datepicker inputFormu form-control" name="fechaComprobante" autocomplete="off" required>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" id="labelEstancia" >Lugar de Estancia</label>
					<input type="text" placeholder="Lugar de Estancia" id="lugarEstancia" class="inputFormu form-control" name="lugarEstancia" autocomplete="off" required>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" id="labelEstancia" >Cliente Objetivo</label>
					<input type="text" placeholder="Cliente" id="clienteObjetivo" class="clienteObjetivo  form-control" name="clienteObjetivo[]" autocomplete="off" required>
				</div>
				<div class="input validate rs1">
					<label class="labelViaje principal" >Fecha de Viaje</label>
					<input type="text" placeholder="Fecha de Viaje" id="fechaCompro" class="datepicker inputFormu form-control" name="fecha01" autocomplete="off" required>
				</div>
			</div>
				<p></p>		   
				<hr class="someClass">	
					
			<div id="container">
				<div class = "general">
					<button id ="MosOculEstancia" type="button" class="btn btn-concent btn-rounded">Estancia y Transporte</button>
				</div>
				<div id= "HospedajeTransporte">
					<input type="hidden" id ="GViajes" name="GViajes" value="GViajes">
					<div class="form-row titulos " id = "titulos">
						<div class="form-group col-md-3">
							    <label class="labelViaje principal" >Concepto</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Con Comprobante</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Sin Comprobante</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Importe</label>
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Hospedaje</label>
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Hospedaje "  id = "hospedaje" class="H V Vc form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Hospedaje " id = "hospedaje" class= "H V Vs form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
								<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totHospe" id="totHospe" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Transporte Foreaneo</label>
						</div>
						<div class="form-group col-md-2">
						 <label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Transporte " id = "transporte"  class="T V Vc form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Transporte " id="transporte" class= "T V Vs form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totTrans" id="totTrans" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Casetas</label>
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Casetas " id = "casetas" class="C V Vc form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Casetas " id= "casetas" class= "C V Vs form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totCasetas" id="totCasetas" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							    <label class="labelViaje principal" >Total Hospedaje y Transporte</label>
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01"    id= "totalConViaje" class=" form-control Float"  autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01"  id = "totalSinViaje" class= "form-control Float"  autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totGeneralViaje" id="totGeneralViaje" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
				<hr class="someClass">
				</div>

				
				<div class = "general">
					<button id ="MosOcuAlimentos" type="button" class="btn btn-concent btn-rounded">Alimentos</button>
				</div>
				<div id="Alimentos"> 
					<div class="form-row titulos " id = "titulos">
						<div class="form-group col-md-3">
							    <label class="labelViaje principal" >Concepto</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Con Comprobante</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Sin Comprobante</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Importe</label>
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Desayuno</label>
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Desayuno " id ="desayunoCom" class="Des DesCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Desayuno " id="desayuno" class= "Des DesSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totDesa" id="totDesa" autocomplete="off" readonly tabIndex="-1" >
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Comida</label>
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Comida "  id ="comida" class="Com ComCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Comida "  id="comida" class= "Com ComSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totComida" id="totComida" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Cena</label>
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Cena " id="cena" class="Cena CenaCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Cena "  id= "cena" class= "Cena CenaSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totCena" id="totCena" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">

						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							    <label class="labelViaje principal" >Total Alimentos</label>
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01"   id="alimentosCon" class=" form-control Float"  autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01"  id ="alimentosSin" class= "form-control Float"  autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totGeneralAlimentos" id="totGeneralAlimentos" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
				</div>
				<div class = "general">
					<button id ="MosOcuOtros" type="button" class="btn btn-concent btn-rounded">Otros</button>
				</div>
				<hr class="someClass">
				<div id="Otros">
					<div class="form-row titulos " id = "titulos">
						<div class="form-group col-md-3">
							    <label class="labelViaje principal" >Concepto</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Con Comprobante</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Sin Comprobante</label>
						</div>
						<div class="form-group col-md-2">
							    <label class="labelViaje principal" >Importe</label>
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">

						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Recargas </label>
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Recargas " id="recargas" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Recargas " id="recargas"  class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totRecargas" id="totRecargas" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							    <label class="label principal" >Tintoreria </label>
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01" placeholder="Tintoreria "  id= "tintoreria" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01" placeholder="Tintoreria "  id="tintoreria" class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totTinto" id="totTinto" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    <label class="label principal" >Otros [01] </label>
						</div>
						<div class="form-group col-md-2">
							      <input type="text" placeholder="Otros" id="VarcharOtros01" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							
							   <input type="number" step="0.01" placeholder="Otros "  id="otrosCon01" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							
							    <input type="number" step="0.01" placeholder="Otros " id="otrosSin01" class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
					
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totHospe" id="totOtros01" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    <label class="label principal" >Otros [02] </label>
						</div>
						<div class="form-group col-md-2">
							      <input type="text" placeholder="Otros" id="VarcharOtros02" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
						
							   <input type="number" step="0.01" placeholder="Otros "  id="otrosCon02" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							
							    <input type="number" step="0.01" placeholder="Otros " id="otrosSin02" class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totHospe" id="totOtros02" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
							<div class="form-group col-md-1">
							    <label class="label principal" >Otros [03] </label>
						</div>
						<div class="form-group col-md-2">
							      <input type="text" placeholder="Otros" id="VarcharOtros03" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
						
							   <input type="number" step="0.01" placeholder="Otros "  id="otrosCon03" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							
							    <input type="number" step="0.01" placeholder="Otros " id="otrosSin03" class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totHospe" id="totOtros03" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    <label class="label principal" >Otros [04] </label>
						</div>
						<div class="form-group col-md-2">
							      <input type="text" placeholder="Otros" id="VarcharOtros04" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>

							   <input type="number" step="0.01" placeholder="Otros "  id="otrosCon04" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>

							    <input type="number" step="0.01" placeholder="Otros " id="otrosSin04" class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">

							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totHospe" id="totOtros04" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    <label class="label principal" >Otros [05] </label>
						</div>
						<div class="form-group col-md-2">
							      <input type="text" placeholder="Otros" id="VarcharOtros05" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
						
							   <input type="number" step="0.01" placeholder="Otros "  id="otrosCon05" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
							
							    <input type="number" step="0.01" placeholder="Otros " id="otrosSin05" class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Total</label>
						
							    <input type="number" step="0.01"   class= "form-control Float" name="totHospe" id="totOtros05" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    <label class="label principal" >Otros [06] </label>
						</div>
						<div class="form-group col-md-2">
							      <input type="text" placeholder="Otros" id="VarcharOtros06" class="Varchar03  form-control" name="Varchar03[]" autocomplete="off" >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Con Comprobante</label>
							
							   <input type="number" step="0.01" placeholder="Otros "  id="otrosCon06" class="otros otrosCon form-control Float" name="Float01[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							<label class="label Secundario" >Sin Comprobante</label>
						
							    <input type="number" step="0.01" placeholder="Otros " id="otrosSin06" class= "otros otrosSin form-control Float" name="Float02[]" autocomplete="off"  >
						</div>
						<div class="form-group col-md-2">
							
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control Float" name="totHospe" id="totOtros06" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							    <label class="labelViaje principal" >Total Otros</label>
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Con Comprobante</label>
							   <input type="number" step="0.01"   id="totalOtrosCon" class=" form-control Float"  autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Sin Comprobante</label>
							    <input type="number" step="0.01"  id ="totalOtrosSin" class= "form-control Float"  autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							<hr class="someClass">
							<label class="label Secundario" >Total</label>
							    <input type="number" step="0.01"   class= "form-control totalOtrosGen" name="totOtrosGen" id="totGeneralOtros" autocomplete="off" readonly tabIndex="-1">
						</div>
						<div class="form-group col-md-2">
							    
						</div>
					</div>
				</div>
				<hr class="someClass">
				<div class="form-row">
					<div class="form-group col-md-1">
							    
						</div>
						<div class="form-group col-md-2">
						    <label class="labelViaje principal" >Total Final</label>
					</div>
					<div class="form-group col-md-2">
						<label class="label " >Con Comprobante</label>
						   <input type="number" step="0.01"   id="totalCon" name="total" class=" form-control Float"  autocomplete="off" readonly tabIndex="-1">
					</div>
					<div class="form-group col-md-2">
						<label class="label" >Sin Comprobante</label>
						    <input type="number" step="0.01"  id ="totalSin" name ="total" class= "form-control Float"  autocomplete="off" readonly tabIndex="-1">
					</div>
					<div class="form-group col-md-2">
						<label class="label " >General</label>
						    <input type="number" step="0.01"  id ="totalFinal" name ="totalFinal" class= "form-control Float"  autocomplete="off" readonly tabIndex="-1">
					</div>
					<div class="form-group col-md-2">
						    
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-1">
					</div>
					<div class="form-group col-md-2 ">

					</div>
					<div class="form-group col-md-2">
						<label class="labelFormu labelDeuda" ></label>	
					</div>
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-2">
						<label class="labelFormu deuda" > </label>
					</div>
					<div class="form-group col-md-2">
						<label class="labelFormu deudaCheck" > </label>
					</div>
					
					<div class="form-group col-md-1">
						
					</div>
				</div>
			</div>		
				<hr class="someClass">
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
								<input type="submit" name="Boton" class="EnvioFormulario btn btn-success disabled" value="Guardar" id="enviarFormViaje">
						</div>
					</div>
				
				<br>
				<div id="resultadoViaje" class= "alert text-center" ></div>
			<br>
		</form>
	</div>
</div>

<script>
		c1=0;c2=0;c3=0;
	$(document).ready(function() {
		$("#enviarFormViaje").attr('disabled','disabled');
		//----------------
		$("#fechaViaje").on('click',".datepicker",function(event) {
			});
		//----------------
		//$( ".datepicker" ).datepicker({dateFormat: "yy/mm/dd"});
		 monetario01();
		 restriccionTexto();
		 restriccionFecha();
    	 autoBusqueda();
    	 //*********	
    	  	$("#MosOculEstancia").click(function(){
    		if(c1==0){ $('#HospedajeTransporte').show(1000); c1=1;
    		$("#MosOculEstancia").removeClass("btn btn-concent btn-rounded").addClass("btn btn-warning btn-rounded");
    		}else{ 	$('#HospedajeTransporte').hide(1000); c1=0; 
    		$("#MosOculEstancia").removeClass("btn btn-warning btn-rounded").addClass("btn btn-concent btn-rounded");
    		}
    	});	
    	$("#MosOcuAlimentos").click(function(){
    		if(c2==0){ 	$('#Alimentos').show(1000); c2=1;
    		$("#MosOcuAlimentos").removeClass("btn btn-concent btn-rounded").addClass("btn btn-warning btn-rounded");
    		}else{ $('#Alimentos').hide(1000); c2=0;
    		$("#MosOcuAlimentos").removeClass("btn btn-warning btn-rounded").addClass("btn btn-concent btn-rounded");
    		 }
    	});
    		$("#MosOcuOtros").click(function(){ 
    		if(c3==0){ $('#Otros').show(1000); c3=1;
    		$("#MosOcuOtros").removeClass("btn btn-concent btn-rounded").addClass("btn btn-warning btn-rounded");
    		}else{ 	$('#Otros').hide(1000); c3=0; 
    		$("#MosOcuOtros").removeClass("btn btn-warning btn-rounded").addClass("btn btn-concent btn-rounded");
    		}
    	});	

    	 //**********
   });
//---------------Funciones fuera de documentment
	
		function monetario01(){
			//funcion que solo permite guardar numeros y decimales
			$(".Float").on('input',function(){
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
		}	
		*/
///--------------------------------------		
		$(".Vc").keyup(function(){
			total=0;		
			$(".Vc").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalConViaje").val(total);
		});

		$(".Vs").keyup(function(){
			total=0;		
			$(".Vs").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalSinViaje").val(total);
		});

		$(".H").keyup(function(){
			total=0;		
			$(".H").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totHospe").val(total);
		});

		$(".T").keyup(function(){
			total=0;		
			$(".T").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totTrans").val(total);
		});


		$(".C").keyup(function(){
			total=0;		
			$(".C").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totCasetas").val(total);
		});

		$(".H,.T,.C").keyup(function(){
			total=0;		
			$(".H,.T,.C").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totGeneralViaje").val(total);
		});
//--------------------------------

		$(".DesCon,.ComCon,.CenaCon").keyup(function(){
			total=0;		
			$(".DesCon,.ComCon,.CenaCon").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#alimentosCon").val(total);
		});

		
		$(".DesSin,.ComSin,.CenaSin").keyup(function(){
			total=0;		
			$(".DesSin,.ComSin,.CenaSin").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#alimentosSin").val(total);
		});

		$(".Des").keyup(function(){
			total=0;		
			$(".Des").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totDesa").val(total);
		});

		$(".Com").keyup(function(){
			total=0;		
			$(".Com").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totComida").val(total);
		});


		$(".Cena").keyup(function(){
			total=0;		
			$(".Cena").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totCena").val(total);
		});

		$(".Des,.Com,.Cena").keyup(function(){
			total=0;		
			$(".Des,.Com,.Cena").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totGeneralAlimentos").val(total);
		});
//--------------------------------
$(".otrosCon").keyup(function(){
			total=0;		
			$(".otrosCon").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalOtrosCon").val(total);
		});


$(".otrosSin").keyup(function(){
			total=0;		
			$(".otrosSin").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalOtrosSin").val(total);
		});
//-----------------------Totales Otros Horizontales
$("#recargasCon,#recargas").keyup(function(){
			total=0;		
			$("#recargasCon,#recargas").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totRecargas").val(total);
		});

$("#tintoreriaCon,#tintoreria").keyup(function(){
			total=0;		
			$("#tintoreriaCon,#tintoreria").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totTinto").val(total);
		});

$("#tintoreriaCon,#tintoreria").keyup(function(){
			total=0;		
			$("#tintoreriaCon,#tintoreria").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totTinto").val(total);
		});
$("#otrosCon01,#otrosSin01").keyup(function(){
			total=0;		
			$("#otrosCon01,#otrosSin01").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totOtros01").val(total);
      		if($("#totOtros01").val() > 0 ){
      			$("#VarcharOtros01").prop('required',true);
      		}else {
      			$("#VarcharOtros01").prop('required',false);
      		}
		});
$("#otrosCon02,#otrosSin02").keyup(function(){
			total=0;		
			$("#otrosCon02,#otrosSin02").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totOtros02").val(total);
      		if($("#totOtros02").val() > 0 ){
      			$("#VarcharOtros02").prop('required',true);
      		}else {
      			$("#VarcharOtros02").prop('required',false);
      		}
		});
$("#otrosCon03,#otrosSin03").keyup(function(){
			total=0;		
			$("#otrosCon03,#otrosSin03").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totOtros03").val(total);
      		if($("#totOtros03").val() > 0 ){
      			$("#VarcharOtros03").prop('required',true);
      		}else {
      			$("#VarcharOtros03").prop('required',false);
      		}
		});
$("#otrosCon04,#otrosSin04").keyup(function(){
			total=0;		
			$("#otrosCon04,#otrosSin04").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totOtros04").val(total);
      		if($("#totOtros04").val() > 0 ){
      			$("#VarcharOtros04").prop('required',true);
      		}else {
      			$("#VarcharOtros04").prop('required',false);
      		}
		});
$("#otrosCon05,#otrosSin05").keyup(function(){
			total=0;		
			$("#otrosCon05,#otrosSin05").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totOtros05").val(total);
      		if($("#totOtros05").val() > 0 ){
      			$("#VarcharOtros05").prop('required',true);
      		}else {
      			$("#VarcharOtros05").prop('required',false);
      		}
		});
$("#otrosCon06,#otrosSin06").keyup(function(){
			total=0;		
			$("#otrosCon06,#otrosSin06").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totOtros06").val(total);
      		if($("#totOtros06").val() > 0 ){
      			$("#VarcharOtros06").prop('required',true);
      		}else {
      			$("#VarcharOtros06").prop('required',false);
      		}
		});



//---------------------Totales Generales
$(".Float").keyup(function(){
			total=0;		
			$("#totalConViaje, #alimentosCon, #totalOtrosCon").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalCon").val(total);
		});

$(".Float").keyup(function(){
			total=0;		
			$("#totalSinViaje, #alimentosSin, #totalOtrosSin").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalSin").val(total);
		});

$(".Float").keyup(function(){
			total=0;		
			$("#totalSin, #totalCon").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totalFinal").val(total);
      		var valorAna= $("#totalFinal").val();
      		console.log("el valor analizar es: "+valorAna );
      				if (valorAna > 0 ) {
					$('#enviarFormViaje').removeClass("disabled");
					$("#enviarFormViaje").removeAttr('disabled');

				}else{
					$("#enviarFormViaje").addClass("disabled");
					$("#enviarFormViaje").attr('disabled','disabled');
				}

		});

$(".otros").keyup(function(){
			total=0;		
			$("#totalOtrosCon, #totalOtrosSin").each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$("#totGeneralOtros").val(total);
		});

//--------------------------------


/*
		function suma(elementos,objetivo){
			total=0;
			$(elementos).each(
	    		function(index, value) {
	      		if ( $.isNumeric($(this).val())){
	      			//totalViajeCon = totalViajeCon + eval($(this).val());
	      			total = total + parseFloat($(this).val());
	      			total = total.toFixed(2);
	      			total = parseFloat(total);
	      		}
	      	}	
	      	);
      		$(objetivo).val(total);

      		
		};
*/
function RecargarTablaViajes(){
	console.log("inicio de Viaje");
	$("#tabla03").load('crud/FolioUsuarioViajesJson.php');
	var url="crud/BuscarFoliosViajes.php";
	$("#TbUsuariosViajesFolios tbody").html("");
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
			Folio= arregloEnviar.folio;

			totalGeneral = (arregloEnviar.totalCompro +arregloEnviar.totalSinCompro);
			var newRow =
			"<tr>"
			+"<td>"+arregloEnviar.folio+"</td>"
			+"<td>"+arregloEnviar.fechaComprobante+"</td>"
			+"<td>$"+arregloEnviar.totalCompro+"</td>"
			+"<td>$"+totalGeneral+"</td>"
			+"<td>"+arregloEnviar.clienteObjetivo+"</td>"
			+"<td>"
			//+"<a RowFolio="+Folio+" class='btn btn-success btn-edit' ><span class=' datosTabla glyphicon  glyphicon-edit'>Datos</span></a> "
			+'<form action="PDF/PDFViajes.php" method=post target="popup" ><input name="folio" type="hidden" value='+Folio+'><input type="submit" class="btn btn-info btn-PDF" value=PDF /></form>'
			//+"<a RowFolio="+Folio+" class='btn btn-info btn-PDF' ><span class=' datosTabla glyphicon  glyphicon-edit'>PDF</span></a> "			
			+"</td>"
					
			+"</tr>";
			$(newRow).appendTo("#TbUsuariosViajesFolios tbody");
		});
		$('#TbUsuariosViajesFolios').DataTable({
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



</script>
<?php 
 $connSelect = null;
 ?>



