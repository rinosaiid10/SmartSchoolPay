<?php $__env->startSection('title'); ?>
    <?php echo e(__('leave').' '.__('settings')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('leave').' '.__('settings')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="frmData" class="general-setting" action="<?php echo e(route('leave-master.store')); ?>" novalidate="novalidate" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('total_leave_per_month')); ?><span class="text-danger">*</span></label>
                                    <input name="total_leave" type="number" required placeholder="<?php echo e(__('total_leave_per_month')); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('holiday_days')); ?><span class="text-danger">*</span></label>
                                    <select name="holiday_days[]" class="form-control js-example-basic-single select2-hidden-accessible" multiple>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label><?php echo e(__('session_year')); ?><span class="text-danger">*</span></label>
                                    <select name="session_year_id" class="form-control">
                                        <option value="">Please Select</option>
                                        <?php $__currentLoopData = $session_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <input class="btn btn-theme" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list').' '.__('leave').' '.__('settings')); ?>

                        </h4>
                        <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table" data-url="<?php echo e(route('leave-master.show',1)); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-query-params="queryParams" data-show-export="true"
                               data-export-options='{"fileName": "stream-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}' data-escape="true">
                            <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="total_leave" data-sortable="false"><?php echo e(__('total_leave')); ?></th>
                                <th scope="col" data-field="holiday_days" data-sortable="false"><?php echo e(__('holiday_days')); ?></th>
                                <th scope="col" data-field="session_year_id" data-visible="false" data-sortable="false"><?php echo e(__('session_year_id')); ?></th>
                                <th scope="col" data-field="session_year" data-sortable="false"><?php echo e(__('session_year')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-escape="false" data-field="operate" data-sortable="false" data-events="leavesSettingEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
             <!-- Modal -->
             <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit').' '.__('leave')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 leave-setting" id="leave-setting" action="<?php echo e(route('leave-master.update',1)); ?>" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="edit_id" id="edit_id" value=""/>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('total_leave_per_month')); ?><span class="text-danger">*</span></label>
                                        <input name="total_leave" id="total_leave" type="number" required placeholder="<?php echo e(__('total_leave_per_month')); ?>" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('holiday_days')); ?><span class="text-danger">*</span></label>
                                        <select name="holiday_days[]" id="holiday_days" class="form-control js-example-basic-single select2-hidden-accessible" multiple>
                                                <option value="Sunday">Sunday</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('session_year')); ?><span class="text-danger">*</span></label>
                                        <select name="session_year_id" id="session_year" class="form-control">
                                            <option value="">Please Select</option>
                                            <?php $__currentLoopData = $session_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script type="text/javascript">
    function queryParams(p) {
        return {
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/leave/leave_setting.blade.php ENDPATH**/ ?>