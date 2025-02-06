<div class="repeater">
    <div class="row">
        <div class="input-group col-sm-12 col-md-2">
            Subjects <span class="text-danger"> *</span>
        </div>
        <div class="input-group col-sm-12 col-md-2">
            Teacher <span class="text-danger">*</span>
        </div>
        <div class="input-group col-sm-12 col-md-2">
            Start time <span class="text-danger">*</span>
        </div>
        <div class="input-group col-sm-12 col-md-2">
            End time <span class="text-danger">*</span>
        </div>
        <div class="input-group col-sm-12 col-md-2">
           Live Class Link
        </div>
        <div class="input-group col-sm-12 col-md-1">
            Name
         </div>
        <div class="input-group col-sm-12 col-md-1">
            <button data-repeater-create type="button" class="addmore d-none btn btn-gradient-info btn-sm icon-btn ml-2 mb-2">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>

    <form class="pt-3" action="<?php echo e(url('timetable')); ?>" id="formdata" method="POST" novalidate="novalidate">
        <?php echo csrf_field(); ?>
        <input required type="hidden" name="day" id="day" class="day">
        <input required type="hidden" name="class_section_id" id="class_section_id">
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/timetable/tab_title.blade.php ENDPATH**/ ?>