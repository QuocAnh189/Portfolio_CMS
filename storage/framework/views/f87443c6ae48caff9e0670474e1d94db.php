<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Admin Dashboard</h1>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.users.*'])); ?>" href="<?php echo e(route('admin.users.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_user); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.categories.*'])); ?>" href="<?php echo e(route('admin.categories.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Category</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_category); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.role-softwares.*'])); ?>" href="<?php echo e(route('admin.role-softwares.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-podcast"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Role Software</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_rolesoftware); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.majors.*'])); ?>" href="<?php echo e(route('admin.majors.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-film"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Majors</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_major); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.technologies.*'])); ?>" href="<?php echo e(route('admin.technologies.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-tv"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Technology</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_technology); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.projects.*'])); ?>" href="<?php echo e(route('admin.projects.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Project</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_project); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.galleries.*'])); ?>" href="<?php echo e(route('admin.galleries.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Gallery</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_gallery); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.features.*'])); ?>" href="<?php echo e(route('admin.features.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-x-ray"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Feature</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_gallery); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.links.*'])); ?>" href="<?php echo e(route('admin.links.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Links</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_link); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.experiences.*'])); ?>" href="<?php echo e(route('admin.experiences.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fab fa-creative-commons-nd"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Experiences</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_experience); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.skills.*'])); ?>" href="<?php echo e(route('admin.skills.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-wind"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Skills</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_skill); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['admin.education.*'])); ?>" href="<?php echo e(route('admin.education.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Education</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_education); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>