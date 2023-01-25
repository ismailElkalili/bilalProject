@extends('dashboard_layout.dashboard_main')
@section('forms')
{{--  @dump($teachers)  --}}
    <form action="{{ URL('/classes/store') }}" method="POST" style="margin-top: 40px;text-align: right;">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <label for="classesName" class="col-sm-4 col-form-label">اسم الحلقة</label>
            <input style="text-align: right" type="text" class="form-control" name="classesName" id="classesName"
                placeholder="اسم الحلقة">
        </div>
        <!-- select -->
        <div class="form-group">
            <label>المسؤول 
            </label>
            <select style="text-align: right" class="form-control custom-select" name="teacherID" id="teacherID">
                @foreach ($teachers as $teacher)
                        @if ($teacher['Classes'] == null)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endif
                @endforeach
            </select>
        </div>

        <!-- select -->
        <div class="form-group">
            <label>القسم</label>
            <select style="text-align: right" class="form-control custom-select" name="departmentID" id="departmentID">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group float-left" style="margin-top: 35px;position: static;  display: inline;">
            <a href="{{ URL('/classes') }}" class="btn btn-outline-danger" style="margin-right: 15px">إلغاء الأمر</a>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </div>
    </form>
@endsection
