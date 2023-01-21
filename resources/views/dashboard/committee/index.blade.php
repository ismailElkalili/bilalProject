@extends('dashboard_layout.dashboard_main')
@section('forms')

<a class="btn btn-primary" href="{{ URL('/dashborad/committees/create/') }}">اضافة</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">اللجان</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th style="width: 10px">الرقم</th>
                    <th>اسم اللجنة</th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                </thead>
                <tbody>
                    @foreach ($committees as $committee)
                        <tr>
                            <td>{{ $committee->id }}</td>
                            <td>{{ $committee->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ URL('/dashborad/committees/edit/' . $committee->id) }}">تعديل</a>

                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ URL('/dashborad/committees/' . $committee->id) }}">عرض</a>

                            </td>
                            <td>
                                <form method="POST" action="{{ URL('/dashborad/committees/destroy' . $committee->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="sumbit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>

                    
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
