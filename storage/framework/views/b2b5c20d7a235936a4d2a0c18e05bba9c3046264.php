<?php $__env->startSection('title'); ?>
<?php echo e(__('class')); ?> <?php echo e(__('teacher')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="car\`qd-title">
                        <?php echo e(__('assign') . ' ' . __('class') . ' ' . __('teacher')); ?>

                    </h4>
                    <div class="row">
                        <div class="col-12">


                            <div id="toolbar">
                                <select name="filter_class_id" id="filter_class_id" class="form-control">
                                    <option value=""><?php echo e(__('all')); ?></option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($class->id); ?>>
                                        <?php echo e($class->name . ' ' . $class->medium->name. ' ' .($class->streams->name ?? ' ')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>



                            </div>
                            <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table" data-url="<?php echo e(url('class-teacher-list')); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-query-params="AssignTeacherQueryParams" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "data-list-<?= date(' d-m-y') ?>" }'
                                data-escape="true">
                                <thead>
                                    <tr>
                                        <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                            <?php echo e(__('id')); ?></th>
                                        <th scope="col" data-field="no" data-sortable="false">
                                            <?php echo e(__('no.')); ?></th>
                                        <th scope="col" data-field="class" data-sortable="false">
                                            <?php echo e(__('class')); ?></th>
                                        <th scope="col" data-field="stream_name" data-sortable="true">
                                            <?php echo e(__('stream')); ?></th>
                                        <th scope="col" data-field="section" data-sortable="false">
                                            <?php echo e(__('section')); ?></th>
                                            <th scope="col" data-field="teacher_id" data-sortable="false" data-visible="false">
                                                <?php echo e(__('Teacher ID')); ?></th>
                                        <th scope="col" data-field="teachers" data-sortable="false" data-formatter="classTeacherFormatter">
                                            <?php echo e(__('Class Teacher')); ?></th>
                                        <th data-events="actionEvents" data-escape="false" scope="col" data-field="operate" data-sortable="false"><?php echo e(__('action')); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php echo e(__('edit') . ' ' . __('class') . ' ' . __('teacher')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="edit-class-teacher-form" action="<?php echo e(route('class.teacher.store')); ?>" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row form-group">
                                <div class="form-group col-sm-12 col-md-12">
                                    
                                    <input type="hidden" name="class_section_id" id="class_section_id_value">

                                    <label><?php echo e(__('class')); ?> <?php echo e(__('section')); ?> <span class="text-danger">*</span></label>
                                    <select name="class_section_id_select" id="class_section_id" class="form-control" disabled>
                                        <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->id); ?>">
                                            <?php echo e($section->class->name . ' ' . $section->section->name); ?>     <?php echo e($section->class->streams->name ?? ' '); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('Add New Class Teacher')); ?> <span class="text-danger">*</span></label>
                                    <select name="teacher_id" id="teacher_id" class="form-control teacher">


                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="hello">
                                    <label><?php echo e(__('Remove Class Teacher')); ?></label>
                                    <div class="class_teachers">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?> />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    window.actionEvents = {
            'click .editdata': function(e, value, row, index) {
                $('#class_section_id').val(row.id);

                //hidden input to store id
                $('#class_section_id_value').val(row.id);

                $.ajax('/get-all-class-teacher/' + row.id,{
                        dataType: 'json',

                            success: function (data,status,xhr) {
                                let html = ''
                                html += '<option value=" ">Please Select</option>';
                                $.each(data, function (key, value) {

                                    html += '<option value="' + value.id + '">'+ value.user.first_name + ' ' + value.user.last_name + '</option>';

                                });
                                $('.teacher').html(html);
                            },
                            error: function (jqXhr, textStatus, errorMessage) {
                                $('.teacher').append('Error: ' + errorMessage);
                            }
                });

                if(row.teacher_id == null){
                    $(function() {
                        let html = '';
                        html += '<label class="form-check label">No Data Found</label>';
                        $('.class_teachers').html(html);
                    });

                }else
                {
                    $.ajax('/get-class-teacher/' + row.id,{
                        dataType: 'json',

                            success: function (data,status,xhr) {
                                let html = ''
                                let count = 1;
                                $.each(data, function (key, value) {
                                    html += '<div class="form-check form-check-inline"><label class="form-check-label">'+ count + ". " + value.user.first_name + ' ' + value.user.last_name + '';
                                    html += '<button type="button" class="btn btn-inverse-danger btn-icon ml-3 remove-class-teacher-btn" data-class-id="' + row.id + '" data-teacher-id="' + value.id + '"><i class="fa fa-close"></i></button>';
                                    html += '</label></div>';
                                    count ++;
                                });
                                $('.class_teachers').html(html);
                            },
                            error: function (jqXhr, textStatus, errorMessage) {
                                $('.class_teachers').append('Error: ' + errorMessage);
                            }
                        });

                         $(document).on('click', '.remove-class-teacher-btn', function() {
                            const classSectionId = $(this).data('class-id');
                            const teacherId = $(this).data('teacher-id');


                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Remove Class Teacher!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Confirm!',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        let url = baseUrl + '/remove-class-teacher/' + classSectionId + '/' + teacherId;
                                        function successCallback(response) {
                                            $.toast({
                                                text: response.message,
                                                icon: 'success',
                                                loader:false,
                                                position: 'top-right',
                                            });
                                            setTimeout(() => {
                                                window.location.reload();
                                            }, 1000);
                                        }
                                        function errorCallback(response) {
                                            showErrorToast(response.message);
                                        }
                                        ajaxRequest('POST', url, null, null, successCallback, errorCallback);
                                    }
                                });
                        });

                }
            }
        };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/class/teacher.blade.php ENDPATH**/ ?>