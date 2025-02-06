<?php $__env->startSection('title'); ?>
    <?php echo e(__('medium')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage_medium')); ?>

        </h3>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('create_medium')); ?>

                    </h4>
                    <form id="create-form" class="pt-3 medium-create-form" action="<?php echo e(url('medium')); ?>" method="POST" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-6 col-md-12">
                                <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, ['required', 'placeholder' => __('name'), 'class' => 'form-control']); ?>

                            </div>
                        </div>
                        <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list_medium')); ?>

                    </h4>
                    <div class="row">
                        <div class="col-12">
                            <table aria-describedby="mydesc" class='table' id='table_list'
                            data-toggle="table" data-url="<?php echo e(url('medium_list')); ?>" data-click-to-select="true"
                            data-side-pagination="server" data-pagination="true"
                            data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true" data-toolbar="#toolbar"
                            data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                            data-trim-on-search="false"
                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                            data-maintain-selected="true" data-export-types='["txt","excel"]'
                            data-export-options='{ "fileName": "medium-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}'
                            data-query-params="queryParams" data-escape="true">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="name" data-sortable="false"><?php echo e(__('name')); ?></th>
                                    <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                    <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                    <th data-events="actionEvents" data-escape="false" scope="col" data-field="operate" data-sortable="false"><?php echo e(__('action')); ?></th>
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


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit_medium')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form id="edit-form" class="pt-3 medium-edit-form" action="<?php echo e(url('medium')); ?>">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                        <?php echo Form::text('name',null,array('required','class'=>'form-control','id'=>'name','placeholder'=>__('name'))); ?>

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
        'click .edit-data': function(e, value, row, index) {
            $('#id').val(row.id);
            $('#name').val(row.name);
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/medium/index.blade.php ENDPATH**/ ?>