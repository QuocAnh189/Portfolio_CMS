<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <a class="nav-link nav-link-lg" data-toggle="sidebar" href="#">
            <i class="fas fa-bars"></i>
        </a>
    </form>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                <img alt="image" class="rounded-circle mr-1" src="<?php echo e(auth()->user()->profile->avatar ?? asset('images/avatar_default.jpg')); ?>"
                    style="width: 40px;height: 40px;object-fit: cover;">
                <div class="d-sm-none d-lg-inline-block">Hi, <?php echo e(auth()->user()->name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item has-icon" href="<?php echo e(route('user.profile.edit')); ?>">
                    <i class="far fa-user"></i> Profile
                </a>

                <div class="dropdown-divider"></div>

                <!-- Authentication -->
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <a class="dropdown-item has-icon text-danger" onclick="this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/user/layouts/navbar.blade.php ENDPATH**/ ?>