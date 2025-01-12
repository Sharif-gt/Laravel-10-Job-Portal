<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Db</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>

            <!-- Industru Type -->
            <li>
                <a class="nav-link" href="{{ route('admin.industry-type.index') }}">
                    {{-- <i class="far fa-square"></i> --}}
                    <i class="fas fa-home"></i>
                    <span>Industru Type</span>
                </a>
            </li>
            <!-- Organization Type -->
            <li>
                <a class="nav-link" href="{{ route('admin.organization-type.index') }}">
                    {{-- <i class="far fa-square"></i> --}}
                    <i class="fas fa-home"></i>
                    <span>Organization Type</span>
                </a>
            </li>

            <!-- All Locations -->

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Locations</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.country.index') }}">Country</a></li>
                    <li><a class="nav-link" href="{{ route('admin.state.index') }}">States</a></li>
                    <li><a class="nav-link" href="{{ route('admin.cities.index') }}">Cities</a></li>
                </ul>
            </li>

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                </ul>
            </li> --}}

            {{-- <li>
                <a class="nav-link" href="blank.html">
                    <i class="far fa-square"></i>
                    <span>Blank Page</span>
                </a>
            </li> --}}
        </ul>
    </aside>
</div>
