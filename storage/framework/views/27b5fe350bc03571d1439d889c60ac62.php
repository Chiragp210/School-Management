<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permission Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Permission Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(route('admin.permissionPage')); ?>" method="GET">
                        <div class="card">
                            <div class="card-body">
                                <h5>Filter Permissions</h5>
                                <div class="form-inline">
                                    <div class="form-group mr-5">
                                        <label for="filter_permission_title" class="mr-2">Filter by Permission Title</label>
                                        <input type="text" class="form-control w-100 mt-2" name="filter_permission_title" placeholder="Enter Permission Title" value="<?php echo e(request('filter_permission_title')); ?>">
                                    </div>
                                    <div class="form-group mr-5">
                                        <label for="filter_permission_name" >Filter by Permission Name</label>
                                        <input type="text" class="form-control w-100 mt-2" name="filter_permission_name" placeholder="Enter Permission Name" value="<?php echo e(request('filter_permission_name')); ?>">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="<?php echo e(route('admin.permissionPage')); ?>" class="btn btn-warning">Clear</a>

                                </div>
                            </div>
                        </div>
                    </form>


                    <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Permission ID</th>
                                        <th>Permission Title</th>
                                        <th>Permission Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($permission->id); ?></td>
                                        <td><?php echo e($permission->permission_title); ?></td>
                                        <td><?php echo e($permission->permission_name); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.editPermission', $permission->id)); ?>" class="btn btn-warning mr-2"><i class="bi bi-pen-fill"></i></a>
                                            <form action="<?php echo e(route('admin.deletePermission', $permission->id)); ?>" method="POST" style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this permission?')"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <?php echo e($permissions->links('pagination::bootstrap-5')); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superAdmin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views/superAdmin/Permission/showPermission.blade.php ENDPATH**/ ?>