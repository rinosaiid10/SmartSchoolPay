<?php $__env->startSection('title'); ?>
    <?php echo e(__('custom_fields')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage').' '.__('form_fields')); ?>

            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title">
                                    <?php echo e(__('create').' '.__('form_fields')); ?>

                                </h4>
                            </div>
                        </div>
                        <form class="pt-3 create-form-field" id="create-form-fields"  method="POST" novalidate="novalidate" action="<?php echo e(route('form-fields.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('name', null, ['required', 'placeholder' => __('name'), 'class' => 'form-control','onkeypress' => 'return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('for')); ?> <span class="text-danger">*</span></label>
                                    <select name="for" id="for" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="1"><?php echo e(__('student')); ?></option>
                                        <option value="2"><?php echo e(__('parents')); ?></option>
                                        <option value="3"><?php echo e(__('teacher')); ?></option>
                                        <option value="4"><?php echo e(__('self_student_registration')); ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('Type')); ?> <span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control type">
                                        <option value="">Please Select</option>
                                        <option value="text"><?php echo e(__('Text')); ?></option>
                                        <option value="number"><?php echo e(__('Numeric Values')); ?></option>
                                        <option value="dropdown"><?php echo e(__('Dropdown')); ?></option>
                                        <option value="radio"><?php echo e(__('Radio Button')); ?></option>
                                        <option value="checkbox"><?php echo e(__('Checkbox')); ?></option>
                                        <option value="textarea"><?php echo e(__('Textarea')); ?></option>
                                        <option value="file"><?php echo e(__('File Upload')); ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-2 mt-6">
                                    <div class="col-12">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="is_required" value="1" class="form-check-input" id=""><?php echo e(__('required')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="default-values-div" style="display: none;">
                                <div class="form-group col-sm-12 col-md-3">
                                    <button type="button" class="add-more-default-values btn btn-success"><?php echo e(__('Add Default Values')); ?> <span class="fa fa-plus"></span></button>
                                </div>
                                <div id="add-default-values">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-4">
                                                <label><?php echo e(__('Default Values')); ?> <span class="text-danger">*</span></label>
                                                <input type="text" name="default_values[]" class="form-control default_values" placeholder="<?php echo e(__('Default Values')); ?>" disabled/>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-2 mt-4">
                                            <button type="button" class="remove-default-values btn btn-inverse-danger btn-icon ml-3" disabled><span class="fa fa-times"></span></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label><?php echo e(__('Default Values')); ?> <span class="text-danger">*</span></label>
                                            <input type="text" name="default_values[]" class="form-control default_values" placeholder="Default Values" disabled/>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-2 mt-4">
                                            <button type="button" class="remove-default-values btn btn-inverse-danger btn-icon ml-3" disabled><span class="fa fa-times"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('form_fields')); ?>

                        </h4>
                        <div class="row" id="toolbar">
                            <div class="form-group col-sm-12 col-md-3">
                                <button type="button" class="btn btn-info" id="preview-fields" data-toggle="modal" data-target="#previewStudentField"><i class="fa fa-graduation-cap menu-icon" title="<?php echo e(__('student')); ?>"></i></button>
                            </div>

                            <div class="form-group col-sm-12 col-md-3">
                                <button type="button" class="btn btn-warning" id="preview-fields" data-toggle="modal" data-target="#previewParentField"><i class="fa fa-users menu-icon" title="<?php echo e(__('parents')); ?>"></i></button>
                            </div>

                            <div class="form-group col-sm-12 col-md-3">
                                <button type="button" class="btn btn-success" id="preview-fields" data-toggle="modal" data-target="#previewTeacherField"><i class="fa fa-briefcase menu-icon" title="<?php echo e(__('teachers')); ?>"></i></button>
                            </div>

                            <div class="form-group col-sm-12 col-md-3">
                                <button type="button" class="btn btn-primary" id="preview-fields" data-toggle="modal" data-target="#previewOnlineRegistrationField"><i class="fa fa-user-plus" title="<?php echo e(__('self_student_registration')); ?>"></i></button>
                            </div>
                        </div>

                        <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table" data-url="<?php echo e(route('form-fields.show', 1)); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-trim-on-search="false" data-mobile-responsive="true" data-use-row-attr-func="true" data-reorderable-rows="true" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "<?php echo e(__('form-fields')); ?>-<?= date(' d-m-y') ?>" ,"ignoreColumn":["operate"]}' data-show-export="true" data-query-params="formFieldQueryParams" data-escape="true">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="for" data-sortable="true" data-formatter="forFormFormatter"><?php echo e(__('for')); ?></th>
                                    <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                    <th scope="col" data-field="type" data-sortable="true"><?php echo e(__('type')); ?></th>
                                    <th scope="col" data-field="is_required" data-sortable="true" data-formatter="formFieldRequiredFormatter"><?php echo e(__('is').' '.__('required')); ?></th>
                                    <th scope="col" data-field="default_values" data-sortable="true" data-formatter="formFieldDefaultValuesFormatter"><?php echo e(__('default').' '.__('values')); ?></th>
                                    <th scope="col" data-field="rank" data-sortable="true"><?php echo e(__('rank')); ?></th>
                                    <th scope="col" data-escape="false" data-field="operate" data-sortable="false" data-events="formFieldsEvents"><?php echo e(__('action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                        <span class="d-block mb-4 mt-2 text-danger small"><?php echo e(__('draggable_rows_notes')); ?></span>
                        <div class="mt-1">
                            <button id="change-order-form-field" class="btn btn-theme">Update Rank</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <?php echo e(__('edit') . ' ' . __('form_fields')); ?>

                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form class="pt-3 edit-form-field" id="edit-form-fields" action="<?php echo e(url('form-fields',1)); ?>" novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="edit_id" id="edit-id" value=""/>

                    <div class="modal-body">
                        <div class="form-group col-sm-12">
                            <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                            <input type="text" name="edit_name" id="edit-name" placeholder="<?php echo e(__('name')); ?>" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label><?php echo e(__('type')); ?> <span class="text-danger">*</span></label>
                            <select id="edit-type" name="edit_type" class="form-control edit_type">
                                <option value="">Please Select</option>
                                <option value="text" selected>Text</option>
                                <option value="number">Numeric</option>
                                <option value="dropdown">Dropdown</option>
                                <option value="radio">Radio Button</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="textarea">TextArea</option>
                                <option value="file">File Upload</option>
                            </select>

                            <?php echo Form::hidden('edit_type', "", ['id' => 'edit-type-value']); ?>

                        </div>
                        <div class="form-group col-sm-12">
                            <label><?php echo e(__('for')); ?> <span class="text-danger">*</span></label>
                            <select id="edit-for" name="edit_for" class="form-control edit_for">
                                <option value="">Please Select</option>
                                <option value="1"><?php echo e(__('student')); ?></option>
                                <option value="2"><?php echo e(__('parents')); ?></option>
                                <option value="3"><?php echo e(__('teacher')); ?></option>
                                 <option value="4"><?php echo e(__('self_student_registration')); ?></option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label><?php echo e(__('required')); ?> </label>
                            <div class="col-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="edit_required" id="edit-required" class="form-check-input" value="1"><?php echo e(__('required')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        
                        <div id="edit-default-values-div" style="display: none;">
                            <div class="form-group col-sm-12 col-md-12">
                                <button type="button" class="edit-add-more-default-values btn btn-success"><?php echo e(__('Add Default Values')); ?> <span class="fa fa-plus"></span></button>
                            </div>
                            <div class="col-12" id="edit-add-default-values">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label><?php echo e(__('Default Values')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="default_values[]" class="form-control edit_default_values" placeholder="Default Values" disabled readonly/>
                                    </div>
                                    <div class="form-group col-md-2 mt-4">
                                        <button type="button" class="btn btn-icon btn-inverse-danger edit-remove-default-values" disabled><span class="fa fa-times"></span></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label><?php echo e(__('Default Values')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="default_values[]" class="form-control edit_default_values" placeholder="Default Values" disabled/>
                                    </div>
                                    <div class="form-group col-md-2 mt-4">
                                        <button type="button" class="btn btn-icon btn-inverse-danger edit-remove-default-values" disabled><span class="fa fa-times"></span></button>
                                    </div>
                                </div>
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

    <!-- Preview Student Fields -->
    <div class="modal fade" id="previewStudentField" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('student_custom_field_list')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="previewFormBody">
                        <?php $__currentLoopData = $studentFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->type==="text" || $row->type==="number"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <input type="<?php echo e($row->type); ?>" name="<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="dropdown"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <select name="<?php echo e($row->name); ?>" class="form-control">
                                        <option value="">Please Select</option>
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <option value="<?php echo e($options); ?>"><?php echo e(ucfirst($options)); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="radio"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="d-flex">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="checkbox"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="col-md-10">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="textarea"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <textarea name="<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control"></textarea>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="file"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                        <input type="file" name="image" class="file-upload-default"/>
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" required/>
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                            </span>
                                        </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="previewParentField" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('parent_custom_field_list')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="previewFormBody">
                        <?php $__currentLoopData = $parentFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->type==="text" || $row->type==="number"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <input type="<?php echo e($row->type); ?>" name="<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="dropdown"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <select name="<?php echo e($row->name); ?>" class="form-control">
                                        <option value="">Please Select</option>
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <option value="<?php echo e($options); ?>"><?php echo e(ucfirst($options)); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="radio"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="d-flex">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="checkbox"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="col-md-10">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="textarea"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <textarea name="<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control"></textarea>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="file"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                        <input type="file" name="image" class="file-upload-default"/>
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" required/>
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                            </span>
                                        </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="previewTeacherField" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('teacher_custom_field_list')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="previewFormBody">
                        <?php $__currentLoopData = $teacherFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->type==="text" || $row->type==="number"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <input type="<?php echo e($row->type); ?>" name="<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="dropdown"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <select name="<?php echo e($row->name); ?>" class="form-control">
                                        <option value="">Please Select</option>
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <option value="<?php echo e($options); ?>"><?php echo e(ucfirst($options)); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="radio"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="d-flex">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="checkbox"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="col-md-10">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="textarea"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <textarea name="<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control"></textarea>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="file"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                        <input type="file" name="image" class="file-upload-default"/>
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" required/>
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                            </span>
                                        </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                </div>
            </div>
        </div>
    </div>

      
      <div class="modal fade" id="previewOnlineRegistrationField" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('self_registration_custom_field_list')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="previewFormBody">
                        <?php $__currentLoopData = $onlineRegistrationForm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->type==="text" || $row->type==="number"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <input type="<?php echo e($row->type); ?>" name="<?php echo e($row->name); ?>" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control" <?php echo e(($row->is_required===1)?"required":''); ?>>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="dropdown"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <select name="<?php echo e($row->name); ?>" class="form-control">
                                        <option value="">Please Select</option>
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <option value="<?php echo e($options); ?>"><?php echo e(ucfirst($options)); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="radio"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="d-flex">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="checkbox"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <br>
                                    <div class="col-md-10">
                                        <?php $__currentLoopData = json_decode($row->default_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($options != null): ?>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="<?php echo e($row->name); ?>" value="<?php echo e($options); ?>">
                                                        <?php echo e(ucfirst($options)); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="textarea"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label></label>
                                    <textarea name="<?php echo e($row->name); ?>" cols="10" rows="3" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" class="form-control"></textarea>
                                </div>
                            <?php endif; ?>

                            <?php if($row->type==="file"): ?>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?> <?php echo ($row->is_required) ? ' <span class="text-danger">*</span></label>': ''; ?></label>
                                        <input type="file" name="image" class="file-upload-default"/>
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $row->name))); ?>" required/>
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                            </span>
                                        </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function formSuccessFunction() {
            $('#type').val('text').trigger('change');
            $('[data-repeater-item]').slice(2).remove();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/form_fields/index.blade.php ENDPATH**/ ?>