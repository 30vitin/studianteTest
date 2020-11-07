@extends('layouts.loginLayout')
@section('title', 'Registrar')

@section('content')

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="height: 230px;background-image: url(images/bg-02.jpg);">

                </div>

                <form class="login100-form " method="post" action="{{ route('register.action') }}">
                       @if (Session::has('mensaje'))
                       <div class="alert alert-danger">
                            <p>{{Session::get('mensaje')}}</p>
                        </div>
                    @endif
                     @csrf
                     <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Nombre</span>
                        <input class="input100 @error('name') is-invalid @enderror"
                          type="text" name="name" placeholder="Ingrese su Nombre" value="{{ old('name') }}"
                          required autocomplete="name" autofocus>
                        <span class="focus-input100"></span>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                       <div class="wrap-input100 m-b-26">
                           <span class="label-input100">Cargo</span>
                           <select name="cargo" class="form-control @error('cargo') is-invalid @enderror">
                               <option value="Profesor">Profesor</option>
                                <option value="Asistente">Asitente</option>

                           </select>
                           @error('cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                       </div>


                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Email</span>
                        <input class="input100 @error('email') is-invalid @enderror"
                          type="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}"
                          required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                    </div>



                    <div class="wrap-input100  m-b-18">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Contraseña" required autocomplete="new-password">
                        <!--<span class="focus-input100"></span>-->
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                    </div>



                <div class="wrap-input100  m-b-18">
                        <span class="label-input100">Repetir Contraseña</span>
                        <input class="input100 " id="password_confirmation" type="password" name="password_confirmation" placeholder="Repetir Contraseña" required autocomplete="new-password">

                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
@include('panels/scripts')
