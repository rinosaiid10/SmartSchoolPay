<?php $__env->startSection('title'); ?>
    <?php echo e(__('holiday')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('holiday')); ?>

            </h3>
        </div>

        <div class="row">
            <?php if(Auth::user()->can('holiday-create')): ?>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('holiday')); ?>

                        </h4>
                        <form class="create-form pt-3" id="formdata" action="<?php echo e(url('holiday')); ?>" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('date', null, ['required', 'placeholder' => __('date'), 'class' => 'datepicker-popup form-control']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('title', null, ['required', 'placeholder' => __('title'), 'class' => 'form-control']); ?>


                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('description')); ?></label>
                                    <?php echo Form::textarea('description', null, ['rows' => '2', 'placeholder' => __('description'), 'class' => 'form-control']); ?>


                                </div>
                            </div>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if(Auth::user()->can('holiday-list')): ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo e(__('list') . ' ' . __('holiday')); ?>

                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                        data-url="<?php echo e(url('holiday-list')); ?>" data-click-to-select="true"
                                        data-side-pagination="server" data-pagination="true"
                                        data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true"
                                        data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                        data-fixed-columns="true"
                                        data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                        data-sort-order="desc" data-maintain-selected="true"
                                        data-export-types='["txt","excel"]'
                                        data-export-options='{ "fileName": "holiday-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}'
                                        data-query-params="queryParams" data-escape="true">
                                        <thead>
                                            <tr>
                                                <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                    <?php echo e(__('id')); ?></th>
                                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?>

                                                </th>
                                                <th scope="col" data-field="date" data-width="150" data-sortable="false"><?php echo e(__('date')); ?>

                                                </th>
                                                <th scope="col" data-field="title" data-sortable="false">
                                                    <?php echo e(__('title')); ?>

                                                </th>
                                                <th scope="col" data-field="description" data-sortable="false">
                                                    <?php echo e(__('description')); ?></th>
                                                <?php if(Auth::user()->can('holiday-edit') || Auth::user()->can('holiday-delete')): ?>
                                                    <th data-escape="false" data-events="actionEvents" data-width="150" scope="col" data-field="operate"
                                                        data-sortable="false"><?php echo e(__('action')); ?></th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit').' '.__('holiday')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-event" class="edit-event" action="<?php echo e(route('holiday.update',1)); ?>" novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-12">
                                <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('date', null, ['required', 'placeholder' => __('date'), 'class' => 'datepicker-popup form-control', 'id' => 'date']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-12">
                                <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('title', null, ['required', 'placeholder' => __('title'), 'class' => 'form-control', 'id' => 'title']); ?>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-12">
                                <label><?php echo e(__('description')); ?></label>
                                <?php echo Form::textarea('description', null, ['placeholder' => __('description'), 'class' => 'form-control', 'id' => 'description']); ?>

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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        window.actionEvents = {
            'click .editdata': function(e, value, row, index) {
                $('#id').val(row.id);
                $('#date').val(row.date);
                $('#title').val(row.title);
                $('#description').val(row.description);
            }
        };
    </script>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/holiday/index.blade.php ENDPATH**/ ?>