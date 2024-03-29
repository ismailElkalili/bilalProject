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
    <form class="row" action="{{ URL('/student/store') }}" method="POST" style="margin-top: 15px;text-align: right">
        @csrf
        <div class="form-group " style="position: static; display: inline;">
            <label for="studentName" class="col-sm-4 col-form-label">اسم الطالب</label>
            <input style="text-align: right" type="text" class="form-control" name="studentName" id="studentName"
                placeholder="اسم الطالب">
        </div>

        <div class="form-group " style="position: static; display: inline;">
            <label for="nationid" class="col-sm-4 col-form-label">رقم الهوية</label>
            <input style="text-align: right" type="text" class="form-control" name="nationid" id="nationid"
                placeholder="رقم الهوية">

        </div>

        <div class="form-group " style="position: static; display: inline;">
            <label for="phonenumber" class="col-sm-4 col-form-label">رقم الجوال</label>
            <input style="text-align: right" type="text" class="form-control" name="phonenumber" id="phonenumber"
                placeholder="رقم الجوال">
        </div>

        <div class="form-group " style="position: static; display: inline;">
            <label for="dob" class="col-sm-4 col-form-label">تاريخ الميلاد</label>
            <input style="text-align: right" type="date" class="form-control" name="dob" id="dob"
                placeholder="تاريخ الميلاد">

        </div>

        <div class="form-group " style="position: static; display: inline;">
            <label for="address" class="col-sm-4 col-form-label">العنوان</label>
            <input style="text-align: right" type="text" class="form-control" name="address" id="address"
                placeholder="العنوان">

        </div>


        <div class="form-group " style="position: static; display: inline;">
            <label for="whatsappnumber" class="col-sm-4 col-form-label">رقم الواتساب</label>
            <input style="text-align: right" type="text" class="form-control" name="whatsappnumber" id="whatsappnumber"
                placeholder="الواتساب">
        </div>


        <div class="form-group " style="position: static; display: inline;">
            <label for="fatherjob" class="col-sm-4 col-form-label">وظيفة الاب</label>
            <input style="text-align: right" type="text" class="form-control" name="fatherjob" id="fatherjob"
                placeholder="وظيفة الأب">
        </div>


        <div class="form-group">
            <label for="nationality" class="col-sm-4 col-form-label">الجنسية</label>

            <input style="text-align: right" type="text" class="form-control" name="nationality" id="nationality"
                placeholder="الجنسية">
        </div>


        <!-- select -->
        <div class="form-group">
            <label for="department" class="col-sm-4 col-form-label">القسم</label>
            <select class="form-control custom-select form-control-border"
                style="text-align: right;padding-left:10px"name="departmentID" id="departmentID">
                <option value="">الرجاء اختيار قسم</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>


        <!-- select -->
        <div class="form-group">
            <label for="class" class="col-sm-4 col-form-label">الحلقة</label>
            <select class=" form-control custom-select form-control-border" style="text-align: right;padding-left:10px"
                name="classesID" id="classesID">
                <option value="">الرجاء اختيار حلقة</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group float-left " style="margin-top: 15px;  display: inline;">
            <a href="{{ URL('/student') }}" class="btn btn-outline-danger" style="margin-right: 15px">إلغاء الأمر</a>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </div>
        </div>
    </form>

@endsection



{{--  
$table->date('date_of_birth');
$table->boolean('state');
--}}
