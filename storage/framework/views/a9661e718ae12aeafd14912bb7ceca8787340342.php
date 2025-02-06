<?php
    $lang = Session::get('language');
?>
<link rel="stylesheet" href="<?php echo e(asset('/assets/css/vendor.bundle.base.css')); ?>" async>

<link rel="stylesheet" href="<?php echo e(asset('/assets/fonts/font-awesome.min.css')); ?>" async/>
<link rel="stylesheet" href="<?php echo e(asset('/assets/select2/select2.min.css')); ?>" async>
<link rel="stylesheet" href="<?php echo e(asset('/assets/jquery-toast-plugin/jquery.toast.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/assets/color-picker/color.min.css')); ?>" async>
<?php if($lang): ?>
    <?php if($lang->is_rtl): ?>
        <link rel="stylesheet" href="<?php echo e(asset('/assets/css/rtl.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('/assets/css/style.css')); ?>">
    <?php endif; ?>
<?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/style.css')); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('/assets/css/datepicker.min.css')); ?>" async>
<link rel="stylesheet" href="<?php echo e(asset('/assets/css/daterangepicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/assets/css/ekko-lightbox.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('/assets/bootstrap-table/bootstrap-table.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/assets/bootstrap-table/fixed-columns.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/assets/bootstrap-table/reorder-rows.css')); ?>">



<link rel="shortcut icon" href="<?php echo e(url(Storage::url(env('FAVICON')))); ?>"/>

<?php
    $theme_color = getSettings('theme_color');
    $secondary_color = getSettings('secondary_color');

    // echo json_encode($theme_color);
    $theme_color = $theme_color['theme_color'];
    $secondary_color =   $secondary_color['secondary_color'];
?>
<?php
    $login_image = getSettings('login_image');
    if($login_image!= null){
        $path = $login_image['login_image'];
        $login_image = url(Storage::url($path));
    }
    else {
        $login_image = url(Storage::url('eschool.jpg'));
    }

?>
<style>
    :root {
        --theme-color: <?=$theme_color ?>;
        --image-url: url(<?=$login_image ?>);
    }
</style>
<script>
    var baseUrl = "<?php echo e(URL::to('/')); ?>";
    const onErrorImage = (e) => {
        e.target.src = "<?php echo e(asset('/storage/no_image_available.jpg')); ?>";
    };
</script>
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/layouts/include.blade.php ENDPATH**/ ?>