<x-menu-grupos>
	<x-slot name="slot">
        <div class="row migaspan">
            <a href="{{route('profesores.index')}}" class="text-danger">Profesores</a> >
        </div>
		<style>
			label.input-custom-file input[type=file] {
				display: none;
			}

			label:not(.no)::after{
				content: "*";
				color: red;
			}
		</style>
		<h5 class="text-center">{{$profesor->nombre}}&nbsp;{{$profesor->apellidos}}</h5>
		<div class="card text-center border-danger mr-3">
            <div class="card-header">
                <img class="img-fluid rounded" src="{{asset($profesor->foto)}}" width="300px" height="300px" alt="Foto">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col ml-2">
                        <span class="row"><b>DNI:</b>&nbsp;{{$profesor->dni}}</span>
                        <span class="row"><b>Domicilio:</b>&nbsp;{{$profesor->domicilio}}</span>
                        <span class="row"><b>Poblacion:</b>&nbsp;{{$profesor->poblacion}}</span>
                        <span class="row"><b>Provincia:</b>&nbsp;{{$profesor->provincia}}</span>
                        <span class="row"><b>Pais:</b>&nbsp;{{$profesor->pais}}</span>
                    </div>
                    <div class="col">
                        <span class="row"><b>Cod Postal:</b>&nbsp;{{$profesor->codigo_postal}}</span>
                        <span class="row"><b>Sexo:</b>&nbsp;{{$profesor->sexo}}</span>
                        <span class="row"><b>Tel&eacute;fono:</b>&nbsp;{{$profesor->telefono}}</span>
                        <span class="row"><b>Tel&eacute;fono 2:</b>&nbsp;{{$profesor->telefono2}}</span>
                        <span class="row"><b>Email:</b>&nbsp;{{$profesor->email}}</span>
                    </div>
                    <div class="col">
                        <span class="row"><b>Email 2:</b>&nbsp;{{$profesor->email2}}</span>
                        <span class="row"><b>Edad:</b>&nbsp;{{$profesor->edad}}</span>
                        <span class="row"><b>Fecha Nacimiento:</b>&nbsp;{{$profesor->fecha_nacimiento}}</span>
                        <span class="row"><b>Lugar Nacimiento:</b>&nbsp;{{$profesor->lugar_nacimiento}}</span>
                        <span class="row"><b>Nº Seguridad:</b>&nbsp;{{$profesor->nss}}</span>
                    </div>
                </div>
                <div class="container">
                    <b>Observaciones</b>
                    <textarea class="form-control bg-transparent" readonly>{{$profesor->observaciones}}</textarea>
                </div>
                <div class="row mt-3">
                    <button class="btn btn-outline-danger ml-2" id="mostrar" onclick="mostrar()">Mostrar más datos</button>
                </div>
                <div id="datos" class="container">
                    <span ><b>Forma de Pago:</b>&nbsp;{{$profesor->forma_pago}}</span>
                    <span><b>Entidad Ingreso:</b>&nbsp;{{$profesor->entidad_ingreso}}</span>
                    <span><b>Cuenta Ingreso:</b>&nbsp;{{$profesor->cuenta_ingreso}}</span>
                    <span><b>Swift:</b>&nbsp;{{$profesor->swift}}</span>
                    <span><b>IBAN:</b>&nbsp;{{$profesor->iban}}</span>
                    <span><b>Impuesto:</b>&nbsp;{{$profesor->impuesto}}</span>
                    <span><b>IRPF:</b>&nbsp;{{$profesor->irpf}}</span>
                </div>
            </div>
        </div>
        <script>
            function mostrar(){
                
                if($("#datos").attr("style") != "display: none;"){
                    $("#datos").hide();
                }else{
                    $("#datos").show();
                    
                }
                
            }
        </script>
	</x-slot>
</x-menu-grupos>
