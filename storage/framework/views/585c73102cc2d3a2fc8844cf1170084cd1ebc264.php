<?php $__env->startSection('title'); ?>
    <?php echo e(__('leave') . ' ' . __('details')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('leave') . ' ' . __('details')); ?>

            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list')); ?> <?php echo e(__('leave')); ?> <?php echo e(__('details')); ?>

                        </h4>

                        <div id="toolbar">
                            <div class="row">
                                <?php if($users): ?>
                                    <div class="col">
                                        <select name="staff_id" id="filter_staff_id" class="form-control">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->user->id); ?>">
                                                    <?php echo e($user->user->first_name . ' ' . $user->user->last_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <div class="col">
                                    <select name="session_year_id" id="filter_session_year_id" class="form-control">
                                        <?php $__currentLoopData = $sessionYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sessionYear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sessionYear->id); ?>" <?php echo e($sessionYear->id == $currentSessionYearId ? 'selected' : ''); ?>><?php echo e($sessionYear->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                    data-url="<?php echo e(route('leave-details-list', 1)); ?>" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="false"
                                    data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" data-toolbar="#toolbar"
                                    data-show-columns="false" data-show-refresh="true" data-fixed-columns="true"
                                    data-trim-on-search="false"
                                    data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                    data-maintain-selected="true" data-export-data-type='all' data-show-export="true"
                                    data-export-options='{ "fileName": "leave-<?= date('d-m-y') ?>","ignoreColumn":
                                    ["operate"]}'
                                    data-query-params="leaveReportQueryParams">
                                    <thead>
                                        <tr>
                                            <th scope="col" rowspan="2" data-field="no"> <?php echo e(__('no.')); ?> </th>
                                            <th scope="col" rowspan="2" data-field="month"> <?php echo e(__('month')); ?>

                                            </th>
                                            <th scope="col" rowspan="2" data-field="allocated">
                                                <?php echo e(__('allocated')); ?>

                                            </th>
                                            <th scope="col" class="text-center" colspan="3"><?php echo e(__('used')); ?>

                                            </th>
                                            <th scope="col" data-width="200" class="text-center" colspan="2">
                                                <?php echo e(__('remaining')); ?>

                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-field="used_cl"><?php echo e(__('CL')); ?> <small
                                                    class="text-info">(<?php echo e(__('casual_leave')); ?>)</small></th>
                                            <th scope="col" data-field="lwp"><?php echo e(__('LWP')); ?> <small
                                                    class="text-info">(<?php echo e(__('leave_without_pay')); ?>)</small></th>
                                            <th scope="col" data-field="total"><?php echo e(__('total')); ?> </th>

                                            <th scope="col" data-field="remaining_cl"><?php echo e(__('CL')); ?> </th>
                                            <th scope="col" data-field="remaining_total"><?php echo e(__('total')); ?> </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function leaveReportQueryParams(p) {
            return {
                limit: p.limit,
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                search: p.search,
                session_year_id: $('#filter_session_year_id').val(),
                staff_id: $('#filter_staff_id').val()
            };
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/leave/leave_details.blade.php ENDPATH**/ ?>