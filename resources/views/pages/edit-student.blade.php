@extends('layouts.layoutDashboard')

@section('title','Editar')

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
                  <h4 class="card-title">Editar Estudiante {{$student[0]['fisrt_name'].' ['.$student[0]['id_num'].']'}}</h4>
                </div>
                <div class="card-body ">
                  <form method="POST" action="{{ route('student.update.action', $student[0]['id'])}}" >
                          @csrf
                           @method('PUT')


                       @if (Session::has('type') &&  Session::get('type')=='error')
                           <div class="alert alert-danger">
                                <p>{{Session::get('mensaje')}}</p>
                            </div>
                       @elseif(Session::has('type') &&  Session::get('type')=='success')
                             <div class="alert alert-info">
                                <p>{{Session::get('mensaje')}}</p>
                              </div>
                       @endif

                  	<div class="row">

                  	  <div class="col-md-3">
  	                    <div class="form-group bmd-form-group">
  	                      <span class="form-control" id="id_num">{{ $student[0]['id_num'] }}</span>

                        </div>

                     </div>
                     <div class="col-md-6">
                   		 <div class="form-group bmd-form-group">

                           <span class="form-control" id="cedula">{{ $student[0]['cedula'] }}</span>

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
	                      <input type="text" class="form-control  @error('fisrt_name') is-invalid @enderror" name="fisrt_name" id="fisrt_name" required autocomplete="fisrt_name" autofocus value="{{ $student[0]['fisrt_name'] }}">
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
                      <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" required autocomplete="last_name" autofocus  value="{{ $student[0]['last_name']}}">

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
  	                      <input type="text" class="form-control" name="home_phone" id="home_phone" value="{{ $student[0]['home_phone'] }}">
  	                    </div>
                     </div>
                     <div class="col-md-4">
                   		  <div class="form-group bmd-form-group">
                           <label for="work_phone" class="bmd-label-floating">Teléfono de Trabajo</label>
                           <input type="text" class="form-control " name="work_phone" id="work_phone" value="{{ $student[0]['work_phone'] }}">
                      	</div>

                     </div>
                     <div class="col-md-4">
                   		   <div class="form-group bmd-form-group">
                            <label for="cell_phone" class="bmd-label-floating">Celular</label>
                            <input type="text" class="form-control @error('cell_phone') is-invalid @enderror" name="cell_phone" id="cell_phone" required autocomplete="cell_phone" autofocus value="{{ $student[0]['cell_phone']}}">

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
		                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required autocomplete="email" autofocus value="{{ $student[0]['email'] }}">

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
		                      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" required autocomplete="address" autofocus value="{{$student[0]['address'] }}">

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
                            <option value="Regular" @if($student[0]['type'] =='Regular') selected @endif>Regular</option>
                            <option value="Media" @if($student[0]['type'] == 'Media') selected @endif>Media</option>

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
                     <div class="col-md-2">
                        <a href="/edit-student/{{ $student[0]['id_num']}}/{{$student[0]['fisrt_name']}}[{{ $student[0]['id_num']}}]/destroy" class="btn btn-fill btn-danger">Eliminar</a>

                      </div>
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

