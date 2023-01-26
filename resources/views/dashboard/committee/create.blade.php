@extends('dashboard_layout.dashboard_main')
@section('forms')
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
    <form action="{{ URL('/committees/store') }}" method="POST" style="margin-top: 12px; text-align: right">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <label for="committeeName" class="col-sm-4 col-form-label">اسم اللجنة</label>
            <input style="text-align: right" type="text" class="form-control" name="committeeName" id="committeeName"
                placeholder="اسم اللجنة">
        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="description" class="col-sm-4 col-form-label">وصف اللجنة</label>
            <input style="text-align: right" type="text" class="form-control" name="description" id="description"
                placeholder="وصف اللجنة">
        </div>

        <!-- select -->
        <div class="form-group">
            <label>مسؤول اللجنة</label>
            <select style="text-align: right"class="form-control" name="bossID" id="bossID">
                <option value="">اختر مسؤول اللجنة</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group  float-left" style="margin-top: 35px;  display: inline;">
            <a href="{{ URL('/committees') }}" class="btn btn-outline-danger" style="margin-right: 15px">إلغاء الأمر</a>
            <button type="submit" class="btn btn-primary">إضافة</button>

        </div>
    </form>

@endsection
