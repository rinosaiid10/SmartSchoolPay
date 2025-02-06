<?php $__env->startSection('title'); ?>
    <?php echo e(__('manage') . ' ' . __('fees')); ?> <?php echo e(__('paid')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('fees')); ?> <?php echo e(__('paid')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <div id="toolbar" class="row">
                            <div class="col">
                                <label for="filter_class_id" style="font-size: 0.89rem">
                                    <?php echo e(__('classes')); ?>

                                </label>
                                <select name="filter_class_id" id="filter_class_id" class="form-control">
                                    <option value=""><?php echo e(__('all')); ?></option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>">
                                            <?php echo e($class->name); ?> <?php echo e($class->medium->name); ?>  <?php echo e($class->streams->name ?? ' '); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="filter_session_year_id" style="font-size: 0.89rem">
                                    <?php echo e(__('session_years')); ?>

                                </label>
                                <select name="filter_session_year_id" id="filter_session_year_id" class="form-control">
                                    <option value=""><?php echo e(__('all')); ?></option>
                                    <?php $__currentLoopData = $session_year_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($session_year->id); ?>">
                                            <?php echo e($session_year->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col" style="font-size: 0.89rem">
                                <label for="filter_mode">
                                    <?php echo e(__('mode')); ?>

                                </label>
                                <select name="filter_mode" id="filter_mode" class="form-control">
                                    <option value=""><?php echo e(__('all')); ?></option>
                                    <option value="0"><?php echo e(__('cash')); ?></option>
                                    <option value="1"><?php echo e(__('cheque')); ?></option>
                                    <option value="2"><?php echo e(__('online')); ?></option>
                                </select>
                            </div>
                        </div>
                        <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"data-url="<?php echo e(route('fees.paid.list', 1)); ?>" data-click-to-select="true"data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]"data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"data-fixed-columns="true" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'data-export-options='{ "fileName": "<?php echo e(__('fees')); ?>-<?php echo e(__('paid')); ?>-<?php echo e(__('list')); ?>-<?= date('d-m-y') ?>" ,"ignoreColumn":["operate"]}' data-show-export="true"data-query-params="feesPaidListQueryParams">
                            <thead>
                                <tr>

                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="student_id" data-sortable="false" data-visible="false"><?php echo e(__('student_id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="student_name" data-sortable="false"><?php echo e(__('students') . ' ' . __('name')); ?></th>
                                    <th scope="col" data-field="class_name" data-sortable="false"><?php echo e(__('class')); ?></th>
                                    <th scope="col" data-field="stream_name" data-sortable="false"><?php echo e(__('stream')); ?></th>

                                    <th scope="col" data-field="total_fees" data-sortable="false" data-align="center"><?php echo e(__('total')); ?> <?php echo e(__('fees')); ?></th>
                                    <th scope="col" data-field="fees_status" data-sortable="false" data-formatter="feesPaidStatusFormatter" data-align="center"><?php echo e(__('fees')); ?> <?php echo e(__('status')); ?></th>
                                    <th scope="col" data-field="date" data-sortable="false" data-align="center"><?php echo e(__('date')); ?></th>
                                    <th scope="col" data-field="session_year_name" data-sortable="false" data-align="center"><?php echo e(__('session_years')); ?></th>
                                    <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                    <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                    <th scope="col" data-field="operate" data-sortable="false" data-events="feesPaidEvents" data-align="center"><?php echo e(__('action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Compulsory Fee Modal -->
            <div class="modal fade" id="compulsoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-m" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">
                                <?php echo e(__('pay') . ' ' . __('compulsory'). ' ' . __('fees')); ?>

                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 pay_compulsory_fees_offline form-validation" method="post" action="<?php echo e(route('fees.compulsory-paid.store')); ?>" novalidate="novalidate">
                            <input type="hidden" name="student_id" id="student_id" value="" />
                            <input type="hidden" name="class_id" id="class_id" value="" />
                            <input type="hidden" name="installment_mode" id="installment_mode" value="0" />
                            <input type="hidden" name="total_amount" id="total_amount" value="" />
                            <h4 class="ml-4">
                                <span class="student_name"></span>
                            </h4>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="date" class="datepicker-popup paid_date form-control"
                                        placeholder="<?php echo e(__('date')); ?>" autocomplete="off" required>
                                </div>
                                <div class="compulsory_div" style="display: none">
                                    <hr>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <div class="compulsory_fees_content"></div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row mode_container">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('mode')); ?> <span class="text-danger">*</span></label><br>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="mode" class="cash_compulsory_mode  mode" value="0" checked>
                                                    <?php echo e(__('cash')); ?>

                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="mode" class="cheque_compulsory_mode mode" value="1">
                                                    <?php echo e(__('cheque')); ?>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group cheque_no_container" style="display: none">
                                    <label><?php echo e(__('cheque_no')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" name="cheque_no"
                                        placeholder="<?php echo e(__('cheque_no')); ?>" class="form-control cheque_no" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme compulsory_fees_payment" type="submit" value=<?php echo e(__('pay')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!--Optional Fees Modal -->
            <div class="modal fade" id="optionalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-m" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">
                                <?php echo e(__('pay') . ' ' . __('optional'). ' ' . __('fees')); ?>

                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 pay_optional_fees_offline form-validation" method="post" action="<?php echo e(route('fees.optional-paid.store')); ?>" novalidate="novalidate">
                            <input type="hidden" name="student_id" id="optional_student_id" value="" />
                            <input type="hidden" name="class_id" id="optional_class_id" value="" />
                            <h4 class="ml-4">
                                <span class="student_name"></span>
                            </h4>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="date" class="datepicker-popup form-control current-date"
                                        placeholder="<?php echo e(__('date')); ?>" autocomplete="off" required>
                                </div>
                                <div class="optional_div" style="display: none">
                                    <hr>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <div class="optional_fees_content"></div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row mode_container">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('mode')); ?> <span class="text-danger">*</span></label><br>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="mode" class="mode cash_mode" value="0" checked>
                                                    <?php echo e(__('cash')); ?>

                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="mode" class="mode cheque_mode" value="1">
                                                    <?php echo e(__('cheque')); ?>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group cheque_no_container" style="display: none">
                                    <label><?php echo e(__('cheque_no')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" name="cheque_no"
                                        placeholder="<?php echo e(__('cheque_no')); ?>" class="form-control cheque_no" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme optional_fees_payment" type="submit" value=<?php echo e(__('pay')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editFeesPaidModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">
                                <?php echo e(__('edit') . ' ' . __('fees') . ' ' . __('paid')); ?>

                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3" id="edit-fees-paid-form" action="<?php echo e(url('fees/paid/update')); ?>"
                            novalidate="novalidate">
                            <input type="hidden" name="edit_id" id="edit_id" value="" />
                            <input type="hidden" name="edit_student_id" id="edit_student_id" value="" />
                            <input type="hidden" name="edit_class_id" id="edit_class_id" value="" />
                            <h4 class="ml-4">
                                <font class="edit_student_name"></font>
                            </h4>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="edit_date"
                                        class="datepicker-popup edit_date form-control" placeholder="<?php echo e(__('date')); ?>"
                                        autocomplete="off" required>
                                </div>
                                <div class="edit_choiceable_div" style="display: none">
                                    <hr>
                                    <label><?php echo e(__('choiceable')); ?> <?php echo e(__('fees')); ?></label>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <div class="edit_choiceable_fees_content">
                                        </div>
                                        <hr>
                                        <label><?php echo e(__('total')); ?> <?php echo e(__('amount')); ?> :- </label><strong><label
                                                class="edit_total_amount_label" data-total_fees="0"></label></strong>
                                        <input type="hidden" name="edit_total_amount" class="edit_total_amount">
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('mode')); ?> <span class="text-danger">*</span></label><br>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="edit_mode" id="edit_mode_cash"
                                                        class="edit_mode" value="0">
                                                    <?php echo e(__('cash')); ?>

                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="edit_mode" id="edit_mode_cheque"
                                                        class="edit_mode" value="1">
                                                    <?php echo e(__('cheque')); ?>

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group edit_cheque_no_container" style="display: none">
                                    <label><?php echo e(__('cheque_no')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" id="edit_cheque_no" name="edit_cheque_no"
                                        placeholder="<?php echo e(__('cheque_no')); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme" type="submit"
                                    value='<?php echo e(__('update')); ?> <?php echo e(__('pay')); ?>' />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/fees/fees_paid.blade.php ENDPATH**/ ?>