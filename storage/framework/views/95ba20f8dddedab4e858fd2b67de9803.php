<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo e(isset($permission) ? 'Edit Permission' : 'Add Permission'); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.permissionPage')); ?>">Permission</a></li>
                        <li class="breadcrumb-item active"><?php echo e(isset($permission) ? 'Edit Permission' : 'Add Permission'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(isset($permission) ? route('admin.updatePermission', $permission->id) : route('admin.storePermission')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($permission)): ?>
                        <?php echo method_field('PUT'); ?>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-inline">
                                    <div class="form-group mr-5 col-md-4">
                                        <label for="exampleInputPermission" class="mr-2">Enter Permisstion Title</label>
                                        <input type="text" class="form-control w-100 mt-2" name="permission_title" placeholder="Enter Permisstion title" value="<?php echo e(isset($permission) ? $permission->permission_title : old('permission_title')); ?>">
                                        <?php $__errorArgs = ['permission_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group mr-5 col-md-4">
                                        <label for="pemission_name" class="mr-2">Enter Permisstion Name</label>
                                        <input type="text" class="form-control w-100 mt-2" name="permission_name" placeholder="Enter Permisstion Name" value="<?php echo e(isset($permission) ? $permission->permission_name : old('permission_name')); ?>">
                                        <?php $__errorArgs = ['permission_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superAdmin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views/superAdmin/Permission/addPermission.blade.php ENDPATH**/ ?>