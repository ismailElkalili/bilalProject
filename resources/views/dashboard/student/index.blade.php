@extends('dashboard_layout.dashboard_main')
@section('forms')
    <a class="btn btn-primary" href="{{ URL('/student/create/') }}">اضافة</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">اللجان</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th style="width: 10px">الرقم</th>
                    <th>اسم الطالب</th>
                    <th>رقم الجوال </th>
                    <th>رقم الواتساب</th>
                    <th>القسم</th>
                    <th>الحلقة</th>
                    <th>الحالة</th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->phone_number }}</td>
                            <td>{{ $student->whatsapp_number }}</td>

                            @foreach ($departments as $department)
                                @if ($student->dapartment_id == $department->id)
                                    <td>{{ $department->name }}</td>
                                @endif
                            @endforeach

                            @foreach ($classes as $class)
                                @if ($student->class_id == $class->id)
                                    <td>{{ $class->name }}</td>
                                @endif
                            @endforeach


                            @if ($student->state == 0)
                                <td>منتظم</td>
                            @else
                                <td>منقطع</td>
                            @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ URL('/student/edit/' . $student->id) }}">تعديل</a>

                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ URL('/student/' . $student->id) }}">عرض</a>

                            </td>
                            <td>
                                <form method="POST" action="{{ URL('/student/destroy' . $student->id) }}">
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
