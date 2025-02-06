<?php $__env->startSection('title'); ?>
    <?php echo e(__('class_timetable')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage').' '.__('class_timetable')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                         
                        <?php if(Auth::user()->hasRole('Super Admin')): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('timetable-create')): ?>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('class')); ?> <?php echo e(__('section')); ?> <span class="text-danger">*</span></label>
                                        <select required name="class_section_id" id="class_timetable_class_section" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <option value=""><?php echo e(__('select')); ?></option>
                                            <?php $__currentLoopData = $class_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($section->id); ?>" data-class="<?php echo e($section->class->id); ?>" data-section="<?php echo e($section->section->id); ?>"><?php echo e($section->class->name.' '.$section->section->name.' - '.$section->class->medium->name); ?> <?php echo e($section->class->streams->name ?? ' '); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="alert alert-warning text-center w-75 m-auto warning_no_data" role="alert">
                                    <strong><?php echo e(__('no_data_found')); ?></strong>
                                </div>
                                <div class="row set_timetable"></div>
                            <?php endif; ?>
                        <?php elseif(Auth::user()->hasRole('Teacher')): ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('class')); ?> <?php echo e(__('section')); ?> <span class="text-danger">*</span></label>
                                    <select required name="class_section_id" id="class_timetable_class_section" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $class_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>" data-class="<?php echo e($section->class->id); ?>" data-section="<?php echo e($section->section->id); ?>"><?php echo e($section->class->name.' '.$section->section->name.' - '.$section->class->medium->name); ?> <?php echo e($section->class->streams->name ?? ' '); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="alert alert-warning text-center w-75 m-auto warning_no_data" role="alert">
                                <strong><?php echo e(__('no_data_found')); ?></strong>
                            </div>
                            <div class="row set_timetable"></div>
                        <?php else: ?>

                            
                        <?php endif; ?>


                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/timetable/class_timetable.blade.php ENDPATH**/ ?>