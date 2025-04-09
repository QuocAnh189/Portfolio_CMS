<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="<?php echo e(csrf_token()); ?>" name="csrf-token" />
    <title>Portfolio Dashboard</title>

    <!-- General CSS Files -->
    <link href="<?php echo e(asset('backend/assets/modules/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/modules/fontawesome/css/all.min.css')); ?>" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="<?php echo e(asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/modules/weather-icon/css/weather-icons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/modules/summernote/summernote-bs4.css')); ?>" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v6.5.0/css/all.css" rel="stylesheet" />
    <link href="<?php echo e(asset('backend/assets/css/bootstrap-iconpicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/modules/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">

    <!-- Template CSS -->
    <link href="<?php echo e(asset('backend/assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/css/components.css')); ?>" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php echo $__env->make('user.layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <?php echo $__env->make('user.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <div class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('backend/assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/stisla.js')); ?>"></script>

    <!-- JS Libraies -->
    <script src="<?php echo e(asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('backend/assets/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/modules/select2/dist/js/select2.full.min.js')); ?>"></script>

    <!-- Template JS File -->
    <script src="<?php echo e(asset('backend/assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/custom.js')); ?>"></script>

    <script>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>

    <!-- Dynamic Delete alart -->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-item', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href') ?? $(this).attr('action');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            success: function(data) {
                                if (data.status === 'success') {
                                    Swal.fire(
                                        'Deleted!', data.message, 'success'
                                    );
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        'Cant Delete', data.message, 'error'
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\MyProject\Portfolio\Portfolio_CMS\resources\views/user/layouts/master.blade.php ENDPATH**/ ?>