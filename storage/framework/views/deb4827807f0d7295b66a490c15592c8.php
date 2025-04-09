<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Experiences</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="<?php echo e(route('admin.experiences.index')); ?>">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Experiences</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('admin.experiences.store')); ?>" enctype="multipart/form-data"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">User</label>
                                        <select class="form-control" id="user_id" name="user_id">
                                            <option value="">
                                                None
                                            </option>
                                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($user->id); ?>">
                                                    <?php echo e($user->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No data
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Company</label>
                                        <input class="form-control" name="company_name" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Role Software</label>
                                        <select class="form-control" id="role_software_id" name="role_software_id">
                                            <option value="">
                                                None
                                            </option>
                                            <?php $__empty_1 = true; $__currentLoopData = $role_softwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($role_software->id); ?>">
                                                    <?php echo e($role_software->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No data
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Job Title</label>
                                        <input class="form-control" name="job_title" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Job Description</label>
                                        <input class="form-control" name="job_description" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Level</label>
                                        <select class="form-control" id="level" name="level">
                                            <option value="intern">Intern</option>
                                            <option value="fresher">Fresher</option>
                                            <option value="junior">Junior</option>
                                            <option value="middle">Middle</option>
                                            <option value="senior">Senior</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Current</label>
                                        <select class="form-control" id="is_current" name="is_current">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Start Date</label>
                                        <input class="form-control" name="start_date" type="date">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>End Date</label>
                                        <input class="form-control" name="end_date" type="date">
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/admin/experience/create.blade.php ENDPATH**/ ?>