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
    <form action="{{ URL('/student/update/' . $student->id) }}" method="POST" style="margin-top: 15px;text-align: right">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <label for="studentName" class="col-sm-4 col-form-label">اسم الطالب</label>

            <input style="text-align: right" type="text" class="form-control" value="{{ $student->name }}"
                name="studentName" id="studentName" placeholder="student Name">

        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="nationid" class="col-sm-4 col-form-label">رقم الهوية</label>

            <input style="text-align: right"type="text" class="form-control" value="{{ $student->nation_id }}"
                name="nationid" id="nationid" placeholder="nationid">

        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="phonenumber" class="col-sm-4 col-form-label">رقم الجوال</label>

            <input style="text-align: right"type="text" class="form-control" value="{{ $student->phone_number }}"
                name="phonenumber" id="phonenumber" placeholder="phonenumber">

        </div>

        <div class="form-group row" style="position: static; display: inline;">

            <label for="dob" class="col-sm-4 col-form-label">تاريخ الميلاد</label>
            <input style="text-align: right"type="date" value="{{ $student->date_of_birth }}" class="form-control"
                name="dob" id="dob" placeholder="تاريخ الميلاد">
        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="address" class="col-sm-4 col-form-label">العنوان</label>

            <input style="text-align: right"type="text" class="form-control" value="{{ $student->address }}"
                name="address" id="address" placeholder="address">

        </div>


        <div class="form-group row" style="position: static; display: inline;">
            <label for="whatsappnumber" class="col-sm-4 col-form-label">رقم الواتساب</label>

            <input style="text-align: right"type="text" class="form-control" value="{{ $student->whatsapp_number }}"
                name="whatsappnumber" id="whatsappnumber" placeholder="whatsappnumber">

        </div>


        <div class="form-group row" style="position: static; display: inline;">
            <label for="fatherjob" class="col-sm-4 col-form-label">وظيفة الاب</label>

            <input style="text-align: right"type="text" class="form-control" value="{{ $student->father_job }}"
                name="fatherjob" id="fatherjob" placeholder="fatherjob">

        </div>


        <div class="form-group row" style="position: static; display: inline;">
            <label for="nationality" class="col-sm-4 col-form-label">الجنسية</label>

            <input style="text-align: right"type="text" class="form-control" value="{{ $student->nationality }}"
                name="nationality" id="nationality" placeholder="nationality">

        </div>


        <div class="form-group">
            <label>القسم</label>
            <select style="text-align: right" class="form-control custom-select" name="departmentID" id="departmentID">
                @if (is_null($student->class_id))
                    <option value="">غير مدرج في أي قسم</option>
                @endif
                @foreach ($departments as $department)
                    @if ($department->id == $student->dapartment_id)
                        <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                    @else
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>


        <!-- select -->
        <div class="form-group">
            <label>الحلقة</label>
            <select style="text-align: right" class="form-control custom-select" name="classesID" id="classesID">
                @if (is_null($student->class_id))
                    <option value="">غير موجود في حلقة</option>
                @endif
                @foreach ($classes as $class)
                    @if ($department->id == $student->class_id)
                        <option selected value="{{ $class->id }}">{{ $class->name }}</option>
                    @else{
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        }
                    @endif
                @endforeach
            </select>
        </div>


        <!-- select -->
        <div class="form-group">
            <label>القسم</label>
            <select style="text-align: right" class="form-control custom-select" name="state" id="state">
                @if ($student->state == 0)
                    <option selected value="0">منتظم</option>
                    <option value="1">منقطع</option>
                @else
                    <option selected value="1">منقطع</option>
                    <option value="0">منتظم</option>
                @endif
            </select>
        </div>
        </div>

        <div class="form-group " style="margin: 15px 0px 15px 0px ">
            <a href="{{ URL('/student') }}" class="btn btn-outline-danger ">الغاء الامر</a>
            <button type="submit" style="margin-left: 20px"class="btn btn-primary   ">تعديل</button>
        </div>

    </form>
@endsection
