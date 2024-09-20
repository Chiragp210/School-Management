<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">University Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">University Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(route('admin.showUniversity')); ?>" method="get">
                        <div class="card">
                            <div class="card-body">
                                <h5>Filter University</h5>
                                <div class="form-inline">
                                    <div class="form-group mr-5">
                                        <label for="filter_uni_name" >Filter by University Name</label>
                                        <input type="text" class="form-control w-100 mt-2" name="filter_uni_name" placeholder="Enter University Name" value="<?php echo e(request('filter_uni_name')); ?>">
                                    </div>
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="filter_uni_type">Filter by Type of University</label>
                                        <select name="filter_uni_type" class="form-control w-100 mt-2">
                                            <option value="">--Select Type--</option>
                                            <option value="Deemed" <?php echo e(request('filter_uni_type') == 'Deemed' ? 'selected' : ''); ?>>Deemed</option>
                                            <option value="State" <?php echo e(request('filter_uni_type') == 'State' ? 'selected' : ''); ?>>State</option>
                                            <option value="Central" <?php echo e(request('filter_uni_type') == 'Central' ? 'selected' : ''); ?>>Central</option>
                                            <option value="Private" <?php echo e(request('filter_uni_type') == 'Private' ? 'selected' : ''); ?>>Private</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary mr-3">Filter</button>
                                    <a href="<?php echo e(route('admin.showUniversity')); ?>" class="btn btn-warning">Clear</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table">
                                    <thead style="vertical-align: middle; text-align: center;">
                                        <tr>
                                            <th>Id</th>
                                            <th>University Name</th>
                                            <th>University Email</th>
                                            <th>University Phone</th>
                                            <th>University Website</th>
                                            <th>University Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="vertical-align: middle; text-align: center;">
                                        <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($university->id); ?></td>
                                                <td><?php echo e($university->uni_name); ?></td>
                                                <td><?php echo e($university->email); ?></td>
                                                <td><?php echo e($university->uni_phone); ?></td>
                                                <td><u><a href="<?php echo e($university->uni_website); ?>"><?php echo e($university->uni_website); ?></a></u></td>
                                                <td><?php echo e($university->uni_type); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.showUniversityDetails', $university->id)); ?>" class="btn btn-success mr-2"><i class="bi bi-eye-fill"></i></a>
                                                    <a href="<?php echo e(route('admin.editUniversity', $university->id)); ?>" class="btn btn-warning mr-2"><i class="bi bi-pen-fill"></i></a>
                                                    <form action="<?php echo e(route('admin.deleteuniversity',$university->id)); ?>" method="POST" style="display:inline-block;">
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
                                    <?php echo e($universities->links('pagination::bootstrap-5')); ?>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superAdmin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views/superAdmin/University/showUniversity.blade.php ENDPATH**/ ?>