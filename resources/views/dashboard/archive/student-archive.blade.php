@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card ">
        <div class="card-header" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 25px">الطلاب</h3>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">


                @if ($students->count() == 0)
                    <td style="vertical-align: middle; text-align: center;font-size: 18px;">
                        لا يوجد بيانات
                    </td>
                @else
                    <thead>

                        <th></th>
                        <th style="width: 15px"></th>
                        <th style="width: 15px"></th>
                        <th>الحالة</th>
                        <th>الحلقة</th>
                        <th>القسم</th>
                        <th>رقم الواتساب</th>
                        <th>رقم الجوال </th>
                        <th>اسم الطالب</th>
                        <th style="width: 10px">الرقم</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                {{-- {{ dd($student) }} --}}
                                <td>
                                    <form method="POST" action="{{ URL('/student/destroy/' . $student->id) }}">
                                        @csrf
                                        <button type="sumbit" class="btn btn-danger">حذف نهائي</button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-block btn-outline-info"
                                        href="{{ URL('/student/show/' . $student->id) }}">عرض</a>

                                </td>
                                <td>
                                    <form method="POST" action="{{ URL('/student/restore/' . $student->id) }}">
                                        @csrf
                                        <button type="sumbit" class="btn btn-outline-primary">استعادة</button>
                                    </form>
                                </td>

                                @if ($student->state == 0)
                                    <td>منتظم</td>
                                @else
                                    <td>منقطع</td>
                                @endif
                                @if (is_null($student->class_id))
                                    <td>لايوجد</td>
                                @else
                                    @foreach ($classes as $class)
                                        @if ($student->class_id == $class->id)
                                            <td>{{ $class->name }}</td>
                                        @endif
                                    @endforeach
                                @endif
                                @if (is_null($student->class_id))
                                    <td>لايوجد</td>
                                @else
                                    @foreach ($departments as $department)
                                        @if ($student->dapartment_id == $department->id)
                                            <td>{{ $department->name }}</td>
                                        @endif
                                    @endforeach
                                @endif
                                </td>
                                <td>{{ $student->whatsapp_number }}</td>
                                <td>{{ $student->phone_number }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>
@endsection
