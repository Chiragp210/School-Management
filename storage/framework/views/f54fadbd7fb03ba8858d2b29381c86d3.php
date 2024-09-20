<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo e(isset($university) ? 'Edit University' :'Add University'); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.showUniversity')); ?>">University</a></li>
                        <li class="breadcrumb-item active"><?php echo e(isset($university) ? 'Edit University' :'Add University'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="universityForm" action="<?php echo e(isset($university) ? route('admin.updateUniversity',$university->id) : route('admin.storeUniversity')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-inline">
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="UniversityName">University Name</label>
                                        <input type="text" name="uni_name" class="form-control w-100 mt-2" placeholder="Enter University Name" value="<?php echo e(isset($university) ? $university->uni_name : old('uni_name')); ?>">
                                        <?php $__errorArgs = ['uni_name'];
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
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="UniversityWebsite">University Website</label>
                                        <input type="text" name="uni_website" class="form-control w-100 mt-2" placeholder="Enter University Website" value="<?php echo e(isset($university) ? $university->uni_website : old('uni_website')); ?>">
                                        <?php $__errorArgs = ['uni_website'];
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
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="UniversityLogo">University Logo</label>
                                        <input type="file" name="uni_logo" class="form-control w-100 mt-2">
                                        <?php if(isset($university) && $university->uni_logo): ?>
                                        <img src="<?php echo e(asset('universities/logos/' . $university->uni_logo)); ?>" alt="University Logo" class="img-thumbnail mt-2" width="100">
                                        <?php endif; ?>
                                        <?php $__errorArgs = ['uni_logo'];
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


                                <div class="form-inline  mt-4">
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="UniversityEmail">University Email</label>
                                        <input type="email" name="email" class="form-control w-100 mt-2" placeholder="Enter University Email" value="<?php echo e(isset($university) ? $university->email : old('email')); ?>">
                                        <?php $__errorArgs = ['email'];
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
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="UniversityPhone">University Phone</label>
                                        <input type="text" name="uni_phone" class="form-control w-100 mt-2" placeholder="Enter University Phone" value="<?php echo e(isset($university) ? $university->uni_phone : old('uni_phone')); ?>">
                                        <?php $__errorArgs = ['uni_phone'];
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
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="UniversityPhone">Type of University</label>
                                        <select name="uni_type" class="form-control w-100 mt-2">
                                            <option value="">--Select Type--</option>
                                            <option value="Deemed" <?php echo e(isset($university) && $university->uni_type == 'Deemed' ? 'selected' : ''); ?>>Deemed</option>
                                            <option value="State" <?php echo e(isset($university) && $university->uni_type == 'State' ? 'selected' : ''); ?>>State</option>
                                            <option value="Central" <?php echo e(isset($university) && $university->uni_type == 'Central' ? 'selected' : ''); ?>>Central</option>
                                            <option value="Private" <?php echo e(isset($university) && $university->uni_type == 'Private' ? 'selected' : ''); ?>>Private</option>
                                        </select>
                                        <?php $__errorArgs = ['uni_type'];
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

                                <div class="form-inline mt-4">
                                    <div class="form-group mr-5 col-md-3">
                                        <label for="UniversityEstablishedYear">Established Year</label>
                                        <input type="text" name="uni_established_year" class="form-control w-100 mt-2" placeholder="Enter Established Year" value="<?php echo e(isset($university) ? $university->uni_established_year : old('uni_established_year')); ?>">
                                        <?php $__errorArgs = ['uni_established_year'];
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

                                <div class="form-inline  mt-4">
                                    <div class="form-group mr-5 col-md-4">
                                        <label for="UniversityAddress">University Address</label>
                                        <textarea name="uni_address" class="form-control w-140 mt-2" cols="100" rows="4" placeholder="Enter Address"><?php echo e(isset($university) ? $university->uni_address : old('uni_address')); ?></textarea>
                                        <?php $__errorArgs = ['uni_address'];
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
                                        <label for="UniversityDescrption">University Description</label>
                                        <textarea name="uni_description" class="form-control w-100 mt-2" cols="100" rows="4" placeholder="Enter Description"><?php echo e(isset($university) ? $university->uni_description : old('uni_description')); ?></textarea>
                                        <?php $__errorArgs = ['uni_description'];
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
                                <div class="form-group mt-4 col-md-4">
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


<?php $__env->startSection('customJs'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#universityForm').validate({
                rules: {
                    uni_name: {
                        required: true,
                        minlength: 3
                    },
                    uni_website: {
                        required: true,
                        url: true
                    },
                    uni_logo: {
                        accept: "image/*"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    uni_phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    uni_type: {
                        required: true
                    },
                    uni_established_year: {
                        required: true,
                        digits: true,
                        minlength: 4,
                        maxlength: 4
                    },
                    uni_address: {
                        required: true
                    },
                    uni_description: {
                        required: true
                    }
                },
                messages: {
                    uni_name: {
                        required: "Please enter a university name",
                        minlength: "University name must be at least 3 characters long"
                    },
                    uni_website: {
                        required: "Please enter a university website",
                        url: "Please enter a valid URL"
                    },
                    uni_logo: {
                        accept: "Only image files are allowed for the logo"
                    },
                    email: {
                        required: "Please enter a university email",
                        email: "Please enter a valid email address"
                    },
                    uni_phone: {
                        required: "Please enter a university phone number",
                        digits: "Please enter only numbers",
                        minlength: "Phone number must be at least 10 digits",
                        maxlength: "Phone number must not exceed 15 digits"
                    },
                    uni_type: {
                        required: "Please select a university type"
                    },
                    uni_established_year: {
                        required: "Please enter the established year",
                        digits: "Please enter a valid year",
                        minlength: "Year must be 4 digits",
                        maxlength: "Year must be 4 digits"
                    },
                    uni_address: {
                        required: "Please enter a university address"
                    },
                    uni_description: {
                        required: "Please enter a university description"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('text-danger');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('superAdmin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views/superAdmin/University/addUniversity.blade.php ENDPATH**/ ?>