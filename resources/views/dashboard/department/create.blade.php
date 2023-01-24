@extends('dashboard_layout.dashboard_main')
@section('forms')
    <form action="{{ URL('/departments/store') }}" method="POST" style="margin-top: 15px;text-align: right">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <label for="departmentName" class="col-sm-4 col-form-label">اسم القسم</label>
            <input style="text-align: right" type="text" class="form-control" name="departmentName" id="departmentName"
                placeholder="اسم القسم">
        </div>

        <!-- select -->
        <div class="form-group row" style="position: static; display: inline;">
            <label for="bossID" class="col-sm-4 col-form-label">المسؤول</label>
            <select class=" form-control custom-select form-control-border" style="text-align: right;padding-left:10px"
                name="bossID" id="bossID">
                <option value="-1">اختر مسؤول اللجنة</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">إضافة</button>
        </div>
    </div>
@endsection
