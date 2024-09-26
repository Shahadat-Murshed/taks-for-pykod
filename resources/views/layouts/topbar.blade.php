<nav id="topbar" class="navbar navbar-light bg-light">
    <button class="collapse-btn" id="collapse-btn"><i class="fas fa-bars"></i></button>
    <div class="dropdown ms-auto">
        <a href="#" class="d-flex align-items-center me-4" data-bs-toggle="dropdown">
            <i class="fa-solid fa-user-tie" style="font-size: 25px"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li class="px-3 py-2">
                <a href="{{ route('profile.edit') }}" class="d-flex align-items-center "><i
                        class="fa-regular fa-address-card me-3"></i>Profile</a>
            </li>
            <li class="px-3 py-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="d-flex align-items-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>Log Out
                    </a>
                </form>
            </li>
        </ul>

    </div>
</nav>
