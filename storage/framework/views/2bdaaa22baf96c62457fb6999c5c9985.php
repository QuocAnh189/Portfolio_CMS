<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Galleries</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upload Gallery</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('user.project-galleries.store')); ?>" enctype="multipart/form-data"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Image</label>
                                        <input class="form-control" multiple name="image" type="file">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputState">Project</label>
                                        <select class="form-control" id="project_id" name="project_id">
                                            <option value="">None</option>
                                            <?php $__empty_1 = true; $__currentLoopData = Auth::user()->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($project->id); ?>">
                                                    <?php echo e($project->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No Project
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right"><button class="btn btn-primary" type="submit">Upload</button></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>
                            <a class="btn btn-primary" href="<?php echo e(route('user.project-galleries.trash-index')); ?>">
                                <i class="fas fa-trash-alt"></i>
                                View Trash
                            </a>
                        </div>
                        <div class="card-body">
                            <?php echo e($dataTable->table()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "<?php echo e(route('user.project-galleries.change-status')); ?>",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/user/gallery/index.blade.php ENDPATH**/ ?>