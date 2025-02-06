<footer class="commonMT">

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="companyInfoWrapper">
            <div>
              <a href="index.html">
                <a href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(env('LOGO1') ? url(Storage::url(env('LOGO1'))) : url('assets/logo.svg')); ?>" height="50px" width="150px" alt="logo">
                </a>
              </a>
            </div>
            <div>
              <span class="commonDesc">
                <?php echo e(isset($settings['school_address']) ? $settings['school_address'] : ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna.'); ?>

              </span>
            </div>

            <div class="socialIcons">
              <span>
                <a href="<?php echo e(isset($settings['facebook']) ? $settings['facebook'] : ''); ?>" target="_blank">
                  <i class="fa-brands fa-facebook-square"></i>
                </a>
              </span>
              <span>
                <a href="<?php echo e(isset($settings['instagram']) ? $settings['instagram'] : ''); ?>" target="_blank">
                  <i class="fa-brands fa-instagram-square"></i>
                </a>
              </span>
              <span>
                <a href="<?php echo e(isset($settings['linkedin']) ? $settings['linkedin'] : ''); ?>" target="_blank">
                  <i class="fa-brands fa-linkedin"></i>
                </a>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="linksWrapper usefulLinksDiv">
            <span class="title"><?php echo e(__('useful_links')); ?></span>
                <span><a href="<?php echo e(url('/')); ?>"><?php echo e(__('home')); ?></a></span>
                <?php if($about || $whoweare || $teacher): ?><span><a href="<?php echo e(route('about.us')); ?>"><?php echo e(__('about-us')); ?></a></span> <?php endif; ?>
                <?php if($photo): ?><span><a href="<?php echo e(route('photo')); ?>"><?php echo e(__('photos')); ?></a></span> <?php endif; ?>
                <?php if($video): ?><span><a href="<?php echo e(route('video')); ?>"><?php echo e(__('videos')); ?></a></span> <?php endif; ?>
                <?php if($question): ?><span><a href="<?php echo e(route('contact.us')); ?>"> <?php echo e(__('contact_us')); ?></a></span> <?php endif; ?>
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="linksWrapper">
                <span class="title"><?php echo e(__('quick_links')); ?></span>
                <span>
                    <a href="<?php echo e(url('login')); ?>">
                        <?php echo e(__('admin_login')); ?>

                    </a>
                </span>
                <span>
                    <a href="<?php echo e(url('terms-conditions')); ?>">
                        <?php echo e(__('terms_condition')); ?>

                    </a>
                </span>
                <span>
                    <a href="<?php echo e(url('privacy-policy')); ?>">
                        <?php echo e(__('privacy_policy')); ?>

                    </a>
                </span>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="linksWrapper">
            <span class="title"><?php echo e(__('contact_info')); ?></span>
                <span class="iconsWrapper">
                    <span>
                        <i class="fa-solid fa-phone-volume"></i>
                    </span>
                    <span>
                        <a href="tel:<?php echo e($settings['school_phone']); ?>"><?php echo e(isset($settings['school_phone']) ? $settings['school_phone'] : '( +91 ) 12345 67890'); ?></a>
                    </span>
                </span>
            <span class="iconsWrapper">
                <span>
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <span>
                        <a href="mailto:<?php echo e($settings['school_email']); ?>"><?php echo e(isset($settings['school_email'])? $settings['school_email'] :  'Schoolinfous@gmail.com'); ?></a>
                </span>
            </span>
            <span class="iconsWrapper">
                <span>
                    <i class="fa-solid fa-location-dot location"></i>
                </span>
                <span>
                    <?php echo e(isset($settings['school_address']) ? $settings['school_address'] : ' 4517 Washington Ave. Manchester, Kentucky
                    39495.'); ?>

                </span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="copyRightText">
      <span><?php echo e(__('copyright')); ?> © <?= date('Y'); ?> <a href="<?php echo e(env('APP_URL')); ?>" target="_blank"><?php echo e(env('APP_NAME')); ?></a>. <?php echo e(__('all_rights_reserved')); ?>.</span>
    </div>
  </footer>
  <script>
    let currentSlide = 0;
    const swiperDataWrappers = document.querySelector('.slider-content .row');

    if(swiperDataWrappers != null)
    {
        const swiperDataWrapperWidth = document.querySelector('.swiperDataWrapper').offsetWidth;

        function showSlide(n) {
            currentSlide = (n + swiperDataWrappers.children.length) % swiperDataWrappers.children.length;

            const transformValue = -currentSlide * swiperDataWrapperWidth + 'px';
            swiperDataWrappers.style.transform = 'translateX(' + transformValue + ')';
        }

        function changeSlide(n) {
            showSlide(currentSlide + n);
        }

        // Initial display
        showSlide(0);

        // Infinite loop by resetting the position after transition
        swiperDataWrappers.addEventListener('transitionend', () => {
            if (currentSlide === 0) {
                swiperDataWrappers.style.transition = 'none';
                currentSlide = swiperDataWrappers.children.length / 1;
                showSlide(currentSlide);
                setTimeout(() => {
                    swiperDataWrappers.style.transition = 'transform 0.5s ease-in-out';
                });
            }
        });
    }


</script>

<script>
    let currentVideoSlide = 0;
    const swiperDataVideoWrappers = document.querySelector('.slider-video .row');

    if(swiperDataVideoWrappers != null)
    {
        const swiperDataVideoWrapperWidth = document.querySelector('.swiperVideoDataWrapper').offsetWidth;

        function showVideoSlide(n) {
            currentVideoSlide = (n + swiperDataVideoWrappers.children.length) % swiperDataVideoWrappers.children.length;

            const transformValue = -currentVideoSlide * swiperDataVideoWrapperWidth + 'px';
            swiperDataVideoWrappers.style.transform = 'translateX(' + transformValue + ')';
        }

        function changeVideoSlide(n) {
            showVideoSlide(currentVideoSlide + n);
        }

        // Initial display
        showVideoSlide(0);

        // Infinite loop by resetting the position after transition
        swiperDataVideoWrappers.addEventListener('transitionend', () => {

            console.log("Hello");
            if (currentVideoSlide === 0) {
                swiperDataVideoWrappers.style.transition = 'none';
                currentVideoSlide = swiperDataVideoWrappers.children.length / 1;
                showVideoSlide(currentVideoSlide);
                setTimeout(() => {
                    swiperDataVideoWrappers.style.transition = 'transform 0.5s ease-in-out';
                });
            }
        });
    }


</script>

<script>
    var baseUrl = "<?php echo e(URL::to('/')); ?>";
    const onErrorImage = (e) => {
        e.target.src = "<?php echo e(asset('/storage/no_image_available.jpg')); ?>";
    };
</script>
<!-- bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- fontawesome icons   -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- swiper  -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

<!-- swiper  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Base and vendor scripts -->
<script src="<?php echo e(asset('/assets/js/vendor.bundle.base.js')); ?>"></script>

<!-- jQuery and related plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="<?php echo e(asset('/assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/jquery-additional-methods.min.js')); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
<!-- Additional plugins -->
<script src="<?php echo e(asset('/assets/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/ekko-lightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/jquery-toast-plugin/jquery.toast.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/sweetalert2.all.min.js')); ?>"></script>

<!-- Custom scripts -->
<script src="<?php echo e(asset('/assets/js/custom/function.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/custom/validate.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/script.js')); ?>"></script>


<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script type='text/javascript'>
            $.toast({
                text: '<?php echo e($error); ?>',
                showHideTransition: 'slide',
                icon: 'error',
                loaderBg: '#f2a654',
                position: 'top-right'
            });
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        $.toast({
            text: '<?php echo e(Session::get('success')); ?>',
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: '#f96868',
            position: 'top-right'
        });
    </script>

<?php else: ?>


<?php endif; ?>

<script>
    $(document).ready(function () {
      // Initialize each carousel separately
      $(".slider-content.owl-carousel").each(function () {
        var owl = $(this).owlCarousel({
          loop: false,
          margin: 20,
          nav: false,
          responsive: {
            0: {
              items: 1,
            },
            600: {
              items: 3,
            },
            1000: {
              items: 5,
            },
          },
        });

        // Custom navigation buttons for this specific carousel
        $(this)
          .closest(".commonSlider")
          .find(".prev")
          .click(function () {
            owl.trigger("prev.owl.carousel");
          });

        $(this)
          .closest(".commonSlider")
          .find(".next")
          .click(function () {
            owl.trigger("next.owl.carousel");
          });
      });
    });

    $(document).ready(function () {
      $(".hero-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000, // Set autoplay interval in milliseconds
        autoplayHoverPause: true, // Pause autoplay when mouse hovers over the carousel
        nav: true,
        navText: [
          "<i class='fa-solid fa-arrow-left'></i>",
          "<i class='fa-solid fa-arrow-right'></i>",
        ],
      });
    });
</script>

<?php
    $theme_color = getSettings('theme_color');
    $secondary_color = getSettings('secondary_color');

    // echo json_encode($theme_color);
    $theme_color = $theme_color['theme_color'];
    $secondary_color =   $secondary_color['secondary_color'];
?>
<style>
    :root {
        --primary-color: <?=$theme_color ?>;
        /* --primary-hover-color:<?=$secondary_color ?>; */
        --secondary-color1:<?=$secondary_color ?>;
    }
</style>
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/web/footer.blade.php ENDPATH**/ ?>