GEO TRACKING
<ul class="sidebar " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar" data-color="white" data-active-color="warning">
        <div class="logo">

        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                GEO TRACKING
                <hr class="sidebar-divider">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        @foreach ( $data as $driver )
                        <span>{{$driver->name}}</span></a>
                        @endforeach                        
                </li>
            </ul>
        </div>
        <hr class="sidebar-divider my-0">
    </div>

</ul>