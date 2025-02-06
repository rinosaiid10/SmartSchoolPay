<?php $__env->startSection('title'); ?>
    <?php echo e(__('attendance')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('attendance_report')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('view').' '. __('attendance_report')); ?>

                        </h4>
                        <div class="row" id="toolbar">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="" class="filter-menu"><?php echo e(__('session_year')); ?></label>
                                <select name="session_year_id" class="form-control" id="filter_session_year_id">
                                    <?php $__currentLoopData = $sessionYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sessionYear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sessionYear->id); ?>" <?php echo e($sessionYear->id == $currentSessionYearId ? 'selected' : ''); ?>>
                                        <?php echo e($sessionYear->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('class')); ?> <?php echo e(__('section')); ?> <span class="text-danger">*</span></label>
                                <select required name="class_section_id" id="filter_class_section_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value=""><?php echo e(__('select')); ?></option>
                                    <?php $__currentLoopData = $class_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->id); ?>" data-class="<?php echo e($section->class->id); ?>"><?php echo e($section->class->name); ?> - <?php echo e($section->section->name); ?> <?php echo e($section->class->medium->name); ?> <?php echo e($section->class->streams->name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="show_attendance_student_list">
                            <table aria-describedby="mydesc" class='table student_table' id='table_list'
                                   data-toggle="table" data-url="<?php echo e(url('student-attendance-report')); ?>" data-click-to-select="true"
                                   data-side-pagination="server" data-pagination="true"
                                   data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-toolbar="#toolbar"
                                   data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                                   data-trim-on-search="false"
                                   data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                   data-maintain-selected="true" data-export-types='["txt","excel"]' data-show-export="true"
                                   data-export-options='{ "fileName": "view-attendance-list-<?= date('d-m-y') ?>" ,"ignoreColumn": ["operate"]}'
                                   data-query-params="queryParams" data-escape="true">
                                <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="user_id" data-sortable="true" data-visible="false"><?php echo e(__('user_id')); ?></th>
                                    <th scope="col" data-field="student_id" data-escape="false"  data-sortable="true" data-visible="true"><?php echo e(__('student_id')); ?></th>
                                    <th scope="col" data-field="admission_no" data-sortable="true"><?php echo e(__('admission_no')); ?></th>
                                    <th scope="col" data-field="roll_no" data-sortable="true"><?php echo e(__('roll_no')); ?></th>
                                    <th scope="col" data-field="name" data-sortable="false"><?php echo e(__('name')); ?></th>
                                    <th scope="col" data-field="total_days" data-sortable="false"><?php echo e(__('total_days')); ?></th>
                                    <th scope="col" data-field="present_days" data-sortable="false"><?php echo e(__('present_days')); ?></th>
                                    <th scope="col" data-field="absent_days" data-sortable="false"><?php echo e(__('absent_days')); ?></th>
                                    <th scope="col" data-field="percentage" data-sortable="false"><?php echo e(__('percentage')); ?></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function queryParams(p) {
            return {
                limit: p.limit,
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                search: p.search,
                'session_year_id': $('#filter_session_year_id').val(),
                'class_section_id': $('#filter_class_section_id').val(),
            };
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/attendance/report.blade.php ENDPATH**/ ?>