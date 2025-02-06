<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\File;
use App\Models\Subject;
use App\Rules\AfterNow;
use App\Models\Students;
use App\Models\Assignment;
use App\Models\ClassSection;
use App\Models\ClassSubject;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\StudentSubject;
use App\Models\UserNotification;
use Illuminate\Support\Facades\DB;
use App\Models\AssignmentSubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (!Auth::user()->can('assignment-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $class_section = ClassSection::SubjectTeacher()->with('class.medium', 'section','class.streams')->get();
        $subjects = Subject::SubjectTeacher()->orderBy('id', 'ASC')->get();
        return response(view('assignment.index', compact('class_section', 'subjects')));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show() {
        if (!Auth::user()->can('assignment-list')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        $offset = request('offset', 0);
        $limit = request('limit', 10);
        $sort = request('sort', 'id');
        $order = request('order', 'ASC');
        $search = request('search');

        $sql = Assignment::assignmentteachers()->with('class_section', 'file', 'subject')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%$search%")
                ->orwhere('name', 'LIKE', "%$search%")
                ->orwhere('instructions', 'LIKE', "%$search%")
                ->orwhere('points', 'LIKE', "%$search%")
                ->orwhere('session_year_id', 'LIKE', "%$search%")
                ->orwhere('extra_days_for_resubmission', 'LIKE', "%$search%")
                ->orwhere('due_date', 'LIKE', "%" . date('Y-m-d H:i:s', strtotime($search)) . "%")
                ->orwhere('created_at', 'LIKE', "%" . date('Y-m-d H:i:s', strtotime($search)) . "%")
                ->orwhere('updated_at', 'LIKE', "%" . date('Y-m-d H:i:s', strtotime($search)) . "%")
                ->orWhereHas('class_section.class', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                })->orWhereHas('class_section.section', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                })->orWhereHas('subject', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                });
            });
        })
        ->when(request('subject_id') != null, function ($query) {
            $subject_id = request('subject_id');
            $query->where(function ($query) use ($subject_id) {
                $query->where('subject_id', $subject_id);
            });
        })
        ->when(request('class_id') != null , function ($query){
            $class_id = request('class_id');
            $query->where(function ($query) use ($class_id) {
                $query->where('class_section_id', $class_id);
            });
        });
        $total = $sql->count();

        $sql->orderBy($sort, $order)->skip($offset)->take($limit);
        $res = $sql->get();
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $no = 1;

        foreach ($res as $row) {

            $row = (object)$row;
            $operate = '<a href=' . route('assignment.edit', $row->id) . ' class="btn btn-xs btn-gradient-primary btn-rounded btn-icon edit-data" data-id=' . $row->id . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            $operate .= '<a href=' . route('assignment.destroy', $row->id) . ' class="btn btn-xs btn-gradient-danger btn-rounded btn-icon delete-form" data-id=' . $row->id . '><i class="fa fa-trash"></i></a>';

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['class_section_id'] = $row->class_section_id;
            $tempRow['class_section_name'] = $row->class_section->class->name . ' ' . $row->class_section->section->name.' - '.$row->class_section->class->medium->name.' '. ($row->class_section->class->streams->name  ?? '');
            $tempRow['subject_id'] = $row->subject_id;
            $tempRow['subject_name'] = isset($row->subject) ? $row->subject->name.' - '.$row->subject->type : '-';
            $tempRow['name'] = $row->name;
            $tempRow['instructions'] = $row->instructions;
            $tempRow['file'] = $row['file'];
            $tempRow['due_date'] = convertDateFormat($row->due_date, 'd-m-Y H:i:s');
            $tempRow['points'] = $row->points;
            $tempRow['resubmission'] = $row->resubmission;
            $tempRow['extra_days_for_resubmission'] = $row->extra_days_for_resubmission;
            $tempRow['session_year_id'] = $row->session_year_id;
            $tempRow['created_at'] = convertDateFormat($row->created_at, 'd-m-Y H:i:s');
            $tempRow['updated_at'] = convertDateFormat($row->updated_at, 'd-m-Y H:i:s');
            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (!Auth::user()->can('assignment-edit')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            "class_section_id" => 'required|numeric',
            "subject_id" => 'required|numeric',
            "name" => 'required',
            "description" => 'nullable',
            "due_date" => 'required|date',
            "points" => 'nullable',
            "resubmission" => 'nullable|boolean',
            "extra_days_for_resubmission" => 'nullable|numeric',
        ]);


        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first(),
            );
            return response()->json($response);
        }
        try {

            $session_year = getSettings('session_year');
            $session_year_id = $session_year['session_year'];

            $assignment = Assignment::find($id);
            $assignment->class_section_id = $request->class_section_id;
            $assignment->subject_id = $request->subject_id;
            $assignment->name = $request->name;
            $assignment->instructions = $request->instructions;
            $assignment->due_date = $request->due_date;
            $assignment->points = $request->points;
            if ($request->resubmission) {
                $assignment->resubmission = 1;
                $assignment->extra_days_for_resubmission = $request->extra_days_for_resubmission;
            } else {
                $assignment->resubmission = 0;
                $assignment->extra_days_for_resubmission = null;
            }

            $assignment->session_year_id = $session_year_id;
            $subject_name = Subject::select('name')->where('id', $request->subject_id)->pluck('name')->first();
            $title = 'Update assignment in ' . $subject_name;
            $body = $request->name;
            $type = "assignment";
            $user = Students::select('user_id')->where('class_section_id', $request->class_section_id)->get()->pluck('user_id');
            $image = null;
            $userinfo = null;

            $notification = new Notification();
            $notification->send_to = 3;
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

            $assignment->save();
            send_notification($user, $title, $body, $type, $image, $userinfo);

            if ($request->hasFile('file')) {
                foreach ($request->file as $file_upload) {
                    $file = new File();
                    $file->file_name = $file_upload->getClientOriginalName();
                    $file->type = 1;
                    $file->file_url = $file_upload->store('assignment', 'public');
                    $file->modal()->associate($assignment);
                    $file->save();
                }
            }

            $response = array(
                'error' => false,
                'message' => trans('data_store_successfully')
            );
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'exception' => $e
            );
        }
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (!Auth::user()->can('assignment-create')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        $validator = Validator::make($request->all(), [
            "class_section_id" => 'required|numeric',
            "subject_id" => 'required|numeric',
            "name" => 'required',
            "description" => 'nullable',
            'due_date' => ['required', 'date', new AfterNow],
            "points" => 'nullable',
            "resubmission" => 'nullable|boolean',
            "extra_days_for_resubmission" => 'nullable|numeric',

            // 'file_upload' => 'required|numeric',
            // 'video_upload' => 'required|numeric',
        ],[
            'subject_id.numeric' => 'The Subject id is Required'
        ]);


        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first(),
            );
            return response()->json($response);
        }
        try {

            $session_year = getSettings('session_year');
            $session_year_id = $session_year['session_year'];

            $assignment = new Assignment();
            $assignment->class_section_id = $request->class_section_id;
            $assignment->subject_id = $request->subject_id;
            $assignment->name = $request->name;
            $assignment->instructions = $request->instructions;
            $assignment->due_date = $request->due_date;
            $assignment->points = $request->points;
            if ($request->resubmission) {
                $assignment->resubmission = 1;
                $assignment->extra_days_for_resubmission = $request->extra_days_for_resubmission;
            } else {
                $assignment->resubmission = 0;
                $assignment->extra_days_for_resubmission = null;
            }
            $assignment->session_year_id = $session_year_id;

            $subject_name = Subject::where('id', $request->subject_id)->pluck('name')->first();

            $class_subject = ClassSubject::where('subject_id', $request->subject_id)->first();

            if ($class_subject->type == 'Elective') {
                $student_ids = Students::where('class_section_id', $request->class_section_id)->pluck('id');
                $user = [];

                foreach ($student_ids as $student_id) {
                    $student_subject = StudentSubject::where('student_id', $student_id)->where('subject_id', $request->subject_id)->where('session_year_id', $session_year_id)->first();

                    if ($student_subject) {
                        $user[] = Students::where('id', $student_subject->student_id)->where('class_section_id', $request->class_section_id)->pluck('user_id')->first();

                    }
                }

            } else {
                $user = Students::where('class_section_id', $request->class_section_id)->pluck('user_id')->toArray();

            }

            $title = 'New assignment added in ' . $subject_name;
            $body = $request->name;
            $type = "assignment";

            $image = null;
            $userinfo = null;

            $notification = new Notification();
            $notification->send_to = 3;
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

            $assignment->save();
            send_notification($user, $title, $body, $type, $image, $userinfo);

            if ($request->hasFile('file')) {
                foreach ($request->file as $file_upload) {
                    $file = new File();
                    $file->file_name = $file_upload->getClientOriginalName();
                    $file->type = 1;
                    $file->file_url = $file_upload->store('assignment', 'public');
                    $file->modal()->associate($assignment);
                    $file->save();
                }
            }

            $response = array(
                'error' => false,
                'message' => trans('data_store_successfully')
            );
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'exception' => $e
            );
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (!Auth::user()->can('assignment-delete')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try {
            $assignment = Assignment::find($id);
            //            //Delete all the Assignment Submissions first
            //            $assignment_submission = AssignmentSubmission::where('assignment_id', $id)->get();
            //            if ($assignment_submission) {
            //                foreach ($assignment_submission as $submission) {
            //                    if (isset($submission->file)) {
            //                        foreach ($submission->file as $file) {
            //                            if (Storage::disk('public')->exists($file->file_url)) {
            //                                Storage::disk('public')->delete($file->file_url);
            //                            }
            //                        }
            //                        $submission->delete();
            //                    }
            //                }
            //            }
            //
            //            //After that Delete Assignment and its files from the server
            //            if ($assignment->file) {
            //                foreach ($assignment->file as $file) {
            //                    if (Storage::disk('public')->exists($file->file_url)) {
            //                        Storage::disk('public')->delete($file->file_url);
            //                    }
            //                }
            //            }
            //            $assignment->file()->delete();
            $assignment->delete();
            $response = array(
                'error' => false,
                'message' => trans('data_delete_successfully')
            );
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred')
            );
        }
        return response()->json($response);
    }

    public function viewAssignmentSubmission() {
        if (!Auth::user()->can('assignment-submission')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $class_section = ClassSection::with('class', 'section')->get();
        $subjects = Subject::orderBy('id', 'ASC')->get();
        return response(view('assignment.submission', compact('class_section', 'subjects')));
    }

    public function assignmentSubmissionList() {
        if (!Auth::user()->can('assignment-submission')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        $settings = getSettings();
        $session_year_id = $settings['session_year'];

        $offset = request('offset', 0);
        $limit = request('limit', 10);
        $sort = request('sort', 'id');
        $order = request('order', 'ASC');
        $search = request('search');

        $sql = AssignmentSubmission::assignmentsubmissionteachers()->with('assignment.subject', 'student.user:first_name,last_name,id')->where('session_year_id', $session_year_id)
            //search query
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orwhere('session_year_id', 'LIKE', "%$search%")
                        ->orwhere('created_at', 'LIKE', "%" . date('Y-m-d H:i:s', strtotime($search)) . "%")
                        ->orwhere('updated_at', 'LIKE', "%" . date('Y-m-d H:i:s', strtotime($search)) . "%")
                        ->orWhereHas('assignment.subject', function ($query) use ($search) {
                            $query->where('name', 'LIKE', "%$search%");
                        })->orWhereHas('assignment', function ($query) use ($search) {
                            $query->where('name', 'LIKE', "%$search%");
                        })->orWhereHas('student.user', function ($query) use ($search) {
                            $query->whereRaw("concat(users.first_name,' ',users.last_name) LIKE '%" . $search . "%'");
                        });
                });
            })
            //subject filter data
            ->when(request('subject_id') != null,function($query){
                $subject_id = request('subject_id');
                $query->where(function ($query) use ($subject_id) {
                    $query->whereHas('assignment', function ($q) use($subject_id) {
                        $q->where('subject_id', $subject_id);
                    });
                });
            });

        $total = $sql->count();

        $sql->orderBy($sort, $order)->skip($offset)->take($limit);
        $res = $sql->get();
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $no = 1;
        foreach ($res as $row) {
            $row = (object)$row;
            $operate = '<a href=' . route('class.edit', $row->id) . ' class="btn btn-xs btn-gradient-primary btn-rounded btn-icon edit-data" data-id=' . $row->id . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['assignment_id'] = $row->assignment_id;
            $tempRow['assignment_name'] = $row->assignment->name;
            $tempRow['assignment_points'] = $row->assignment->points;
            $tempRow['subject'] = $row->assignment->subject->name .' - '.$row->assignment->subject->type;

            $tempRow['student_id'] = $row->student_id;
            $tempRow['student_name'] = $row->student->user->first_name . ' ' . $row->student->user->last_name;
            $tempRow['text'] = $row->text_submission;
            $tempRow['file'] = $row->file;
            $tempRow['points'] = $row->points;

            $tempRow['session_year_id'] = $row->session_year_id;
            $tempRow['feedback'] = $row->feedback;
            $tempRow['status'] = $row->status;

            $tempRow['created_at'] = convertDateFormat($row->created_at, 'd-m-Y H:i:s');
            $tempRow['updated_at'] = convertDateFormat($row->updated_at, 'd-m-Y H:i:s');
            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }


    public function updateAssignmentSubmission(Request $request, $id) {
        if (!Auth::user()->can('assignment-submission')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            'status' => 'required|numeric',
            'feedback' => 'nullable',
        ]);

        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }

        try {
            $assignment_submission = AssignmentSubmission::findOrFail($id);
            $assignment_submission->feedback = $request->feedback;
            if ($request->status == 1) {
                $assignment_submission->points = $request->points;
            } else {
                $assignment_submission->points = null;
            }
            $assignment_submission->status = $request->status;
            $assignment_submission->save();

            $assignment_data = Assignment::where('id', $assignment_submission->assignment_id)->with('subject')->first();
            $user = Students::select('user_id')->where('id', $assignment_submission->student_id)->get()->pluck('user_id');
            if ($request->status == 2) {
                $title = "Assignment rejected";
                $body = $assignment_data->name . " rejected in " . $assignment_data->subject->name . " subject";
            }
            if ($request->status == 1) {
                $title = "Assignment accepted";
                $body = $assignment_data->name . " accepted in " . $assignment_data->subject->name . " subject";
            }
            $type = "assignment";
            $image = null;
            $userinfo = null;

            $notification = new Notification();
            $notification->send_to = 3;
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
            $response = array(
                'error' => false,
                'message' => trans('data_update_successfully'),
            );
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }
}
