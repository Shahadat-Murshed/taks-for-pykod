<nav id="sidebar">
    <ul>
        <li style="height: 60px">
            <a href="{{ route('home') }}"><i class="fa-brands fa-laravel"></i> <span>Pykod</span></a>
        </li>
        <li>
            <a href="{{ route('projects.index') }}"><i class="fa-solid fa-list-check"></i> <span>Projects</span></a>
        </li>
        <li>
            <a href="{{ route('projects.deleted') }}"><i class="fa-solid fa-recycle"></i> <span>Recycle Bin</span></a>
        </li>
        @if (Auth::user()->role === 'admin')
            <li>
                <a href="{{ route('users.index') }}"><i class="fa-solid fa-user"></i></i> <span>Users</span></a>
            </li>
        @endif
    </ul>
</nav>
