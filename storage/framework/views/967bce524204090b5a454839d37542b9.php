<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Create My Technology</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="<?php echo e(route('user.userTechnologies.index')); ?>">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Technology</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('user.userTechnologies.store')); ?>" enctype="multipart/form-data"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="<?php echo e(Auth::id()); ?>">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Technologies</label>
                                        <select class="form-control" id="technology_id" name="technology_id">
                                            <option value="">
                                                None
                                            </option>
                                            <?php $__empty_1 = true; $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($technology->id); ?>">
                                                    <?php echo e($technology->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No data
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submmit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/user/technology/create.blade.php ENDPATH**/ ?>