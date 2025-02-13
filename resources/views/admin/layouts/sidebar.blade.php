<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Db</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ sidebarActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link "><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>

            <!-- Industru Type -->
            <li class="{{ sidebarActive(['admin.industry-type.index']) }}">
                <a class="nav-link" href="{{ route('admin.industry-type.index') }}">
                    {{-- <i class="far fa-square"></i> --}}
                    <i class="fas fa-home"></i>
                    <span>Industru Type</span>
                </a>
            </li>
            <!-- Organization Type -->
            <li class="{{ sidebarActive(['admin.organization-type.index']) }}">
                <a class="nav-link" href="{{ route('admin.organization-type.index') }}">
                    {{-- <i class="far fa-square"></i> --}}
                    <i class="fas fa-home"></i>
                    <span>Organization Type</span>
                </a>
            </li>

            <!-- Candidate Attributes -->
            <li class="dropdown {{ sidebarActive(['admin.languages.*', 'admin.professions.*', 'admin.skills.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Candidate Attributes</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ sidebarActive(['admin.languages.*']) }}"><a class="nav-link"
                            href="{{ route('admin.languages.index') }}">Languages</a></li>
                    <li class="{{ sidebarActive(['admin.professions.*']) }}"><a class="nav-link"
                            href="{{ route('admin.professions.index') }}">Profession</a></li>
                    <li class="{{ sidebarActive(['admin.skills.*']) }}"><a class="nav-link"
                            href="{{ route('admin.skills.index') }}">Skills</a></li>
                </ul>
            </li>

            <!-- All Locations -->

            <li class="dropdown {{ sidebarActive(['admin.country.*', 'admin.state.*', 'admin.cities.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Locations</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ sidebarActive(['admin.country.*']) }}"><a class="nav-link"
                            href="{{ route('admin.country.index') }}">Country</a></li>
                    <li class="{{ sidebarActive(['admin.state.*']) }}"><a class="nav-link"
                            href="{{ route('admin.state.index') }}">States</a></li>
                    <li class="{{ sidebarActive(['admin.cities.*']) }}"><a class="nav-link "
                            href="{{ route('admin.cities.index') }}">Cities</a></li>
                </ul>
            </li>

            <!-- Orders -->
            <li class="{{ sidebarActive(['admin.orders.*']) }}">
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    {{-- <i class="far fa-square"></i> --}}
                    <i class="fas fa-home"></i>
                    <span>Orders</span>
                </a>
            </li>

            <!-- price plan -->
            <li class="{{ sidebarActive(['admin.plans.*']) }}">
                <a class="nav-link" href="{{ route('admin.plans.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Price Plan</span>
                </a>
            </li>

            <!-- payment setting -->
            <li class="{{ sidebarActive(['admin.payment-setting.index']) }}">
                <a class="nav-link" href="{{ route('admin.payment-setting.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Payment settings</span>
                </a>
            </li>

            <!-- site setting -->
            <li class="{{ sidebarActive(['admin.site-settings.index']) }}">
                <a class="nav-link" href="{{ route('admin.site-settings.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Site settings</span>
                </a>
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
