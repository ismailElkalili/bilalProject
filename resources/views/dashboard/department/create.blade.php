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
    <form class="row" action="{{ URL('/departments/store') }}" method="POST" style="margin-top: 15px;text-align: right">
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
                <option value="-1">اختر مسؤول القسم</option>
                
                @foreach ($teachers as $teacher)
                 @if($teacher['Department'] == null)  
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                 @endif
                @endforeach
            </select>
        </div>
        <div class="form-group  float-right" style="margin-top: 35px;  display: inline;">
            <a href="{{ URL('/departments/index') }}" class="btn btn-outline-danger" style="margin-right: 15px">إلغاء
                الأمر</a>
            <button type="submit" class="btn btn-primary">إضافة</button>

        </div>
    </form>
@endsection
