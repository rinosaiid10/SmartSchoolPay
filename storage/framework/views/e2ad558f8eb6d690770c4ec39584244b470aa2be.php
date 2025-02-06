<!-- navbar ends here  -->
<?php $__env->startSection('content'); ?>

  <div class="main">
    <section class="heroSection">
        <div class="owl-carousel owl-theme hero-carousel">
          <?php if($sliders->isEmpty()): ?>
              <div class="item">
                  <img src="<?php echo e(url('assets/images/heroImg1.png')); ?>" alt="" class="swiperImage" />
              </div>
              <div class="item">
                  <img src="<?php echo e(url('assets/images/heroImg2.png')); ?>" alt="" class="swiperImage" />
              </div>
              <div class="item">
                  <img src="<?php echo e(url('assets/images/heroImg3.png')); ?>" alt="" class="swiperImage" />
              </div>
              <div class="item">
                  <img src="<?php echo e(url('assets/images/heroImg4.png')); ?>" alt="" class="swiperImage" />
              </div>
          <?php else: ?>
              <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item">
                      <img src="<?php echo e(url($slider->image)); ?>" alt="" class="swiperImage">
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
      </div>
    </section>

    <!-- heroSection ends here  -->
    <?php if($about): ?>
        <section class="aboutUs commonMT">
            <div class="container">
            <div class="row aboutWrapper">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="aboutImgWrapper">
                        <img src="<?php echo e(isset($about->image) ? $about->image : url('assets/images/dummyImg.png')); ?>"
                            alt="">
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="aboutContentWrapper">
                        <span class="commonTag">
                            <?php echo e(isset($about->tag) ? $about->tag : ''); ?>

                        </span>
                        <span class="commonTitle">
                            <?php echo e(isset($about->heading) ? $about->heading : ''); ?>

                        </span>
                        <span class="commonDesc">
                            <?php echo e(isset($about->content)? $about->content : ''); ?>


                        </span>
                        <button class="commonBtn">
                            <a href="<?php echo e(route('about.us')); ?>"><?php echo e(__('read_more')); ?></a> <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

            </div>
            </div>
        </section>
      <!-- aboutUs ends here  -->
    <?php endif; ?>

    <?php if($program): ?>
        <section class="programs commonMT">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="programsCardWrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="flex_column_center">
                                <span class="commonTag">
                                    <?php echo e(isset($program->tag) ? $program->tag : 'Educational Programs'); ?>

                                </span>
                                <span class="commonTitle">
                                    <?php echo e(isset($program->heading) ? $program->heading : 'Educational Programs for every Stage'); ?>

                                </span>

                                <span class="commonDesc">
                                    <?php echo e(isset($program->content)
                                        ? $program->content
                                        : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua."); ?>

                                </span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="programsCardWrapper">
                                <div class="row">
                                    <?php if(isset($eprograms)): ?>
                                        <?php $__currentLoopData = $eprograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                <div class="card">
                                                    <img src="<?php echo e($item->image); ?>"alt="...">
                                                    <div class="cardTitle"><span><?php echo e($item->title); ?></span></div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="card">
                                                <img src="<?php echo e(url('assets/images/programImg.png')); ?>"
                                                    alt="...">
                                                <div class="cardTitle"><span>Pre-primary School</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="card">
                                                <img src="<?php echo e(url('assets/images/programImg.png')); ?>"
                                                    alt="...">
                                                <div class="cardTitle"><span>Primary School</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="card">
                                                <img src="<?php echo e(url('assets/images/programImg.png')); ?>"
                                                    alt="...">
                                                <div class="cardTitle"><span>Secondary School</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="card">
                                                <img src="<?php echo e(url('assets/images/programImg.png')); ?>"
                                                    alt="...">
                                                <div class="cardTitle"><span>Higher Secondary School</span></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="sideImgs">
                                        <img src="<?php echo e(url('assets/images/notes.svg')); ?>" class="notesImg" alt="notesImg">
                                        <img src="<?php echo e(url('assets/images/bulbImg.svg')); ?>" class="bulbImg" alt="bulbImg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
      <!-- programs ends here  -->
    <?php endif; ?>

    <?php if($event): ?>
        <section class="events commonMT container">
            <div class="row">
                <div class="col-12">
                    <div class="flex_column_center">
                        <span class="commonTag">
                            <?php echo e(isset($event->tag) ? $event->tag : 'Our Events and News'); ?>

                        </span>
                        <span class="commonTitle">
                            <?php echo e(isset($event->heading)? $event->heading: "Don't Miss the Biggest Events and News of the Year!"); ?>

                        </span>

                        <span class="commonDesc">
                            <?php echo e(isset($event->content) ? $event->content : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."); ?>

                        </span>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="eventsCardWrapper">
                        <div class="row">
                            <?php if(isset($news)): ?>
                                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="card" data-id="<?php echo e($item->id); ?>">
                                            <div class="eventDescWrapper">
                                                <div class="eventTitle"><?php echo e($item->title); ?></div>
                                                <hr>
                                                <div class="eventDate">
                                                    <?php if($item->date): ?>
                                                        <span class="month"><?php echo e(date('d M, Y', strtotime($item->date))); ?></span>
                                                    <?php else: ?>
                                                        <?php if($item->end_date): ?>
                                                            <span class="month"><?php echo e(date('d M, Y', strtotime($item->start_date)) . '  To  ' .  date('d M, Y', strtotime($item->end_date))); ?></span>
                                                        <?php else: ?>
                                                            <span class="month"><?php echo e(date('d M, Y', strtotime($item->start_date))); ?></span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="eventType" style="display: none"><?php echo e($item->type); ?></span>
                                                <span class="eventDesc"><?php echo e($item->description); ?></span>
                                                <span class="eventReadMoreBtn"><?php echo e(__('view_details')); ?></span>
                                                <span class="image" style="display: none"><?php echo e($item->image); ?></span>
                                                <span class="eventDetails" style="display: none"><<?php echo e($item->multipleEvent); ?></span>

                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <!-- Add a modal container -->
                        <div id="eventModal" class="modal">
                            <div class="modal-content modal-dialog-scrollable">
                                <div class="modal-header">
                                    <h4 id="fullEventTitle"></h4>
                                    <span class="close">&times;</span>
                                </div>
                                <div class="event-modal-body">
                                    <span class="eventDate" id="fullEventDate"></span>
                                    <img class="eventImage" style="display: none" id="eventImage" src="" alt="image" /><br><br><br>
                                    <span class="fullEventDescription" id="fullEventDescription"></span>


                                    <div class="eventDetails" style="display: none">
                                        <span class="eventDay"></span>
                                        <div class="eventDescription">
                                            <div class="d-flex">
                                                <div class="eventTime">
                                                    <span class="time"></span>
                                                </div>
                                                <div class="multiEvent">
                                                    <div class="eventTitle">
                                                        <h5 class="subtitle"></h5>
                                                        <span class="subdescription"></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-calendar menu-icon"></i>
                                                        <span class="date"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="multiEventDetails"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- events ends here  -->
    <?php endif; ?>

    <?php if($photo): ?>
        <section class="ourPhotos commonMT">
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex_column_center">
                        <span class="commonTag">
                            <?php echo e(isset($photo->tag) ? $photo->tag :"Our Photos"); ?>

                        </span>
                        <span class="commonTitle">
                            <?php echo e(isset($photo->heading) ? $photo->heading :" Capturing Memories, Building Dreams"); ?>

                        </span>
                        <span class="commonDesc">
                            <?php echo e(isset($photo->content) ? $photo->content :"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua."); ?>

                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="commonSlider">
                        <div class="viewAllBtn">
                            <button class="commonBtn">
                                <a href="<?php echo e(route('photo')); ?>">
                                <?php echo e(__('view_all')); ?>

                                    <i class="fa-solid fa-circle-chevron-right"></i>
                                </a>
                            </button>
                        </div>
                        <div class="slider-content owl-carousel">
                            <?php if(isset($images)): ?>
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Example slide -->
                                    <a href="<?php echo e(route('photo.gallery',$image->id)); ?>">
                                        <div class="swiperDataWrapper">
                                            <div class="img_div">
                                                <img src="<?php echo e($image->thumbnail); ?>" alt="">
                                            </div>
                                            <div class="festival">
                                                <span><?php echo e($image->name); ?></span>
                                                <span><i class="fa-solid fa-arrow-right"></i></span>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <!-- Add more swiperDataWrapper elements here -->
                        </div>
                        <!-- Navigation buttons -->
                        <div class="navigationBtns">
                            <button class="prev commonBtn">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                            <button class="next commonBtn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ourPhotos ends here  -->

    <?php if($video): ?>
        <section class="ourPhotos ourVideos commonMT">
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="flex_column_center">
                        <span class="commonTag">
                            <?php echo e(isset($video->tag) ? $video->tag : 'Our Videos'); ?>

                        </span>
                        <span class="commonTitle">
                            <?php echo e(isset($video->heading) ? $video->heading : 'Rewind, Replay, Rejoice! Dive into Our Video Vault'); ?>

                        </span>

                        <span class="commonDesc">
                            <?php echo e(isset($video->content)? $video->content : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."); ?>

                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="commonSlider">
                        <div class="viewAllBtn">
                            <button class="commonBtn">
                                <a href="<?php echo e(route('video')); ?>">
                                    <?php echo e(__('view_all')); ?>

                                    <i class="fa-solid fa-circle-chevron-right"></i>
                                </a>
                            </button>
                        </div>

                    <div class="slider-content owl-carousel">
                        <?php if(isset($videos)): ?>
                            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiperDataWrapper">
                                    <div class="img_div">
                                        <img src="<?php echo e($item->embeded_url['thumbnailUrl']); ?>" data-embedUrl="<?php echo e($item->embeded_url['embedUrl']); ?>"  class="openVideo" alt="Thumbnail">
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                            <!-- Navigation buttons -->
                        <div class="navigationBtns">
                            <button class="prev commonBtn">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                            <button class="next commonBtn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div id="videoModal" class="modal">
                    <div class="modal-content">
                        <div class="iframe_div">
                            <iframe id="videoIframe" class="video_player" src="" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>
        <!-- ourVideos ends here  -->
    <?php endif; ?>


    <?php if($faq): ?>
        <section class="faqs commonMT">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="flex_column_center">
                            <span class="commonTag">
                                <?php echo e(isset($faq->tag) ? $faq->tag : "FAQ'S"); ?>

                            </span>
                            <span class="commonTitle">
                                <?php echo e(isset($faq->heading)? $faq->heading: "Got Questions? We've Got Answers! Dive into Our FAQs"); ?>

                            </span>
                            <span class="commonDesc">
                                <?php echo e(isset($faq->content)? $faq->content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."); ?>

                            </span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            <?php if(isset($faqs)): ?>
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($item->id); ?>"
                                                aria-expanded="false" aria-controls="collapse-<?php echo e($item->id); ?>">
                                                <span><?php echo e($item->id); ?>. <?php echo e($item->question); ?></span>
                                            </button>
                                        </h2>
                                        <div id="collapse-<?php echo e($item->id); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <span><?php echo e($item->answer); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faqs ends here  -->
    <?php endif; ?>


    <?php if($app): ?>
        <section class="ourApp commonMT container">
            <div class="row">
            <div class="col-12">
                    <div class="flex_column_center">
                    <span class="commonTag">
                        <?php echo e(isset($app->tag) ? $app->tag : 'Download Our School Apps!'); ?>

                    </span>
                    <span class="commonTitle">
                        <?php echo e(isset($app->heading) ? $app->heading : 'Empower Everyone: Teachers, Students, Parents - Get the App Now!'); ?>

                    </span>

                    <span class="commonDesc">
                        <?php echo e(isset($app->content)
                            ? $app->content
                            : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."); ?>

                    </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row wrapper">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                            <span>
                                <img src="<?php echo e(url('assets/images/androidApp.svg')); ?>" class="card-img-top"
                                    alt="...">
                            </span>
                            <span class="appName"> <?php echo e(__('student_parent_app')); ?></span>
                            <span class="demoBtn"><a
                                    href="<?php echo e(isset($settings['app_link']) ? $settings['app_link'] : ''); ?>"
                                    style="color: #ffffff !important"><?php echo e(__('android_demo')); ?></a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <span>
                                    <img src="<?php echo e(url('assets/images/iosApp.svg')); ?>" class="card-img-top"
                                        alt="...">
                                </span>
                                <span class="appName"><?php echo e(__('student_parent_app')); ?></span>
                                <span class="demoBtn"><a href="<?php echo e(isset($settings['ios_app_link']) ? $settings['ios_app_link'] : ''); ?>"
                                        style="color: #ffffff !important">
                                        <?php echo e(__('ios_demo')); ?></a>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <span>
                                    <img src="<?php echo e(url('assets/images/androidApp.svg')); ?>" class="card-img-top"
                                        alt="...">
                                </span>
                                <span class="appName"><?php echo e(__('teacher_app')); ?></span>
                                <span class="demoBtn"><a href="<?php echo e(isset($settings['teacher_app_link']) ? $settings['teacher_app_link'] : ''); ?>"
                                        style="color: #ffffff !important">
                                        <?php echo e(__('android_demo')); ?></a>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <span>
                                    <img src="<?php echo e(url('assets/images/iosApp.svg')); ?>" class="card-img-top"
                                        alt="...">
                                </span>
                                <span class="appName"><?php echo e(__('teacher_app')); ?></span>
                                <span class="demoBtn"><a href="<?php echo e(isset($settings['teacher_ios_app_link']) ? $settings['teacher_ios_app_link'] : ''); ?>"
                                        style="color: #ffffff !important">
                                        <?php echo e(__('ios_demo')); ?></a>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ourApp ends here  -->
    <?php endif; ?>

  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script type="text/javascript">
           // Function to format time (e.g., from "09:00:00" to "09:00 AM")
           function formatTime(timeString) {
                const [hours, minutes] = timeString.split(':');
                const formattedHours = parseInt(hours) % 12 || 12;
                const period = parseInt(hours) < 12 ? 'AM' : 'PM';
                return `${formattedHours}:${minutes} ${period}`;
            }

            function formatDate(dateString) {
                const date = new Date(dateString);
                const day = date.getDate().toString().padStart(2, '0');
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const year = date.getFullYear();
                return `${day}-${month}-${year}`;
            }

        document.addEventListener("DOMContentLoaded", function () {
            const eventDescElements = document.querySelectorAll(".eventDesc");

            eventDescElements.forEach(function (eventDescElement) {
                const originalText = eventDescElement.textContent;
                const maxLength = 100;
                const readMoreBtn = eventDescElement.nextElementSibling; // Assuming the button is a sibling
                if (originalText.length > maxLength) {
                    const truncatedText = originalText.substring(0, maxLength) + "...";
                    eventDescElement.textContent = truncatedText;

                    readMoreBtn.style.display = "inline"; // Show the button
                }
                // Add event listener to "Read More" button
                readMoreBtn.addEventListener("click", function () {
                    // Get the title from eventDescWrapper

                    const title = eventDescElement.parentElement.querySelector(".eventTitle").textContent;
                    // Get the date and month from eventDateWrapper
                    const month = eventDescElement.parentElement.querySelector(".month").textContent;
                    const image = eventDescElement.parentElement.querySelector(".image").textContent;

                    const EventDetails = eventDescElement.parentElement.querySelector(".eventDetails").textContent;

                    const details = EventDetails.replace(/</g, '');


                       // Display the full event information in the modal
                    document.getElementById("fullEventTitle").textContent = title;
                    document.getElementById("fullEventDate").textContent = month;
                    document.getElementById("fullEventDescription").textContent = originalText;

                    if (image) {
                        document.getElementById("eventImage").src = image;
                        document.getElementById("eventImage").style.display = "block";
                    } else {
                        document.getElementById("eventImage").style.display = "none";
                    }

                    if(details && details.length > 0)
                    {
                        const events = JSON.parse(details);
                        const modalContainer = document.querySelector('.eventDetails');
                        let currentDay = 0; // Initialize the current day counter
                        let prevDate = null;


                        function cloneAndPopulateEventDescription() {
                            let eventDescription = $('.eventDetails:last').clone().show();

                            return  eventDescription;
                        }

                        $.each(events, function (key, event) {

                            const startTime = formatTime(event.start_time);
                            const endTime = formatTime(event.end_time);
                            const eventDescription = cloneAndPopulateEventDescription();

                            $('#multiEventDetails').append(eventDescription);

                            if (event.date) {
                                if (event.date !== prevDate) {
                                    currentDay++; // Increment currentDay if the date is different
                                    prevDate = event.date; // Update prevDate
                                    eventDescription.find('.eventDay').text('Day ' + currentDay).show(); // Show day element
                                } else {
                                    eventDescription.find('.eventDay').hide(); // Hide day element if date is same
                                }
                                    eventDescription.find('.time').text(startTime + ' To ' + endTime);
                                    eventDescription.find('.subtitle').text(event.title);
                                    eventDescription.find('.subdescription').text(event.description);
                                    eventDescription.find('.date').text(formatDate(event.date));
                            }
                        });
                    }


                    // Show the modal
                    const modal = document.getElementById("eventModal");
                    modal.style.display = "block";
                    // Disable scrolling
                    document.body.classList.add("modal-open");

                });
            });
            // Close the modal when the close button is clicked
            document.querySelector(".close").addEventListener("click", function () {
                const modal = document.getElementById("eventModal");
                modal.style.display = "none";


                const eventDetailsContainer = document.getElementById("multiEventDetails");
                eventDetailsContainer.innerHTML = "";
                document.body.classList.remove("modal-open");  // Enable scrolling

            });
            // Close the modal when clicking outside of it
            window.addEventListener("click", function (event) {
                if (event.target == document.getElementById("eventModal")) {
                    const modal = document.getElementById("eventModal");
                    modal.style.display = "none";

                    const eventDetailsContainer = document.getElementById("multiEventDetails");
                    eventDetailsContainer.innerHTML = "";
                    document.body.classList.remove("modal-open");   // Enable scrolling

                }

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.openVideo').click(function () {
                // Get the modal

                var modal = document.getElementById('videoModal');

                var embedUrl = this.getAttribute('data-embedUrl');

                videoIframe.src = embedUrl;
                // Display the modal when the image is clicked
                modal.style.display = "block";

                // Close the modal when clicking outside of it
                window.addEventListener("click", function (event) {
                    if (event.target == document.getElementById("videoModal")) {
                        const modal = document.getElementById("videoModal");
                        modal.style.display = "none";
                        // Enable scrolling
                        document.body.classList.remove("modal-open");
                        var videoElement = document.getElementById('videoIframe');
                        videoElement.src = "";
                    }
                });
            });
        });

    </script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('web.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/web/index.blade.php ENDPATH**/ ?>