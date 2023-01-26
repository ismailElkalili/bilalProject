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
    <form action="{{ URL('/committees/update/' . $committee->id) }}" class="row float-right" method="POST"
        style="margin-top: 12px;text-align: right">
        @csrf
        <div class="form-group ">
            <label for="committeeName" class="col-sm-4 col-form-label">اسم اللجنة</label>
            <input style="text-align: right" type="text" class="form-control" value="{{ $committee->name }}"
                name="committeeName" id="committeeName" placeholder="committee Name">
        </div>
        <div class="form-group ">
            <label for="description" class="col-sm-4 col-form-label">وصف اللجنة</label>

            <input style="text-align: right" type="text" class="form-control" value="{{ $committee->description }}"
                name="description" id="description" placeholder="description">
        </div>
        <div class="form-group">
            <label for="bossID" class="col-sm-4 col-form-label">مسؤول اللجنة</label>
            <select style="text-align: right" class="form-control custom-select" name="bossID" id="bossID">
                @foreach ($teachers as $teacher)
                    @if ($committee->matser_id == $teacher->id)
                        <option selected value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @else{
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        }
                    @endif
                @endforeach
            </select>

        </div>
        <div class="form-group ">
            <a href="{{ url('/committees') }}" class="btn btn-outline-danger">الغاء الأمر</a>
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
    </form>
@endsection
