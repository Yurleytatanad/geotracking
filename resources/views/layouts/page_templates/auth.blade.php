<div class="wrapper">
    {{-- @include('layouts.sidebar') --}}
    <div class="main-panel" style="background:white">
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid" style="background:white;box-shadow:2px 3px 5px #d4d4d4;margin-top:40px; margin-left:-16px;position: absolute;">
                <div class="navbar-wrapper">
                    <img id="logocar" src="/img/logocar.JPG" style="width:12em; height:80px; margin-left:13em">
                </div>
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content" style=" margin-right:2em; width:50em">
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav ml-auto" style="margin-left:-60px">
                              
                                <li class=" nav-item dropdown no-arrow" style="margin-top:30px">
                                    <a class="nav-link" href="{{ route('mapa.index') }}"
                                        style="color:black"><strong>Mapa</strong></a>
                                </li>
                                <li class="nav-item dropdown no-arrow"style="margin-top:30px">
                                    <a class="nav-link" href="{{ route('driver.index') }}"
                                        style="color:black"><strong>Conductores</strong></a>
                                </li>
                                <li class="nav-item dropdown no-arrow"style="margin-top:30px">
                                    <a class="nav-link" href="{{ route('company.index') }}"
                                        style="color:black"><strong>Empresas</strong></a>
                                </li>
                                <li class="nav-item dropdown no-arrow"style="margin-top:30px">
                                    <a class="nav-link" href="{{ route('vehicle.index') }}"
                                        style="color:black"><strong>Vehículos</strong></a>
                                </li>
                                <!-- Top bar divider -->
                                <div class="topbar-divider d-none d-sm-block">
                                    <div class="navbar-wrapper">
                                        <img id="logocar" src="/img/linea.PNG">
                                    </div>
                                    <a class="bienvenido" style="font-size: 16px;margin-top:40px;width:10px; margin-left:10px;color:black;"><strong>Bienvenido,</strong></a>
                                </div>
                                <li class="nav-item btn-rotate dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com"
                                        id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <section class="circulo" style="width: 40px;height: 40px;
                                            border-radius: 50%;background:#AA3F3F;margin-top:10px">
                                        </section>
                                        <p>
                                            <span class="d-lg-none d-md-block">{{ __('Account') }}></span>
                                        </p>
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownMenuLink2">
                                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut"
                                            method="POST" style="display: none;border:20px solid red">
                                            @csrf
                                        </form>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="navbarDropdownMenuLink" >
                                            <a class="dropdown-item" onclick="logout()">{{ __('Cerrar sesion') }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
        @yield('mapa')
        @yield('content')

    </div>


</div>
@include('layouts.footer')
@push('scripts')
    <script>
        function logout() {
            myAlert.Confirmation('¿Estas Seguro?', 'Se cerrara la sesion').then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formLogOut').submit();
                }
            });
        }


        function registerNumeralLocale() {
            numeral.register("locale", "es", {
                delimiters: {
                    thousands: ".",
                    decimal: ","
                },
                abbreviations: {
                    thousand: "k",
                    million: "m",
                    billion: "b",
                    trillion: "t"
                },
                currency: {
                    symbol: "$"
                }
            });
        }

        $(document).ready(function() {
            registerNumeralLocale();
        })
    </script>
@endpush
