<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Portfolio</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">||</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Portfolio Dashboard</li>
            <li class="dropdown active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.categories.*']) }}">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-list"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.role-softwares.*']) }}">
                <a class="nav-link" href="{{ route('admin.role-softwares.index') }}">
                    <i class="fas fa-podcast"></i>
                    <span>Role Softwares</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.majors.*']) }}">
                <a class="nav-link" href="{{ route('admin.majors.index') }}">
                    <i class="fas fa-film"></i>
                    <span>Major</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-tv"></i>
                    <span>Technologies</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-book"></i>
                    <span>Projects</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-image"></i>
                    <span>Project Galleries</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-x-ray"></i>
                    <span>Feature</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-link"></i>
                    <span>Links</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-users"></i>
                    <span>User</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fab fa-creative-commons-nd"></i>
                    <span>Experiences</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fab fa-skill"></i>
                    <span>Skills</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-school"></i>
                    <span>Education</span>
                </a>
            </li>

            <li class="{{ setActive(['']) }}">
                <a class="nav-link" href="">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
    </aside>
</div>
