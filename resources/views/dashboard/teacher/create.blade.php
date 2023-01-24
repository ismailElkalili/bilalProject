@extends('dashboard_layout.dashboard_main')
@section('forms')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form style="text-align: right;margin-top: 40px" action="{{ URL('/teacher/store') }}" method="POST">
        @csrf

        <div class="form-group ">
            <label for="teacherName" class="col-sm-4 col-form-label">اسم المحفظ</label>
            <input style="text-align: right;" type="text" class="form-control" name="teacherName" id="committeeName"
                placeholder="اسم المحفظ">
        </div>


        <div class="form-group ">
            <label for="description" class="col-sm-4 col-form-label">رقم الهوية</label>
            <input style="text-align: right;" type="text" class="form-control" name="nationId" id="description"
                placeholder="رقم الهوية">
        </div>
        <div class="form-group "><label for="description" class="col-sm-4 col-form-label">رقم الجوال</label>
            <input style="text-align: right;" type="text" class="form-control" name="phoneNumber" id="description"
                placeholder="رقم الجوال">
        </div>
        <div class="form-group ">
            <label for="description" class="col-sm-4 col-form-label">رقم الواتس أب</label>
            <input style="text-align: right;"type="text" class="form-control" name="whatsappNumber" id="description"
                placeholder="رقم الواتس أب">
        </div>

        <div class="form-group ">
            <label for="description" class="col-sm-4 col-form-label">تاريخ الميلاد</label>
            <input style="text-align: right;"type="date" class="form-control" name="dob" id="description"
                placeholder="تاريخ الميلاد">
        </div>
        <div class="form-group ">
            <!-- select -->
            <label>اللجان</label>
            <select style="text-align: right;" class="  custom-select form-control-border" name="committee" id="committee">
                <option value="-1"></option>
                @foreach ($committees as $commite)
                    <option value="{{ $commite->id }}">{{ $commite->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group ">
            <!-- select -->
            <label>المؤهل العلمي</label>
            <select style="text-align: right;" class="  custom-select form-control-border" name="qualification"
                id="qualification">
                <option value="-1"></option>
                <option value="بكالوريوس">بكالوريوس</option>
                <option value="دبلوم">دبلوم</option>
                <option value="توجيهي">توجيهي</option>
                <option value="ثانوية">ثانوية</option>
                <option value="ماجستير">ماجستير</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-4 col-form-label">التخصص</label>
            <input style="text-align: right;" type="text" class="form-control" name="specialization" id="description"
                placeholder="التخصص">

        </div>


    </form>
    <div class="form-group " style="text-align:left">
        <a href="{{ URL('/teacher') }}" class="btn btn-danger" style="margin-right: 15px">إلغاء الأمر</a>
        <button type="submit" class="btn btn-primary">اضافة</button>
       
    </div>

@endsection
