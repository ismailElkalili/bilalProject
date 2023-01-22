@extends('dashboard_layout.dashboard_main')
@section("forms")
<form action="{{URL('/committees/store')}}" method="POST" style="margin-top: 40px">
    @csrf
    <div class="form-group row" style="position: static; display: inline;">
      <label for="committeeName" class="col-sm-4 col-form-label">Committee Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="committeeName" id="committeeName" placeholder="committee Name">
      </div>
    </div>

    <div class="form-group row" style="position: static; display: inline;">
        <label for="description" class="col-sm-4 col-form-label">Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="description" id="description" placeholder="description">
        </div>
      </div>

      <div class="col-sm-10">
        <!-- select -->
        <div class="form-group">
          <label>Boss</label>
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