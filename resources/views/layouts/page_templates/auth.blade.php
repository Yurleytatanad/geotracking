<div class="wrapper">
    {{-- @include('layouts.sidebar') --}}
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid" style="background:white; box-shadow: 0px 0px 5px 1px black;margin-top:-10px">
                {{--  <div class="navbar-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item Active"><a href="{{ route('mapa.index') }}">Inicio</a></li>
                           @foreach (explode(".",request()->route()->getName()) as $item)
                              @if ($item!="index")
                                 @if($item == "users")
                                    <li class="breadcrumb-item active" {aria-current="page"}>  <a href="{{request()->segment(1)==$item?'/'.request()->segment(1):'#'}}">{{__("usuarios")}}</a> </li>
                                 @else
                                    <li class="breadcrumb-item active" {aria-current="page"}>  <a href="{{request()->segment(1)==$item?'/'.request()->segment(1):'#'}}">{{__("$item")}}</a> </li>
                                 @endif
                              @endif
                           @endforeach

                        </ol>
                     </nav>
                </div>  --}}
                <div class="navbar-wrapper">
                    <img id="logocar" src="/img/logocar.jpg" style="width:13em; height:85px; margin-left:12em">
                </div>
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav ml-auto">
                                <li class=" nav-item dropdown no-arrow">
                                    <a class="nav-link" href="{{ route('mapa.index') }}"
                                        style="color:black"><strong>Mapa</strong></a>
                                </li>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="{{ route('driver.index') }}"
                                        style="color:black"><strong>Conductores</strong></a>
                                </li>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="{{ route('company.index') }}"
                                        style="color:black"><strong>Empresas</strong></a>
                                </li>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="{{ route('vehicle.index') }}"
                                        style="color:black"><strong>Vehiculos</strong></a>
                                </li>
                                <!-- Top bar divider -->
                                <div class="topbar-divider d-none d-sm-block"></div>
                                <li class="nav-item btn-rotate dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com"
                                        id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="nc-icon nc-settings-gear-65"></i>
                                        <p>
                                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownMenuLink2">
                                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="navbarDropdownMenuLink">
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
