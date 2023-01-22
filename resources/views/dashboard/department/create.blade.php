@extends('dashboard_layout.dashboard_main')
@section("forms")
<form action="{{URL('/departments/store')}}" method="POST" style="margin-top: 40px">
    @csrf
    <div class="form-group row" style="position: static; display: inline;">
      <label for="departmentName" class="col-sm-4 col-form-label">اسم القسم</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="departmentName" id="departmentName" placeholder="اسم القسم">
      </div>
    </div>
      <div class="col-sm-10">
        <!-- select -->
        <div class="form-group">
          <label>المسؤول</label>
          <select class="form-control" name="bossID" id="bossID">
            @foreach ($teachers as $teacher)
            <option value="{{$teacher -> id}}" >{{$teacher -> name}}</option>
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