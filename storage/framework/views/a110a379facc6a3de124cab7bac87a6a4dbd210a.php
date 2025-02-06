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
                            <?php echo e(__('list') . ' ' . __('students')); ?>

                        </h4>
                        <div id="toolbar">
                            <div class="row">
                                <div class="col">
                                    <select name="filter_class_section_id" id="filter_class_section_id"
                                        class="form-control">
                                        <option value=""><?php echo e(__('select_class_section')); ?></option>
                                        <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($class->id); ?>>
                                                <?php echo e($class->class->name . ' ' . $class->section->name . ' ' . $class->class->medium->name . ' '. ($class->class->streams->name ?? ' ')); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="<?php echo e(url('students-list')); ?>" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200 , 500]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "students-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                                    ["operate"]}' data-query-params="studentDetailsqueryParams"
                                    data-check-on-init="true" data-escape="true">

                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                            <th data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                            <th data-field="user_id" data-sortable="false" data-visible="false"><?php echo e(__('user_id')); ?></th>
                                            <th data-field="admission_no" data-sortable="false"> <?php echo e(__('gr_number')); ?></th>
                                            <th data-field="class_section_id" data-sortable="false" data-visible="false"><?php echo e(__('class') . ' ' . __('section') . ' ' . __('id')); ?></th>
                                            <th data-field="class_section_name" data-sortable="false"><?php echo e(__('class') . ' ' . __('section')); ?></th>
                                            <th data-field="stream_name" data-sortable="false"><?php echo e(__('stream')); ?></th>
                                            <th data-field="roll_number" data-sortable="false"><?php echo e(__('roll_no')); ?></th>
                                            <th data-field="first_name" data-sortable="false"><?php echo e(__('first_name')); ?></th>
                                            <th data-field="last_name" data-sortable="false"><?php echo e(__('last_name')); ?></th>
                                            <th data-field="dob" data-sortable="false"><?php echo e(__('dob')); ?></th>
                                            <th data-field="image" data-sortable="false" data-formatter="imageFormatter"><?php echo e(__('image')); ?></th>
                                            <th data-field="father_first_name" data-sortable="false"><?php echo e(__('father') . ' ' . __('name')); ?></th>
                                            <th data-field="father_mobile" data-sortable="false"><?php echo e(__('father') . ' ' . __('mobile')); ?></th>
                                            <th data-field="guardian_first_name" data-sortable="false"><?php echo e(__('guardian') . ' ' . __('name')); ?></th>
                                            <th data-field="guardian_mobile" data-sortable="false"><?php echo e(__('guardian') . ' ' . __('mobile')); ?></th>
                                            <th data-field="current_address"><?php echo e(__('address')); ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <form action="<?php echo e(url('generate-id-card')); ?>" target="_blank" method="post">
                                <?php echo csrf_field(); ?>
                                <textarea id="user_id" name="user_id" style="display: none"></textarea>
                                <input type="submit" class="btn btn-theme mt-4" value="<?php echo e(__('Generate')); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var $tableList = $('#table_list')
        var selections = []
        var user_list = [];

        function responseHandler(res) {
            $.each(res.rows, function (i, row) {
                row.state = $.inArray(row.id, selections) !== -1
            })
            return res
        }

        $(function () {
            $tableList.on('check.bs.table check-all.bs.table uncheck.bs.table uncheck-all.bs.table',
                function (e, rowsAfter, rowsBefore) {
                    user_list = [];
                    var rows = rowsAfter
                    if (e.type === 'uncheck-all') {
                        rows = rowsBefore
                    }
                    var ids = $.map(!$.isArray(rows) ? [rows] : rows, function (row) {
                        return row.id
                    })
                    var func = $.inArray(e.type, ['check', 'check-all']) > -1 ? 'union' : 'difference'
                    selections = window._[func](selections, ids)
                    selections.forEach(element => {
                        user_list.push(element);
                    });
                    $('textarea#user_id').val(user_list);
                })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/students/generate_id.blade.php ENDPATH**/ ?>