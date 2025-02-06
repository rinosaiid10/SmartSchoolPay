<?php $__env->startSection('title'); ?>
    <?php echo e(__('dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-theme text-white mr-2">
                    <i class="fa fa-home"></i>
                </span> <?php echo e(__('dashboard')); ?>

            </h3>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['class-teacher'])): ?>
            <div class="row classes">
                <?php if($class_sections): ?>
                    <div class="col-md-12 grid-margin stretch-card search-container">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo e(__('Class Teachers')); ?></h4>
                                <div class="d-flex flex-wrap">
                                    <?php
                                        $colors = [
                                            'bg-gradient-danger',
                                            'bg-gradient-success',
                                            'bg-gradient-primary',
                                            'bg-gradient-info',
                                            'bg-gradient-secondary',
                                            'bg-gradient-warning',
                                        ];
                                        $colorIndex = 0;
                                    ?>

                                    <?php $__currentLoopData = $class_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $currentColor = $colors[$colorIndex];
                                            $colorIndex = ($colorIndex + 1) % count($colors);
                                        ?>

                                        <div class="col-md-2 stretch-card grid-margin">
                                            <div class="card <?php echo e($currentColor); ?> card-img-holder text-white">
                                                <div class="card-body">
                                                    <img src="<?php echo e(asset(config('global.CIRCLE_SVG'))); ?>"
                                                        class="card-img-absolute" alt="circle-image" />
                                                    <h6 class="mb-2">
                                                        <h4><?php echo e($class_section->class->name); ?>-<?php echo e($class_section->section->name); ?>

                                                            <?php echo e($class_section->class->medium->name); ?>

                                                            <?php echo e($class_section->class->streams->name ?? ''); ?></h4>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php if($teacher): ?>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="<?php echo e(asset(config('global.CIRCLE_SVG'))); ?>" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"><?php echo e(__('total_teachers')); ?><i
                                    class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"><?php echo e($teacher); ?></h2>
                            
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($student): ?>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="<?php echo e(asset(config('global.CIRCLE_SVG'))); ?>" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"><?php echo e(__('total_students')); ?><i
                                    class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"><?php echo e($student); ?></h2>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($parent): ?>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <img src="<?php echo e(asset(config('global.CIRCLE_SVG'))); ?>" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"><?php echo e(__('total_parents')); ?><i
                                    class="mdi mdi-diamond mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5"><?php echo e($parent); ?></h2>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">

            <?php if($attendance): ?>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body h-scroll">
                            <h4 class="card-title"><?php echo e(__('attendance')); ?></h4>
                            <br>
                            <br>
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($leaves): ?>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body v-scroll">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title"><?php echo e(__('Leaves')); ?></h4>
                                <select id="leaveFilter" class="form-control w-auto" onchange="filterLeaves()">
                                    <option value="today">Today</option>
                                    <option value="tomorrow">Tomorrow</option>
                                    <option value="upcoming">Upcoming</option>
                                </select>
                            </div>

                            <div class="table-responsive">
                                <table class="table" id="leavesTable">
                                    <thead>
                                        <tr>
                                            <th> <?php echo e(__('No.')); ?></th>
                                            <th> <?php echo e(__('Image')); ?></th>
                                            <th> <?php echo e(__('Name')); ?></th>
                                            <th> <?php echo e(__('Type')); ?></th>
                                            <th> <?php echo e(__('date')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-date="<?php echo e($row->date); ?>">
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><img class="img-sm rounded-circle" src="<?php echo e($row->leave->user->image); ?>" alt="profile" onerror="onErrorImage(event)"></td>
                                                <td><?php echo e($row->leave->user->first_name ?? ""); ?> <?php echo e($row->leave->user->last_name ?? ""); ?></td>
                                                <td><span class='badge badge-info'><?php echo e($row->type); ?></span></td>
                                                <td><span class='badge badge-success'><?php echo e(date('d M', strtotime($row->date))); ?></span></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


        </div>

        <div class="row">
            <?php if(isset($teachers) && !empty($teachers)): ?>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body v-scroll">
                            <h4 class="card-title"><?php echo e(__('teacher')); ?></h4>
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="wrapper d-flex align-items-center py-2 border-bottom">
                                    <img class="img-sm rounded-circle" src="<?php echo e($row->user->image); ?>" alt="profile"
                                        onerror="onErrorImage(event)">
                                    <div class="wrapper truncate">
                                        <h6 class="ml-1 mb-1 truncate" ><?php echo e($row->user->first_name . ' ' . $row->user->last_name); ?>

                                        </h6>
                                        <small class="text-muted mb-0">
                                            <i class="mdi mdi-map-marker-outline mr-1"></i><?php echo e($row->qualification); ?></small>
                                    </div>
                                    <div class="badge badge-pill badge-success ml-auto px-1 py-1">
                                        <i class="mdi mdi-check"></i>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($rankers) && !empty($rankers)): ?>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body v-scroll">
                            <h4 class="card-title"> <?php echo e(__('top_rankers')); ?> <i class='fa fa-trophy'
                                    style='font-size:30px;color:rgb(255, 200, 0); position:sticky;'></i></h4>
                            <div class="wrapper d-flex align-items-center py-2 border-bottom">
                                <div class="table-responsive">
                                    <table class="table truncate">
                                        <thead>
                                            <tr>
                                                <th> <?php echo e(__('no.')); ?></th>
                                                <th> <?php echo e(__('class')); ?></th>
                                                <th> <?php echo e(__('name')); ?></th>
                                                <th> <?php echo e(__('percentage')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $rankers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($row->class_section->class->name); ?> -
                                                        <?php echo e($row->class_section->section->name); ?>

                                                        <?php echo e($row->class_section->class->medium->name); ?>

                                                        <?php echo e($row->class_section->class->streams->name ?? ''); ?></td>
                                                    <td><?php echo e($row->student->user->full_name); ?></td>
                                                    <td><?php echo e($row->max_percentage); ?> %</td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($boys || $girls): ?>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e(__('gender')); ?></h4>
                            <canvas id="gender-ratio-chart"></canvas>
                            <div id="gender-ratio-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if($announcement): ?>
                <div class="col-md-12 grid-margin stretch-card search-container">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e(__('noticeboard')); ?></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> <?php echo e(__('no.')); ?></th>
                                            <th> <?php echo e(__('title')); ?></th>
                                            <th> <?php echo e(__('description')); ?></th>
                                            <th> <?php echo e(__('date')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e($row->title); ?></td>
                                                <td class="full-data"><?php echo e($row->description); ?></td>
                                                <td><?php echo e($row->created_at->format($date_format)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php if($boys || $girls): ?>
        <script>
            (function($) {
                'use strict';
                $(function() {
                    Chart.defaults.global.legend.labels.usePointStyle = true;
                    if ($("#gender-ratio-chart").length) {
                        let ctx = document.getElementById('gender-ratio-chart').getContext("2d")
                        let gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
                        gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                        gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                        let gradientLegendBlue =
                            'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                        let gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
                        gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                        gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                        let gradientLegendRed =
                            'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';
                        let trafficChartData = {
                            datasets: [{
                                data: [<?php echo e($boys); ?>, <?php echo e($girls); ?>],
                                backgroundColor: [
                                    gradientStrokeBlue,
                                    gradientStrokeRed
                                ],
                                hoverBackgroundColor: [
                                    gradientStrokeBlue,
                                    gradientStrokeRed
                                ],
                                borderColor: [
                                    gradientStrokeBlue,
                                    gradientStrokeRed
                                ],
                                legendColor: [
                                    gradientLegendBlue,
                                    gradientLegendRed
                                ]
                            }],

                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: [
                                "<?php echo e(__('boys')); ?>",
                                "<?php echo e(__('girls')); ?>"
                            ]
                        };
                        let trafficChartOptions = {
                            responsive: true,
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            legend: false,
                            legendCallback: function(chart) {
                                let text = [];
                                text.push('<ul>');
                                for (let i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                                    text.push('<li><span class="legend-dots" style="background:' +
                                        trafficChartData.datasets[0].legendColor[i] + '"></span>');
                                    if (trafficChartData.labels[i]) {
                                        text.push(trafficChartData.labels[i]);
                                    }
                                    text.push('<span class="float-right">' + trafficChartData.datasets[0]
                                        .data[i] + "%" + '</span>')
                                    text.push('</li>');
                                }
                                text.push('</ul>');
                                return text.join('');
                            }
                        };
                        let trafficChartCanvas = $("#gender-ratio-chart").get(0).getContext("2d");
                        let trafficChart = new Chart(trafficChartCanvas, {
                            type: 'doughnut',
                            data: trafficChartData,
                            options: trafficChartOptions
                        });
                        $("#gender-ratio-chart-legend").html(trafficChart.generateLegend());
                    }
                    if ($("#inline-datepicker").length) {
                        $('#inline-datepicker').datepicker({
                            enableOnReadonly: true,
                            todayHighlight: true,
                        });
                    }
                });
            })(jQuery);
        </script>
    <?php endif; ?>
    <?php if($attendance): ?>
        <script>
            var xValues = []; // Class section names
            var yValues = []; // Attendance percentages

            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                xValues.push(
                    "<?php echo e($data->class_section->class->name ?? ''); ?> - <?php echo e($data->class_section->section->name ?? ''); ?> <?php echo e($data->class_section->class->medium->name ?? ''); ?> <?php echo e($data->class_section->class->streams->name ?? ''); ?>"
                );
                var totalAttendance = <?php echo e($data->total_attendance); ?>;
                var totalPresent = <?php echo e($data->total_present); ?>;
                var attendancePercentage = (totalPresent / totalAttendance) * 100;
                attendancePercentage = attendancePercentage.toFixed(2); // Round to two decimal places
                yValues.push(attendancePercentage);
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: xValues,
                    datasets: [{
                        data: yValues,
                        backgroundColor: [
                            '#fe7096',
                            '#047edf',
                            '#84d9d2',
                            '#da8cff',
                            '#f6e384',
                        ],
                        borderWidth: 1,
                        borderColor: 'transparent', // Set border color to transparent
                        fill: true, // Enable fill to apply gradients
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: 100 // Adjust the maximum value as needed
                            },
                            scaleLabel: {
                                display: true,
                                labelString: "Percentage (%)"
                            },
                            gridLines: {
                                display: false // Remove y-axis gridlines
                            },
                        }],
                        xAxes: [{
                            categoryPercentage: 1.0, // Adjust this value to control the bar width
                            barPercentage: 0.3, // Adjust this value to control the gap between bars
                            gridLines: {
                                display: false // Remove x-axis gridlines
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: "Attendance Percentage by Class Section",
                        position: "bottom" // Display title below the graph
                    },
                }
            });
        </script>
    <?php endif; ?>
    <?php if($leaves): ?>
        <script>
            function filterLeaves() {
                var filter = document.getElementById('leaveFilter').value;
                var today = new Date().toISOString().split('T')[0];
                var tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                var tomorrowDate = tomorrow.toISOString().split('T')[0];

                var rows = document.querySelectorAll('#leavesTable tbody tr');
                rows.forEach(function(row) {
                    var rowDate = row.getAttribute('data-date');
                    if (filter === 'today' && rowDate === today) {
                        row.style.display = '';
                    } else if (filter === 'tomorrow' && rowDate === tomorrowDate) {
                        row.style.display = '';
                    } else if (filter === 'upcoming' && rowDate > tomorrowDate) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Call filterLeaves on page load to apply default filter
            document.addEventListener('DOMContentLoaded', function() {
                filterLeaves();
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/smartschoolpay/resources/views/home.blade.php ENDPATH**/ ?>