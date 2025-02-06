<?php $__env->startSection('title'); ?>
<?php echo e(__('fees')); ?> <?php echo e(__('configration')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('configration')); ?>

        </h3>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12"> 
            <div class="card">
                <form id="create-fees-config-form" class="fees-config" action="<?php echo e(route('fees.config.udpate')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo e(__('payment_gateways')); ?></h3>
                        <div class="card-border p-4 mb-4">
                            <h3 class="card-title"><?php echo e(__('other')); ?> <?php echo e(__('configration')); ?></h3>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label><?php echo e(__('currency_code')); ?> <span class="text-danger">*</span></label>
                                    <input name="currency_code" value="<?php echo e(isset($settings['currency_code']) ? $settings['currency_code'] : ''); ?>" type="text" placeholder="<?php echo e(__('currency_code')); ?>" class="form-control" />
                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label><?php echo e(__('currency_symbol')); ?> <span class="text-danger">*</span></label>
                                    <input name="currency_symbol" value="<?php echo e(isset($settings['currency_symbol']) ? $settings['currency_symbol'] : ''); ?>" type="text" placeholder="<?php echo e(__('currency_symbol')); ?>" class="form-control" />
                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label><?php echo e(__('compulsory_fee_payment_mode')); ?></label> <span class="ml-1 text-danger">*</span>
                                    <div class="ml-4 d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="compulsory_fee_payment_mode" class="online_payment_toggle" value="1" <?php echo e(isset($settings['compulsory_fee_payment_mode']) && $settings['compulsory_fee_payment_mode'] == '1' ? 'checked' : ''); ?>>
                                                <?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="compulsory_fee_payment_mode" class="online_payment_toggle" value="0" <?php echo e(isset($settings['compulsory_fee_payment_mode']) && $settings['compulsory_fee_payment_mode'] == '0' ? 'checked' : ''); ?>>
                                                <?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label><?php echo e(__('is_student_can_pay_fees')); ?> <span class="text-danger">*</span></label>
                                    <div class="ml-4 d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="is_student_can_pay_fees" class="online_payment_toggle" value="1" <?php echo e(isset($settings['is_student_can_pay_fees']) && $settings['is_student_can_pay_fees'] == '1' ? 'checked' : ''); ?>>
                                                <?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="is_student_can_pay_fees" class="online_payment_toggle" value="0" <?php echo e(isset($settings['is_student_can_pay_fees']) && $settings['is_student_can_pay_fees'] == '0' ? 'checked' : ''); ?>>
                                                <?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

 <!-- SmartPayGateWay Section -->
 <div class="col-lg-12 ">
    <div class="card-border">
        <h5 class="card-title"><i class="fa fa-angle-double-right menu-icon"></i> SmartPayGateWay</h5>
        <hr>

        <div class="row">
            <div class="col-lg-6 ">
                <div class="form-group">
                    <label><?php echo e(__('currency_code')); ?> <span class="text-danger">*</span></label>
                    <input name="smartpay_currency_code" value="<?php echo e(isset($settings['smartpay_currency_code']) ? $settings['smartpay_currency_code'] : ''); ?>" type="text" placeholder="<?php echo e(__('currency_code')); ?>" class="form-control" />
                    
                </div>
                <div class="form-group">
                    <label>Clé marchant</label>
                    <input name="merchant_key" value="<?php echo e(!env('DEMO_MODE') ? ($settings['merchant_key'] ?? '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="Clé marchant" class="form-control" />
                </div>
                <div class="form-group">
                    <label><?php echo e(__('api_key')); ?></label>
                    <input name="smartpay_api_key" value="<?php echo e(!env('DEMO_MODE') ? ($settings['smartpay_api_key'] ?? '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('api_key')); ?>" class="form-control" />
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="form-group">
                    <label>Url paiement</label>
                    <input name="smartpay_webhook_url" value="<?php echo e(!env('DEMO_MODE') ? ($settings['smartpay_webhook_url'] ?? '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="SmartPayGateWay url" class="form-control" />
                </div>
               
                <div class="form-group">
                    <label>Url statut paiement</label>
                    <input name="smartpay_statuspay_url" value="<?php echo e(!env('DEMO_MODE') ? ($settings['smartpay_statuspay_url'] ?? '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="Url statut paiement" class="form-control" />
                </div>

                <div class="form-group">
                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label>
                    <div class="ml-4 d-flex">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="smartpay_status" class="online_payment_toggle" value="1" <?php echo e(isset($settings['smartpay_status']) && $settings['smartpay_status'] == '1' ? 'checked' : ''); ?>>
                                <?php echo e(__('enable')); ?>

                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="smartpay_status" class="online_payment_toggle" value="0" <?php echo e(isset($settings['smartpay_status']) && $settings['smartpay_status'] == '0' ? 'checked' : ''); ?>>
                                <?php echo e(__('disable')); ?>

                            </label>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        
       
    </div>
</div>

                            <!-- Razorpay Section -->
                            

                            <!-- Stripe Section -->
                            

                             <!-- Paystack Section -->
                            

                            <!-- Flutterwave Section -->
                            

                        </div>

                        <input class="btn btn-theme mt-5" type="submit" value="<?php echo e(__('Submit')); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/fees/fees_config.blade.php ENDPATH**/ ?>