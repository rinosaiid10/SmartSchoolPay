<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\Parents;
use App\Models\Students;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\SessionYear;
use App\Models\Announcement;
use App\Models\ClassSection;
use App\Models\ClassTeacher;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Models\UserNotification;
use App\Imports\AttendanceImport;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('attendance-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $teacher_id = Auth::user()->teacher->id;
        $class_section_ids = ClassTeacher::where('class_teacher_id',$teacher_id)->pluck('class_section_id');
        $class_sections = ClassSection::with('class', 'section','classTeachers','class.streams')->whereIn('id',$class_section_ids)->get();
        return view('attendance.index', compact('class_sections'));
    }


    public function view()
    {
        if (!Auth::user()->can('attendance-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $teacher_id = Auth::user()->teacher->id;
        $class_section_ids = ClassTeacher::where('class_teacher_id',$teacher_id)->pluck('class_section_id');
        $class_sections = ClassSection::with('class', 'section','classTeachers','class.streams')->whereIn('id',$class_section_ids)->get();
        return view('attendance.view', compact('class_sections'));
    }

    public function getAttendanceData(Request $request)
    {
        $response = Attendance::select('type')->where(['date' => date('Y-m-d', strtotime($request->date)), 'class_section_id' => $request->class_section_id])->pluck('type')->first();
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('attendance-create') || !Auth::user()->can('attendance-edit')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        $validator = Validator::make($request->all(), [
            'class_section_id' => 'required',
            'student_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $session_year = getSettings('session_year');
            $session_year_id = $session_year['session_year'];
            $class_section_id = $request->class_section_id;
            $date = date('Y-m-d', strtotime($request->date));
            $getid = Attendance::select('id')->where(['date' => $date, 'class_section_id' => $class_section_id])->get();

            for ($i = 0; $i < count($request->student_id); $i++) {

                if (count($getid) > 0) {
                    $attendance = Attendance::find($getid[$i]['id']);
                    $a = "type" . $request->student_id[$i];
                } else {
                    $attendance = new Attendance();
                    $a = "type" . $request->student_id[$i];
                }
                $attendance->class_section_id = $class_section_id;
                $attendance->student_id = $request->student_id[$i];
                $attendance->session_year_id = $session_year_id;
                if ($request->holiday != '' && $request->holiday == 3) {
                    $attendance->type = $request->holiday;
                } else {
                    $attendance->type = $request->$a;
                    if($attendance->status == 0){
                        if($request->$a == 0)
                        {
                            $student = Students::with('user')->where('id',$request->student_id[$i])->first();
                            $father_id = Students::where('id',$request->student_id[$i])->pluck('father_id');
                            $mother_id = Students::where('id',$request->student_id[$i])->pluck('mother_id');
                            $guardian_id = Students::where('id',$request->student_id[$i])->pluck('guardian_id');

                            $user = Parents::where('id',$father_id)->orwhere('id',$mother_id)->orwhere('id',$guardian_id)->pluck('user_id');

                            $title = 'Attendance Alert';
                            $body = $student->user->first_name .' '. $student->user->last_name .' '.'is Absent on' .' '.date('d-m-Y', strtotime($date));;
                            $type = 'attendance';
                            $image = null;
                            $userinfo = null;

                            $notification = new Notification();
                            $notification->send_to = 4;
                            $notification->title = $title;
                            $notification->message = $body;
                            $notification->type = $type;
                            $notification->date = Carbon::now();
                            $notification->is_custom = 0;
                            $notification->save();

                            foreach($user as $data)
                            {
                                $user_notification = new UserNotification();
                                $user_notification->notification_id = $notification->id;
                                $user_notification->user_id = $data;
                                $user_notification->save();
                            }

                            send_notification($user, $title, $body, $type, $image, $userinfo);

                        }
                    }
                }
                $attendance->status = 1;
                $attendance->date = $date;
                $attendance->save();
            }
            $response = [
                'error' => false,
                'message' => trans('data_store_successfully')
            ];
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (!Auth::user()->can('attendance-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $offset = 0;
        $limit = 200;
        $sort = 'roll_number';
        $order = 'ASC';

        if (isset($_GET['offset']))
            $offset = $_GET['offset'];
        if (isset($_GET['limit']))
            $limit = $_GET['limit'];

        if (isset($_GET['sort']))
            $sort = $_GET['sort'];
        if (isset($_GET['order']))
            $order = $_GET['order'];

        $class_section_id = $request->class_section_id;
        $date = date('Y-m-d', strtotime($request->date));
        $session_year = getSettings('session_year');
        $session_year_id = $session_year['session_year'];
        $current_date = Carbon::now()->toDateString();

        $chk = Attendance::with('student')->where([
            'date' => $date,
            'class_section_id' => $class_section_id,
            'session_year_id' => $session_year_id
        ])->count();
        
        if (isset($request->date) && $date != '' && $chk > 0) {
            $sql2 = Attendance::with('student')->where([
                'date' => $date,
                'class_section_id' => $class_section_id,
                'session_year_id' => $session_year_id
            ]);
        
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sql2->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhereHas('student.user', function ($q) use ($search) {
                            $q->whereRaw("concat(first_name,' ',last_name) LIKE '%" . $search . "%'")
                                ->orWhere('first_name', 'LIKE', "%$search%")
                                ->orWhere('last_name', 'LIKE', "%$search%");
                        });
                });
            }
        
            $total = $sql2->count();
            $res = $sql2->get();
        
            $bulkData = array();
            $bulkData['total'] = $total;
            $rows = array();
            $no = 1;
        
            // Get list of user_ids for students who are on leave
            $leaveUserIds = Leave::with('leave_detail')
                ->where('status', 1)
                ->whereHas('leave_detail', function ($query) use ($date) {
                    $query->whereDate('date', $date);
                })
                ->pluck('user_id')
                ->toArray();
        
            foreach ($res as $row) {
                $get_type = $row->type;
        
                // Check if the student is on leave
                $isOnLeave = in_array($row->student->user_id, $leaveUserIds);
        
                if ($isOnLeave) {
                    // Show "On Leave" if the student is on leave
                    $type = '<div class="form-check-inline"><label class="form-check-label">
                    <input type="hidden" class="type"  name="type' . $row->id . '" value="0"><span class="badge badge-danger">On Leave</span>
                    </label></div></div>';
                } else {
                    // Show attendance options if the student is not on leave
                    if ($get_type == 1) {
                        $type = '<div class="d-flex"><div class="form-check-inline"><label class="form-check-label">
                        <input required type="radio" class="type" name="type' . $row->student_id . '" value="1" checked>Present
                        </label></div>';
                        $type .= '<div class="form-check-inline"><label class="form-check-label">
                        <input type="radio" class="type" name="type' . $row->student_id . '" value="0">Absent
                        </label></div></div>';
                    } elseif ($get_type == 0) {
                        $type = '<div class="d-flex"><div class="form-check-inline"><label class="form-check-label">
                        <input required type="radio" class="type" name="type' . $row->student_id . '" value="1">Present
                        </label></div>';
                        $type .= '<div class="form-check-inline"><label class="form-check-label">
                        <input type="radio" class="type" name="type' . $row->student_id . '" value="0" checked>Absent
                        </label></div></div>';
                    } else {
                        $type = '<div class="d-flex"><div class="form-check-inline"><label class="form-check-label">
                        <input required type="radio" class="type" name="type' . $row->student_id . '" value="1">Present
                        </label></div>';
                        $type .= '<div class="form-check-inline"><label class="form-check-label">
                        <input type="radio" class="type" name="type' . $row->student_id . '" value="0">Absent
                        </label></div></div>';
                    }
                }
        
                $tempRow['id'] = $row->id;
                $tempRow['no'] = $no++;
                $tempRow['student_id'] = "<input type='text' name='student_id[]' class='form-control' readonly value=" . $row->student_id . ">";
                $tempRow['admission_no'] = $row->student->admission_no;
                $tempRow['roll_no'] = $row->student->roll_number;
                $tempRow['name'] = $row->student->user->first_name . ' ' . $row->student->user->last_name;
                $tempRow['type'] = $type;
                $rows[] = $tempRow;
            }
        } else {
            $sql = Students::with('user')->where('class_section_id', $class_section_id)->whereHas('user',function ($q){
                $q->where('status', 1);
            });

            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sql->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->whereRaw("concat(first_name,' ',last_name) LIKE '%" . $search . "%'")
                                ->orWhere('first_name', 'LIKE', "%$search%")
                                ->orWhere('last_name', 'LIKE', "%$search%");
                        });
                });
            }
            $total = $sql->count();
            $sql->orderBy($sort, $order)->skip($offset)->take($limit);
            $res = $sql->get();
            $bulkData = array();
            $bulkData['total'] = $total;
            $rows = array();
            $tempRow = array();
            $no = 1;

            $leaveUserIds = Leave::with('leave_detail')
                ->where('status', 1)
                ->whereHas('leave_detail', function ($query) use ($current_date) {
                    $query->whereDate('date', $current_date);
                })
                ->pluck('user_id')
                ->toArray();
                
            foreach ($res as $row) {
                $isOnLeave = in_array($row->user_id, $leaveUserIds);

                if ($isOnLeave) {
                    $type = '<div class="form-check-inline"><label class="form-check-label">
                    <input type="hidden" class="type"  name="type' . $row->id . '" value="0"><span class="badge badge-danger">On Leave</span>
                    </label></div></div>';
                } else {
                    $type = '<div class="d-flex"><div class="form-check-inline"><label class="form-check-label">
                    <input required type="radio" class="type"  name="type' . $row->id . '" value="1" checked>Present
                    </label></div>';
                    $type .= '<div class="form-check-inline"><label class="form-check-label">
                    <input type="radio" class="type"  name="type' . $row->id . '" value="0">Absent
                    </label></div></div>';
                }

                $tempRow['id'] = $row->id;
                $tempRow['no'] = $no++;
                $tempRow['student_id'] = "<input type='text' name='student_id[]' class='form-control' readonly value=" . $row->id . ">";
                $tempRow['admission_no'] = $row->admission_no;
                $tempRow['roll_no'] = $row->roll_number;
                $tempRow['name'] = $row->user->first_name . ' ' . $row->user->last_name;
                $tempRow['type'] = $type;
                $rows[] = $tempRow;
            }
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    public function attendance_show(Request $request)
    {
        if (!Auth::user()->can('attendance-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $offset = 0;
        $limit = 200;
        $sort = 'student_id';
        $order = 'ASC';

        if (isset($_GET['offset']))
            $offset = $_GET['offset'];
        if (isset($_GET['limit']))
            $limit = $_GET['limit'];

        if (isset($_GET['sort']))
            $sort = $_GET['sort'];
        if (isset($_GET['order']))
            $order = $_GET['order'];

        $class_section_id = $request->class_section_id;
        $attendance_type = $request->attendance_type;
        $date = date('Y-m-d', strtotime($request->date));

        $validator = Validator::make($request->all(), [
            'class_section_id' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }

        $sql = Attendance::where('date', $date)->where('class_section_id', $class_section_id)->with('student');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orwhere('student_id', 'LIKE', "%$search%")
                ->orWhereHas('student.user', function ($q) use ($search) {
                    $q->whereRaw("concat(users.first_name,' ',users.last_name) LIKE '%" . $search . "%'")
                        ->orwhere('users.first_name', 'LIKE', "%$search%")
                        ->orwhere('users.last_name', 'LIKE', "%$search%");
                })
                ->orWhereHas('student', function ($q) use ($search) {
                    $q->where('admission_no', 'LIKE', "%$search%")
                        ->orwhere('id', 'LIKE', "%$search%")
                        ->orwhere('user_id', 'LIKE', "%$search%")
                        ->orwhere('roll_number', 'LIKE', "%$search%");
                });
        }
        if (isset($attendance_type) && $attendance_type != '') {
            $sql->where('type', $attendance_type);
        }
        $total = $sql->count();

        $sql->orderBy($sort, $order)->skip($offset)->take($limit);
        $res = $sql->get();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $no = 1;
        foreach ($res as $row) {
            $type = $row->type;
            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['student_id'] = $row->student_id;
            $tempRow['user_id'] = $row->student->user_id;
            $tempRow['admission_no'] = $row->student->admission_no;
            $tempRow['roll_no'] = $row->student->roll_number;
            $tempRow['name'] = $row->student->user->first_name . ' ' . $row->student->user->last_name;
            $tempRow['type'] = ($type == 1) ? '<label class="badge badge-info"> Present</label>' : (($type == 3) ? '<label class="badge badge-success"> Holiday</label>' : '<label class="badge badge-danger"> Absent</label>');
            $rows[] = $tempRow;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    public function createBulkData()
    {
        if (!Auth::user()->can('attendance-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $teacher_id = Auth::user()->teacher->id;
        $class_section_ids = ClassTeacher::where('class_teacher_id',$teacher_id)->pluck('class_section_id');
        $class_sections = ClassSection::with('class', 'section','classTeachers','class.streams')->whereIn('id',$class_section_ids)->get();
        return view('attendance.add_bulk_data', compact('class_sections'));
    }

    public function storeBulkData(Request $request)
    {
        if (!Auth::user()->can('attendance-create') || !Auth::user()->can('attendance-edit')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        $validator = Validator::make($request->all(), [
            'class_section_id' => 'required',
            'file' => 'required|mimes:csv,txt'
        ]);
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $class_section_id = $request->class_section_id;
            $date = $request->date;
            Excel::import(new AttendanceImport($class_section_id,$date), $request->file);
            $response = [
                'error' => false,
                'message' => trans('data_store_successfully')
            ];
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
            );
        }
        return response()->json($response);
    }

    public function studentExport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_section_id' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        $class_section_id = $request->class_section_id;
        $date = $request->date;

        return Excel::download(new StudentsExport($class_section_id, $date), 'student_list.csv');

    }

    public function attendaceReportIndex()
    {
        if (!Auth::user()->can('attendance-report')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $sessionYears = SessionYear::all();
        $settings = getSettings();
        $currentSessionYearId = $settings['session_year'];

        $currentSessionYear = SessionYear::where('id',$currentSessionYearId)->first();
        $user = Auth::user();

        if($user->hasRole('Teacher'))
        {
            $teacher_id = Auth::user()->teacher->id;
            $class_section_ids = ClassTeacher::where('class_teacher_id',$teacher_id)->pluck('class_section_id');
            $class_sections = ClassSection::with('class', 'section','classTeachers','class.streams')->whereIn('id',$class_section_ids)->get();

        }else{
            $class_sections = ClassSection::with('class', 'section', 'streams')->get();
        }

        return view('attendance.report', compact('class_sections', 'sessionYears','currentSessionYearId','currentSessionYear',));
    }

    public function attendanceReportShow(Request $request)
    {
        if (!Auth::user()->can('attendance-report')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $offset = 0;
        $limit = 200;
        $sort = 'student_id';
        $order = 'ASC';

        if (isset($_GET['offset']))
            $offset = $_GET['offset'];
        if (isset($_GET['limit']))
            $limit = $_GET['limit'];

        if (isset($_GET['sort']))
            $sort = $_GET['sort'];
        if (isset($_GET['order']))
            $order = $_GET['order'];

        $total_days = 0;
        $session_year_id = $request->session_year_id;
        $class_section_id = $request->class_section_id;

        $currentSessionYear = SessionYear::where('id',$session_year_id)->first();

        $currentDate = Carbon::now();

        // Get the start date of the current session year
        $startDate = Carbon::parse($currentSessionYear->start_date);

        // Get holiday_days from LeaveMaster
        $leaveMaster = LeaveMaster::where('session_year_id', $currentSessionYear->id)->first();
        $holiday_days = null; // Empty collection by default

        if ($leaveMaster) {
            $holiday_days =  $leaveMaster->holiday_days;
        }

        $holiday_days = explode(',', $holiday_days);

        $holiday_date = Attendance::where('session_year_id', $currentSessionYear->id)->where('type',3)->distinct()->pluck('date')->toArray();

        // Get public holidays within the date range
        $holiday = Holiday::whereDate('date', '>=', $currentSessionYear->start_date)->whereDate('date', '<=', $currentSessionYear->end_date)->pluck('date')->toArray();
        $holidays = array_unique(array_merge($holiday_date, $holiday));

        // Create a date range from the start date to the current date
        $dateRange = new Collection();
        for ($date = $startDate; $date->lte($currentDate); $date->addDay()) {
            $dateRange->push($date->format('Y-m-d'));
        }

        $filteredDateRange = $dateRange->filter(function ($date) use ($holiday_days) {
            $carbonDate = Carbon::parse($date);
            return !in_array($carbonDate->format('l'), $holiday_days);
        });

        $workingDays = $filteredDateRange->diff($holidays);

        $total_days = $workingDays->count();

        $sql = Students::with('user')->where('class_section_id', $class_section_id);

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%$search%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->whereRaw("concat(first_name,' ',last_name) LIKE '%" . $search . "%'")
                            ->orWhere('first_name', 'LIKE', "%$search%")
                            ->orWhere('last_name', 'LIKE', "%$search%");
                    });
            });
        }

        $total = $sql->count();

        $sql->orderBy($sort, $order)->skip($offset)->take($limit);
        $res = $sql->get();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $no = 1;
        foreach ($res as $row) {

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['student_id'] = "<input type='text' name='student_id[]' class='form-control' readonly value=" . $row->id . ">";
            $tempRow['admission_no'] = $row->admission_no;
            $tempRow['roll_no'] = $row->roll_number;
            $tempRow['name'] = $row->user->first_name . ' ' . $row->user->last_name;
            $tempRow['total_days'] = $total_days ?? 0;

            $present_days = Attendance::where('student_id', $row->id)->where('session_year_id',  $currentSessionYear->id)->whereIn('date',$workingDays)->where('type',1)->count();
            $tempRow['present_days'] = $present_days ?? 0;
            $absent_days = Attendance::where('student_id', $row->id)->where('session_year_id',  $currentSessionYear->id)->whereIn('date',$workingDays)->where('type',0)->count();
            $tempRow['absent_days'] = $absent_days ?? 0;

            if ($total_days > 0) {
                $percentage = ($present_days / $total_days) * 100;

            } else {
                $percentage = 0; // Avoid division by zero
            }
            $tempRow['percentage'] = round($percentage, 2);

            $rows[] = $tempRow;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
}
