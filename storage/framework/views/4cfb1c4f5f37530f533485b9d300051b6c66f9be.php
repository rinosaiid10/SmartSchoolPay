<?php $__env->startSection('title'); ?>
<?php echo e(__('email_configuration')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('email_configuration')); ?>

        </h3>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">
                        <?php echo e(__('add_email_configuration')); ?>

                    </h4>
                    <form id="formdata" class="general-setting" action="<?php echo e(url('email-settings')); ?>" method="POST" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('mail_mailer')); ?></label>
                                <select required name="mail_mailer" value="<?php echo e(env('MAIL_MAILER')); ?>" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">--- Select Mailer ---</option>
                                    <option <?php echo e(env('MAIL_MAILER')=='smtp' ?'selected':''); ?> value="smtp">SMTP</option>
                                    <option <?php echo e(env('MAIL_MAILER')=='mailgun' ?'selected':''); ?> value="mailgun">Mailgun</option>
                                    <option <?php echo e(env('MAIL_MAILER')=='sendmail' ?'selected':''); ?> value="sendmail">sendmail</option>
                                    <option <?php echo e(env('MAIL_MAILER')=='postmark' ?'selected':''); ?> value="postmark">Postmark</option>
                                    <option <?php echo e(env('MAIL_MAILER')=='amazon_ses' ?'selected':''); ?> value="amazon_ses">Amazon SES</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('mail_host')); ?></label>
                                <input name="mail_host" value="<?php echo e(!env('DEMO_MODE') ? (env('MAIL_HOST') ? env('MAIL_HOST') : "" ) : 'xxxxxxxxxxxxxxxxxxxx'); ?>" type="text" required placeholder="<?php echo e(__('mail_host')); ?>" class="form-control" />
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('mail_port')); ?></label>
                                <input name="mail_port" value="<?php echo e(!env('DEMO_MODE') ? (env('MAIL_PORT') ? env('MAIL_PORT') : "" ) : 'xxxxxxxxxxxxxxxxxxxx'); ?>" type="text" required placeholder="<?php echo e(__('mail_port')); ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('mail_username')); ?></label>
                                <input name="mail_username" value="<?php echo e(!env('DEMO_MODE') ? (env('MAIL_USERNAME') ? env('MAIL_USERNAME') : "" ) : 'xxxxxxxxxxxxxxxxxxxx'); ?>" type="text" required placeholder="<?php echo e(__('mail_username')); ?>" class="form-control" />
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('mail_password')); ?></label>
                                <div class="input-group">
                                    <input id="password" name="mail_password" value="<?php echo e(!env('DEMO_MODE') ? (env('MAIL_PASSWORD') ? env('MAIL_PASSWORD') : "" ) : 'xxxxxxxxxxxxxxxxxxxx'); ?>" type="password" required placeholder="<?php echo e(__('mail_password')); ?>" class="form-control" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye-slash" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('mail_encryption')); ?></label>
                                <input name="mail_encryption" value="<?php echo e(!env('DEMO_MODE') ? (env('MAIL_ENCRYPTION') ? env('MAIL_ENCRYPTION') : "" ) : 'xxxxxxxxxxxxxxxxxxxx'); ?>" type="text" required placeholder="<?php echo e(__('mail_encryption')); ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('mail_send_from')); ?></label>
                                <input name="mail_send_from" value="<?php echo e(!env('DEMO_MODE') ? (env('MAIL_FROM_ADDRESS') ? env('MAIL_FROM_ADDRESS') : "" ) : 'xxxxxxxxxxxxxxxxxxxx'); ?>" type="text" required placeholder="<?php echo e(__('mail_send_from')); ?>" class="form-control" />
                            </div>
                        </div>
                        <input class="btn btn-theme" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">
                        <?php echo e(__('email_configuration_verification')); ?>

                    </h4>
                    <form class="verify_email" action="<?php echo e(route('setting.varify-email-config')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label><?php echo e(__('email')); ?></label>
                                <input name="verify_email" type="email" required placeholder="<?php echo e(__('email')); ?>" class="form-control" />
                            </div>
                            <div class="form-group col-px-md-5">
                                <input class="btn btn-theme m-4" type="submit" value="Verify">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/settings/email_configuration.blade.php ENDPATH**/ ?>