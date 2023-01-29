@extends('dashboard_layout.dashboard_main')
@section('forms')
    {{--  Export Classes File  --}}
    <a class="btn btn-sm btn-success col-sm-2" style="color: white;margin-left: 15px"
        href="{{ URL('/export-class/' . $classes->id) }}">تصدير بيانات الحلقة</a>

    <form action="" method="" style="margin-top: 12px;text-align: right;">
        @csrf
        <div class="form-group">
            <label for="classesName" class="col-sm-4 col-form-label">اسم الحلقة</label>
            <input style="text-align: right;"disabled type="text" class="form-control" value="{{ $classes->name }}"
                name="classesName" id="classesName" placeholder="اسم الحلقة">
        </div>

        <div class="form-group">
            <label for="teacherID" class="col-sm-4 col-form-label">المسؤول</label>
            <select style="text-align: right;" disabled class="form-control" name="teacherID" id="teacherID">
                @foreach ($teachers as $teacher)
                    @if ($teacher->id == $classes->teacher_id)
                        <option selected value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @else
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!-- select -->
        <div class="form-group">
            <label for="departmentID" class="col-sm-4 col-form-label">القسم</label>
            <select disabled style="text-align: right;" class="form-control" name="departmentID" id="departmentID">
                @foreach ($departments as $department)
                    @if ($department->id == $classes->department_id)
                        <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                    @else
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        {{--  ///////////////////////////////  --}}
        <div class="col-sm-12">
            <div class="card-body">
                <table class="table table-bordered float-right" style="text-align: right">
                    @if ($students->count() == 0)
                        <td style="vertical-align: middle; text-align: center;font-size: 18px;">لا يوجد طلاب</td>
                    @else
                        <thead>
                            <th style="width: 15px"></th>
                            {{-- <th style="width: 15px"></th> --}}
                            <th style="width: 15px"></th>
                            <th>الحالة</th>
                            <th>القسم</th>
                            <th>رقم الواتساب</th>
                            <th>رقم الجوال </th>
                            <th>اسم الطالب</th>
                            <th style="width: 10px">الرقم</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <a class="btn btn-outline-info"
                                            href="{{ URL('/student/' . $student->id) }}">عرض</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary"
                                            href="{{ URL('/student/edit/' . $student->id) }}"><i
                                                class=" nav-icon fas fa-edit"></i></a>
                                    </td>
                                    @if ($student->state == 0)
                                        <td>منتظم</td>
                                    @else
                                        <td>منقطع</td>
                                    @endif
                                    @foreach ($departments as $department)
                                        @if ($student->dapartment_id == $department->id)
                                            <td>{{ $department->name }}</td>
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>{{ $student->whatsapp_number }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->id }}</td>
                                </tr>
                            @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>

        {{--  ////////////////////////////  --}}





    </form>
    <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
        <div class="col-sm-10">
            <a href="{{ URL('/classes/index') }}" class="btn btn-outline-danger">الرجوع للخلف</a>
        </div>
    </div>
@endsection
