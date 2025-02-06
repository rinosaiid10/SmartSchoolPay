<?php $__env->startSection('title'); ?>
    <?php echo e(__('class')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('class')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('class')); ?>

                        </h4>
                        <form class="pt-3 class-create-form" id="create-form" action="<?php echo e(route('class.store')); ?>"
                            method="POST" novalidate="novalidate">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                    <input name="name" type="text" placeholder="<?php echo e(__('name')); ?>"
                                        class="form-control" />
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('educational_program')); ?> <span class="text-info">(optional)</span></label>
                                    <select name="educational_program" id="educational_program" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('Please')); ?>  <?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $educational_programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($program->id); ?>"><?php echo e($program->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('medium')); ?> <span class="text-danger">*</span></label>
                                    <select name="medium_id" id="medium_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('Please')); ?>  <?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($medium->id); ?>"><?php echo e($medium->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('section')); ?> <span class="text-danger">*</span></label>
                                    <select multiple name="section_id[]" id="section_id" class="form-control js-example-basic-single select2-hidden-accessible">
                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('shifts')); ?> <span class="text-info">(optional)</span></label>
                                    <select name="shift_id" id="shift_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('Please')); ?>  <?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($shift->id); ?>"><?php echo e($shift->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('stream')); ?> <span class="text-info">(optional)</span></label>
                                    <select multiple name="stream_id[]" id="stream_id" class="form-control js-example-basic-single select2-hidden-accessible">
                                        <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($stream->id); ?>"><?php echo e($stream->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <?php if(count($semesters) > 0): ?>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="include_semesters" value="1"><?php echo e(__('include_semesters')); ?>

                                            </label>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list') . ' ' . __('class')); ?>

                    </h4>
                    <div class="row" id="toolbar">
                        <div class="form-group col-sm-12 col-md-3">
                            <label for="" class="filter-menu"><?php echo e(__('medium')); ?></label>
                            <select name="medium_id" id="filter_medium_id" class="form-control">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($medium->id); ?>"><?php echo e($medium->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-12 col-md-3">
                            <label for="" class="filter-menu"><?php echo e(__('shift')); ?></label>
                            <select name="shift_id" id="filter_shift_id" class="form-control">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($shift->id); ?>"><?php echo e($shift->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="" class="filter-menu"><?php echo e(__('educational_program')); ?></label>
                            <select name="educational_program_id" id="filter_educational_program_id" class="form-control">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $educational_programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($program->id); ?>"><?php echo e($program->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>



                    </div>

                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                        data-url="<?php echo e(url('class-list')); ?>" data-click-to-select="true" data-side-pagination="server"
                        data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                        data-show-columns="true" data-show-refresh="true" data-trim-on-search="false"
                        data-mobile-responsive="true" data-sort-name="id" data-toolbar="#toolbar" data-sort-order="desc"
                        data-maintain-selected="true" data-export-types='["txt","excel"]'
                        data-export-options='{ "fileName": "class-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                        ["operate"]}'
                        data-show-export="true"
                        data-query-params="classQueryParams">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                    <?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                <th scope="col" data-field="educational_program_name" data-sortable="true"><?php echo e(__('educational_program')); ?>

                                </th>
                                <th scope="col" data-field="medium_name" data-sortable="true"><?php echo e(__('medium')); ?>

                                </th>
                                <th scope="col" data-field="shift_name" data-sortable="true"><?php echo e(__('shifts')); ?>

                                </th>
                                <th scope="col" data-field="stream_name" data-sortable="true">
                                    <?php echo e(__('stream')); ?>

                                </th>
                                <th scope="col" data-field="section_name" data-sortable="true">
                                    <?php echo e(__('section')); ?>

                                </th>
                                <th scope="col" data-field="include_semesters" data-formatter="semesterFormatter" data-sortable="true">
                                    <?php echo e(__('semester')); ?>

                                </th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false">
                                    <?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false">
                                    <?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false"
                                    data-events="classEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit') . ' ' . __('class')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="class-edit-form" id="edit-form" action="<?php echo e(url('class')); ?>"
                            novalidate="novalidate">
                            <div class="modal-body">
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                        <input name="name" id="edit_name" type="text" placeholder="<?php echo e(__('name')); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('educational_program')); ?> <span class="text-info">(optional)</span></label>
                                    <select name="educational_program" id="edit_educational_program_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('Please')); ?>  <?php echo e(__('select')); ?></option>
                                        <?php $__currentLoopData = $educational_programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($program->id); ?>"><?php echo e($program->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('shifts')); ?> <span class="text-info">(optional)</span></label>
                                        <select name="shift_id" id="edit_shift_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <option value=""><?php echo e(__('Please')); ?>  <?php echo e(__('select')); ?></option>
                                            <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($shift->id); ?>"><?php echo e($shift->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('medium')); ?> <span class="text-danger">*</span></label>
                                        <select name="medium_id" id="edit_medium_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <option value=""><?php echo e(__('Please')); ?>  <?php echo e(__('select')); ?></option>
                                            <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($medium->id); ?>"><?php echo e($medium->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('stream')); ?><span class="text-info">(optional)</span></label>
                                        <select name="stream_id" id="edit_stream_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <option value=""><?php echo e(__('Please')); ?>  <?php echo e(__('select')); ?></option>
                                            <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($stream->id); ?>"><?php echo e($stream->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('section')); ?> <span class="text-danger">*</span></label>
                                        <select multiple name="section_id[]" id="edit_section_id" class="form-control js-example-basic-single select2-hidden-accessible">
                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <?php if(count($semesters) > 0): ?>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="edit_include_semesters" name="include_semesters" value="1"><?php echo e(__('Include Semesters')); ?>

                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <br>
                                        <small class="text-danger">* <?php echo e(__("By Changing this Semester setting, your existing data related to this class will be Auto Deleted")); ?></small>
                                        <ol class="text-danger">
                                            <li><?php echo e(__("Class Subject")); ?></li>
                                            <li><?php echo e(__("timetable")); ?></li>
                                            <li><?php echo e(__("Lesson & Topic")); ?></li>
                                            <li><?php echo e(__("Exam & Marks")); ?></li>
                                            <li><?php echo e(__("announcement")); ?></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/class/index.blade.php ENDPATH**/ ?>