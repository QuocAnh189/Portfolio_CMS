<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Technology</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="<?php echo e(route('admin.technologies.index')); ?>">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Techonology</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('admin.technologies.store')); ?>" enctype="multipart/form-data"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group col-12">
                                    <div class="mb-3">
                                        <img alt="" src="<?php echo e(asset('images/image_default.jpg')); ?>" width="150px">
                                    </div>
                                    <label>Image</label>
                                    <input class="form-control" name="image" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="text-right">
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/admin/technology/create.blade.php ENDPATH**/ ?>