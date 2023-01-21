@extends('dashboard_layout.dashboard_main')
@section("forms")
<form action="{{URL('/committee/store')}}" method="POST" style="margin-top: 40px">
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


      <div class="form-group row" style="position: static; display: inline;">
        <label for="boss" class="col-sm-4 col-form-label">Boss</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
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