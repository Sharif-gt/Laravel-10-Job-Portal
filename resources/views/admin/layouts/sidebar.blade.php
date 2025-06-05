<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Db</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ sidebarActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link "><i
                        class="fas fa-chart-line"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>

            <!-- Industru Type -->
            @if (canAccess(['job attributes']))
                <li class="{{ sidebarActive(['admin.industry-type.index']) }}">
                    <a class="nav-link" href="{{ route('admin.industry-type.index') }}">
                        <i class="fas fa-industry"></i>
                        <span>Industru Type</span>
                    </a>
                </li>
                <!-- Organization Type -->
                <li class="{{ sidebarActive(['admin.organization-type.index']) }}">
                    <a class="nav-link" href="{{ route('admin.organization-type.index') }}">
                        <i class="fas fa-briefcase"></i>
                        <span>Organization Type</span>
                    </a>
                </li>
            @endif

            <!-- Menu builder -->
            @if (canAccess(['menu builder']))
                <li class="{{ sidebarActive(['admin.menu-builder.*']) }}">
                    <a class="nav-link" href="{{ route('admin.menu-builder') }}">
                        <i class="fas fa-menorah"></i>
                        <span>Menu Builder</span>
                    </a>
                </li>
            @endif

            <!-- Custom Page -->
            @if (canAccess(['site pages']))
                <li class="{{ sidebarActive(['admin.custom-page.*']) }}">
                    <a class="nav-link" href="{{ route('admin.custom-page.index') }}">
                        <i class="far fa-newspaper"></i>
                        <span>Custom Page</span>
                    </a>
                </li>
            @endif

            <!-- Subscribers -->
            @if (canAccess(['news letter']))
                <li class="{{ sidebarActive(['admin.subscribers']) }}">
                    <a class="nav-link" href="{{ route('admin.subscribers') }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Subscribers</span>
                    </a>
                </li>
            @endif


            <!-- Home Section -->
            @if (canAccess(['sections']))
                <li
                    class="dropdown {{ sidebarActive(['admin.hero.*', 'admin.why-choose-us.*', 'admin.learn-more.*', 'admin.about.*']) }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-home"></i>
                        <span>Home Section</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ sidebarActive(['admin.hero.*']) }}"><a class="nav-link"
                                href="{{ route('admin.hero.index') }}">Hero Section</a></li>

                        <li class="{{ sidebarActive(['admin.why-choose-us.*']) }}"><a class="nav-link"
                                href="{{ route('admin.why-choose-us.index') }}">Why Choose Us</a></li>

                        <li class="{{ sidebarActive(['admin.learn-more.*']) }}"><a class="nav-link"
                                href="{{ route('admin.learn-more.index') }}">Learn More</a></li>

                        <li class="{{ sidebarActive(['admin.about.*']) }}"><a class="nav-link"
                                href="{{ route('admin.about.index') }}">About Us</a></li>

                    </ul>
                </li>
            @endif


            <!-- Candidate Attributes -->
            @if (canAccess(['dashboard']))
                <li
                    class="dropdown {{ sidebarActive(['admin.languages.*', 'admin.professions.*', 'admin.skills.*']) }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-male"></i>
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
            @endif


            <!-- Job Attributes -->
            @if (canAccess(['job category create update', 'job category delete']))
                <li class="dropdown {{ sidebarActive(['admin.job-category.*']) }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-building"></i>
                        <span>Job Attributes</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ sidebarActive(['admin.job-category.*']) }}"><a class="nav-link"
                                href="{{ route('admin.job-category.index') }}">Job Category</a></li>
                    </ul>
                </li>
            @endif


            <!-- All Locations -->
            @if (canAccess(['job location']))
                <li class="dropdown {{ sidebarActive(['admin.country.*', 'admin.state.*', 'admin.cities.*']) }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-map-marked-alt"></i>
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
            @endif


            <!-- access management -->
            @if (canAccess(['access management']))
                <li class="dropdown {{ sidebarActive(['admin.role.*', 'admin.user-role.*']) }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-universal-access"></i>
                        <span>Access Management</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ sidebarActive(['admin.user-role.*']) }}"><a class="nav-link"
                                href="{{ route('admin.user-role.index') }}">Create User</a></li>

                        <li class="{{ sidebarActive(['admin.role.*']) }}"><a class="nav-link"
                                href="{{ route('admin.role.index') }}">Roles</a></li>
                    </ul>
                </li>
            @endif


            <!-- Blog -->
            @if (canAccess(['blogs']))
                <li class="{{ sidebarActive(['admin.blogs.*']) }}">
                    <a class="nav-link" href="{{ route('admin.blogs.index') }}">
                        <i class="far fa-newspaper"></i>
                        <span>Blogs</span>
                    </a>
                </li>
            @endif


            <!-- Orders -->
            @if (canAccess(['order index']))
                <li class="{{ sidebarActive(['admin.orders.*']) }}">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
            @endif


            <!-- job post -->
            @if (canAccess(['job create update', 'job delete']))
                <li class="{{ sidebarActive(['admin.jobs.*']) }}">
                    <a class="nav-link" href="{{ route('admin.jobs.index') }}">
                        <i class="fas fa-plus-circle"></i>
                        <span>Job Post</span>
                    </a>
                </li>
            @endif


            <!-- price plan -->
            @if (canAccess(['price plan']))
                <li class="{{ sidebarActive(['admin.plans.*']) }}">
                    <a class="nav-link" href="{{ route('admin.plans.index') }}">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Price Plan</span>
                    </a>
                </li>
            @endif

            <!-- payment setting -->
            @if (canAccess(['payment settings']))
                <li class="{{ sidebarActive(['admin.payment-setting.index']) }}">
                    <a class="nav-link" href="{{ route('admin.payment-setting.index') }}">
                        <i class="fas fa-cog"></i>
                        <span>Payment settings</span>
                    </a>
                </li>
            @endif

            <!-- site setting -->
            @if (canAccess(['site settings']))
                <li class="{{ sidebarActive(['admin.site-settings.index']) }}">
                    <a class="nav-link" href="{{ route('admin.site-settings.index') }}">
                        <i class="fas fa-cogs"></i>
                        <span>Site settings</span>
                    </a>
                </li>
            @endif

            <!-- Clear Database -->
            @if (canAccess(['database clear']))
                <li class="{{ sidebarActive(['admin.clear']) }}">
                    <a class="nav-link" href="{{ route('admin.clear') }}">
                        <i class="fas fa-trash"></i>
                        <span>Clear Database</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
