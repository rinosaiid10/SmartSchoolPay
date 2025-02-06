@extends('layouts.master')

@section('title')
{{ __('manage') . ' ' . __('exam_result') }}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('manage') . ' ' . __('exam_result') }}
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('exams.show-result') }}" class="create-form" id="formdata">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <select required name="filter_class_id" id="filter_class_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">{{ __('select_class') }}</option>
                                    @foreach ($classes as $data)
                                        <option data-class-section-id="{{$data->id}}"  value="{{ $data->class->id }}"> {{ $data->class->name }}  -  {{$data->section->name}} {{$data->class->medium->name}} {{$data->class->streams->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <select required name="filter_exam_id" id="filter_exam_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">{{ __('select') . ' ' . __('exam') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="show_students_list">
                            <table aria-describedby="mydesc" class='table students_list' id='table_list' data-toggle="table" data-url="{{ route('exams.show-result', 1) }}" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "exam-list-<?= date(' d-m-y') ?>" ,"ignoreColumn":
                                ["operate"]}' data-show-export="true" data-detail-formatter="examListFormatter"
                                data-query-params="getExamResult" data-escape="true">
                                <thead>
                                    <tr>
                                        <th scope="col" data-field="id" data-sortable="true" data-visible="false">{{ __('id') }}</th>
                                        <th scope="col" data-field="no" data-sortable="false">{{ __('no.') }}</th>
                                        <th scope="col" data-field="student_name" data-sortable="false">{{ __('students').' '.__('name') }}</th>
                                        <th scope="col" data-field="total_marks" data-sortable="true">{{ __('total_marks').' '. __('name') }}</th>
                                        <th scope="col" data-field="obtained_marks" data-sortable="true">{{ __('obtained_marks') }}</th>
                                        <th scope="col" data-field="percentage" data-sortable="true">{{ __('percentage') }}</th>
                                        <th scope="col" data-field="grade" data-sortable="true">{{ __('grade') }}</th>
                                        <th scope="col" data-field="session_year_name" data-sortable="false">{{ __('session_years') }}</th>
                                        <th scope="col" data-field="created_at" data-sortable="true" data-visible="false">{{ __('created_at') }}</th>
                                        <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false">{{ __('updated_at') }}</th>
                                        <th scope="col" data-escape="false" data-field="operate" data-sortable="false" data-events="examMarksEvents">{{ __('action') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">
                            {{ __('edit') . ' ' . __('exam_marks') }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="pt-3 edit_exam_result_marks_form" method="post" action="{{ route('exams.update-result-marks') }}" novalidate="novalidate">
                        <input type="hidden" name="edit_id" id="edit_id" value="" />
                        <div class="modal-body">
                            <h5 title="All Subject's marks all compulsory" class="mb-3">
                                <font class="student_name"></font>
                                <span class="fa fa-info-circle pl-2 mx-2"></span>
                            </h5>
                            <hr>
                            <div class="row mx-2">
                                <div class="form-group col-sm-12 col-md-3">
                                    <h5>{{__('subject')}}</h5>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <h5>{{__('total_marks')}}</h5>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <h5>{{__('obtained_marks')}}</h5>
                                </div>
                            </div>
                            <div class="subject_container">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('close') }}</button>
                            <input class="btn btn-theme" type="submit" value={{ __('update') }} />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#search1').on('click', function () {
        $('.show_students_list').show();
        $('.students_table').bootstrapTable('refresh');
    });
    $('#table_list').on('load-success.bs.table', function (e, response) {
        if (response.error == true) {
            showErrorToast(response.message);
            $('.show_students_list').hide();
        }
    });
</script>
@endsection

