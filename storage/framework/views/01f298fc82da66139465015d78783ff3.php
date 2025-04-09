<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Project Link</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="<?php echo e(route('admin.links.index')); ?>">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Link</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('admin.links.store')); ?>" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Project</label>
                                        <select class="form-control" id="project_id" name="project_id">
                                            <option value="">
                                                None
                                            </option>
                                            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($project->id); ?>">
                                                    <?php echo e($project->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No data
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Url</label>
                                        <input class="form-control" name="url" type="text">
                                    </div>
                                    <div class="form-group col-6">
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/admin/link/create.blade.php ENDPATH**/ ?>