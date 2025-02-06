<?php $__env->startSection('title'); ?>
    <?php echo e(__('notification').' '. __('setting')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('notification').' '. __('setting')); ?>

            </h3>
        </div>
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="formdata" class="general-setting" action="<?php echo e(url('notification-setting')); ?>" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('sender_id')); ?></label>
                                    <input name="sender_id" value="<?php echo e(isset($settings['sender_id']) ? $settings['sender_id'] : ''); ?>" type="text" required placeholder="<?php echo e(__('sender_id')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('firebase_project_id')); ?></label>
                                    <input name="project_id" value="<?php echo e(isset($settings['project_id']) ? $settings['project_id'] : ''); ?>" type="text" required placeholder="<?php echo e(__('firebase_project_id')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('service_account_file')); ?> <span class="text-danger">*<small>(Only Json File is allowed)</small></span></label>
                                    <input type="file" name="service_account_file" class="file-upload-default"/>
                                    <div class="input-group col-xs-12 mb-3">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('service_account_file.json')); ?>"/>
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <?php if(isset($settings['service_account_file']) ? $settings['service_account_file'] : ''): ?>
                                        <a href="<?php echo e(Storage::url(isset($settings['service_account_file']) ? $settings['service_account_file'] : '')); ?>"><strong>Firebase Json File</strong></a>
                                    <?php endif; ?>

                                </div>

                            </div>
                            <input class="btn btn-theme" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/settings/fcm_key.blade.php ENDPATH**/ ?>