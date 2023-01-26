@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div dir="rtl" class="row">

        <div class="col-md-8 offset-md-2">
            <form action="{{ URL('/classes/search') }}" method="GET">
                <span style="position: absolute;margin:12px " align="center">
                    <i class="fa fa-search"></i>
                </span>
                <input style="padding-right :50px" type="search" id="className" name="className"
                    class="form-control form-control-lg" placeholder="أدخل اسم الحلقة">
            </form>
        </div>

    </div>

    </div>


    <div class="card ">
        <div class="card-header" style="margin-top: 12px">
            <h3 class="card-title float-right" style="font-size: 25px">الحلقات</h3>
            <a class="btn btn-info float-left" style="margin-right: 15px" href="{{ URL('/classes/create') }}"> اضافة حلقة
                جديدة</a>
            {{--  Export Classes File  --}}
            <a class="btn btn-success" href="{{ route('export-classes') }}">تصدير الحلقات</a>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                @if ($classes->count() == 0)
                    <td style="vertical-align: middle; text-align: center;font-size: 18px;">
                        لا يوجد بيانات
                    </td>
                @else
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
                                    <form method="POST" action="{{ URL('/classes/destroy/' . $class->id) }}">
                                        @csrf
                                        <button type="sumbit" class="btn btn-outline-danger">حذف</button>
                                    </form>
                                </td>

                                <td>
                                    <a class="btn btn-outline-info" href="{{ URL('/classes/show/' . $class->id) }}">عرض</a>

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
                @endif
            </table>
        </div>
    </div>
@endsection
