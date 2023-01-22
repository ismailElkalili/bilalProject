@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title float-right" style="font-size: 25px">الأقسام</h3>
            <a class="btn btn-info float-left" href="{{ URL('/departments/create') }}">اضافة قسم جديد</a>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                <thead>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th>المسؤول</th>
                    <th>اسم القسم</th>
                    <th style="width: 10px">الرقم</th>
                </thead>
                <tbody>
                    @foreach ($departments as $departmane)
                        <tr>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ URL('/departments/edit/' . $departmane->id) }}">تعديل</a>

                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ URL('/departments/' . $departmane->id) }}">عرض</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ URL('/departments/destroy' . $departmane->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="sumbit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                            @foreach ($teachers as $teacher)
                                @if ($teacher->id == $departmane->master_id)
                                    <td>{{ $teacher->name }}</td>
                                @endif
                            @endforeach
                            <td>{{ $departmane->name }}</td>
                            <td>{{ $departmane->id }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
