<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    @vite(['resources/login-assets/css/main.css','resources/login-assets/css/util.css',
            'resources/login-assets/vendor/bootstrap/css/bootstrap.min.css',
            'resources/login-assets/vendor/css-hamburgers/hamburgers.min.css',
            'resources/login-assets/vendor/animate/animate.css',
            'resources/login-assets/vendor/select2/select2.min.css',
            'resources/login-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css',])

            <style>
                .is-error{
                  border: 1px solid red !important;
                  margin-bottom: -10px !important;
                }

                .alert-validation{
                    font-size: 12px;
                    font-family: Poppins-Regular, sans-serif;
                    color:red; 
                    margin-bottom:12px;
                    align-items: center;
                    width: 100%;
                }
            </style>
    
</head>
<body>
    <div id="app">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="{{asset('images/logo.png')}}" alt="IMG">
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form" style="margin-top:-30px">
                        @csrf

                        <span class="login100-form-title">
                        {{ __('Registrarse') }}
                        </span>

                        <div class="form-check">
                            <div class="wrap-input100 validate-input ">
                                <input id="name" type="text" class="input100 @error('name') is-error @enderror" name="name" value="{{ old('name') }}"  autocomplete="nombre" autofocus 
                                    placeholder="Nombre">
                                
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('name')
                                    <span class="alert-validation" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                <input id="email" type="email" class="input100 @error('email') is-error @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus 
                                    placeholder="Correo electronico">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                          
                            </div>
                            @error('email')
                                    <span class="alert-validation" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password"  autocomplete="current-password"
                                placeholder="Contraseña">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-check">
                            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                <input id="password-confirm" type="password" class="input100 @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="current-password"
                                placeholder="Confirmar Contraseña">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="alert-validation" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Registrar cuenta
                            </button>
                        </div>

                       
                        <div class="text-center p-t-20">
                                <a href="/login" class="txt2">Iniciar Sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	

    @vite(['resources/login-assets/js/main.js',
            'resources/login-assets/vendor/bootstrap/js/popper.js',
            'resources/login-assets/vendor/bootstrap/js/bootstrap.min.js',
        ])

</body>
</html>