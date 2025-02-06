<?php $__env->startSection('title'); ?>
    <?php echo e(__('app_settings')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('app_settings')); ?>

            </h3>
        </div>
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="formdata" class="general-setting" action="<?php echo e(url('app-settings')); ?>"
                            novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <h4 class="card-title">
                                <?php echo e(__('student_parent_app_settings')); ?>

                            </h4>
                            <div class="pt-3 row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('app_link')); ?></label>
                                    <input name="app_link"
                                        value="<?php echo e(isset($settings['app_link']) ? $settings['app_link'] : ''); ?>"
                                        type="url" required placeholder="<?php echo e(__('app_link')); ?>" class="form-control" />
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('ios_app_link')); ?></label>
                                    <input name="ios_app_link"
                                        value="<?php echo e(isset($settings['ios_app_link']) ? $settings['ios_app_link'] : ''); ?>"
                                        type="url" required placeholder="<?php echo e(__('ios_app_link')); ?>"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('app_version')); ?></label>
                                    <input name="app_version"
                                        value="<?php echo e(isset($settings['app_version']) ? $settings['app_version'] : ''); ?>"
                                        type="text" required placeholder="<?php echo e(__('app_version')); ?>"
                                        class="form-control" />
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('ios_app_version')); ?></label>
                                    <input type="text" name="ios_app_version" required
                                        placeholder="<?php echo e(__('ios_app_version')); ?>" class="form-control"
                                        value="<?php echo e(isset($settings['ios_app_version']) ? $settings['ios_app_version'] : ''); ?>">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('force_app_update')); ?></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"
                                                value="<?php echo e(isset($settings['force_app_update']) ? $settings['force_app_update'] : 0); ?>"
                                                id="force_app_update"><?php echo e(__('force_app_update')); ?>

                                            <i class="input-helper"></i></label>
                                    </div>
                                    <input type="hidden" name="force_app_update" id="txt_force_app_update">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('app_maintenance')); ?></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"
                                                value="<?php echo e(isset($settings['app_maintenance']) ? $settings['app_maintenance'] : 0); ?>"
                                                id="app_maintenance"><?php echo e(__('app_maintenance')); ?>

                                            <i class="input-helper"></i></label>
                                    </div>
                                    <input type="hidden" name="app_maintenance" id="txt_app_maintenance">
                                </div>
                            </div>
                            <hr class="pt-4 pd-4">
                            <h4 class="card-title">
                                <?php echo e(__('teacher_app_settings')); ?>

                            </h4>
                            <div class="pt-3 row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('app_link')); ?></label>
                                    <input name="teacher_app_link"
                                        value="<?php echo e(isset($settings['teacher_app_link']) ? $settings['teacher_app_link'] : ''); ?>"
                                        type="url" required placeholder="<?php echo e(__('app_link')); ?>"
                                        class="form-control" />
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('ios_app_link')); ?></label>
                                    <input name="teacher_ios_app_link"
                                        value="<?php echo e(isset($settings['teacher_ios_app_link']) ? $settings['teacher_ios_app_link'] : ''); ?>"
                                        type="url" required placeholder="<?php echo e(__('ios_app_link')); ?>"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('app_version')); ?></label>
                                    <input name="teacher_app_version"
                                        value="<?php echo e(isset($settings['teacher_app_version']) ? $settings['teacher_app_version'] : ''); ?>"
                                        type="text" required placeholder="<?php echo e(__('app_version')); ?>"
                                        class="form-control" />
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('ios_app_version')); ?></label>
                                    <input type="text" name="teacher_ios_app_version" required
                                        placeholder="<?php echo e(__('ios_app_version')); ?>" class="form-control"
                                        value="<?php echo e(isset($settings['teacher_ios_app_version']) ? $settings['teacher_ios_app_version'] : ''); ?>">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('force_app_update')); ?></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"
                                                value="<?php echo e(isset($settings['teacher_force_app_update']) ? $settings['teacher_force_app_update'] : 0); ?>"
                                                id="teacher_force_app_update"><?php echo e(__('force_app_update')); ?>

                                            <i class="input-helper"></i></label>
                                    </div>
                                    <input type="hidden" name="teacher_force_app_update" id="teacher_txt_force_app_update">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label><?php echo e(__('app_maintenance')); ?></label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"
                                                value="<?php echo e(isset($settings['teacher_app_maintenance']) ? $settings['teacher_app_maintenance'] : 0); ?>"
                                                id="teacher_app_maintenance"><?php echo e(__('app_maintenance')); ?>

                                            <i class="input-helper"></i></label>
                                    </div>
                                    <input type="hidden" name="teacher_app_maintenance"
                                        id="teacher_txt_app_maintenance">
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <input class="btn btn-theme" type="submit" value="Submit">
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
        function app_setting() {
            force_app_update = $('#force_app_update').val();
            app_maintenance = $('#app_maintenance').val();
            if (force_app_update == 1) {
                $('#force_app_update').attr('checked', true);
                $('#force_app_update').val(1);
                $('#txt_force_app_update').val(1);
            } else {
                $('#force_app_update').val(0);
                $('#txt_force_app_update').val(0);
            }
            if (app_maintenance == 1) {
                $('#app_maintenance').attr('checked', true);
                $('#app_maintenance').val(1);
                $('#txt_app_maintenance').val(1);
            } else {
                $('#app_maintenance').val(0);
                $('#txt_app_maintenance').val(0);
            }

            teacher_force_app_update = $('#teacher_force_app_update').val();
            teacher_app_maintenance = $('#teacher_app_maintenance').val();

            if (teacher_force_app_update == 1) {
                $('#teacher_force_app_update').attr('checked', true);
                $('#teacher_force_app_update').val(1);
                $('#teacher_txt_force_app_update').val(1);
            } else {
                $('#teacher_force_app_update').val(0);
                $('#teacher_txt_force_app_update').val(0);
            }
            if (teacher_app_maintenance == 1) {
                $('#teacher_app_maintenance').attr('checked', true);
                $('#teacher_app_maintenance').val(1);
                $('#teacher_txt_app_maintenance').val(1);
            } else {
                $('#teacher_app_maintenance').val(0);
                $('#teacher_txt_app_maintenance').val(0);
            }

        }
        $(document).ready(function() {
            app_setting();
        });
        $(document).on('change', '#force_app_update', function(e) {
            if ($('#force_app_update').val() == 1) {
                $('#force_app_update').val(0);
                $('#txt_force_app_update').val(0);
            } else {
                $('#force_app_update').val(1);
                $('#txt_force_app_update').val(1);
            }
        });
        $(document).on('change', '#app_maintenance', function(e) {
            if ($('#app_maintenance').val() == 1) {
                $('#app_maintenance').val(0);
                $('#txt_app_maintenance').val(0);
            } else {
                $('#app_maintenance').val(1);
                $('#txt_app_maintenance').val(1);
            }
        });

        $(document).on('change', '#teacher_force_app_update', function(e) {
            if ($('#teacher_force_app_update').val() == 1) {
                $('#teacher_force_app_update').val(0);
                $('#teacher_txt_force_app_update').val(0);
            } else {
                $('#teacher_force_app_update').val(1);
                $('#teacher_txt_force_app_update').val(1);
            }
        });
        $(document).on('change', '#teacher_app_maintenance', function(e) {
            if ($('#teacher_app_maintenance').val() == 1) {
                $('#teacher_app_maintenance').val(0);
                $('#teacher_txt_app_maintenance').val(0);
            } else {
                $('#teacher_app_maintenance').val(1);
                $('#teacher_txt_app_maintenance').val(1);
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/settings/app_settings.blade.php ENDPATH**/ ?>