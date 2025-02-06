<?php $__env->startSection('title'); ?>
    <?php echo e(__('language_settings')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('language_settings')); ?>

            </h3>
        </div>
        <div class="row grid-margin">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="formdata" class="create-form" action="<?php echo e(url('language')); ?>" novalidate="novalidate"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('language_name')); ?> <span class="text-danger">*</span></label>
                                    <input name="name" type="text" required placeholder="<?php echo e(__('language_name')); ?>"
                                        class="form-control" />
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('language_code')); ?> <span class="text-danger">*</span></label>
                                    <input name="code" type="text" required placeholder="<?php echo e(__('language_code')); ?>"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label><?php echo e(__('upload_file')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="file" class="file-upload-default" accept="application/json" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" accept="application/json"
                                        disabled="" placeholder="<?php echo e(__('upload_file')); ?>" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <br>
                                    <a class="btn btn-success"
                                        href="<?php echo e(url('language-sample')); ?>"><?php echo e(__('download_sample')); ?></a>

                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <input class="form-check-input mt-0 mx-1" type="checkbox" value="1" name="rtl"
                                        aria-label="Checkbox for following text input">
                                    <label class="mx-4"><?php echo e(__('Is RTL')); ?></label>
                                </div>
                            </div>

                            <input class="btn btn-theme" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('language')); ?>

                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                    data-url="<?php echo e(url('language-list')); ?>" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "language-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}'
                                    data-query-params="queryParams" data-escape="true">
                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                <?php echo e(__('id')); ?></th>
                                            <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                            <th scope="col" data-field="name" data-sortable="false"><?php echo e(__('name')); ?>

                                            </th>
                                            <th scope="col" data-field="code" data-sortable="true">
                                                <?php echo e(__('code')); ?></th>
                                            <th scope="col" data-field="rtl" data-sortable="true"
                                                data-formatter="languageRtlStatusFormatter">
                                                <?php echo e(__('Is RTL')); ?></th>
                                            <th scope="col" data-field="status" data-sortable="true"
                                                data-visible="false">
                                                <?php echo e(__('status')); ?></th>
                                            <th data-escape="false" data-events="actionEvents" scope="col" data-field="operate"
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('edit') . ' ' . __('language')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="formdata" class="editform" action="<?php echo e(url('language')); ?>" novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('language_name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, ['required', 'placeholder' => __('language_name'), 'class' => 'form-control', 'id' => 'name']); ?>


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('language_code')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('code', null, ['required', 'placeholder' => __('language_code'), 'class' => 'form-control', 'id' => 'code']); ?>


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('upload_file')); ?></label><br>
                                <input type="file" name="file" class="file-upload-default" />
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="<?php echo e(__('upload_file')); ?>" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme"
                                            type="button"><?php echo e(__('upload')); ?></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12 mx-1.5">
                                <?php echo Form::checkbox('rtl', null, ['required', 'class' => 'form-control', 'id' => 'rtl']); ?>

                                <label><?php echo e(__('Is RTL')); ?></label>

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

<?php $__env->startSection('script'); ?>
    <script>
        window.actionEvents = {
            'click .editdata': function(e, value, row, index) {
                $('#id').val(row.id);
                $('#name').val(row.name);
                $('#code').val(row.code);
                if (row.rtl) {
                    $('input:checkbox[name=rtl]').attr('checked', true); // set CheckBox True
                } else {
                    $('input:checkbox[name=rtl]').attr('checked', false); // set CheckBox False
                }
                $('#rtl').val(row.rtl);
            }
        };


        // RTL Status Data-Formatter Function
        function languageRtlStatusFormatter(value, row) {
            let html = "";
            if (row.rtl) {
                html = "<span class='badge badge-success'>YES</span>";
            } else {
                html = "<span class='badge badge-danger'>NO</span>";
            }
            return html;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/settings/language_setting.blade.php ENDPATH**/ ?>