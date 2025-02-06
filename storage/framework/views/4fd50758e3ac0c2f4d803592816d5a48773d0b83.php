<?php $__env->startSection('title'); ?>
    <?php echo e(__('events')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage') . ' ' . __('events')); ?>

        </h3>
    </div>
    <div class="row">
        <?php if(Auth::user()->can('event-create')): ?>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('create') . ' ' . __('events')); ?>

                    </h4>
                    <form class="event-form pt-3" id="event-form" action="<?php echo e(route('events.store')); ?>" method="POST" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('title', null, ['required', 'placeholder' => __('title'), 'class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('description')); ?></label>
                                <?php echo Form::textarea('description', null, ['rows' => '3', 'placeholder' => __('description'), 'class' => 'form-control']); ?>

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
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="event_type" value="single" required id="single" class="form-check-input event_type">
                                            <?php echo e(__('single')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="event_type" value="multiple" required id="multiple" class="form-check-input event_type">
                                            <?php echo e(__('multiple')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" id="single-div"  style="display:none;">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('date', null, ['required', 'placeholder' => __('date'), 'class' => 'datepicker-popup form-control']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('timing')); ?></label>
                                <?php echo Form::text('time', null, ['placeholder' => __('start_time') .' - ' . __('end_time'), 'class' => 'timerange form-control']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                        </div>
                        
                        <div class="row date-range-div" id="date-range-div" style="display:none;">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('date').' '.__('range')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('date_range', null, ['required', 'id' => 'date_range', 'placeholder' => __('date'), 'class' => 'daterange form-control']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                        </div>
                        
                        <div class="row add-multiple-event-div" id="add-multiple-event-div" style="display:none;">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('events[0][title]', null, ['required','placeholder' => __('title'), 'class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('events[0][date]', null, ['required','placeholder' => __('date'), 'class' => 'datepicker-popup form-control']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('timing')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('events[0][timerange]', null, ['required','placeholder' => __('start_time') .' - ' . __('end_time'), 'class' => 'timerange form-control']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                            <div class="form-group col-sm-12 col-md-5">
                                <label><?php echo e(__('description')); ?></label>
                                <?php echo Form::textarea('events[0][description]', null, ['rows' => '3', 'placeholder' => __('description'), 'class' => 'form-control']); ?>

                            </div>
                            <div class="col-md-1 text-center pt-4">
                                <button type="button" class="btn btn-icon btn-danger remove-multiple-event-div" disabled>
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row" id="add-more" style="display:none">
                            <div class="form-group col-sm-12 col-md-12">
                                <button type="button" class="btn btn-success add-multi-div" id="add-multi-div">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo e(__('add_more')); ?></button>
                            </div>
                        </div>

                        <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-list')): ?>
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list') . ' ' . __('events')); ?>

                    </h4>
                    <table aria-describedby="mydesc" id='table_list' class="table event-table"
                        data-toggle="table" data-url="<?php echo e(url('events/show')); ?>" data-click-to-select="true"
                        data-side-pagination="server" data-pagination="true"
                        data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false"
                        data-toolbar="#toolbar" data-show-columns="true"
                        data-show-refresh="true" data-fixed-columns="true"
                        data-trim-on-search="false" data-mobile-responsive="true"
                        data-sort-name="id" data-sort-order="desc"
                        data-maintain-selected="true" data-export-types='["txt","excel"]'
                        data-export-options='{ "fileName": "event-list-<?= date('d-m-y') ?>" ,"ignoreColumn": ["operate"]}' data-escape="true">
                        <thead>
                            <tr>
                                <th  data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th data-field="title" data-sortable="false"><?php echo e(__('title')); ?></th>
                                <th data-field="type" data-sortable="false"><?php echo e(__('type')); ?></th>
                                <th data-field="date" data-sortable="false"><?php echo e(__('date')); ?></th>
                                <th data-field="time" data-sortable="false"><?php echo e(__('timing')); ?></th>
                                <th data-field="description" data-sortable="false"><?php echo e(__('description')); ?></th>
                                <th data-field="image" data-formatter="imageFormatter" data-sortable="false"><?php echo e(__('image')); ?></th>
                                <th data-events="actionEvents" data-escape="false" data-field="operate"data-sortable="false"><?php echo e(__('action')); ?></th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit').' '.__('events')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="edit-event" class="edit-event" action="<?php echo e(url('events/update')); ?>" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('title', null, ['required', 'placeholder' => __('title'), 'class' => 'form-control', 'id' => 'title']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('description')); ?></label>
                                    <?php echo Form::textarea('description', null, ['rows' => '3', 'placeholder' => __('description'), 'class' => 'form-control', 'id' => 'description']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('image')); ?></label>
                                    <input type="file" name="image" class="file-upload-default" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px; margin-top: 10px">
                                        <img src="" id="edit-event-image" class="img-fluid w-100" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="edit_event_type" value="single" required id="edit_single" class="form-check-input edit_event_type">
                                                <?php echo e(__('single')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="edit_event_type" value="multiple" required id="edit_multiple" class="form-check-input edit_event_type">
                                                <?php echo e(__('multiple')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="edit-single-div"  style="display:none;">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('edit_date', null, ['required', 'placeholder' => __('date'), 'class' => 'datepicker-popup form-control','id' => 'date']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('timing')); ?></label>
                                    <?php echo Form::text('edit_time', null, [ 'placeholder' => __('start_time') .' - ' . __('end_time'), 'class' => 'timerange form-control','id' => 'time']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                            </div>
                            <div class="row edit-date-range-div" id="edit-date-range-div" style="display:none;">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('date').' '.__('range')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('date_range', null, ['required', 'placeholder' => __('date'), 'class' => 'daterange form-control' , 'id' => 'daterange']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
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

        window.actionEvents = {

            'click .edit-data': function (e, value, row, index) {
                $('#edit_id').val('');
                $('#title').val('');
                $('#description').val('');
                $('#edit-event-image').attr('src', '');
                $('#daterange').val('');
                $('#edit-extra-multiple-event').empty();

                $('#edit_id').val(row.id);
                $('#title').val(row.title);
                $('#description').val(row.description);
                $('#edit-event-image').attr('src', row.image);


                $('input[name="edit_event_type"][value="' + row.type + '"].edit_event_type').prop('checked', true);


                if (row.type == 'multiple') {

                    $('#edit-single-div').hide();
                    $('.edit-add-more').show();
                    $('#edit-date-range-div').show();

                    var DateRange = convertDateRange(row.date);

                    $('#daterange').val(DateRange);

                }
                else{
                    $('#edit-multi-div').hide();
                    $('#edit-date-range-div').hide();
                    $('#edit-multiple-event-group-div').hide();
                    $('.edit-add-more').hide();
                    $('#edit-single-div').show();

                    if(row.time)
                    {
                        var timerange = convertTimeRange(row.time);
                        $('#time').val(timerange);
                        initializeTimerangePicker();
                    }
                    $('#date').val(row.date);

                }
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/events/index.blade.php ENDPATH**/ ?>