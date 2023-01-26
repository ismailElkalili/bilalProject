@extends('dashboard_layout.dashboard_main')
@section('forms')

<div dir="rtl" class="row">

    <div class="col-md-8 offset-md-2">
        <form action="{{ URL('/student/search') }}" method="GET">
            <span style="position: absolute;margin:12px " align="center">
                <i class="fa fa-search"></i>
            </span>
            <input style="padding-right :50px" type="search" id="studentName" name="studentName"
                class="form-control form-control-lg" placeholder="أدخل اسم الطالب">
        </form>
    </div>

</div>

</div>

    <div class="card ">
        <div class="card-header" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 25px">الطلاب</h3>
            <a class="btn btn-info float-left" style="color: white" href="{{ URL('/student/create/') }}">اضافة طالب</a>
        </div>
        <div class="container  text-center">

            <form action="{{ route('importS') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-top: 10px">
                    <div class="form-group mb-4">
                        <div class="custom-file text-left">
                            <input style="text-align: right;" onchange="getUploadName()" type="file" name="file"
                                class="custom-file-input float-right" id="customFile">
                            <label id="file_name" class="custom-file-label" for="customFile">اختار ملف</label>
                        </div>
                    </div>
                </div>
                <div class=" text-center">
                     {{--  Export Students File  --}}
                    <a class="col-md-3 btn btn-success"
                        style="margin-left: 15px;margin-right: 20px;align-items: center"href="{{ route('export-students') }}">تصدير
                        الطلاب</a>
                    <button class=" col-md-3 btn btn-primary " style="align-items: center;">رفع ملف الطلاب</button>
                </div>
            </form>

            <div>

               

            </div>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                <thead>

                    <th style="width: 15px"></th>
                    <th style="width: 15px"></th>
                    <th style="width: 15px"></th>
                    <th>الحالة</th>
                    <th>الحلقة</th>
                    <th>القسم</th>
                    <th>رقم الواتساب</th>
                    <th>رقم الجوال </th>
                    <th style="width: 80px">اسم الطالب</th>
                    <th style="width: 12px">الرقم</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>

                            <td>
                                <form method="POST" action="{{ URL('/student/archive/' . $student->id) }}">
                                    @csrf
                                    <button type="sumbit" class="btn btn-outline-danger">أرشفة</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-block btn-outline-info"
                                    href="{{ URL('/student/show/' . $student->id) }}">عرض</a>

                            </td>
                            <td>
                                <a href="{{ URL('/student/edit/' . $student->id) }}"
                                    class=" btn btn-block btn-outline-primary btn-sm"><i
                                        class=" nav-icon fas fa-edit"></i></a>

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
            </table>
           
        </div>
    </div>
    {{ $students->links() }}
@endsection
