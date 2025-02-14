<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 {{ sidebarActive(['company.dashboard']) }}"
                    href="{{ route('company.dashboard') }}">Dashboard</a>
            </li>
            <li><a class="btn btn-border mb-20 {{ sidebarActive(['company.profile']) }} "
                    href="{{ route('company.profile') }}">My Profile</a></li>

            <li><a class="btn btn-border mb-20 {{ sidebarActive(['company.plans.*']) }}"
                    href="{{ route('company.plans.index') }}">Plans</a></li>
            <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <li><a class="btn btn-border mb-20" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                </li>
            </form>
        </ul>
        {{-- <div class="mt-20"><a class="link-red" href="#">Delete Account</a></div> --}}
    </div>
</div>
