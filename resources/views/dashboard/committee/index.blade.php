@extends('dashboard_layout.dashboard_main')
@section('forms')
<div class="card ">
    <div class="card-header">
        <h3 class="card-title float-right" style="font-size: 25px">اللجان</h3>
        <a class="btn btn-info float-left" href="{{ URL('/committees/create') }}">اضافة</a>
    </div>
    <div class="card-body float-right">
        <table class="table table-bordered float-right" style="text-align: right">
                <thead>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th>اسم اللجنة</th>
                    <th style="width: 10px">الرقم</th>
                </thead>
                <tbody>
                    @foreach ($committees as $committee)
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="{{ URL('/committees/edit/' . $committee->id) }}">تعديل</a>

                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ URL('/committees/' . $committee->id) }}">عرض</a>

                            </td>
                            <td>
                                <form method="POST" action="{{ URL('/committees/destroy' . $committee->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="sumbit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                            <td>{{ $committee->name }}</td>
                            <td>{{ $committee->id }}</td>
                        </tr>

                    
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
