@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title float-right" style="font-size: 25px">الطلاب</h3>
            <a class="btn btn-info float-left" href="{{ URL('/student/create/') }}">اضافة</a>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                <thead>
                    <th style="width: 15px"></th>
                    {{-- <th style="width: 15px"></th> --}}
                    <th style="width: 15px"></th>
                    <th>الحالة</th>
                    <th>الحلقة</th>
                    <th>القسم</th>
                    <th>رقم الواتساب</th>
                    <th>رقم الجوال </th>
                    <th>اسم الطالب</th>
                    <th style="width: 10px">الرقم</th>
                </thead>
                <tbody >
                    @foreach ($students as $student)
                       
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="{{ URL('/student/edit/' . $student->id) }}">تعديل</a>
    
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ URL('/student/' . $student->id) }}">عرض</a>
    
                            </td>
                            {{-- <td>
                                <form method="POST" action="{{ URL('/student/destroy' . $student->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                                    <button type="sumbit" class="btn btn-danger">حذف</button>
                                </form>
                            </td> --}}
                            @if ($student->state == 0)
                                <td>منتظم</td>
                            @else
                                <td>منقطع</td>
                            @endif
                            @foreach ($classes as $class)
                                @if ($student->class_id == $class->id)
                                    <td>{{ $class->name }}</td>
                                @endif
                            @endforeach

                            @foreach ($departments as $department)
                                @if ($student->dapartment_id == $department->id)
                                    <td>{{ $department->name }}</td>
                                @endif
                            @endforeach
                            </td>
                            <td>{{ $student->whatsapp_number }}</td>
                            <td>{{ $student->phone_number }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->id }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
