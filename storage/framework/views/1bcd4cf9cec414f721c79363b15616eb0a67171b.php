<?php $__env->startSection('title'); ?>
    <?php echo e(__('manage') . ' ' . __('assignment')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('assignment_submission')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('assignment_submission')); ?>

                        </h4>

                        <div id="toolbar">
                            <select name="filter_subject_id" id="filter_subject_id" class="form-control">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subject->id); ?>">
                                        <?php echo e($subject->name); ?> - <?php echo e($subject->type); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                            data-url="<?php echo e(route('assignment.submission.list')); ?>" data-click-to-select="true"
                            data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]"
                            data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                            data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                            data-query-params="AssignmentSubmissionQueryParams" data-sort-order="desc"
                            data-maintain-selected="true" data-export-types='["txt","excel"]'
                            data-export-options='{ "fileName": "assignment-submission-list-<?= date('d-m-y') ?>"
                            ,"ignoreColumn": ["operate"]}'
                            data-show-export="true" data-escape="true">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                        <?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="assignment_name">
                                        <?php echo e(__('assignment_name')); ?></th>
                                    <th scope="col" data-field="subject"><?php echo e(__('subject')); ?></th>
                                    <th scope="col" data-field="student_name">
                                        <?php echo e(__('student_name')); ?></th>
                                    <th scope="col" data-field="text" data-formatter="textFormatter"><?php echo e(__('text')); ?> <?php echo e(__('submission')); ?></th>
                                    <th scope="col" data-field="file"
                                    data-formatter="fileFormatter"><?php echo e(__('files')); ?></th>
                                    <th scope="col" data-field="status" data-sortable="true"
                                        data-formatter="assignmentSubmissionStatusFormatter"><?php echo e(__('status')); ?></th>
                                    <th scope="col" data-field="points" data-sortable="true" data-visible="true">
                                        <?php echo e(__('points')); ?></th>
                                    <th scope="col" data-field="feedback" data-sortable="true"><?php echo e(__('feedback')); ?>

                                    </th>
                                    <th scope="col" data-field="session_year_id" data-sortable="true"
                                        data-visible="false"><?php echo e(__('session_year_id')); ?></th>
                                    <th scope="col" data-field="created_at" data-sortable="true" data-visible="false">
                                        <?php echo e(__('created_at')); ?></th>
                                    <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false">
                                        <?php echo e(__('updated_at')); ?></th>
                                    <th scope="col" data-field="operate" data-sortable="false" data-escape="false"
                                        data-events="assignmentSubmissionEvents"><?php echo e(__('action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <?php echo e(__('edit') . ' ' . __('assignment_submission')); ?>

                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 class-edit-form" id="edit-form" action="<?php echo e(url('assignment-submission')); ?>"
                            novalidate="novalidate">
                            <input type="hidden" name="edit_id" id="edit_id" value="" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><?php echo e(__('assignment_name')); ?></label>
                                    <input type="text" name="" id="assignment_name" class="form-control"
                                        disabled>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('subject')); ?></label>
                                    <input type="text" name="" id="subject" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('student_name')); ?></label>
                                    <input type="text" name="" id="student_name" class="form-control"
                                        disabled>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('text')); ?> <?php echo e(__('submission')); ?></label>
                                    <?php echo Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text', 'disabled' => 'disabled']); ?>

                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('files')); ?></label>
                                    <div id="files"></div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                    id="status_accept" value="1"><?php echo e(__('accept')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                    id="status_reject" value="2"><?php echo e(__('reject')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="points_div">
                                    <label><?php echo e(__('points')); ?> <span id="assignment_points"></span></label>
                                    <input type="number" name="points" id="points" class="form-control"
                                        min="0">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('feedback')); ?></label>
                                    <?php echo Form::textarea('feedback', null, ['class' => 'form-control', 'id' => 'feedback']); ?>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/assignment/submission.blade.php ENDPATH**/ ?>