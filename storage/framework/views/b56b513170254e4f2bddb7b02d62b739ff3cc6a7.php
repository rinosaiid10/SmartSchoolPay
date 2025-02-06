<?php $__env->startSection('title'); ?>
    <?php echo e(__('staff').' '. __('management')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage') . ' ' . __('staff')); ?>

        </h3>
    </div>
    <div class="row">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staff-create')): ?>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('staff')); ?>

                        </h4>
                        <form class="pt-3 staff-form" id="staff-form" enctype="multipart/form-data" action="<?php echo e(route('staff.store')); ?>" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label> <?php echo e(__('role')); ?> <span class="text-danger">*</span></label>
                                    <select name="role_id" class="form-control">
                                        <option value=""><?php echo e(__('select') . ' ' . __('role')); ?></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('first_name', null, ['placeholder' => __('first_name'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('last_name', null, ['placeholder' => __('last_name'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('email')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('email', null, ['required', 'placeholder' => __('email'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mobile')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::number('mobile', null, ['required','placeholder' => __('mobile'), 'class' => 'form-control mobile' , 'min' => 10]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'male'); ?>

                                                <?php echo e(__('male')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'female'); ?>

                                                <?php echo e(__('female')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('dob', null, ['placeholder' => __('dob'), 'class' => 'datepicker-popup-no-future form-control']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>" required="required"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label><?php echo e(__('address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('address', null, ['placeholder' => __('address'), 'class' => 'form-control','rows'=>2]); ?>

                                </div>
                            </div>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staff-list')): ?>
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('staff')); ?>

                        </h4>
                        <table aria-describedby="mydesc" class='table' id='table_list'
                            data-toggle="table" data-url="<?php echo e(route('staff.show',1)); ?>" data-click-to-select="true"
                            data-search="true"
                            data-side-pagination="server" data-pagination="true"
                            data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false"
                            data-toolbar="#toolbar" data-show-columns="true"
                            data-show-refresh="true" data-fixed-columns="true"
                            data-trim-on-search="false" data-mobile-responsive="true"
                            data-sort-name="id" data-sort-order="desc"
                            data-maintain-selected="true" data-export-types='["txt","excel"]'
                            data-export-options='{ "fileName": "staff-list-<?= date('d-m-y') ?>" ,"ignoreColumn": ["operate"]}' data-escape="true">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="user_id" data-sortable="false" data-visible="false"><?php echo e(__('user_id')); ?></th>
                                    <th scope="col" data-field="role_id" data-sortable="false" data-visible="false"><?php echo e(__('role_id')); ?></th>
                                    <th scope="col" data-field="roles" data-sortable="false"><?php echo e(__('role')); ?></th>
                                    <th scope="col" data-field="first_name" data-sortable="false"><?php echo e(__('first_name')); ?></th>
                                    <th scope="col" data-field="last_name" data-sortable="false"><?php echo e(__('last_name')); ?></th>
                                    <th scope="col" data-field="email" data-sortable="false"><?php echo e(__('email')); ?></th>
                                    <th scope="col" data-field="mobile" data-sortable="false"><?php echo e(__('mobile')); ?></th>
                                    <th scope="col" data-field="dob" data-sortable="false"><?php echo e(__('dob')); ?></th>
                                    <th scope="col" data-field="gender" data-sortable="false"><?php echo e(__('gender')); ?></th>
                                    <th scope="col" data-field="address" data-sortable="false"><?php echo e(__('address')); ?></th>
                                    <th scope="col" data-field="image" data-sortable="false"data-formatter="imageFormatter"><?php echo e(__('image')); ?></th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staff-edit')): ?>
                                        <th scope="col" data-escape="false" data-field="operate" data-sortable="false" data-events="staffEvents"><?php echo e(__('action')); ?></th>
                                    <?php endif; ?>

                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        
        <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit') . ' ' . __('staff')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                    <form class="staff-edit-form"  id="staff-edit-form" action="<?php echo e(route('staff.update',1)); ?>" novalidate="novalidate" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label> <?php echo e(__('role')); ?> <span class="text-danger">*</span></label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value=""><?php echo e(__('select') . ' ' . __('role')); ?></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('first_name', null, ['required','placeholder' => __('first_name'), 'class' => 'form-control','id' => 'first_name']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('last_name', null, ['required','placeholder' => __('last_name'), 'class' => 'form-control','id' => 'last_name']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('email')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('email', null, ['required', 'placeholder' => __('email'), 'class' => 'form-control','id' => 'email']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('mobile')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::number('mobile', null, ['required','placeholder' => __('mobile'), 'class' => 'form-control mobile' , 'min' => 10,'id' => 'mobile']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'male', null, ['required','class' => 'form-check-input edit', 'id' => 'gender']); ?>

                                                <?php echo e(__('male')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'female', null, ['required','class' => 'form-check-input edit', 'id' => 'gender']); ?>

                                                <?php echo e(__('female')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('dob', null, ['required','placeholder' => __('dob'), 'class' => 'datepicker-popup-no-future form-control','id' => 'dob']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('address', null, ['required', 'placeholder' => __('address'), 'class' => 'form-control address', 'rows' => 3, 'id' => 'address']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('image')); ?></label>
                                    <input type="file" name="image" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>" required="required"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px; margin-top: 10px">
                                        <img src="" id="edit-staff-image" class="img-fluid w-100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                            <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(__('cancel')); ?></button>
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
        window.staffEvents = {
            'click .edit-data': function (e, value, row, index) {

                $('#user_id').val(row.user_id);
                $('#edit_id').val(row.id);
                $('#first_name').val(row.first_name);
                $('#last_name').val(row.last_name);
                $('#email').val(row.email);
                $('#mobile').val(row.mobile);
                $('#dob').val(row.dob);
                $('#role_id').val(row.role_id);
                $('#edit-staff-image').attr('src', row.image);

                $('#address').val(row.address);
                $('input[name=gender][value=' + row.gender + '].edit').prop('checked', true);

            }
        };

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/staff/index.blade.php ENDPATH**/ ?>