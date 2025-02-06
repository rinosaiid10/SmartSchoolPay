<?php $__env->startSection('title'); ?>
    <?php echo e(__('students')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('student') . ' ' . __('id') . ' ' . __('card'). ' ' . __('settings')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="pt-3 id-card-setting" id="id-card-setting" action="<?php echo e(route('id_card_settings.update')); ?>" method="POST" novalidate="novalidate">
                            <div class="row">
                                
                                <div class="form-group col-sm-12 col-md-4">
                                    <label for="header_color"><?php echo e(__('header_color')); ?> <span class="text-danger">*</span></label>
                                    <input name="header_color" id="header_color" value="<?php echo e($settings['header_color'] ?? ''); ?>" type="text" required placeholder="<?php echo e(__('color')); ?>" class="color-picker"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label for="footer_color"><?php echo e(__('footer_color')); ?> <span class="text-danger">*</span></label>
                                    <input name="footer_color" id="footer_color" value="<?php echo e($settings['footer_color'] ?? ''); ?>" type="text" required placeholder="<?php echo e(__('color')); ?>" class="color-picker"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label for="header_footer_color"><?php echo e(__('header_footer_text_color')); ?> <span class="text-danger">*</span></label>
                                    <input name="header_footer_text_color" id="header_footer_text_color" value="<?php echo e($settings['header_footer_text_color'] ?? ''); ?>" type="text" required placeholder="<?php echo e(__('color')); ?>" class="color-picker"/>
                                </div>
                                

                                
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="image"><?php echo e(__('background_image')); ?> </label>
                                    <input type="file" name="background_image" accept="image/jpg,image/png,image/jpeg,image/svg" class="file-upload-default"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="image" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <?php if($settings['background_image'] ?? ''): ?>
                                    <div id="background">
                                        <img src="<?php echo e(Storage::url($settings['background_image'])); ?>" class="img-fluid w-25 mt-2" alt="">
                                        <a href="" data-type="background_image" class="btn btn-inverse-danger btn-sm student-id-card-settings">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                

                                
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="image"><?php echo e(__('signature')); ?> </label>
                                    <input type="file" name="signature" accept="image/jpg,image/png,image/jpeg,image/svg" class="file-upload-default"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="image" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <?php if($settings['signature'] ?? ''): ?>
                                    <div id="signature">
                                        <img src="<?php echo e(Storage::url($settings['signature'])); ?>" class="img-fluid w-25 mt-2" alt="">
                                        <a href="" data-type="signature" class="btn btn-inverse-danger btn-sm student-id-card-settings">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                


                                
                                <div class="form-group col-sm-12 col-md-3">
                                    <label><?php echo e(__('layout_type')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-12 d-flex row">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" <?php if(isset($settings['layout_type'])  && $settings['layout_type'] == 'vertical'): ?> checked <?php endif; ?> name="layout_type" id="layout_type" value="vertical" required>
                                                <?php echo e(__('vertical')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" <?php if(isset($settings['layout_type'])  && $settings['layout_type'] == 'horizontal'): ?> checked <?php endif; ?> name="layout_type" id="layout_type" value="horizontal" required>
                                                <?php echo e(__('horizontal')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                

                                
                                <div class="form-group col-sm-12 col-md-3">
                                    <label><?php echo e(__('profile_image_style')); ?> <span class="text-danger">*</span></label>
                                    <div class="col-12 d-flex row">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" <?php if(isset($settings['profile_image_style']) && $settings['profile_image_style'] == 'round'): ?> checked <?php endif; ?> name="profile_image_style" id="profile_image_style" value="round" required>
                                                <?php echo e(__('round')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" <?php if(isset($settings['profile_image_style']) && $settings['profile_image_style'] == 'squre'): ?> checked <?php endif; ?> name="profile_image_style" id="profile_image_style" value="squre" required>
                                                <?php echo e(__('squre')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                

                                
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for=""><?php echo e(__('card_width')); ?> (<?php echo e(__('mm')); ?>)<span class="text-danger">*</span></label>
                                    <input name="card_width" id="card_width" value="<?php echo e($settings['card_width'] ?? ''); ?>" type="number" required placeholder="<?php echo e(__('card_width')); ?>" class="form-control"/>
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label for=""><?php echo e(__('card_height')); ?> (<?php echo e(__('mm')); ?>)<span class="text-danger">*</span></label>
                                    <input name="card_height" id="card_height" value="<?php echo e($settings['card_height'] ?? ''); ?>" type="number" required placeholder="<?php echo e(__('card_height')); ?>" class="form-control"/>
                                </div>
                                

                                
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for=""><?php echo e(__('select_fields')); ?> <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="student_name" class="form-check form-check-inline" <?php if(in_array('student_name',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> type="checkbox" name="student_id_card_fields[]" value="student_name"/>
                                            <?php echo e(__('student_name')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="gr_no" class="form-check form-check-inline" <?php if(in_array('student_name',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> type="checkbox" name="student_id_card_fields[]" value="gr_no"/>
                                            <?php echo e(__('gr_no')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="class_section" class="form-check form-check-inline" <?php if(in_array('class_section',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> type="checkbox" name="student_id_card_fields[]" value="class_section"/>
                                            <?php echo e(__('class_section')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="roll_number" class="form-check form-check-inline" type="checkbox" <?php if(in_array('roll_no',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> name="student_id_card_fields[]" value="roll_no"/>
                                            <?php echo e(__('roll_no')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="dob" class="form-check form-check-inline" type="checkbox" <?php if(in_array('dob',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> name="student_id_card_fields[]" value="dob"/>
                                            <?php echo e(__('dob')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="gender" class="form-check form-check-inline" type="checkbox" <?php if(in_array('gender',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> name="student_id_card_fields[]" value="gender"/>
                                            <?php echo e(__('gender')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="blood_group" class="form-check form-check-inline" type="checkbox" <?php if(in_array('blood_group',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> name="student_id_card_fields[]" value="blood_group"/>
                                            <?php echo e(__('blood_group')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="session_year" class="form-check form-check-inline" type="checkbox" <?php if(in_array('session_year',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> name="student_id_card_fields[]" value="session_year"/>
                                        <?php echo e(__('session_year')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="guardian_name" class="form-check form-check-inline" type="checkbox" <?php if(in_array('guardian_name',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> name="student_id_card_fields[]" value="guardian_name"/>
                                            <?php echo e(__('father').'/'. __('guardian')); ?> <?php echo e(__('name')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="guardian_contact" class="form-check form-check-inline" <?php if(in_array('guardian_contact',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> type="checkbox" name="student_id_card_fields[]" value="guardian_contact"/>
                                            <?php echo e(__('father').'/'. __('guardian')); ?> <?php echo e(__('contact')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="address" class="form-check form-check-inline" <?php if(in_array('address',$settings['student_id_card_fields'])): ?> checked <?php endif; ?> type="checkbox" name="student_id_card_fields[]" value="address"/>
                                            <?php echo e(__('address')); ?>

                                        </label>
                                    </div>
                                </div>
                                

                            </div>

                            <h3 class="page-title">
                                <small class="theme-color">Note: These signature image are also used in other documents such as Bonafide Certificates, Leaving Certificates, and Student Result Cards.</small>
                            </h3>
                            <br>
                            <br>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type='text/javascript'>
        if ($(".color-picker").length) {
            $('.color-picker').asColorPicker();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/students/id_card_settings.blade.php ENDPATH**/ ?>