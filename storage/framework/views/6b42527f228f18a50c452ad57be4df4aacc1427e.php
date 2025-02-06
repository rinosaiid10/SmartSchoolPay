<!DOCTYPE html>
<?php
    $lang = Session::get('language');
?>
<?php if($lang): ?>
    <?php if($lang->is_rtl): ?>
        <html lang="en" dir="rtl">
    <?php else: ?>
        <html lang="en">
    <?php endif; ?>
<?php else: ?>
    <html lang="en">
<?php endif; ?>
<?php
    $about = DB::table('web_settings')->where('name', 'about_us')->where('status', 1)->first();
    $whoweare = DB::table('web_settings')->where('name', 'who_we_are')->where('status', 1)->first();
    $teacher = DB::table('web_settings')->where('name', 'teacher')->where('status', 1)->first();
    $photo = DB::table('web_settings')->where('name', 'photos')->where('status', 1)->first();
    $video = DB::table('web_settings')->where('name', 'videos')->where('status', 1)->first();
    $question = DB::table('web_settings')->where('name', 'question')->where('status', 1)->first();
    $registration = DB::table('web_settings')->where('name', 'registration')->where('status', 1)->first();
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(url(Storage::url(env('FAVICON')))); ?>" />
    <?php echo $__env->yieldContent('css'); ?>

</head>
<body class="sidebar-fixed">
<div class="container-scroller">

    
    <?php echo $__env->make('web.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-body-wrapper">

        <div class="main-panel">

            <?php echo $__env->yieldContent('content'); ?>



        </div>

    </div>

</div>

  
  <?php echo $__env->make('web.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('js'); ?>

<?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/web/master.blade.php ENDPATH**/ ?>