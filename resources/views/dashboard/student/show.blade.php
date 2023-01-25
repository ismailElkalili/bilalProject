@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div style="margin-top: 40px;text-align: right">

        <div class="form-group row" style="position: static; display: inline;">
            <label for="studentName" class="col-sm-4 col-form-label">اسم الطالب</label>
            <input disabled style="text-align: right" type="text" class="form-control" value="{{ $student->name }}"
                name="studentName" id="studentName" placeholder="student Name">
        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="nationid" class="col-sm-4 col-form-label">رقم الهوية</label>
            <input style="text-align: right" disabled type="text" class="form-control" value="{{ $student->nation_id }}"
                name="nationid" id="nationid" placeholder="nationid">
        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="phonenumber" class="col-sm-4 col-form-label">رقم الجوال</label>
            <input style="text-align: right" disabled type="text" class="form-control"
                value="{{ $student->phone_number }}" name="phonenumber" id="phonenumber" placeholder="phonenumber">
        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="dob" class="col-sm-4 col-form-label">تاريخ الميلاد</label>
            <input style="text-align: right" disabled type="date" value="{{ $student->date_of_birth }}"
                class="form-control" name="dob" id="dob" placeholder="تاريخ الميلاد">
        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="address" class="col-sm-4 col-form-label">العنوان</label>
            <input style="text-align: right" disabled type="text" class="form-control" value="{{ $student->address }}"
                name="address" id="address" placeholder="address">
        </div>


        <div class="form-group row" style="position: static; display: inline;">
            <label for="whatsappnumber" class="col-sm-4 col-form-label">رقم الواتساب</label>
            <input style="text-align: right" disabled type="text" class="form-control"
                value="{{ $student->whatsapp_number }}" name="whatsappnumber" id="whatsappnumber"
                placeholder="whatsappnumber">
        </div>


        <div class="form-group row" style="position: static; display: inline;">
            <label for="fatherjob" class="col-sm-4 col-form-label">وظيفة الاب</label>
            <input style="text-align: right"disabled type="text" class="form-control" value="{{ $student->father_job }}"
                name="fatherjob" id="fatherjob" placeholder="fatherjob">
        </div>


        <div class="form-group row" style="position: static; display: inline;">
            <label for="nationality" class="col-sm-4 col-form-label">الجنسية</label>
            <input style="text-align: right"disabled type="text" class="form-control" value="{{ $student->nationality }}"
                name="nationality" id="nationality" placeholder="nationality">
        </div>

        <!-- select -->
        <div class="form-group row" style="position: static; display: inline;">
            <label>القسم</label>
            <select disabled class="form-control custom-select" name="departmentID" id="departmentID">
                @if (is_null($student->dapartment_id))
                    <option selected value="">لايوجد</option>
                @else
                    @foreach ($departments as $department)
                        @if ($department->id == $student->dapartment_id)
                            <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                        < @else{ <option value="{{ $department->id }}">{{ $department->name }}</option>
                                }
                        @endif
                    @endforeach
                @endif
            </select>
        </div>

        <!-- select -->
        <div class="form-group row" style="position: static; display: inline;">
            <label>الحلقة</label>
            <select disabled class="form-control custom-select" name="classesID" id="classesID">
                @if (is_null($student->class_id))
                    <option selected value="">لايوجد</option>
                @else
                    @foreach ($classes as $class)
                        @if ($department->id == $student->class_id)
                            <option selected value="{{ $class->id }}">{{ $class->name }}</option>
                        @else{
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            }
                        @endif
                    @endforeach
                @endif
            </select>
        </div>


        <div class="col-sm-10" style="text-align: left">
            <a href="{{ URL('/student') }}" class="btn btn-outline-danger">الرجوع</a>
        </div>

    </div>
@endsection



{{--  
$table->date('date_of_birth');
$table->boolean('state');
--}}
