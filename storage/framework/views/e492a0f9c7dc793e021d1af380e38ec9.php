<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="card">
                        <form action="<?php echo e(route('admin.profile.update', $profile)); ?>" class="needs-validation"
                            enctype="multipart/form-data" method="post" novalidate="">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <input class="form-control d-none" name="id" type="text"
                                        value="<?php echo e($profile->id); ?>">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="<?php echo e($profile->user_id); ?>">

                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img alt=""
                                                src="<?php echo e($profile->avatar ?? asset('images/image_default.jpg')); ?>"
                                                width="100px">
                                        </div>
                                        <label>Image</label>
                                        <input class="form-control" name="avatar" type="file"
                                            value="<?php echo e($profile->avatar); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="<?php echo e($profile->user->name); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="text"
                                            value="<?php echo e($profile->user->email); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full name</label>
                                        <input class="form-control" name="fullname" type="text"
                                            value="<?php echo e($profile->fullname); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="contact_number" type="text"
                                            value="<?php echo e($profile->contact_number); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Bio</label>
                                        <input class="form-control" name="bio" type="text"
                                            value="<?php echo e($profile->bio); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Role Software</label>
                                        <select class="form-control" id="role_software_id" name="role_software_id">
                                            <option value="">
                                                None
                                            </option>
                                            <?php $__empty_1 = true; $__currentLoopData = $role_softwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option <?php if($profile->role_software_id == $role_software->id): ?> selected <?php endif; ?>
                                                    value="<?php echo e($role_software->id); ?>">
                                                    <?php echo e($role_software->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No data
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Facebook</label>
                                        <input class="form-control" name="facebook_link" type="text"
                                            value="<?php echo e($profile->facebook_link); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Linked In</label>
                                        <input class="form-control" name="linkedin_link" type="text"
                                            value="<?php echo e($profile->linkedin_link); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Gihub</label>
                                        <input class="form-control" name="github_link" type="text"
                                            value="<?php echo e($profile->github_link); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Youtube</label>
                                        <input class="form-control" name="youtube_link" type="text"
                                            value="<?php echo e($profile->youtube_link); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Instagram</label>
                                        <input class="form-control" name="instagram_link" type="text"
                                            value="<?php echo e($profile->instagram_link); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Resume</label>
                                        <input class="form-control" name="resume_link" type="text"
                                            value="<?php echo e($profile->resume_link); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <form action="<?php echo e(route('admin.profile.change-password', $profile->user)); ?>"
                            class="needs-validation" enctype="multipart/form-data" method="post" novalidate="">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="<?php echo e($profile->user_id); ?>">
                                    <div class="form-group col-12">
                                        <label>New Password</label>
                                        <input class="form-control" name="new_password" type="password">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Confirm Password</label>
                                        <input class="form-control" name="new_password_confirmation" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/admin/profile/edit.blade.php ENDPATH**/ ?>