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
    <form action="{{ URL('/teacher/store') }}" method="POST" style="margin-top: 40px">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <div class="col-sm-10">
                <div class="form-group ">
                    <div>
                        <label for="teacherName" class="col-sm-4 col-form-label">اسم المحفظ</label>
                        <input type="text" class="form-control" name="teacherName" id="committeeName"
                            placeholder="اسم المحفظ">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="position: static; display: inline;">
            <div class="col-sm-10">
                <div class="form-group ">
                    <div>
                        <label for="description" class="col-sm-4 col-form-label">رقم الهوية</label>
                        <input type="text" class="form-control" name="nationId" id="description"
                            placeholder="رقم الهوية">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" style="position: static; display: inline;">
            <div class="col-sm-10">
                <label for="description" class="col-sm-4 col-form-label">رقم الجوال</label>
                <input type="text" class="form-control" name="phoneNumber" id="description" placeholder="رقم الجوال">
            </div>
        </div>
        <div class="form-group row" style="position: static; display: inline;">
            <div class="col-sm-10">
                <label for="description" class="col-sm-4 col-form-label">رقم الواتس أب</label>
                <input type="text" class="form-control" name="whatsappNumber" id="description"
                    placeholder="رقم الواتس أب">
            </div>
        </div>
        <div class="form-group row" style="position: static; display: inline;">

            <div class="col-sm-10">
                <label for="description" class="col-sm-4 col-form-label">تاريخ الميلاد</label>
                <input type="date" class="form-control" name="dob" id="description"
                    placeholder="تاريخ الميلاد">
            </div>
        </div>


        <div class="col-sm-10">
            <!-- select -->
            <div class="form-group">
                <label>اللجان</label>
                <select class="  custom-select form-control-border" name="committee" id="committee">
                    <option value="-1"></option>
                    @foreach ($committees as $commite)
                        <option value="{{ $commite->id }}">{{ $commite->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-10">
            <!-- select -->
            <div class="form-group">
                <label>المؤهل العلمي</label>
                <select class="  custom-select form-control-border" name="qualification" id="qualification">
                    <option value="-1"></option>
                    <option value="بكالوريوس">بكالوريوس</option>
                    <option value="دبلوم">دبلوم</option>
                    <option value="توجيهي">توجيهي</option>
                    <option value="ثانوية">ثانوية</option>
                    <option value="ماجستير">ماجستير</option>
                </select>
            </div>
        </div>
        <div class="form-group row" style="position: static; display: inline;">

            <div class="col-sm-10">
                <label for="description" class="col-sm-4 col-form-label">التخصص</label>
                <input type="text" class="form-control" name="specialization" id="description" placeholder="التخصص">
            </div>
        </div>

        <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">اضافة</button>
                <a href="{{ URL('/teacher') }}" class="btn btn-default ">إلغاء الأمر</a>
            </div>
        </div>
    </form>
@endsection
