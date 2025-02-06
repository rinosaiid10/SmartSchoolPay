<?php $__env->startSection('title'); ?>
    <?php echo e(__('general_settings')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('general_settings')); ?>

            </h3>
        </div>
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="frmData" class="general-setting" action="<?php echo e(url('settings')); ?>" novalidate="novalidate" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <h4 class="card-title">
                                <?php echo e(__('general_settings')); ?>

                            </h4>
                            <hr>

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('school_name')); ?></label>
                                    <input name="school_name" value="<?php echo e(isset($settings['school_name']) ? $settings['school_name'] : ''); ?>" type="text" required placeholder="<?php echo e(__('school_name')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('school_email')); ?></label>
                                    <input name="school_email" value="<?php echo e(isset($settings['school_email']) ? $settings['school_email'] : ''); ?>" type="email" required placeholder="<?php echo e(__('school_email')); ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('school_phone')); ?></label>
                                    <input name="school_phone" value="<?php echo e(isset($settings['school_phone']) ? $settings['school_phone'] : ''); ?>" type="text" required placeholder="<?php echo e(__('school_phone')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('school_tagline')); ?></label>
                                    <textarea name="school_tagline" required placeholder="<?php echo e(__('school_tagline')); ?>" class="form-control"><?php echo e(isset($settings['school_tagline']) ? $settings['school_tagline'] : ''); ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('time_zone')); ?></label>
                                    <select name="time_zone" required class="form-control" style="width:100%">
                                        <?php $__currentLoopData = $getTimezoneList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php  echo $timezone[2]; ?>"
                                                <?php echo e(isset($settings['time_zone']) ? ($settings['time_zone'] == $timezone[2] ? 'selected' : '') : ''); ?>>
                                                <?php  echo $timezone[2] .' - GMT ' . $timezone[1] .' - '.$timezone[0] ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('date_formate')); ?></label>
                                    <select name="date_formate" required class="form-control">
                                        <?php $__currentLoopData = $getDateFormat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dateformate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"<?php echo e(isset($settings['date_formate']) ? ($settings['date_formate'] == $key ? 'selected' : '') : ''); ?>><?php echo e($dateformate); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('time_formate')); ?></label>
                                    <select name="time_formate" required class="form-control">
                                        <?php $__currentLoopData = $getTimeFormat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $timeformate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"<?php echo e(isset($settings['time_formate']) ? ($settings['time_formate'] == $key ? 'selected' : '') : ''); ?>><?php echo e($timeformate); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('favicon')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="favicon" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('favicon')); ?>"/>
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                        <div class="col-md-12">
                                            <img height="50px" src='<?php echo e(isset($settings['favicon']) ?url(Storage::url($settings['favicon'])) : ''); ?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('horizontal_logo')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="logo1" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('logo1')); ?>"/>
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                        <div class="col-md-12">
                                            <img height="50px" src='<?php echo e(isset($settings['logo1']) ? url(Storage::url($settings['logo1'])) : ''); ?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('vertical_logo')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="logo2" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('logo2')); ?>"/>
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                        <div class="col-md-12">
                                            <img height="50px" src='<?php echo e(isset($settings['logo2']) ?  url(Storage::url($settings['logo2'])) : ''); ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('theme').' '. __('color')); ?></label>
                                    <input name="theme_color" value="<?php echo e(isset($settings['theme_color']) ? $settings['theme_color'] : ''); ?>" type="text" required placeholder="<?php echo e(__('color')); ?>" class="color-picker"/>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('secondary').' '. __('color')); ?></label>
                                    <input name="secondary_color" value="<?php echo e(isset($settings['secondary_color']) ? $settings['secondary_color'] : ''); ?>" type="text" required placeholder="<?php echo e(__('color')); ?>" class="color-picker"/>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('session_years')); ?></label>
                                    <select name="session_year" required class="form-control">
                                        <?php $__currentLoopData = $session_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($year->id); ?>"<?php echo e(isset($settings['session_year']) ? ($settings['session_year'] == $year->id ? 'selected' : '') : ''); ?>><?php echo e($year->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('school_address')); ?></label>
                                    <textarea name="school_address" required placeholder="<?php echo e(__('school_address')); ?>" rows="5" class="form-control"><?php echo e(isset($settings['school_address']) ? $settings['school_address'] : ''); ?></textarea>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('login_image')); ?></label>
                                    <input type="file" name="login_image" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('login_image')); ?>"/>
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                        <div class="col-md-12 mt-2">
                                            <img height="50px" src='<?php echo e(isset($settings['login_image']) ? url(Storage::url($settings['login_image'])) : url(Storage::url('eschool.jpg'))); ?>'>
                                        </div>
                                    </div>
                                </div>
                                  
                                  <?php if(isset($settings['online_payment'])): ?>
                                  <?php if($settings['online_payment']): ?>
                                      <div class="form-inline col-md-4">
                                          <label><?php echo e(__('online_payment_mode')); ?></label> <span class="ml-1 text-danger">*</span>
                                          <div class="ml-4 d-flex">
                                              <div class="form-check form-check-inline">
                                                  <label class="form-check-label">
                                                      <input type="radio" name="online_payment" class="online_payment_toggle" value="1" checked>
                                                      <?php echo e(__('enable')); ?>

                                                  </label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                  <label class="form-check-label">
                                                      <input type="radio" name="online_payment" class="online_payment_toggle" value="0">
                                                      <?php echo e(__('disable')); ?>

                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  <?php else: ?>
                                      <div class="form-inline col-md-4">
                                          <label><?php echo e(__('online_payment_mode')); ?></label> <span class="ml-1 text-danger">*</span>
                                          <div class="ml-4 d-flex">
                                              <div class="form-check form-check-inline">
                                                  <label class="form-check-label">
                                                      <input type="radio" name="online_payment" class="online_payment_toggle" value="1">
                                                      <?php echo e(__('enable')); ?>

                                                  </label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                  <label class="form-check-label">
                                                      <input type="radio" name="online_payment" class="online_payment_toggle" value="0" checked>
                                                      <?php echo e(__('disable')); ?>

                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  <?php endif; ?>
                              <?php else: ?>
                                  <div class="form-inline col-md-4">
                                      <label><?php echo e(__('online_payment_mode')); ?></label> <span class="ml-1 text-danger">*</span>
                                      <div class="ml-4 d-flex">
                                          <div class="form-check form-check-inline">
                                              <label class="form-check-label">
                                                  <input type="radio" name="online_payment" class="online_payment_toggle" value="1" checked>
                                                  <?php echo e(__('enable')); ?>

                                              </label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                              <label class="form-check-label">
                                                  <input type="radio" name="online_payment" class="online_payment_toggle" value="0">
                                                  <?php echo e(__('disable')); ?>

                                              </label>
                                          </div>
                                      </div>
                                  </div>
                              <?php endif; ?>
                              
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <h4 class="card-title">
                                <?php echo e(__('social') . ' ' . __('links')); ?>

                            </h4>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('facebook')); ?></label><span class="ml-1 text-danger">*</span>
                                    <input name="facebook" value="<?php echo e(isset($settings['facebook']) ? $settings['facebook'] : ''); ?>" type="text" required placeholder="<?php echo e(__('facebook').' '. __('url')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('instagram')); ?></label><span class="ml-1 text-danger">*</span>
                                    <input name="instagram" value="<?php echo e(isset($settings['instagram']) ? $settings['instagram'] : ''); ?>" type="text" required placeholder="<?php echo e(__('instagram').' '. __('url')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('linkedin')); ?></label><span class="ml-1 text-danger">*</span>
                                    <input name="linkedin" value="<?php echo e(isset($settings['linkedin']) ? $settings['linkedin'] : ''); ?>" type="text" required placeholder="<?php echo e(__('linkedin').' '. __('url')); ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label><?php echo e(__('google_map_link')); ?></label> <span class="ml-1 text-danger">*</span>
                                    <input name="maplink" value="<?php echo e(isset($settings['maplink']) ? $settings['maplink'] : ''); ?>" type="text" required placeholder="<?php echo e(__('google_map_link')); ?>" class="form-control"/>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span style="font-size: 14px; color:"> <b><?php echo e(__('Note')); ?> :- </b><?php echo e(__('get_the_link_from_google_map_with_embed_url_and_paste_only_src_from_it')); ?></span>
                                </div>
                            </div>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <h4 class="card-title">
                                <?php echo e(__('recaptcha')); ?>

                            </h4>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('site_key')); ?></label><span class="ml-1 text-danger">*</span>
                                    <input name="recaptcha_site_key" value="<?php echo e(isset($settings['recaptcha_site_key']) ? $settings['recaptcha_site_key'] : ''); ?>" type="text" required placeholder="<?php echo e(__('site_key')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('secret_key')); ?></label><span class="ml-1 text-danger">*</span>
                                    <input name="recaptcha_secret_key" value="<?php echo e(isset($settings['recaptcha_secret_key']) ? $settings['recaptcha_secret_key'] : ''); ?>" type="text" required placeholder="<?php echo e(__('secret_key')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('status')); ?></label><span class="ml-1 text-danger">*</span>
                                    <div class="ml-4 d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="recaptcha_status" class="online_payment_toggle" value="1" <?php echo e(isset($settings['recaptcha_status']) && $settings['recaptcha_status'] == 1 ? 'checked' : ''); ?>>
                                                <?php echo e(__('enable')); ?>

                                                
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="recaptcha_status" class="online_payment_toggle" value="0" <?php echo e(isset($settings['recaptcha_status']) && $settings['recaptcha_status'] == 0 ? 'checked' : ''); ?>>
                                                <?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
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

<?php $__env->startSection('script'); ?>
    <script type='text/javascript'>
        if ($(".color-picker").length) {
            $('.color-picker').asColorPicker();
        }

        $("#frmData").validate({
            rules: {
                username: "required",
                password: "required",
            },
            errorPlacement: function (label, element) {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            },
            highlight: function (element, errorClass) {
                $(element).parent().addClass('has-danger')
                $(element).addClass('form-control-danger')
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/settings/index.blade.php ENDPATH**/ ?>