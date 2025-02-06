<?php $__env->startSection('title'); ?>
    <?php echo e(__('students')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('student') . ' ' . __('Result')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('generate') . ' ' . __('student') . ' ' . __('result')); ?>

                        </h4>
                            
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('class')); ?><span class="text-danger">*</span></label><br>
                                    <select required name="class_id" id="class_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('select_class')); ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-class-section-id="<?php echo e($data->id); ?>"  value="<?php echo e($data->class->id); ?>"> <?php echo e($data->class->name); ?>  -  <?php echo e($data->section->name); ?> <?php echo e($data->class->medium->name); ?> <?php echo e($data->class->streams->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <button type="button" id="search" class="btn btn-theme">Search</button>
                                </div>
                            </div>
                            <div class="show_student_list">
                                <table aria-describedby="mydesc" class='table student_table' id='table_list' data-toggle="table" data-url="<?php echo e(route('get.student.list')); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="false" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "exam-result-list-<?= date(' d-m-y') ?>" ,"ignoreColumn": ["operate"]}'
                                    data-query-params="uploadMarksqueryParams" data-toolbar="#toolbar" data-escape="true">
                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                            <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                            <th scope="col" data-field="student_name" data-sortable="true" ><?php echo e(__('name')); ?></th>
                                            <th scope="col" data-field="admission_no" data-sortable="false"><?php echo e(__('gr_number')); ?></th>
                                            <th scope="col" data-field="roll_number" data-sortable="false"><?php echo e(__('roll_no')); ?></th>
                                            <th scope="col" data-field="class_section_id" data-sortable="false"data-visible="false"><?php echo e(__('class') . ' ' . __('section') . ' ' . __('id')); ?></th>
                                            <th scope="col" data-field="class_section_name" data-sortable="false"><?php echo e(__('class') . ' ' . __('section')); ?></th>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['generate-result'])): ?>
                                            <th data-escape="false" data-events="studentEvents" data-width="150" scope="col" data-field="operate"
                                                data-sortable="false"><?php echo e(__('action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                </table>
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
    $('#search').on('click , input', function () {
        $('.show_student_list').show();
        $('.student_table').bootstrapTable('refresh');
    });
    $('#table_list').on('load-success.bs.table', function (e, response ) {
        if(response.error == true){
            showErrorToast(response.message);
            $('.show_student_list').hide();
        }
    })

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/students/generate_result.blade.php ENDPATH**/ ?>