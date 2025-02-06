<?php $__env->startSection('title'); ?>
    <?php echo e(__('leave')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('leave')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo e(__('staff') . ' ' . __('leaves')); ?></h4>
                        <?php echo Form::hidden('holiday_days', $holiday_days ?? '', ['class' => 'form-control holiday_days']); ?>

                        <?php echo Form::hidden('public_holiday', $public_holiday ?? '', ['class' => 'form-control public_holiday']); ?>

                        <div class="row" id="toolbar">
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="" class="filter-menu"><?php echo e(__('session_year')); ?></label>
                                <select name="session_year_id" class="form-control" id="filter_session_year_id">
                                    <?php $__currentLoopData = $sessionYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sessionYear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sessionYear->id); ?>" <?php echo e($sessionYear->id == $currentSessionYearId ? 'selected' : ''); ?>><?php echo e($sessionYear->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-3">
                                <label for="" class="filter-menu"><?php echo e(__('filter')); ?></label>
                                <?php echo Form::select('filter', ['All' => __('all'),'Today' => __("today"), 'Tomorrow' => __('tomorrow'), 'Upcoming' => __('upcoming')], 'All', ['class' => 'form-control', 'id' => 'filter_upcoming']); ?>

                            </div>

                            <div class="form-group col-sm-12 col-md-3">
                                <label for="month" class="filter-menu"><?php echo e(__('month')); ?></label>
                                <?php echo Form::select('month', $months, null, ['class' => 'form-control',' id' => 'filter_month_id', 'placeholder' => __('all')]); ?>

                            </div>

                            <div class="form-group col-sm-12 col-md-3">
                                <label for="staff" class="filter-menu"><?php echo e(__('staff')); ?></label>
                                <select name="staff_id" class="form-control" id="filter_staff_id">
                                        <option value="">All</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->user->id); ?>"><?php echo e($user->user->first_name. ' ' . $user->user->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table" data-url="<?php echo e(route('leave-request.show')); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-show-export="true"
                        data-export-options='{"fileName": "leave-request-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}' data-query-params="leaveRequestQueryParams" data-escape="true">

                            <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="name"><?php echo e(__('name')); ?></th>
                                <th scope="col" data-field="from_date"><?php echo e(__('from_date')); ?></th>
                                <th scope="col" data-field="to_date"><?php echo e(__('to_date')); ?></th>
                                <th scope="col" data-field="days"><?php echo e(__('total')); ?></th>
                                <th scope="col" data-field="reason" data-formatter="reasonFormatter"><?php echo e(__('reason')); ?></th>
                                <th scope="col" data-field="file" data-formatter="fileFormatter"><?php echo e(__('attachments')); ?></th>
                                <th scope="col" data-formatter="leaveStatusFormatter" data-field="status"><?php echo e(__('status')); ?></th>
                                <th scope="col" data-visible="false" data-field="created_at"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-visible="false" data-field="updated_at"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-escape="false" data-field="operate" data-events="leavesEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('view') . ' ' . __('leave')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                    <form id="status-update" class="status-update" action="<?php echo e(url('leave-request-update')); ?>" novalidate="novalidate" method="Post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input leave-status" name="status" id="optionsRadios2" value="0" checked=""> <?php echo e(__('pending')); ?> <i class="input-helper"></i></label>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input leave-status" name="status" id="optionsRadios2" value="1"> <?php echo e(__('approved')); ?> <i class="input-helper"></i></label>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input leave-status" name="status" id="optionsRadios2" value="2"> <?php echo e(__('rejected')); ?> <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-md-12">
                                    <label><?php echo e(__('reason')); ?> <span class="text-danger">*</span></label>
                                    <textarea name="reason" disabled id="edit_reason" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-12 col-md-12">
                                    <label><?php echo e(__('from_date')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('from_date', null, [ 'required', 'class' => 'form-control datepicker-popup datepicker-popup-no-past', 'placeholder' => __('from_date'), 'id' => 'edit_from_date', 'readonly']); ?>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-12 col-md-12">
                                    <label><?php echo e(__('to_date')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('to_date', null, [ 'required', 'class' => 'form-control datepicker-popup datepicker-popup-no-past', 'placeholder' => __('to_date'), 'id' => 'edit_to_date', 'readonly']); ?>

                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('attachments')); ?> </label>
                                <div id="attachment"></div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12 edit_leave_dates mt-3">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function leaveRequestQueryParams(p){
            return {
                limit: p.limit,
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                search: p.search,
                user_id: $('#filter_staff_id').val(),
                session_year_id: $('#filter_session_year_id').val(),
                filter_upcoming: $('#filter_upcoming').val(),
                month_id: $('#filter_month_id').val(),


            };
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/leave/leave_request.blade.php ENDPATH**/ ?>