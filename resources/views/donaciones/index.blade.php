@extends('layout2')
@section('content')
<div class="container" >
	<div class="col s12 ">
		<div class="row">
			<h4 class="col s11 center">
			Donaciones
			</h4>
			
			<a class="modal-trigger btn-floating btn-large waves-effect waves-light blue " href="{{ route('donaciones.create') }}">
				<i class="material-icons">
				add
				</i>
			</a>
			<br>
			</br>
		</div>
		<div class="row">
			<div class="col s12">
				<table class="striped">
					<thead>
						<tr>
							
							<th >id </th>
							<th >codDonacion </th>
							<th >cantidad</th>
							<th >nroCuota </th>
							<th >abono </th>
							<th>fechain </th>
							<th>fechaFinal</th>
							<th>modalidad</th>							
							<th>idDonante</th>
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
							<td>{{ $fila -> abono }}</td>
							<td>{{ $fila -> fechain }}</td>
							<td>{{ $fila -> fechaFinal }}</td>
							<td>{{ $fila -> modalidad }}</td>
							<td>{{ $fila -> idDonante }}</td>
							<td>{{ $fila -> proyecto }}</td>
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
			
		</div>
		
	</div>
</div>
@endsection