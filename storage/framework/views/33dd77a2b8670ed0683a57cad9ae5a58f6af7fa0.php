<?php $__env->startSection('title'); ?>
    <?php echo e(__('section')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('section')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($about->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" method="POST" id="edit-content-about" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($about->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($about->tag) ? $about->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($about->heading) ? $about->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-4 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($about->content)? $about->content : '', ['rows' => '10','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-4">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" id="image" name="image" class="file-upload-default edit_image" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control edit_image" value="" placeholder="<?php echo e(__('image')); ?>" />
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="w-100 text-center">
                                        <img src="<?php echo e(isset($about->image) ? $about->image : url('assets/images/dummyImg.png')); ?>" id="content_image" class="w-25">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-4">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($about->status) ? $about->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($about->status) ? $about->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($whoweare->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content"  method="POST" id="edit-content-whoweare" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($whoweare->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($whoweare->tag) ? $whoweare->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($whoweare->heading) ? $whoweare->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-4 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($whoweare->content)? $whoweare->content : '', ['rows' => '10','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-4">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" id="image" name="image" class="file-upload-default edit_image" accept="image/*"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control edit_image" value="" placeholder="<?php echo e(__('image')); ?>" />
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="w-100 text-center">
                                        <img src="<?php echo e(isset($whoweare->image) ? $whoweare->image : url('assets/images/dummyImg.png')); ?>" id="content_image" class="w-25">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-4">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($whoweare->status) ? $whoweare->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($whoweare->status) ? $whoweare->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($teacher->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-teacher" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($teacher->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($teacher->tag) ? $teacher->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($teacher->heading) ? $teacher->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($teacher->content)? $teacher->content : '', ['rows' => '5','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($teacher->status) ? $teacher->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($teacher->status) ? $teacher->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($program->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-program" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($program->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($program->tag) ? $program->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($program->heading) ? $program->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($program->content)? $program->content : '', ['rows' => '5','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($program->status) ? $program->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($program->status) ? $program->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($event->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-event" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($event->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($event->tag) ? $event->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($event->heading) ? $event->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($event->content)? $event->content : '', ['rows' => '5','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($event->status) ? $event->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($event->status) ? $event->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($photo->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-photo" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($photo->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($photo->tag) ? $photo->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($photo->heading) ? $photo->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($photo->content)? $photo->content : '', ['rows' => '5','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($photo->status) ? $photo->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($photo->status) ? $photo->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($video->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-video" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($video->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($video->tag) ? $video->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($video->heading) ? $video->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($video->content)? $video->content : '', ['rows' => '5','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($video->status) ? $video->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($video->status) ? $video->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($faq->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-faq" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($faq->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($faq->tag) ? $faq->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($faq->heading) ? $faq->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($faq->content)? $faq->content : '', ['rows' => '5','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($faq->status) ? $faq->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($faq->status) ? $faq->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($registration->tag ?? "Student Registration Form"); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 student-registration" id="student-registration" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($registration->id ?? ''); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($registration->tag) ? $registration->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($registration->heading) ? $registration->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($registration->status) ? $registration->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($registration->status) ? $registration->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e($app->tag); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-app" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e($app->id); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($app->tag) ? $app->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($app->heading) ? $app->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 ">
                                    <label><?php echo e(__('content')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('content', isset($app->content) ? $app->content : '', ['rows' => '5','placeholder' => __('content'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($app->status) ? $app->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($app->status) ? $app->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card search-container">
                <div class="card">
                    <div class="card-body">
                        <h3>
                            <?php echo e(isset($question->tag) ? $question->tag : ''); ?>

                        </h3>
                        <hr>
                        <br>
                        <form class="pt-3 edit-content" id="edit-content-question" action="<?php echo e(route('content.edit',1)); ?>" novalidate="novalidate">
                            <input type="hidden" name="id" id="id" value="<?php echo e(isset($question->id) ? $question->id : ''); ?>"/>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-5">
                                    <label><?php echo e(__('section_title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('tag',  isset($question->tag) ? $question->tag : '' , ['required', 'placeholder' => __('tag'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-5">
                                    <label><?php echo e(__('heading')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('heading', isset($question->heading) ? $question->heading : '', ['required', 'placeholder' => __('heading'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-6 col-md-2">
                                    <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '1', (isset($question->status) ? $question->status == '1' :''),[]); ?><?php echo e(__('enable')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('status', '0', (isset($question->status) ? $question->status == '0' :''),[]); ?><?php echo e(__('disable')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/web_settings/content_settings.blade.php ENDPATH**/ ?>