@extends('dashboard_layout.dashboard_main')
@section('forms')
    <form action="{{ URL('/classes/update/' . $classes->id) }}" method="POST" style="margin-top: 40px">
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

        <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>

    </form>
@endsection
