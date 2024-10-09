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

            <li class="{{ setActive(['admin.technologies.*']) }}">
                <a class="nav-link" href="{{ route('admin.technologies.index') }}">
                    <i class="fas fa-tv"></i>
                    <span>Technologies</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.projects.*']) }}">
                <a class="nav-link" href="{{ route('admin.projects.index') }}">
                    <i class="fas fa-book"></i>
                    <span>Projects</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.galleries.*']) }}">
                <a class="nav-link" href="{{ route('admin.galleries.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Project Galleries</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.features.*']) }}">
                <a class="nav-link" href="{{ route('admin.features.index') }}">
                    <i class="fas fa-x-ray"></i>
                    <span>Feature</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.links.*']) }}">
                <a class="nav-link" href="{{ route('admin.links.index') }}">
                    <i class="fas fa-link"></i>
                    <span>Links</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.users.*']) }}">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i>
                    <span>User</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.experiences.*']) }}">
                <a class="nav-link" href="{{ route('admin.experiences.index') }}">
                    <i class="fab fa-creative-commons-nd"></i>
                    <span>Experiences</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.skills.*']) }}">
                <a class="nav-link" href="{{ route('admin.skills.index') }}">
                    <i class="fas fa-skull"></i>
                    <span>Skills</span>
                </a>
            </li>

            <li class="{{ setActive(['admin.education.*']) }}">
                <a class="nav-link" href="{{ route('admin.education.index') }}">
                    <i class="fas fa-school"></i>
                    <span>Education</span>
                </a>
            </li>
    </aside>
</div>
