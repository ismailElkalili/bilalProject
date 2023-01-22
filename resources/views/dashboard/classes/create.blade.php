@extends('dashboard_layout.dashboard_main')
@section("forms")
<form action="{{URL('/classes/store')}}" method="POST" style="margin-top: 40px">
    @csrf
    <div class="form-group row" style="position: static; display: inline;">
      <label for="classesName" class="col-sm-4 col-form-label">اسم الحلقة</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="classesName" id="classesName" placeholder="اسم الحلقة">
      </div>
    </div>
      <div class="col-sm-10">
        <!-- select -->
        <div class="form-group">
          <label>المسؤول</label>
          <select class="form-control" name="teacherID" id="teacherID">
            @foreach ($teachers as $teacher)
            <option value="{{$teacher -> id}}" >{{$teacher -> name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-sm-10">
        <!-- select -->
        <div class="form-group">
          <label>القسم</label>
          <select class="form-control" name="departmentID" id="departmentID">
            @foreach ($departments as $department)
            <option value="{{$department -> id}}" >{{$department -> name}}</option>
            @endforeach
          </select>
        </div>
      </div>

    <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>

  </form> 
@endsection