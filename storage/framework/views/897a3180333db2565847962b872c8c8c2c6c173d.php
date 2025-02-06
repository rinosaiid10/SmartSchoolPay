<?php $__env->startSection('title'); ?> <?php echo e(__('role_management')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
             <?php echo e(__('role_management')); ?>

        </h3>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin  stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('manage') . ' ' . __('roles')); ?>

                    </h4>
                        <?php echo Form::open(['route' => 'roles.store', 'method' => 'POST','class' => 'pt-3']); ?>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__('name')); ?></label>
                                    <?php echo Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label><?php echo e(__('permission')); ?></label>
                                <div class="row">
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group col-lg-3 col-sm-12 col-xs-12 col-md-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <?php echo e(Form::checkbox('permission[]', $value->id, false, ['class' => 'name form-check-input'])); ?>

                                                    <?php echo e($value->name); ?>

                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-theme"><?php echo e(__('submit')); ?></button>
                            </div>
                        <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin  stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list') . ' ' . __('roles')); ?>

                    </h4>
                    <table aria-describedby="mydesc" class='table' id='table_list'
                    data-toggle="table" data-url="<?php echo e(route('roles.show',1)); ?>" data-click-to-select="true" data-search="true"
                    data-side-pagination="server" data-pagination="true"
                    data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false"
                    data-toolbar="#toolbar" data-show-columns="true"
                    data-show-refresh="true" data-fixed-columns="true"
                    data-trim-on-search="false" data-mobile-responsive="true"
                    data-sort-name="id" data-sort-order="desc"
                    data-maintain-selected="true" data-export-types='["txt","excel"]'
                    data-export-options='{ "fileName": "role-list-<?= date('d-m-y') ?>" ,"ignoreColumn": ["operate"]}' data-escape="true">
                    <thead>
                        <tr>
                            <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                            <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                            <th scope="col" data-field="name" data-sortable="false"><?php echo e(__('name')); ?></th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                <th scope="col" data-escape="false" data-field="operate" data-sortable="false"><?php echo e(__('action')); ?></th>
                            <?php endif; ?>

                        </tr>
                    </thead>
                </table>
                    <?php echo $roles->render(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/roles/index.blade.php ENDPATH**/ ?>