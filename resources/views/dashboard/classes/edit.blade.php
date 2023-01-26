@extends('dashboard_layout.dashboard_main')
@section('forms')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="text-align: right">

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
    <form dir="rtl" action="{{ URL('/classes/update/' . $classes->id) }}" method="POST" style="margin-top: 40px">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <label for="classesName" class="col-sm-4 col-form-label">اسم الحلقة</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $classes->name }}" name="classesName" id="classesName"
                    placeholder="اسم الحلقة">
            </div>
        </div>
        <div class="col-sm-10">
            <!-- select -->
            <div class="form-group">
                <label>المسؤول</label>
                <select class="form-control" name="teacherID" id="teacherID">
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
                <select class="form-control" name="departmentID" id="departmentID">
                    @if (is_null($classes->department_id))
                        <option value="">أختر القسم</option>
                    @else
                        @foreach ($departments as $department)
                            @if ($department->id == $classes->department_id)
                                <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                            @else
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
            <div class="col-sm-10">
                <button type="submit" style="margin-left: 15px" class="btn btn-primary">تعديل</button>
                <a href="{{ url('/classes') }}" class="btn btn-outline-danger">الغاء الأمر</a>
            </div>
        </div>

    </form>
@endsection
