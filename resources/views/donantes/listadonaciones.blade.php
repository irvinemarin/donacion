<div class="row">
	@if($listaDonaciones)
	<div class="col s12">
		
		<table class="striped">
			<thead>
				<tr>
					
					<th >id </th>
					<th >codDonacion </th>
					<th >cantidad</th>
					<th >nroCuota </th>
					<th>fechain </th>
					<th>fechaFinal</th>
					<th>modalidad</th>
					<th>proyecto</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($listaDonaciones as $fila)
				<tr>
					<td>{{ $fila -> id }}</td>
					<td>{{ $fila -> codDonacion }}</td>
					<td>{{ $fila -> cantidad }}</td>
					<td>{{ $fila -> nroCuota }}</td>
					<td>{{ $fila -> fechain }}</td>
					<td>{{ $fila -> fechaFinal }}</td>
					<td>{{ $fila -> modalidad }}</td>
					
					<td>{{ $fila -> proyecto }}</td>jejeje
					<td>{{ $fila -> Accion }}</td>
					
					
					<td>
						<a class="modal-trigger btn-floating btn-small waves-effect waves-light blue " onclick="getedit('{{ $fila -> id }}')" href="#modal-new-donante" >
							<i class="material-icons right">
							mode_edit
							</i>
						</a>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	{!!$listaDonaciones ->render()!!}
	@else
	No Tiene donaciones Registradas
	@endif
</div>