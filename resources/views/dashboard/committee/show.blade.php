@extends('dashboard_layout.dashboard_main')
@section("forms")
<form action="{{URL('/committees/'.$committee->id)}}" method="POST" style="margin-top: 40px">
    @csrf
    <div class="form-group row" style="position: static; display: inline;">
      <label for="committeeName" class="col-sm-4 col-form-label">Committee Name</label>
      <div class="col-sm-10">
        <input disabled type="text" class="form-control" value="{{$committee->name}}" name="committeeName" id="committeeName" placeholder="committee Name">
      </div>
    </div>

    <div class="form-group row" style="position: static; display: inline;">
        <label for="description" class="col-sm-4 col-form-label">Description</label>
        <div class="col-sm-10">
          <input disabled type="text" class="form-control"  value="{{$committee->description}}" name="description" id="description" placeholder="description">
        </div>
      </div>

      <div class="col-sm-10">
        <!-- select -->
        <div class="form-group">
          <label>Boss</label>
          <select disabled class="form-control" name="bossID" id="bossID" >
            @foreach ($teachers as $teacher)

            @if ($committee->matser_id == $teacher -> id )
            <option selected value="{{$teacher -> id}}" >{{$teacher -> name}}</option>
            @else{
                <option  value="{{$teacher -> id}}" >{{$teacher -> name}}</option>
            }
            @endif
            
            @endforeach
          </select>
        </div>
      </div>

      @foreach ($teachers as $teacher)
      @if ($committee->matser_id != $teacher -> id && $teacher ->committees_id == $committee->id)
      <div class="icheck-primary d-inline">
        <input type="checkbox" id="{{$teacher -> id}}" checked="">
            <label for="{{$teacher -> id}}">
                {{$teacher -> name}}
            </label>
      </div>
      <br>
      @endif
      @endforeach
    <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">تعديل الاعضاء</button>
      </div>
    </div>

  </form> 
@endsection