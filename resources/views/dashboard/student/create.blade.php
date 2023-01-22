@extends('dashboard_layout.dashboard_main')
@section("forms")
<form action="{{URL('/student/store')}}" method="POST" style="margin-top: 40px">
    @csrf
    <div class="form-group row" style="position: static; display: inline;">
      <label for="studentName" class="col-sm-4 col-form-label">اسم الطالب</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="studentName" id="studentName" placeholder="اسم الطالب">
      </div>
    </div>

    <div class="form-group row" style="position: static; display: inline;">
        <label for="nationid" class="col-sm-4 col-form-label">رقم الهوية</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nationid" id="nationid" placeholder="رقم الهوية">
        </div>
      </div>

      <div class="form-group row" style="position: static; display: inline;">
        <label for="phonenumber" class="col-sm-4 col-form-label">رقم الجوال</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="رقم الجوال">
        </div>
      </div>

      <div class="form-group row" style="position: static; display: inline;">
        <div class="col-sm-10">
            <label for="dob" class="col-sm-4 col-form-label">تاريخ الميلاد</label>
            <input type="date" class="form-control" name="dob" id="dob"
                placeholder="تاريخ الميلاد">
        </div>

    </div>

      <div class="form-group row" style="position: static; display: inline;">
        <label for="address" class="col-sm-4 col-form-label">العنوان</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="address" id="address" placeholder="العنوان">
        </div>
      </div>


      <div class="form-group row" style="position: static; display: inline;">
        <label for="whatsappnumber" class="col-sm-4 col-form-label">رقم الواتساب</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="whatsappnumber" id="whatsappnumber" placeholder="الواتساب">
        </div>
      </div>


      <div class="form-group row" style="position: static; display: inline;">
        <label for="fatherjob" class="col-sm-4 col-form-label">وظيفة الاب</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="fatherjob" id="fatherjob" placeholder="وظيفة الأب">
        </div>
      </div>


      <div class="form-group row" style="position: static; display: inline;">
        <label for="nationality" class="col-sm-4 col-form-label">الجنسية</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nationality" id="nationality" placeholder="الجنسية">
        </div>
      </div>

      <div class="col-sm-10">
        <!-- select -->
        <div class="form-group">
          <label>القسم</label>
          <select class="form-control" name="departmentID" id="departmentID">
             @foreach ($departments as $department)
            <option value="{{$department -> id}}">{{$department -> name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-sm-10">
        <!-- select -->
        <div class="form-group">
          <label>الحلقة</label>
          <select class="form-control" name="classesID" id="classesID">
             @foreach ($classes as $class)
            <option value="{{$class -> id}}">{{$class -> name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      
    <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">إضافة</button>
      </div>
    </div>

  </form> 
@endsection



{{--  
$table->date('date_of_birth');
$table->boolean('state');
--}}  