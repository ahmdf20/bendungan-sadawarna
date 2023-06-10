<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Profile</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                @if (Session::get('email'))
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        {{ $user->name }}
                    </a>
                @else
                    <a class="nav-link" href="{{ route('home') }}">
                        Login
                    </a>
                @endif
            </li>
            <div class="collapse" id="collapseExample">
                <div class="card card-body rounded-0 border-0 p-0">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa-solid fa-user"></i>
                            <a href="#" class="text-decoration-none text-dark fw-bolder"> My
                                Profile</a>
                        </li>
                        <li class="list-group-item">
                            <i class="fa-solid fa-power-off"></i>
                            <a class="text-decoration-none text-dark fw-bolder" href="{{ route('logout') }}"> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </ul>

        <hr>

        @php
            $dataMenu = [
                [
                    'title' => 'Dashboard',
                    'url' => 'admin',
                    'icon' => 'fa-solid fa-gauge-high',
                ],
                [
                    'title' => 'Data Pengunjung',
                    'url' => 'visit',
                    'icon' => 'fa-solid fa-chart-line',
                ],
                [
                    'title' => 'Admin',
                    'url' => 'user',
                    'icon' => 'fa-solid fa-users',
                ],
                [
                    'title' => 'Artikel',
                    'url' => 'post',
                    'icon' => 'fa-solid fa-file',
                ],
            ];
        @endphp
        <ul class="nav flex-column">
            @foreach ($dataMenu as $nav)
                <li class="nav-item">
                    <a class="nav-link {{ $nav['title'] == $menu ? 'active' : '' }}" aria-current="page"
                        href="{{ route($nav['url']) }}">
                        <i class="{{ $nav['icon'] }}"></i>
                        {{ $nav['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <hr>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link  {{ $menu == 'Profile' ? 'active' : '' }}" href="{{ route('admin.profile') }}">
                    <i class="fa-solid fa-circle-user"></i>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </li>
        </ul>

    </div>
</nav>
