<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(__('login')); ?> || <?php echo e(config('app.name')); ?></title>

    <?php echo $__env->make('layouts.include', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class="bg-image">
<div class="container-scroller">
    
        <div class="overlay">
            <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-4 col-lg-7"></div>
                        <div class="col-md-8 col-lg-4">
                            <div class="auth-content-wrapper auth">
                                <div class="auth-form-light text-left p-5">
                                    <?php if(env('DEMO_MODE')): ?>
                                        <div class="alert alert-info text-center" role="alert">
                                            NOTE : <a target="_blank" href="<?php echo e(route('login')); ?>">-- Click Here --</a> If you Can't Login.
                                        </div>
                                    <?php endif; ?>
                                    <div class="brand-logo text-center">
                                        <img src="<?php echo e(env('LOGO2') ? url(Storage::url(env('LOGO2'))) :url('assets/logo.svg')); ?>" alt="logo">
                                    </div>
                                    <form action="<?php echo e(route('login')); ?>" id="frmLogin" method="POST" class="pt-3">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label><?php echo e(__('email')); ?></label>
                                            
                                            <input id="email" type="email" class="form-control form-control-lg" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="<?php echo e(__('email')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo e(__('password')); ?></label>
                                            

                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control form-control-lg" name="password" required autocomplete="current-password" placeholder="<?php echo e(__('password')); ?>">
                                                <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-eye-slash" id="togglePassword"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if(Route::has('password.request')): ?>
                                            <div class="my-2 d-flex justify-content-end align-items-center">

                                                <a class="auth-link text-black" href="<?php echo e(route('password.request')); ?>">
                                                    <?php echo e(__('forgot_password')); ?>

                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mt-3">
                                            <input type="submit" name="btnlogin" id="login_btn" value="<?php echo e(__('login')); ?>" class="btn btn-block btn-theme btn-lg font-weight-medium auth-form-btn"/>
                                        </div>
                                    </form>
                                    <?php if(env('DEMO_MODE')): ?>
                                        <div class="row mt-2">
                                            <hr class="w-100">
                                            <div class="col-12 text-center mb-2 text-black-50">Demo Credentials</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <button class="btn btn-block btn-success mt-2" id="superadmin_btn">Super Admin</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-block btn-danger mt-2" id="teacher_btn">Teacher</button>
                                            </div>
                                        </div>
                                        <div class="row mt-2 text-center">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-block btn-info mt-2" id="staff_btn">Staff</button>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    
</div>

<script src="<?php echo e(asset('/assets/js/vendor.bundle.base.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/jquery-toast-plugin/jquery.toast.min.js')); ?>"></script>

<script type='text/javascript'>
    $("#frmLogin").validate({
        rules: {
            username: "required",
            password: "required",
        },
        success: function(label, element) {
            $(element).parent().removeClass('has-danger')
            $(element).removeClass('form-control-danger')
        },
        errorPlacement: function (label, element) {
            if(label.text()){
                if ($(element).attr("name") == "password"){
                label.insertAfter(element.parent()).addClass('text-danger mt-2');
                }else{
                    label.addClass('mt-2 text-danger');
                    label.insertAfter(element);
                }
            }

        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        }
    });

    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // this.classList.toggle("fa-eye");
        if (password.getAttribute("type") === 'password') {
            $('#togglePassword').addClass('fa-eye-slash');
            $('#togglePassword').removeClass('fa-eye');
        } else {
            $('#togglePassword').removeClass('fa-eye-slash');
            $('#togglePassword').addClass('fa-eye');
        }
    });

    <?php if(env('DEMO_MODE')): ?>
    $('#superadmin_btn').on('click', function (e) {
        $('#email').val('superadmin@gmail.com');
        $('#password').val('superadmin');
        $('#login_btn').attr('disabled', true);
        $(this).attr('disabled', true);
        $('#frmLogin').submit();
    })
    $('#teacher_btn').on('click', function (e) {
        $('#email').val('teacher@gmail.com');
        $('#password').val('teacher123');
        $('#login_btn').attr('disabled', true);
        $(this).attr('disabled', true);
        $('#frmLogin').submit();
    })
    $('#staff_btn').on('click', function (e) {
        $('#email').val('staff@gmail.com');
        $('#password').val('14081980');
        $('#login_btn').attr('disabled', true);
        $(this).attr('disabled', true);
        $('#frmLogin').submit();
    })
    <?php endif; ?>

</script>
</body>

<?php if(Session::has('error')): ?>
    <script type='text/javascript'>
        $.toast({
            text: '<?php echo e(Session::get('error')); ?>',
            showHideTransition: 'slide',
            icon: 'error',
            loaderBg: '#f2a654',
            position: 'top-right'
        });
    </script>
<?php endif; ?>

<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script type='text/javascript'>
            $.toast({
                text: '<?php echo e($error); ?>',
                showHideTransition: 'slide',
                icon: 'error',
                loaderBg: '#f2a654',
                position: 'top-right'
            });
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

</html>
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/auth/login.blade.php ENDPATH**/ ?>