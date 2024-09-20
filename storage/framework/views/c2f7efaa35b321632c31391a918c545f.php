<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:16:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <base href="<?php echo e(asset('admincss')); ?>/" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">
    <?php echo $__env->yieldContent('customCss'); ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="<?php echo e(route('admin.logout')); ?>" method="GET" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link btn btn-link">
                            <i class="fas fa-circle"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="" class="brand-link">
                
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <div class="sidebar">





                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-circle fas"></i>
                                <p>
                                    Role
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.showRoleForm')); ?>" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Add Role</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.rolePage')); ?>" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>All Role</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-circle fas"></i>
                                <p>
                                    Permission
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.showPermissionForm')); ?>" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Add Permission</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.permissionPage')); ?>" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>All Permission</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-circle fas"></i>
                                <p>
                                    Role-Permission
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.showRolePermissionForm')); ?>" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Add Role-Permission</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.showRolePermission')); ?>" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>All Role-Permission</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-circle fas"></i>
                                <p>
                                    University
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.universityForm')); ?>" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Add University</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/flot.html" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>All University</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/charts/flot.html" class="nav-link">
                                        <i class="far nav-icon"></i>
                                        <p>Unverified University</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <?php echo $__env->yieldContent('content'); ?>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io/">School/Collage Managment System</a>.</strong> All rights reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

    <script src="dist/js/demo.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });

    </script>

    <?php echo $__env->yieldContent('customJs'); ?>
</body>

</html>
<?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views\superAdmin\layout.blade.php ENDPATH**/ ?>