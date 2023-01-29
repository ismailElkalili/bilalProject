@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div dir="rtl" action="{{ URL('/committees/' . $committee->id) }}" method="POST" style="margin-top: 40px">
        @csrf
        <div class="form-group row" style="position: static; display: inline;">
            <label for="committeeName" class="col-sm-4 col-form-label">اسم اللجنة</label>

            <input disabled type="text" class="form-control" value="{{ $committee->name }}" name="committeeName"
                id="committeeName" placeholder="committee Name">

        </div>

        <div class="form-group row" style="position: static; display: inline;">
            <label for="description" class="col-sm-4 col-form-label">وصف اللجنة</label>

            <input disabled type="text" class="form-control" value="{{ $committee->description }}" name="description"
                id="description" placeholder="description">

        </div>



        <div class="form-group">
            <label>مسؤول اللجنة</label>
            <select disabled class="form-control" name="bossID" id="bossID">
                @foreach ($teachers as $teacher)
                    @if ($committee->matser_id == $teacher->id)
                        <option selected value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @else{
                        <option value="">لا يوجد مسؤول</option>
                        }
                    @endif
                @endforeach
            </select>
        </div>


        <div class="card-body rowfloat-right">
            <table class="table table-bordered float-right" style="text-align: right">
                <thead>
                    <th style="width: 10px">الرقم</th>
                    <th>الاسم</th>
                </thead>
                <tbody>
                    @if ($teachers->count() == 0 || ($teachers[0]->id == $committee->matser_id && $teachers->count() == 1))
                        <td></td>
                        <td style="vertical-align: middle; text-align: center;font-size: 18px;">لا يوجد اعضاء</td>
                    @else
                        @foreach ($teachers as $teacher)
                            @if ($committee->matser_id != $teacher->id)
                                <tr>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
        <div class="form-group row " style="margin-top: 20px;">
            <a href="{{ url('committees') }}" class="btn btn-sm  col-sm-1 btn-outline-primary">الرجوع</a>
        </div>

    </div>
@endsection
