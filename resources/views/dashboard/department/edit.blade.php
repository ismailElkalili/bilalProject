@extends('dashboard_layout.dashboard_main')
@section('forms')
    <form action="{{ URL('/departments/update/' . $departments->id) }}" method="POST"
        style="margin-top: 12px ;text-align: right">
        @csrf
        <div class="form-group">
            <label for="departmentName" class=" col-form-label">اسم القسم</label>

            <input style="text-align: right"type="text" class="form-control" name="departmentName"
                value="{{ $departments->name }}" id="departmentName" placeholder="اسم القسم">

        </div>

        <!-- select -->
        <div class="form-group">
            <label for="bossID" class=" col-form-label">المسؤول</label>
            <select style="text-align: right" class="form-control" name="bossID" id="bossID">

                @if (is_null($teacherClass))
                    <option value="">لا يوجد مسؤول</option>
                @elseif ($teacherClass->id == $departments->teacher_id)
                    <option value="">لا يوجد مسؤول</option>
                    <option selected value="{{ $teacherClass->id }}">{{ $teacherClass->name }}</option>
                @endif
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group " style="margin-top: 35px;position: static;  display: inline;">
            <a href="{{ url('/departments/index') }}" class="btn btn-outline-danger">الغاء الأمر</a>
            <button type="submit" style="margin-left: 20px" class="btn btn-primary">تعديل</button>
        </div>

    </form>
@endsection
