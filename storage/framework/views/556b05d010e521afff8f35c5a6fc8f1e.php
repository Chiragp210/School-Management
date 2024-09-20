<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">University Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.showUniversity')); ?>">Univesity</a></li>
                        <li class="breadcrumb-item active">University Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content justify-center">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <img src="<?php echo e(asset('universities/logos/'. $university->uni_logo)); ?>" class="profile-img" style="max-width: 60%; height: auto;" alt="University Logo">
                            </div>
                            <div>
                                <table class="table d-flex justify-content-center mb-6 mt-5">
                                    <tr class="table-bordered">
                                        <td>Name: </td>
                                        <td><?php echo e($university->uni_name); ?></td>
                                    </tr>
                                    <tr class="table-bordered">
                                        <td>Email</td>
                                        <td><?php echo e($university->email); ?> </td>
                                    </tr>
                                    <tr class="table-bordered">
                                        <td>Phone</td>
                                        <td><?php echo e($university->uni_phone); ?></td>
                                    </tr>
                                    <tr class="table-bordered">
                                        <td>Web Site</td>
                                        <td><a href="<?php echo e($university->uni_website); ?>"><?php echo e($university->uni_website); ?></a></td>
                                    </tr>
                                    <tr class="table-bordered">
                                        <td>Esrablished Year</td>
                                        <td><?php echo e($university->uni_established_year); ?></td>
                                    </tr>
                                    <tr class="table-bordered">
                                        <td>Address</td>
                                        <td><?php echo e($university->uni_address); ?></td>
                                    </tr>
                                    <tr class="table-bordered">
                                        <td>Description</td>
                                        <td><?php echo e($university->uni_description); ?></td>
                                    </tr>
                                    <tr class="table-bordered">
                                        <td>Type</td>
                                        <td><?php echo e($university->uni_type); ?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superAdmin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views/superAdmin/University/universityDetails.blade.php ENDPATH**/ ?>