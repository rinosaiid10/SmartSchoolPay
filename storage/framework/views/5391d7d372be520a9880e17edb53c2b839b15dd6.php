<?php $__env->startSection('title'); ?>
    <?php echo e(__('students')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('students')); ?>

            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('students')); ?>

                        </h4>
                        <form class="pt-3 student-registration-form" id="student-registration-form" enctype="multipart/form-data" action="<?php echo e(route('students.store')); ?>" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('first_name', null, ['placeholder' => __('first_name'), 'class' => 'form-control']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('last_name', null, ['placeholder' => __('last_name'), 'class' => 'form-control']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mobile')); ?></label>
                                    <?php echo Form::number('mobile', null, ['placeholder' => __('mobile'), 'class' => 'form-control mobile' , 'min' => 10]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
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
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>" required="required"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('dob', null, ['placeholder' => __('dob'), 'class' => 'datepicker-popup-no-future form-control']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('class') . ' ' . __('section')); ?> <span class="text-danger">*</span></label>
                                    <select name="class_section_id" id="class_section" class="form-control select2">
                                        <option value=""><?php echo e(__('select') . ' ' . __('class') . ' ' . __('section')); ?></option>
                                        <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"><?php echo e($section->class->name); ?> - <?php echo e($section->section->name); ?> <?php echo e($section->class->medium->name); ?> <?php echo e($section->class->streams->name ?? ' '); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label> <?php echo e(__('category')); ?> <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        <option value=""><?php echo e(__('select') . ' ' . __('category')); ?></option>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('gr_number')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('admission_no', $admission_no, ['readonly','placeholder' => __('gr_number'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('caste')); ?></label>
                                    <?php echo Form::text('caste', null, ['placeholder' => __('caste'), 'class' => 'form-control']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('religion')); ?></label>
                                    <?php echo Form::text('religion', null, ['placeholder' => __('religion'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('admission_date')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('admission_date',  $admission_date, ['placeholder' => __('admission_date'), 'class' => 'datepicker-popup-no-future form-control']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('blood_group')); ?> <span class="text-danger">*</span></label>
                                    <select name="blood_group" class="form-control">
                                        <option value=""><?php echo e(__('select') . ' ' . __('blood_group')); ?></option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('height')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('height', null, ['placeholder' => __('height'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('weight')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('weight', null, ['placeholder' => __('weight'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label><?php echo e(__('current_address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('current_address', null, ['placeholder' => __('current_address'), 'class' => 'form-control', 'id' => 'current_address','rows'=>2]); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label><?php echo e(__('permanent_address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('permanent_address', null, ['placeholder' => __('permanent_address'), 'class' => 'form-control', 'id' => 'permanent_address','rows'=>2]); ?>

                                </div>
                            </div>
                            <div class="row">
                                <?php $__currentLoopData = $studentFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->type==="text" || $row->type==="number"): ?>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                            <input type="<?php echo e($row->type); ?>" name="<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="dropdown"): ?>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                            <select name="<?php echo e($row->name); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                <option value="">Please Select</option>
                                                <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($options != null): ?>
                                                        <option value="<?php echo e($options); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $options))); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="radio"): ?>
                                        <div class="form-group col-sm-12 col-md-4">
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
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                            <br>
                                            <div class="col-md-10" id="<?php echo e($row->name); ?>" >
                                                <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($options != null): ?>
                                                        <div class="checkbox form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name="<?php echo e('checkbox[' . $row->name . '][]'); ?>" value="<?php echo e($options); ?>" <?php echo e(($row->is_required===1)?"required":''); ?>> <?php echo e(ucfirst(str_replace('_', ' ', $options))); ?>

                                                            </label>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="textarea"): ?>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                            <textarea name="<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>></textarea>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($row->type==="file"): ?>
                                        <div class="form-group col-sm-12 col-md-4">
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
                            <div class="form-group col-sm-12 col-md-12">
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="parent" value="Parent" class="form-check-input parent-check" id="show-parents-details" checked><?php echo e(__('parents_details')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="guardian" value="Guardian" class="form-check-input parent-check" id="show-guardian-details"><?php echo e(__('guardian_details')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="parents_div" style="display:none;">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('father_email')); ?> <span class="text-danger">*</span></label>
                                    <?php if(env('DEMO_MODE')): ?>
                                        <select class="father-search w-100" id="father_email" name="father_email" disabled></select>
                                    <?php else: ?>
                                        <select class="father-search w-100" id="father_email" name="father_email"></select>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('father_first_name', null, ['placeholder' => __('father') . ' ' . __('first_name'), 'class' => 'form-control', 'id' => 'father_first_name']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('father_last_name', null, ['placeholder' => __('father') . ' ' . __('last_name'), 'class' => 'form-control', 'id' => 'father_last_name']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('mobile')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::number('father_mobile', null, ['placeholder' => __('father') . ' ' . __('mobile'), 'class' => 'form-control', 'id' => 'father_mobile', 'min' => 0]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('father_dob', null, ['placeholder' => __('father') . ' ' . __('dob'), 'class' => 'form-control datepicker-popup-no-future form-control', 'id' => 'father_dob']); ?>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('occupation')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('father_occupation', null, ['placeholder' => __('father') . ' ' . __('occupation'), 'class' => 'form-control', 'id' => 'father_occupation']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="father_image" class="father_image file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('father') . ' ' . __('image')); ?>"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="father-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row father-extra-div">
                                    <?php $__currentLoopData = $parentFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($row->type==="text" || $row->type==="number"): ?>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                <input type="<?php echo e($row->type); ?>" name="father_<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($row->type==="dropdown"): ?>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                <select name="father_<?php echo e($row->name); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                    <option value="">Please Select</option>
                                                    <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($options != null): ?>
                                                            <option value="<?php echo e($options); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $options))); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($row->type==="radio"): ?>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                <br>
                                                <div class="d-flex">
                                                    <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($options != null): ?>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="father_<?php echo e($row->name); ?>" value="<?php echo e($options); ?>" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                                    <?php echo e(ucfirst($options)); ?>

                                                                </label>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($row->type==="checkbox"): ?>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                                <br>
                                                <div class="col-md-10" id="<?php echo e($row->name); ?>">
                                                    <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($options != null): ?>
                                                            <div class="checkbox form-check form-check-inline"  <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="father_<?php echo e('checkbox[' . $row->name . '][' . $options . ']'); ?>" value="<?php echo e($options); ?>"> <?php echo e(ucfirst(str_replace('_', ' ', $options))); ?>

                                                                </label>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                            </div>
                                        <?php endif; ?>
                                        <?php if($row->type==="textarea"): ?>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                <textarea name="father_<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>></textarea>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($row->type==="file"): ?>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                                    <input type="file" name="father_<?php echo e($row->name); ?>" class="file-upload-default" <?php echo e(($row->is_required===1)?"required":''); ?>/>
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

                                </div>

                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('mother_email')); ?> <span class="text-danger">*</span></label>
                                    <?php if(env('DEMO_MODE')): ?>
                                        <select class="mother-search w-100" id="mother_email" name="mother_email" disabled></select>
                                    <?php else: ?>
                                        <select class="mother-search w-100" id="mother_email" name="mother_email"></select>
                                    <?php endif; ?>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_first_name', null, ['placeholder' => __('mother') . ' ' . __('first_name'), 'class' => 'form-control', 'id' => 'mother_first_name']); ?>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_last_name', null, ['placeholder' => __('mother') . ' ' . __('last_name'), 'class' => 'form-control', 'id' => 'mother_last_name']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('mobile')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::number('mother_mobile', null, ['placeholder' => __('mother') . ' ' . __('mobile'), 'class' => 'form-control', 'id' => 'mother_mobile', 'min' => 0]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_dob', null, ['placeholder' => __('mother') . ' ' . __('dob'), 'class' => 'form-control datepicker-popup-no-future form-control', 'id' => 'mother_dob']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('occupation')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_occupation', null, ['placeholder' => __('mother') . ' ' . __('occupation'), 'class' => 'form-control', 'id' => 'mother_occupation']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="mother_image" class="mother_image file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('mother') . ' ' . __('image')); ?>"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="mother-image-tag" class="img-fluid w-100" />
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="row mother-extra-div">
                                        <?php $__currentLoopData = $parentFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($row->type==="text" || $row->type==="number"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <input type="<?php echo e($row->type); ?>" name="mother_<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="dropdown"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <select name="mother_<?php echo e($row->name); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                        <option value="">Please Select</option>
                                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($options != null): ?>
                                                                <option value="<?php echo e($options); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $options))); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="radio"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <br>
                                                    <div class="d-flex">
                                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($options != null): ?>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="mother_<?php echo e($row->name); ?>" value="<?php echo e($options); ?>" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                                        <?php echo e(ucfirst($options)); ?>

                                                                    </label>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="checkbox"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                                    <br>
                                                    <div class="col-md-10" id="<?php echo e($row->name); ?>">
                                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($options != null): ?>
                                                                <div class="checkbox form-check form-check-inline"  <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" name="mother_<?php echo e('checkbox[' . $row->name . '][' . $options . ']'); ?>" value="<?php echo e($options); ?>"> <?php echo e(ucfirst(str_replace('_', ' ', $options))); ?>

                                                                    </label>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="textarea"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <textarea name="mother_<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>></textarea>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="file"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                                        <input type="file" name="mother_<?php echo e($row->name); ?>" class="file-upload-default" <?php echo e(($row->is_required===1)?"required":''); ?>/>
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
                                </div>

                            </div>

                            <div class="row" id="guardian_div" style="display:none;">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('guardian') . ' ' . __('email')); ?> <span class="text-danger">*</span></label>
                                    <?php if(env('DEMO_MODE')): ?>
                                        <select class="guardian-search form-control" id="guardian_email" name="guardian_email" disabled></select>
                                    <?php else: ?>
                                        <select class="guardian-search form-control" id="guardian_email" name="guardian_email"></select>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_first_name', null, ['placeholder' => __('guardian') . ' ' . __('first_name'), 'class' => 'form-control', 'id' => 'guardian_first_name']); ?>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_last_name', null, ['placeholder' => __('guardian') . ' ' . __('last_name'), 'class' => 'form-control', 'id' => 'guardian_last_name']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('mobile')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::number('guardian_mobile', null, ['placeholder' => __('guardian') . ' ' . __('mobile'), 'class' => 'form-control', 'id' => 'guardian_mobile' , 'min' => 0]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="guardian_gender" value="male" id="guardian_male">
                                                <?php echo e(__('male')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="guardian_gender" value="female" id="guardian_female">
                                                <?php echo e(__('female')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_dob', null, ['placeholder' => __('guardian') . ' ' . __('dob'), 'class' => 'form-control datepicker-popup-no-future form-control', 'id' => 'guardian_dob']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('occupation')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_occupation', null, ['placeholder' => __('guardian') . ' ' . __('occupation'), 'class' => 'form-control', 'id' => 'guardian_occupation']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="guardian_image1" class="guardian_image1 file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('guardian') . ' ' . __('image')); ?>"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" name="guardian_image_tag" id="guardian-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row guardian-extra-div">
                                        <?php $__currentLoopData = $parentFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($row->type==="text" || $row->type==="number"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <input type="<?php echo e($row->type); ?>" name="guardian_<?php echo e($row->name); ?>" id="guardian_<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="dropdown"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <select name="guardian_<?php echo e($row->name); ?>" id="guardian_<?php echo e($row->name); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                        <option value="">Please Select</option>
                                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($options != null): ?>
                                                                <option value="<?php echo e($options); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $options))); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="radio"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <br>
                                                    <div class="d-flex">
                                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($options != null): ?>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="guardian_<?php echo e($row->name); ?>" id="guardian_<?php echo e($row->name); ?>" value="<?php echo e($options); ?>" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                                        <?php echo e(ucfirst($options)); ?>

                                                                    </label>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="checkbox"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                                    <br>
                                                    <div class="col-md-10" id="<?php echo e($row->name); ?>">
                                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($options != null): ?>
                                                                <div class="checkbox form-check form-check-inline"  <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" id="guardian_<?php echo e($row->name); ?>" name="guardian_<?php echo e('checkbox[' . $row->name . '][' . $options . ']'); ?>" value="<?php echo e($options); ?>"> <?php echo e(ucfirst(str_replace('_', ' ', $options))); ?>

                                                                    </label>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="textarea"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                                    <textarea name="guardian_<?php echo e($row->name); ?>" id="guardian_<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>></textarea>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($row->type==="file"): ?>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                                        <input type="file" name="guardian_<?php echo e($row->name); ?>" class="file-upload-default" <?php echo e(($row->is_required===1)?"required":''); ?>/>
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
                                </div>

                            </div>

                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/students/index.blade.php ENDPATH**/ ?>