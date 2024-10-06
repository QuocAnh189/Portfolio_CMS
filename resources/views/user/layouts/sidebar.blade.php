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
                <a class="nav-link" href="{{ route('user.dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ setActive(['user.projects.*']) }}">
                <a class="nav-link" href="{{ route('user.projects.index') }}">
                    <i class="fas fa-book"></i>
                    <span>Projects</span>
                </a>
            </li>

            <li class="{{ setActive(['user.project-galleries.*']) }}">
                <a class="nav-link" href="{{ route('user.project-galleries.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Galleries</span>
                </a>
            </li>

            <li class="{{ setActive(['user.features.*']) }}">
                <a class="nav-link" href="{{ route('user.features.index') }}">
                    <i class="fas fa-x-ray"></i>
                    <span>Feature</span>
                </a>
            </li>

            <li class="{{ setActive(['user.links.*']) }}">
                <a class="nav-link" href="{{ route('user.links.index') }}">
                    <i class="fas fa-link"></i>
                    <span>Links</span>
                </a>
            </li>

            <li class="{{ setActive(['user.experiences.*']) }}">
                <a class="nav-link" href="{{ route('user.experiences.index') }}">
                    <i class="fab fa-creative-commons-nd"></i>
                    <span>Experiences</span>
                </a>
            </li>

            <li class="{{ setActive(['user.skills.*']) }}">
                <a class="nav-link" href="{{ route('user.skills.index') }}">
                    <i class="fas fa-wind"></i>
                    <span>Skills</span>
                </a>
            </li>

            <li class="{{ setActive(['user.education.*']) }}">
                <a class="nav-link" href="{{ route('user.education.index') }}">
                    <i class="fas fa-school"></i>
                    <span>My Education</span>
                </a>
            </li>
    </aside>
</div>
