<?php $__env->startSection('title'); ?>
    <?php echo e(__('parents')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('parents')); ?>

            </h3>
        </div>

        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('parents')); ?>

                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                    data-url="<?php echo e(url('parents_list')); ?>" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true" data-toolbar="#toolbar"
                                    data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-search="true"
                                    data-trim-on-search="false"
                                    data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                    data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "parents-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                                    ["operate"]}'
                                    data-query-params="queryParams" data-escape="true">
                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                <?php echo e(__('id')); ?></th>
                                            <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                            <th scope="col" data-field="user_id" data-sortable="false"
                                                data-visible="false"><?php echo e(__('user_id')); ?></th>
                                            <th scope="col" data-field="first_name" data-sortable="false">
                                                <?php echo e(__('first_name')); ?></th>
                                            <th scope="col" data-field="last_name" data-sortable="false">
                                                <?php echo e(__('last_name')); ?></th>
                                            <th scope="col" data-field="gender" data-sortable="false">
                                                <?php echo e(__('gender')); ?>

                                            </th>
                                            <th scope="col" data-field="email" data-sortable="false"><?php echo e(__('email')); ?>

                                            </th>
                                            <th scope="col" data-field="dob" data-sortable="false"><?php echo e(__('dob')); ?>

                                            </th>
                                            <th scope="col" data-field="image" data-sortable="false"
                                                data-formatter="imageFormatter"><?php echo e(__('image')); ?></th>
                                            <th scope="col" data-field="occupation" data-sortable="false">
                                                <?php echo e(__('occupation')); ?></th>
                                            <th data-escape="false" data-events="parentEvents" scope="col" data-field="operate"
                                                data-sortable="false"><?php echo e(__('action')); ?></th>
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


    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit') . ' ' . __('parents')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="edit-form" class="edit-parent-form" action="<?php echo e(url('parents')); ?>" novalidate="novalidate"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('first_name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('first_name', null, ['required', 'placeholder' => __('first_name'), 'class' => 'form-control', 'id' => 'first_name']); ?>


                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('last_name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('last_name', null, ['required', 'placeholder' => __('last_name'), 'class' => 'form-control', 'id' => 'last_name']); ?>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <?php echo Form::radio('gender', 'Male', null, ['class' => 'form-check-input edit', 'id' => 'gender']); ?>

                                            <?php echo e(__('male')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <?php echo Form::radio('gender', 'Female', null, ['class' => 'form-check-input edit', 'id' => 'gender']); ?>

                                            <?php echo e(__('female')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('dob')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('dob', null, ['required', 'placeholder' => __('dob'), 'class' => 'datepicker-popup form-control', 'id' => 'dob']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('email')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('email', null, ['required', 'placeholder' => __('email'), 'class' => 'form-control', 'id' => 'email']); ?>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('mobile')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('mobile', null, ['required', 'placeholder' => __('mobile'), 'class' => 'form-control', 'id' => 'mobile']); ?>


                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('occupation')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('occupation', null, ['required', 'placeholder' => __('occupation'), 'class' => 'form-control', 'id' => 'occupation']); ?>


                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('image')); ?></label><br>
                                <input type="file" name="image" class="file-upload-default" accept="image/*"/>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="<?php echo e(__('image')); ?>" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme"
                                            type="button"><?php echo e(__('upload')); ?></button>
                                    </span>
                                </div>
                                <div style="width: 100px;">
                                    <img src="" id="edit-image-tag" class="img-fluid w-100 mt-3" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $parentFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->type==="text" || $row->type==="number"): ?>
                                        <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                        <input type="<?php echo e($row->type); ?>" name="<?php echo e($row->name); ?>" id="<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control edit_text_number" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                    </div>
                                <?php endif; ?>
                                <?php if($row->type==="dropdown"): ?>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                        <select name="<?php echo e($row->name); ?>" class="form-control edit_dropdown" id="<?php echo e($row->name); ?>" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                            <option value="">Please Select</option>
                                            <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($options != null): ?>
                                                    <option value="<?php echo e($options); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $options))); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <?php if($row->type==="radio"): ?>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                        <br>
                                        <div class="d-flex">
                                            <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($options != null): ?>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="edit_radio" id="<?php echo e($options); ?>" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                                            <?php echo e(ucfirst($options)); ?>

                                                        </label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($row->type==="checkbox"): ?>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                        <br>
                                        <div class="col-md-10" id="<?php echo e($row->name); ?>">
                                            <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($options != null): ?>
                                                    <div class="checkbox form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox"  class="edit_checkbox" id="checkbox_<?php echo e($options); ?>" name="<?php echo e('checkbox[' . $row->name . '][' . $options . ']'); ?>" value="<?php echo e($options); ?>"> <?php echo e(ucfirst(str_replace('_', ' ', $options))); ?>

                                                        </label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>
                                <?php endif; ?>
                                <?php if($row->type==="textarea"): ?>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                        <textarea name="<?php echo e($row->name); ?>" id="<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control edit_textarea" <?php echo e(($row->is_required===1)?"required":''); ?>></textarea>
                                    </div>
                                <?php endif; ?>
                                <?php if($row->type==="file"): ?>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                            <input type="file" name="<?php echo e($row->name); ?>" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>"/>
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                                </span>
                                            </div>
                                            <input type="hidden" id="<?php echo e($row->name); ?>-hidden" name="<?php echo e($row->name); ?>"/>
                                            <div id="<?php echo e($row->name); ?>-div" style="display: none" class="edit_file mt-3">
                                                <a href="" id="<?php echo e($row->name); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($row->name); ?></a>
                                            </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6" id="current_address_div">
                                <label><?php echo e(__('current_address')); ?></label>
                                <?php echo Form::textarea('current_address', null, ['placeholder' => __('current_address'), 'class' => 'form-control', 'rows' => 3, 'id' => 'current_address']); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-6" id="permanent_address_div">
                                <label><?php echo e(__('permanent_address')); ?></label>
                                <?php echo Form::textarea('permanent_address', null, ['placeholder' => __('permanent_address'), 'class' => 'form-control', 'rows' => 3, 'id' => 'permanent_address']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(__('cancel')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/parents/index.blade.php ENDPATH**/ ?>