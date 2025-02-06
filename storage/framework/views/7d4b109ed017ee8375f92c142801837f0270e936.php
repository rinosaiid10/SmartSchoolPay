<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/vendor.bundle.base.css')); ?>" async>
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/datepicker.min.css')); ?>" async>
    <link rel="stylesheet" href="<?php echo e(asset('/assets/jquery-toast-plugin/jquery.toast.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/webstyle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/responsive.css')); ?>">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/ekko-lightbox.css')); ?>">
</head>

<body>

    <header class="topHeader">
        <div class="container">
            <div class="row divWrapper">
                <div class="col-8 col-sm-8 col-md-8 col-lg-6">
                    <div class="leftDiv">
                        <span class="commonSpan">
                            <i class="fa-solid fa-envelope"></i>
                            <a
                                href="mailto:<?php echo e($settings['school_email']); ?>"><?php echo e(isset($settings['school_email']) ? $settings['school_email'] : 'Schoolinfous@gmail.com'); ?></a>
                        </span>
                        <span class="commonSpan"><i class="fa-solid fa-phone-volume"></i>
                            <a
                                href="tel:<?php echo e($settings['school_phone']); ?>"><?php echo e(isset($settings['school_phone']) ? $settings['school_phone'] : '( +91 ) 12345 67890'); ?></a>
                        </span>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-6">
                    <div class="rightDiv">
                        <span class="commonSpan">Follow Us:</span>
                        <span>
                            <span class="commonSpan">
                                <a href="<?php echo e(isset($settings['facebook']) ? $settings['facebook'] : ''); ?>"
                                    target="_blank">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                            </span>
                            <span class="commonSpan">
                                <a href="<?php echo e(isset($settings['linkedin']) ? $settings['linkedin'] : ''); ?>"
                                    target="_blank">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- topHeader ends here  -->

    <header class="navbar">
        <div class="container">
            <div class="navbarWrapper">
                <div class="navLogoWrapper">
                    <div class="navLogo">
                        <a href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(env('LOGO1') ? url(Storage::url(env('LOGO1'))) : url('assets/logo.svg')); ?>"
                                height="50px" width="150px" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="menuListWrapper">
                    <ul class="listItems">
                        <li>
                            <a href="<?php echo e(url('/')); ?>"><?php echo e(__('home')); ?></a>
                        </li>
                        <?php if($about || $whoweare || $teacher): ?>
                            <li>
                                <a href="<?php echo e(route('about.us')); ?>"><?php echo e(__('about-us')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($photo || $video): ?>
                            <li>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo e(__('gallery')); ?>

                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php if($photo): ?>
                                            <li><a class="dropdown-item" href="<?php echo e(route('photo')); ?>">
                                                    <?php echo e(__('photos')); ?></a></li>
                                        <?php endif; ?>
                                        <hr>
                                        <?php if($video): ?>
                                            <li><a class="dropdown-item" href="<?php echo e(route('video')); ?>">
                                                    <?php echo e(__('videos')); ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if($question): ?>
                            <li>
                                <a href="<?php echo e(route('contact.us')); ?>"> <?php echo e(__('contact_us')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($registration): ?>
                            <li>
                                <a href="<?php echo e(route('student-registration.index')); ?>"> <?php echo e(__('registration')); ?></a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <button type="submit" class="commonBtn mb-3" name="contactbtn"
                                onclick="window.location='<?php echo e(url('login')); ?>'">
                                <?php echo e(__('login')); ?>

                            </button>
                        </li>
                    </ul>
                    <div class="hamburg">
                        <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"><i class="fa-solid fa-bars"></i></span>
                    </div>
                </div>
            </div>



            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <div class="navLogoWrapper">
                        <div class="navLogo">
                            <img src="<?php echo e(env('LOGO1') ? url(Storage::url(env('LOGO1'))) : url('assets/logo.svg')); ?>"
                                height="50px" width="150px" alt="logo">
                        </div>
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="listItems">
                        <li>
                            <a href="<?php echo e(url('/')); ?>"><?php echo e(__('home')); ?></a>
                        </li>
                        <?php if($about || $whoweare || $teacher): ?>
                            <li>
                                <a href="<?php echo e(route('about.us')); ?>"><?php echo e(__('about-us')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($photo || $video): ?>
                            <li>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Gallery
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php if($photo): ?>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo e(route('photo')); ?>"><?php echo e(__('photos')); ?></a></li>
                                        <?php endif; ?>
                                        <hr>
                                        <?php if($video): ?>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo e(route('video')); ?>"><?php echo e(__('videos')); ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if($registration): ?>
                            <li>
                                <a href="<?php echo e(route('student-registration.index')); ?>"> <?php echo e(__('registration')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($question): ?>
                            <li>
                                <a href="<?php echo e(route('contact.us')); ?>"><?php echo e(__('contact_us')); ?></a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <button type="submit" class="commonBtn mb-3" name="contactbtn"
                                onclick="window.location='<?php echo e(url('login')); ?>'">
                                <?php echo e(__('login')); ?>

                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</body>

</html>
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/web/header.blade.php ENDPATH**/ ?>