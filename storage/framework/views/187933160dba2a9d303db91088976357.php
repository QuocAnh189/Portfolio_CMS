<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>My Project</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="<?php echo e(route('user.projects.index')); ?>">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Project</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('user.projects.update', $project)); ?>" enctype="multipart/form-data"
                                method="POST">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="<?php echo e(Auth::id()); ?>">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img alt="" src="<?php echo e($project->cover_image); ?>" width="200px">
                                        </div>
                                        <label>Cover Image</label>
                                        <input class="form-control" name="cover_image" type="file"
                                            value="<?php echo e($project->cover_image); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="<?php echo e($project->name); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option value="">None</option>
                                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option <?php if($project->category_id == $category->id): ?> selected <?php endif; ?>
                                                    value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No data
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Description</label>
                                        <input class="form-control" name="description" type="text"
                                            value="<?php echo e($project->description); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Start Date</label>
                                        <input class="form-control" name="start_date" type="date"
                                            value="<?php echo e($project->start_date); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>End Date</label>
                                        <input class="form-control" name="end_date" type="date"
                                            value="<?php echo e($project->end_date); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option <?php if($project->status == 'active'): ?> selected <?php endif; ?> value="active">
                                                Active
                                            </option>
                                            <option <?php if($project->status == 'inactive'): ?> selected <?php endif; ?> value="inactive">
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submmit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/user/project/edit.blade.php ENDPATH**/ ?>