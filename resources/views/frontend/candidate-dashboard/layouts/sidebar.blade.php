<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 {{ sidebarActive(['candidate.dashboard']) }}"
                    href="{{ route('candidate.dashboard') }}">Dashboard</a>
            </li>
            <li><a class="btn btn-border mb-20 {{ sidebarActive(['candidate.profile']) }}"
                    href="{{ route('candidate.profile') }}">My Profile</a></li>
            <li><a class="btn btn-border mb-20 {{ sidebarActive(['candidate.applied-job']) }}"
                    href="{{ route('candidate.applied-job') }}">Applied Job</a></li>
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
