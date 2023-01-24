@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card ">
        <div class="card-header" style="margin-top: 12px">
            <h3 class="card-title float-right" style="font-size: 25px">الحلقات</h3>
            <a class="btn btn-info float-left" style="margin-right: 15px" href="{{ URL('/classes/create') }}"> اضافة حلقة جديدة</a>
            {{--  Export Classes File  --}}
            <a class="btn btn-success" href="{{ route('export-classes') }}">تصدير الحلقات</a>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                <thead>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th>القسم</th>
                    <th>مسؤول الحلقة</th>
                    <th>اسم الحلقة</th>
                    <th style="width: 10px">الرقم</th>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>
                                <form method="POST" action="{{ URL('/classes/destroy' . $class->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="sumbit" class="btn btn-outline-danger">حذف</button>
                                </form>
                            </td>

                            <td>
                                <a class="btn btn-outline-info" href="{{ URL('/classes/' . $class->id) }}">عرض</a>

                            </td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ URL('/classes/edit/' . $class->id) }}"><i
                                        class=" nav-icon fas fa-edit"></i></a>

                            </td>
                            @foreach ($departments as $department)
                                @if ($department->id == $class->department_id)
                                    <td>{{ $department->name }}</td>
                                @endif
                            @endforeach

                            @foreach ($teachers as $teacher)
                                @if ($teacher->id == $class->teacher_id)
                                    <td>{{ $teacher->name }}</td>
                                @endif
                            @endforeach

                            <td>{{ $class->name }}</td>
                            <td>{{ $class->id }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection