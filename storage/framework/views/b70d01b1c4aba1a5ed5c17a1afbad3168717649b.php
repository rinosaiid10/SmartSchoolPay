<?php $__env->startSection('title'); ?>
    <?php echo e(__('teacher')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage_teacher')); ?>

            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create_teacher')); ?>

                        </h4>
                        <form class="create-form pt-3" id="formdata" action="<?php echo e(url('teachers')); ?>"
                            enctype="multipart/form-data" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('first_name', null, ['required', 'placeholder' => __('first_name'), 'class' => 'form-control']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('last_name', null, ['required', 'placeholder' => __('last_name'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'male'); ?>

                                                <?php echo e(__('male')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'female'); ?>

                                                <?php echo e(__('female')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('email')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('email', null, ['required', 'placeholder' => __('email'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('mobile')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::number('mobile', null, ['required', 'placeholder' => __('mobile'),'min' => 1 , 'class' => 'form-control']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-6">

                                    <label><?php echo e(__('image')); ?></label>
                                    <input type="file" name="image" class="file-upload-default" accept="image/png,image/jpeg,image/jpg" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="<?php echo e(__('image')); ?>" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('dob', null, ['required', 'placeholder' => __('dob'), 'class' => 'datepicker-popup-no-future form-control']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('qualification')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('qualification', null, ['required', 'placeholder' => __('qualification'), 'class' => 'form-control', 'rows' => 3]); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('current_address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('current_address', null, ['required', 'placeholder' => __('current_address'), 'class' => 'form-control', 'rows' => 3]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('permanent_address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('permanent_address', null, ['required', 'placeholder' => __('permanent_address'), 'class' => 'form-control', 'rows' => 3]); ?>

                                </div>
                            </div>
                            <div class="row">
                                <?php $__currentLoopData = $teacherFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->type==="text" || $row->type==="number"): ?>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                            <input type="<?php echo e($row->type); ?>" name="<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="dropdown"): ?>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                            <select name="<?php echo e($row->name); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                <option value="">Please Select</option>
                                                <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($options != null): ?>
                                                        <option value="<?php echo e($options); ?>"><?php echo e(ucfirst($options)); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="radio"): ?>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                            <br>
                                            <div class="d-flex">
                                                <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($options != null): ?>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                                <?php echo e(ucfirst($options)); ?>

                                                            </label>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="checkbox"): ?>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                            <br>
                                            <div class="col-md-10" id="<?php echo e($row->name); ?>">
                                                <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($options != null): ?>
                                                        <div class="checkbox form-check form-check-inline"  <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name="<?php echo e('checkbox[' . $row->name . '][' . $options . ']'); ?>" value="<?php echo e($options); ?>"> <?php echo e(ucfirst(str_replace('_', ' ', $options))); ?>

                                                            </label>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="textarea"): ?>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                            <textarea name="<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>></textarea>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="file"): ?>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                                <input type="file" name="<?php echo e($row->name); ?>" class="file-upload-default" <?php echo e(($row->is_required===1)?"required":''); ?>/>
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" required />
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                                    </span>
                                                </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <input type="checkbox" name="grant_permission" aria-label="Checkbox for following text input" id="gridCheck">
                                  </div>
                                </div>
                                <label class="form-control" for="gridCheck">
                                    <?php echo e(__('grant_permission_to_manage_students_parents')); ?>

                                </label>
                            </div>
                            <div class="form-group text-info" style="font-size: 0.8rem;margin-top: -0.3rem"><?php echo e(__('note_for_permission_of_student_manage')); ?></div>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/teacher/index.blade.php ENDPATH**/ ?>