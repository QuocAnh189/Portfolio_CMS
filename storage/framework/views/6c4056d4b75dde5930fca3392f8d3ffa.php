<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.userTechnologies.*'])); ?>" href="<?php echo e(route('user.userTechnologies.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-tv"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Technology</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_technology); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.projects.*'])); ?>" href="<?php echo e(route('user.projects.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Project</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_project); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.project-galleries.*'])); ?>" href="<?php echo e(route('user.project-galleries.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Gallery</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_gallery); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.features.*'])); ?>" href="<?php echo e(route('user.features.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-x-ray"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Feature</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_feature); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.links.*'])); ?>" href="<?php echo e(route('user.links.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Links</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_link); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.experiences.*'])); ?>" href="<?php echo e(route('user.experiences.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fab fa-creative-commons-nd"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Experiences</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_experiences); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.skills.*'])); ?>" href="<?php echo e(route('user.skills.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-wind"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Skills</h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($total_skill); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="<?php echo e(setActive(['user.education.*'])); ?>" href="<?php echo e(route('user.education.index')); ?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Education</h4>
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

<?php echo $__env->make('user.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/user/dashboard/index.blade.php ENDPATH**/ ?>