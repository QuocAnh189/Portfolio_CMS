<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <a class="nav-link nav-link-lg" data-toggle="sidebar" href="#">
            <i class="fas fa-bars"></i>
        </a>
    </form>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                <img alt="image" class="rounded-circle z-[1] mr-1"
                    src="{{ auth()->user()->profile->avatar ?? 'https://res.cloudinary.com/dadvtny30/image/upload/v1710062870/portfolio/frj9fscqteb90eumokqj.jpg' }}"
                    style="width: 40px;height: 40px;object-fit: cover;">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item has-icon" href="{{ route('admin.profile.edit') }}">
                    <i class="far fa-user"></i> Profile
                </a>

                <div class="dropdown-divider"></div>

                <!-- Authentication -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="dropdown-item has-icon text-danger" onclick="this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
