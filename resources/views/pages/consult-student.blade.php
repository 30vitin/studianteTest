@extends('layouts.layoutDashboard')

@section('title','Consultar Estudiante')

@section('content')
  <div class="wrapper ">

    @include('panels/nav')
	<div class="main-panel">
	    @include('panels/nav-top')

	     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Listado de Estudiantes</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  	<form method="get">

                       @if(isset($mensaje) &&  $mensaje!='')
                             <div class="alert alert-info">
                                <p>{{$mensaje}}</p>
                              </div>
                       @endif

                  		<div class="row">
                  			<div class="col-md-2"></div>
                  			<div class="col-md-2">
                  				<select name="searchField" class="form-control">
                  					 <option value="{{$titles['Cedula']}}" @if($searchField == $titles['Cedula']) selected @endif>Cedula</option>
                  					 <option value="{{$titles['Id_Num']}}" @if($searchField == $titles['Id_Num']) selected @endif>Id_Num</option>
                  					 <option value="{{$titles['Primer Nombre']}}" @if($searchField == $titles['Primer Nombre']) selected @endif>Primer Nombre</option>
                  					 <option value="{{$titles['Apellido']}}" @if($searchField == $titles['Apellido']) selected @endif>Apellido</option>
                  					 <option value="{{$titles['Celular']}}" @if($searchField == $titles['Celular']) selected @endif>Celular</option>
                  					 <option value="{{$titles['Email']}}" @if($searchField == $titles['Email']) selected @endif>Email</option>
                  					 <option value="{{$titles['Type']}}" @if($searchField == $titles['Type']) selected @endif>Type</option>


                  				</select>
                  			</div>
                  			<div class="col-md-1">
                  				<select name="searchOperator" class="form-control">
                  					<option value="=" @if($searchOperator == "=") selected @endif>Igual a </option>
                  					<option value="%%" @if($searchOperator == "%%") selected @endif >Contiene</option>
									<option value="<" @if($searchOperator == "<") selected @endif >Menor que</option>
									<option value=">" @if($searchOperator == ">") selected @endif >Mayor que</option>
                  				</select>
                  			</div>
                  			<div class="col-md-3">
                  					<input type="text" class="form-control" placeholder="Buscar..." name="searchText" id="fisrt_name" value="{{ $searchText }}">
                  			</div>
                  			<div class="col-md-2">
                  				  	<button type="submit" class="btn btn-info">Buscar</button>

                  			</div>
                  		</div>

                  	</form>

                    <table class="table">
                      <thead class=" text-primary">
                        <th>Cedula</th>
                        <th>Id_Num</th>
                        <th>Primer Nombre</th>
                        <th>Apellido</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Type</th>
						<th>Editar</th>


                      </thead>
                      <tbody>

					@foreach ($students as $student)
                        <tr>
                          <td>{{ $student["cedula"]}}</td>
                          <td>{{ $student["id_num"]}}</td>
                          <td>{{ $student["fisrt_name"]}}</td>
                          <td>{{ $student["last_name"]}}</td>
                          <td>{{ $student["cell_phone"]}}</td>
                          <td>{{ $student["email"]}}</td>
                          <td class="text-primary">{{ $student["type"]}}</td>
                          <td>
                          	<a href="/edit-student/{{ $student["id_num"]}}" class="btn btn-info">
		                    <span class="btn-label">
		                      <i class="material-icons">remove_red_eye</i>
		                    </span>
		                    Info
                            </a> </td>

                        </tr>

                 @endforeach



                      </tbody>

                    </table>

<div class="row">
	<div class="col-md-8"></div>
    <div class="col-md-3">
    	{{ $students->appends(['searchOperator' => $searchOperator,
    	  						'searchField'=>$searchField,
    	  						'searchText'=>$searchText])->links('vendor.pagination.bootstrap-4') }}
      </div>

</div>




                  </div>


                </div>
              </div>
            </div>

          </div>
        </div>
      </div>



	 </div><!--end p box-->

 </div>

@endsection
