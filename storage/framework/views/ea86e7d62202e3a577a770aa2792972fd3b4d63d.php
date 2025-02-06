<?php $__env->startSection('title'); ?>
<?php echo e(__('class') . ' ' . __('subject')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage') . ' ' . __('class') . ' ' . __('subject')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="toolbar">
                        <select name="filter_medium_id" id="filter_medium_id" class="form-control">
                            <option value=""><?php echo e(__('all')); ?></option>
                            <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($medium->id); ?>">
                                <?php echo e($medium->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table" data-url="<?php echo e(route('class.subject.list')); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-query-params="AssignclassQueryParams" data-export-options='{ "fileName": "class-list-<?= date(' d-m-y') ?>" ,"ignoreColumn":
                        ["operate"]}'
                        data-show-export="true" data-escape="true">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                    <?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                <th scope="col" data-field="medium_name" data-sortable="true"><?php echo e(__('medium')); ?>

                                </th>
                                <th scope="col" data-field="stream_name" data-sortable="true">
                                    <?php echo e(__('stream')); ?>

                                </th>
                                <th scope="col" data-field="section_names" data-sortable="true">
                                    <?php echo e(__('section')); ?></th>
                                <th scope="col" data-field="include_semesters" data-formatter="semesterFormatter" data-sortable="true">
                                    <?php echo e(__('semester')); ?>

                                </th>
                                <th scope="col" data-field="core_subject" data-sortable="true" data-formatter="coreSubjectFormatter"><?php echo e(__('core_subject')); ?></th>
                                <th scope="col" data-field="elective_subject" data-sortable="true" data-formatter="electiveSubjectFormatter"><?php echo e(__('elective_subject')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false">
                                    <?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false">
                                    <?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-escape="false" data-sortable="false"> <?php echo e(__('action')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/class/subject.blade.php ENDPATH**/ ?>