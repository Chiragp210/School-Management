<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo e(isset($roleItem) ? 'Edit Role-Permission' : 'Add Role-Permission'); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.showRolePermission')); ?>">Role-Permission</a></li>
                        <li class="breadcrumb-item active"><?php echo e(isset($roleItem) ? 'Edit Role-Permission' : 'Add Role-Permission'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(isset($roleItem) && $roleItem ? route('admin.updateRolePermission', $roleItem->id) : route('admin.storeRolePermission')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="role">Select Role</label>
                            <select name="role_id" id="role" class="form-control">
                                <option value="">-- Select Role --</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>" <?php echo e(isset($roleItem) && $role->id == $roleItem->id ? 'selected' : ''); ?>><?php echo e($role->role_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Assign Permissions</label>
                            <div class="form-check">
                                <input type="checkbox" id="select-all" class="form-check-input">
                                <label for="select-all" class="form-check-label">Select All</label>
                            </div>
                            <div class="row mt-3">
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4">
                                        <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>" class="permission-checkbox" <?php echo e(isset($roleItem) && $roleItem->permissions->contains($permission) ? 'checked' : ''); ?>>
                                        <?php echo e($permission->permission_name); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><?php echo e(isset($roleItem) ? 'Update Permissions' : 'Assign Permissions'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    // Select All Permissions functionality
    document.getElementById('select-all').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superAdmin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views/superAdmin/RolePermission/addRolePermission.blade.php ENDPATH**/ ?>