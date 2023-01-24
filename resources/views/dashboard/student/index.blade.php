@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card ">
        <div class="card-header" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 25px">الطلاب</h3>
            <a class="btn btn-info float-left" href="{{ URL('/student/create/') }}">اضافة طالب</a>
        </div>
        <div class="container  text-center">
            <div class="row" style="margin-top: 10px">
                <form action="{{ route('importS') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <div class="custom-file text-left">
                            <input onchange="getUploadName()" type="file" name="file" class="custom-file-input"
                                id="customFile">
                            <label id="file_name" class="custom-file-label" for="customFile">اختار ملف</label>
                        </div>
                    </div>
                    <button class="btn btn-primary " style="align-items: center;">رفع ملف الطلاب</button>
                </form>
            </div>
            <div>
              
                {{--  Export Students File  --}}
                <a class="btn btn-success"
                    style="margin-left: 15px;align-items: center"href="{{ route('export-students') }}">تصدير
                    الطلاب</a>
            </div>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                <thead>

                    {{-- <th style="width: 15px"></th> --}}
                    <th style="width: 15px"></th>
                    <th></th>
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

                            <td>
                                <a class="btn btn-block btn-outline-info" href="{{ URL('/student/' . $student->id) }}">عرض</a>

                            </td>
                            <td>
                                <a href="{{ URL('/student/edit/' . $student->id) }}"
                                    class=" btn btn-block btn-outline-primary btn-sm"><i
                                        class=" nav-icon fas fa-edit"></i></a>

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
