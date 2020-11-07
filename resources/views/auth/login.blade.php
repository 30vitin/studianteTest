@extends('layouts.loginLayout')

@section('title', 'Login')

@section('content')


<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="height: 230px;background-image: url(images/bg-02.jpg);">

                </div>

                <form class="login100-form " method="post" action="{{ route('login.action') }}">
                       @if (Session::has('mensaje'))
                       <div class="alert alert-danger">
                            <p>{{Session::get('mensaje')}}</p>
                        </div>
                    @endif
                     @csrf
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Email</span>
                        <input class="input100 @error('email') is-invalid @enderror"
                          type="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}"
                          required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>

                    </div>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    <div class="wrap-input100  m-b-18">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Contraseña" required autocomplete="current-password">
                        <span class="focus-input100"></span>


                    </div>





                        <div class="flex-sb-m w-full p-b-30 rows">

                            <div>
                                <a href="{{ route('password.request') }}" class="txt1">
                                ¿Olvidaste la contraseña?
                                </a>
                            </div>
                            <div>
                                <a href="/registrar" class="txt1">
                                    Registrarme
                                </a>
                            </div>

                        </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Acceder
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>

@endsection

@include('panels/scripts')
