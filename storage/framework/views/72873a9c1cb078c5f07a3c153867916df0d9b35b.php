<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        
        <li class="nav-item">
            <a  class="nav-link" href="<?php echo e(url('/home')); ?>">
                <i class="fa fa-tachometer menu-icon" style="margin: 0 1px 0 1px"></i>
                <span class="menu-title"><?php echo e(__('dashboard')); ?></span>
            </a>
        </li>

        <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['medium-create', 'section-create', 'subject-create', 'class-create', 'subject-create',
                'class-teacher-create', 'subject-teacher-list', 'subject-teachers-create', 'assign-class-to-new-student',
                'promote-student-create'])): ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#academics-menu" aria-expanded="false"
                        aria-controls="academics-menu">
                        <i class="fa fa-university menu-icon"></i><span class="menu-title"><?php echo e(__('academics')); ?></span>
                        <i class="fa fa-angle-left fa-2xl menu-arrow"></i>
                    </a>
                    <div class="collapse" id="academics-menu">
                        <ul class="nav flex-column sub-menu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medium-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('medium.index')); ?>"> <?php echo e(__('medium')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('section-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('section.index')); ?>"> <?php echo e(__('section')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stream-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('stream.index')); ?>"> <?php echo e(__('stream')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shift-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('shifts.index')); ?>"> <?php echo e(__('shifts')); ?> </a>
                            </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subject-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('subject.index')); ?>"> <?php echo e(__('subject')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('semester-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('semester.index')); ?>"> <?php echo e(__('semester')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('class-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('class.index')); ?>"> <?php echo e(__('class')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subject-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('class.subject')); ?>"><?php echo e(__('assign_class_subject')); ?> </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('class-teacher-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('class.teacher')); ?>">
                                        <?php echo e(__('assign_class_teacher')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['subject-teacher-list', 'subject-teacher-create', 'subject-teacher-edit',
                                'subject-teacher-delete'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('subject-teachers.index')); ?>">
                                        <?php echo e(__('assign') . ' ' . __('subject') . ' ' . __('teacher')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign-class-to-new-student')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('students.assign-class')); ?>">
                                        <?php echo e(__('assign_new_student_class')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('promote-student-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('promote-student.index')); ?>">
                                        <?php echo e(__('promote_student')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('form-field-create')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('form-fields.index')); ?>">
                    <i class="fa fa-list-alt menu-icon"></i>
                    <span class="menu-title"><?php echo e(__('custom_fields')); ?></span>
                </a>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['student-create', 'student-list', 'category-create', 'student-reset-password', 'class-teacher'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#student-menu" aria-expanded="false"
                    aria-controls="academics-menu"><i class="fa fa-graduation-cap menu-icon" style="padding: 8px"></i>
                    <span class="menu-title"><?php echo e(__('students')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="student-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-create')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('category.index')); ?>">
                                <?php echo e(__('student_category')); ?>

                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('student-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('students.create')); ?>">
                                    <?php echo e(__('student_admission')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('online-registration-list')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('online-registration.index')); ?>">
                                    <?php echo e(__('online_registrations')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('student-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('students.index-students-roll-number')); ?>">
                                    <?php echo e(__('assign')); ?> <?php echo e(__('roll_no')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['student-list', 'class-teacher','generate-document'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('students.index')); ?>">
                                    <?php echo e(__('student_details')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('generate-id-card')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('generate_id.index')); ?>">
                                    <?php echo e(__('generate').' '. __('id').' '. __('card')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('generate-result')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('student.result.index')); ?>">
                                    <?php echo e(__('generate').' '. __('result')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('student-reset-password')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('students.reset_password')); ?>">
                                    <?php echo e(__('students') . ' ' . __('reset_password')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->hasRole('Super Admin')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('students.create-bulk-data')); ?>">
                                    <?php echo e(__('add_bulk_data')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['teacher-create', 'teacher-list'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#teacher-menu" aria-expanded="false"
                    aria-controls="academics-menu"><i class="fa fa-user menu-icon" style="margin: 0 4px 0 4px"></i>
                    <span class="menu-title"><?php echo e(__('teacher')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="teacher-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teacher-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('teachers.index')); ?>">
                                    <?php echo e(__('teacher_create')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teacher-list')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('teacher.details')); ?>">
                                    <?php echo e(__('teacher_details')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('parents-create')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('parents.index')); ?>" class="nav-link">
                    <i class="fa fa-users menu-icon"></i>
                     <span class="menu-title"><?php echo e(__('parents')); ?></span>
                </a>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-create','staff-create','staff-list'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#staff-menu" aria-expanded="false"
                    aria-controls="settings-menu"><i class="fa fa-user-secret menu-icon" style="margin: 0 2px 0 2px"></i>
                    <span class="menu-title"><?php echo e(__('staff').' '. __('management')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="staff-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('roles/')); ?>"> <?php echo e(__('role_permission')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staff-list')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('staff.index')); ?>"> <?php echo e(__('staff')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['leave-setting-create','leave-list','leave-create','leave-delete','leave-edit','student-leave-approve'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#leave-menu" aria-expanded="false"><i class="fa fa-plane menu-icon" style="margin: 0 2px 0 2px"></i>
                    <span class="menu-title"><?php echo e(__('leave')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="leave-menu">
                    <ul class="nav flex-column sub-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('leave-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('leave.index')); ?>"> <?php echo e(__('apply').' '. __('leave')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('leave-setting-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('leave-master.index')); ?>"><?php echo e(__('leave').' '. __('setting')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['leave-list','leave-approve'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('leave-report.index')); ?>"> <?php echo e(__('leave').' '. __('report')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('leave-approve')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('leave-request.index')); ?>"> <?php echo e(__('staff').' '. __('leave').' '.__('requests')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('student-leave-approve')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('student-leave-request.index')); ?>"> <?php echo e(__('student').' '. __('leave').' '.__('requests')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['timetable-create', 'class-timetable', 'teacher-timetable'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#timetable-menu" aria-expanded="false"
                    aria-controls="timetable-menu"> <i class="fa fa-calendar menu-icon" style="margin: 0 1px 0 1px"></i>
                     <span class="menu-title"><?php echo e(__('timetable')); ?></span>
                     <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="timetable-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('timetable-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('timetable.index')); ?>"><?php echo e(__('create_timetable')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['class-timetable', 'class-teacher'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('class-timetable')); ?>">
                                    <?php echo e(__('class_timetable')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teacher-timetable')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('teacher-timetable')); ?>">
                                    <?php echo e(__('teacher_timetable')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

          
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['class-teacher','attendance-report'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#attendance-menu" aria-expanded="false"
                    aria-controls="attendance-menu"><i class="fa fa-check menu-icon"></i>
                    <span class="menu-title"><?php echo e(__('attendance')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                    </a>
                <div class="collapse" id="attendance-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attendance-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('attendance.index')); ?>">
                                    <?php echo e(__('add_attendance')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('attendance.add-bulk-data')); ?>">
                                    <?php echo e(__('add_bulk_data')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attendance-list')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('attendance.view')); ?>">
                                    <?php echo e(__('view_attendance')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attendance-report')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('attendace_report.index')); ?>">
                                    <?php echo e(__('attendance_report')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['lesson-list', 'lesson-create', 'lesson-edit', 'lesson-delete', 'topic-list', 'topic-create',
            'topic-edit', 'topic-delete'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#subject-lesson-menu" aria-expanded="false"
                    aria-controls="subject-lesson-menu"><i class="fa fa-book menu-icon"></i>
                    <span class="menu-title"><?php echo e(__('subject_lesson')); ?></span> <i class="fa fa-angle-left menu-arrow"></i></a>
                <div class="collapse" id="subject-lesson-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['lesson-list', 'lesson-create', 'lesson-edit', 'lesson-delete'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('lesson')); ?>"> <?php echo e(__('create_lesson')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['topic-list', 'topic-create', 'topic-edit', 'topic-delete'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('lesson-topic')); ?>"> <?php echo e(__('create_topic')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['assignment-create', 'assignment-submission'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#student-assignment-menu" aria-expanded="false"
                    aria-controls="student-assignment-menu"> <i class="fa fa-tasks menu-icon"></i>
                    <span class="menu-title"><?php echo e(__('student_assignment')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="student-assignment-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assignment-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('assignment.index')); ?>">
                                    <?php echo e(__('create_assignment')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assignment-submission')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('assignment.submission')); ?>">
                                    <?php echo e(__('assignment_submission')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['exam-create', 'exam-timetable-create', 'exam-upload-marks', 'grade-create'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#exam-menu" aria-expanded="false"
                    aria-controls="exam-menu"><i class="fa fa-file-text menu-icon" style="margin: 0 2px 0 2px"></i>
                    <span class="menu-title"><?php echo e(__('exam')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="exam-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('exam-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('exams.index')); ?>"> <?php echo e(__('create_exam')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('exam-timetable-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('exam-timetable.index')); ?>">
                                    <?php echo e(__('create_exam_timetable')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('class-teacher')): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('exam-upload-marks')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('exams.upload-marks')); ?>">
                                        <?php echo e(__('upload')); ?> <?php echo e(__('exam_marks')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('exam-result')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('exams.get-result')); ?>">
                                        <?php echo e(__('students')); ?> <?php echo e(__('exam_result')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grade-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('grades')); ?>">
                                    <?php echo e(__('exam')); ?> <?php echo e(__('grade')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['fees-type', 'fees-classes', 'fees-paid'])): ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#fees-menu" aria-expanded="false"
                aria-controls="exam-menu"><i class="fa fa-money menu-icon"></i>
                <span class="menu-title"><?php echo e(__('fees')); ?></span>
                <i class="fa fa-angle-left menu-arrow"></i>
            </a>
            <div class="collapse" id="fees-menu">
                <ul class="nav flex-column sub-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fees-type')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('fees-type.index')); ?>"> <?php echo e(__('fees')); ?>

                                <?php echo e(__('type')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fees-classes')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('fees.class.index')); ?>"><?php echo e(__('assign')); ?>

                                <?php echo e(__('fees')); ?> <?php echo e(__('classes')); ?> </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fees-paid')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('fees.paid.index')); ?>"> <?php echo e(__('fees')); ?>

                                <?php echo e(__('paid')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fees-paid')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('fees.transactions.log.index')); ?>"> <?php echo e(__('fees')); ?>

                                <?php echo e(__('transactions')); ?> <?php echo e(__('logs')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage-online-exam'])): ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#online-exam-menu" aria-expanded="false"
                aria-controls="online-exam-menu"> <i class="fa fa-laptop menu-icon"></i>
                <span class="menu-title"><?php echo e(__('online')); ?> <?php echo e(__('exam')); ?></span>
                <i class="fa fa-angle-left menu-arrow"></i>
            </a>
            <div class="collapse" id="online-exam-menu">
                <ul class="nav flex-column sub-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-online-exam')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('online-exam.index')); ?>"> <?php echo e(__('manage')); ?>

                                <?php echo e(__('online')); ?> <?php echo e(__('exam')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('online-exam-question.index')); ?>"> <?php echo e(__('manage')); ?>

                                <?php echo e(__('questions')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('online-exam.terms-conditions')); ?>">
                                <?php echo e(__('terms_condition')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-create')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('notifications.index')); ?>">
                    <i class="fa fa-bell menu-icon"></i>
                    <span class="menu-title"><?php echo e(__('custom').' '. __('notifications')); ?></span>
                </a>
            </li>
        <?php endif; ?>


        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('announcement-create')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('announcement.index')); ?>">
                    <i class="fa fa-bullhorn menu-icon"></i>
                    <span class="menu-title"><?php echo e(__('announcement')); ?></span>
                </a>
            </li>
        <?php endif; ?>


        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-create')): ?>
           <li class="nav-item">
               <a href="<?php echo e(route('sliders.index')); ?>" class="nav-link"> <i class="fa fa-sliders menu-icon"></i>
                   <span class="menu-title"><?php echo e(__('sliders')); ?></span></a>
           </li>
        <?php endif; ?>

         
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['holiday-create', 'holiday-list'])): ?>
            <li class="nav-item">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('holiday-list')): ?>
                    <a href="<?php echo e(route('holiday.index')); ?>" class="nav-link">
                        <i class="fa fa-calendar-check-o menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('holiday_list')); ?></span>  </a>
                <?php endif; ?>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['event-create'])): ?>
            <li class="nav-item">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('holiday-list')): ?>
                    <a href="<?php echo e(route('events.index')); ?>" class="nav-link">
                        <i class="fa fa-list-ul menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('events')); ?></span>  </a>
                <?php endif; ?>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('session-year-create')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('session-years.index')); ?>" class="nav-link">
                    <i class="fa fa-calendar-o menu-icon" style="margin: 0 1px 0 1px"></i>
                    <span class="menu-title"><?php echo e(__('session_years')); ?></span>
                </a>
            </li>
        <?php endif; ?>


        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['content-create','event-create','program-create', 'media-create', 'faq-create','contact-us'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#web-settings" aria-expanded="false"
                aria-controls="settings-menu"><i class="fa fa-wrench menu-icon" style="margin: 0 2px 0 2px"></i>
                <span class="menu-title"><?php echo e(__('web_settings')); ?></span>
                <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="web-settings">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('content-create')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('content.index')); ?>"><?php echo e(__('content_settings')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('program-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('educational.index')); ?>"><?php echo e(__('educational_program')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('media-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('photo.index')); ?>"><?php echo e(__('photos')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('media-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('video.index')); ?>"> <?php echo e(__('videos')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('faq.index')); ?>"> <?php echo e(__('faqs')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('contact_us.index')); ?>"> <?php echo e(__('contact_us')); ?></a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </li>
        <?php endif; ?>


        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['setting-create', 'fcm-setting-create', 'email-setting-create', 'privacy-policy', 'contact-us',
            'about-us','chat-message-delete','chat-settings'])): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#settings-menu" aria-expanded="false"
                    aria-controls="settings-menu"><i class="fa fa-gear menu-icon" style="margin: 0 2px 0 2px"></i>
                    <span class="menu-title"><?php echo e(__('system_settings')); ?></span>
                    <i class="fa fa-angle-left menu-arrow"></i>
                </a>
                <div class="collapse" id="settings-menu">
                    <ul class="nav flex-column sub-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('app-settings')); ?>">
                                    <?php echo e(__('app_settings')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('settings')); ?>">
                                    <?php echo e(__('general_settings')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('language')); ?>">
                                    <?php echo e(__('language_settings')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fcm-setting-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('fcm-settings')); ?>"> <?php echo e(__('notification').' '. __('setting')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['chat-message-delete', 'chat-settings'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('chat_setting.index')); ?>">
                                    <?php echo e(__('chat_settings')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fees-config')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('fees.config.index')); ?>"> <?php echo e(__('fees')); ?>

                                    <?php echo e(__('configration')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('email-setting-create')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('email-settings')); ?>">
                                    <?php echo e(__('email_configuration')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('generate-id-card')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('id-card-settings')); ?>"><?php echo e(__('student').' '. __('id').' '. __('card').' '. __('setting')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('privacy-policy')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('privacy.index')); ?>">
                                    <?php echo e(__('privacy_policy')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('contact-us')); ?>"> <?php echo e(__('contact_us')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('about-us')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('about-us')); ?>"> <?php echo e(__('about_us')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('terms-condition')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('terms-condition')); ?>">
                                    <?php echo e(__('terms_condition')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
            <?php endif; ?>

            <?php if(Auth::user()->hasRole('Super Admin')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('system-update.index')); ?>">
                        <i class="fa fa-cloud-download menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('system_update')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>