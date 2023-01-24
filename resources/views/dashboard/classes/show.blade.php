@extends('dashboard_layout.dashboard_main')
@section('forms')
    <form action="{{ URL('/classes/' . $classes->id) }}" method="POST" style="margin-top: 40px">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <label for="classesName" class="col-sm-4 col-form-label">اسم الحلقة</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" value="{{ $classes->name }}" name="classesName" id="classesName"
                    placeholder="اسم الحلقة">
            </div>
        </div>
        <div class="col-sm-10">
            <!-- select -->
            <div class="form-group">
                <label>المسؤول</label>
                <select  disabled class="form-control" name="teacherID" id="teacherID">
                    @foreach ($teachers as $teacher)
                        @if ($teacher->id == $classes->teacher_id)
                            <option selected value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @else
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-10">
            <!-- select -->
            <div class="form-group">
                <label>القسم</label>
                <select disabled class="form-control" name="departmentID" id="departmentID">
                    @foreach ($departments as $department)
                        @if ($department->id == $classes->department_id)
                            <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                            @else
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

    {{--  ///////////////////////////////  --}}
    <div class="col-sm-12" >
    <div class="card-body">
        <table class="table table-bordered float-right" style="text-align: right">
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
            <tbody >
                @foreach ($students as $student)
                @if($student-> class_id == $classes->id)
                    <tr>
                        <td>
                            <a class="btn btn-primary" href="{{ URL('/student/edit/' . $student->id) }}">تعديل</a>
    
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ URL('/student/' . $student->id) }}">عرض</a>
    
                        </td>
                        {{-- <td>
                            <form method="POST" action="{{ URL('/student/destroy' . $student->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                                <button type="sumbit" class="btn btn-danger">حذف</button>
                            </form>
                        </td> --}}
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
                    @endif
                @endforeach
    
            </tbody>
        </table>
    </div>
</div>
    
    {{--  ////////////////////////////  --}}



        <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>

    </form>

@endsection
