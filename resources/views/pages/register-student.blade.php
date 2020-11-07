@extends('layouts.layoutDashboard')

@section('title','Registar')

@section('content')
  <div class="wrapper ">

    @include('panels/nav')

<div class="main-panel">
    @include('panels/nav-top')

      <div class="content">
        <div class="container-fluid">

        <div class="row">
        	<div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment_ind</i>
                  </div>
                  <h4 class="card-title">Registrar Estudiante</h4>
                </div>
                <div class="card-body ">
                  <form method="POST" action="{{ route('register-student.action')}}" id="form">


                       @if (Session::has('type') &&  Session::get('type')=='error')
                           <div class="alert alert-danger">
                                <p>{{Session::get('mensaje')}}</p>
                            </div>
                       @elseif(Session::has('type') &&  Session::get('type')=='success')
                             <div class="alert alert-info">
                                <p>{{Session::get('mensaje')}}</p>
                              </div>
                       @endif
                    @csrf
                  	<div class="row">

                  	  <div class="col-md-3">
  	                    <div class="form-group bmd-form-group">
  	                      <label for="id_num" class="bmd-label-floating">Id Num</label>
  	                      <input type="text" name="id_num" class="form-control @error('id_num') is-invalid @enderror" id="id_num" required autocomplete="id_num" autofocus value="{{ old('id_num') }}">

                              @error('id_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                        </div>

                     </div>
                     <div class="col-md-6">
                   		 <div class="form-group bmd-form-group">
                        <label for="cedula" class="bmd-label-floating">Cedula</label>
                          <input type="text" name="cedula" class="form-control @error('cedula') is-invalid @enderror" id="cedula" required autocomplete="cedula" autofocus value="{{ old('cedula') }}">
                        	 @error('cedula')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                        </div>

                     </div>
                      <!--<div class="col-md-3">
                        <button type="button" class="btn btn-fill btn-info" disabled="">Logs</button>

                      </div>-->
                  	</div>
                  	<div class="row">

                  	  <div class="col-md-5">
	                    <div class="form-group bmd-form-group">
	                      <label for="fisrt_name" class="bmd-label-floating">Primer Nombre</label>
	                      <input type="text" class="form-control  @error('fisrt_name') is-invalid @enderror" name="fisrt_name" id="fisrt_name" required autocomplete="fisrt_name" autofocus value="{{ old('fisrt_name') }}">
                         @error('fisrt_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
	                    </div>

                     </div>
                     <div class="col-md-5">
                   		 <div class="form-group bmd-form-group">
                      <label for="last_name" class="bmd-label-floating">Apellido</label>
                      <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" required autocomplete="last_name" autofocus  value="{{ old('last_name') }}">

                        @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                    	</div>

                     </div>
                  	</div>
                  	<div class="row">

                  	 <div class="col-md-4">
  	                    <div class="form-group bmd-form-group">
  	                      <label for="home_phone" class="bmd-label-floating">Teléfono de Casa</label>
  	                      <input type="text" class="form-control" name="home_phone" id="home_phone" value="{{ old('home_phone') }}">
  	                    </div>
                     </div>
                     <div class="col-md-4">
                   		  <div class="form-group bmd-form-group">
                           <label for="work_phone" class="bmd-label-floating">Teléfono de Trabajo</label>
                           <input type="text" class="form-control " name="work_phone" id="work_phone" value="{{ old('work_phone') }}">
                      	</div>

                     </div>
                     <div class="col-md-4">
                   		   <div class="form-group bmd-form-group">
                            <label for="cell_phone" class="bmd-label-floating">Celular</label>
                            <input type="text" class="form-control @error('cell_phone') is-invalid @enderror" name="cell_phone" id="cell_phone" required autocomplete="cell_phone" autofocus value="{{ old('cell_phone') }}">

                              @error('cell_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        	</div>

                     </div>
                  	</div>
                  	<div class="row">

	                  	  <div class="col-md-12">
		                    <div class="form-group bmd-form-group">
		                      <label for="email" class="bmd-label-floating">Email</label>
		                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required autocomplete="email" autofocus value="{{ old('email') }}">

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>

	                     </div>
	                     <div class="col-md-12">
		                    <div class="form-group bmd-form-group">
		                      <label for="address" class="bmd-label-floating">Dirección</label>
		                      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" required autocomplete="address" autofocus value="{{ old('address') }}">

                            @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>

	                     </div>

                  	</div>

                  	<div class="row">
                      <div class="col-md-6">
                         <label for="student_type" class="bmd-label-floating">Tipo de Estudiante</label>
                          <select name="student_type" class="form-control  @error('student_type') is-invalid @enderror" required>
                            <option value="Regular">Regular</option>
                            <option value="Media">Media</option>

                          </select>
                           @error('student_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                      </div>
                      <div class="col-md-2">
                        <button type="reset" class="btn btn-fill btn-warning">Limpiar</button>

                      </div>
                      <!--<div class="col-md-2">
                        <button type="submit" class="btn btn-fill btn-danger">Eliminar</button>

                      </div>-->
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-fill btn-success">Guardar</button>

                      </div>

                  	</div>

                  </form>
                </div>

              </div>
            </div>

        </div>


        </div>
      </div>

</div>
  </div>

@endsection

