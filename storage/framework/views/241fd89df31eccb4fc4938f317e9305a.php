<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Manage Experiences</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Experiences</h4>
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="<?php echo e(route('admin.experiences.trash-index')); ?>">
                                    <i class="fas fa-trash-alt"></i>
                                    View Trash
                                </a>
                                <a class="btn btn-primary" href="<?php echo e(route('admin.experiences.create')); ?>">
                                    <i class="fas fa-plus"></i>
                                    Create New
                                </a>
                            </div>
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
                    url: "<?php echo e(route('admin.experiences.change-status')); ?>",
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/admin/experience/index.blade.php ENDPATH**/ ?>