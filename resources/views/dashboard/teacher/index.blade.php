@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div dir="rtl" class="row">

        <div class="col-md-8 offset-md-2">
            <form action="{{ URL('/teacher/search') }}" method="GET">
                <span style="position: absolute;margin:12px " align="center">
                    <i class="fa fa-search"></i>
                </span>
                <input style="padding-right :50px" type="search" id="teacherName" name="teacherName"
                    class="form-control form-control-lg" placeholder="أدخل اسم المحفظ">
            </form>
        </div>
    </div>

    </div>

    <div class="card">
        <div class="card-header" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 25px">المحفظين</h3>
            <a href="{{ URL('/teacher/create') }}" type="submit" style="color: white" class="btn btn-info float-left">إضافة
                محفظ جديد</a>
            {{--  Import Teachers File   --}}


        </div>
        <div class="container mt-5 text-center">

            <form action="{{ route('importT') }}" method="POST" enctype="multipart/form-data">
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
                        style="margin-left: 15px;margin-right: 20px;align-items: center"href="{{ route('export-teachers') }}">تصدير
                        المحفظين</a>
                    <button class=" col-md-3 btn btn-primary " style="align-items: center;">رفع ملف المحفظين</button>
                </div>
            </form>


            {{--  <button class="btn btn-primary " style="align-items: center;">رفع ملف المحفظين</button>
            <a class="btn btn-success " style="margin-left: 15px;align-items: center"
                href="{{ route('export-teachers') }}">تصدير
                المحفظين</a>  --}}

        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                @if ($teachers->count() == 0)
                    <td style="vertical-align: middle; text-align: center;font-size: 18px;">
                        لا يوجد بيانات
                    </td>
                @else
                    <thead>
                        <th style="width: 20px"></th>
                        <th style="width: 20px"></th>
                        <th style="width: 20px"></th>
                        <th>رقم الهوية</th>
                        <th>تاريخ الميلاد</th>
                        <th>رقم الواتس</th>
                        <th>رقم الجوال</th>
                        <th>الاسم</th>
                        <th style="width: 10px">الرقم</th>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>
                                    <form method="POST" action="{{ URL('teacher/destroy/' . $teacher->id) }}">
                                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                        @csrf
                                        <button class=" btn btn-block btn-outline-danger " type="sumbit"
                                            class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-block btn-outline-info"
                                        href="{{ URL('teacher/show/' . $teacher->id) }}">
                                        عرض</a>

                                </td>
                                <td>
                                    <a class=" btn btn-block btn-outline-primary btn-sm"
                                        href="{{ URL('teacher/edit/' . $teacher->id) }}"><i
                                            class=" nav-icon fas fa-edit"></i></a>

                                </td>
                                <td>{{ $teacher->nation_id }}</td>
                                <td>{{ $teacher->date_of_birth }}</td>
                                <td>{{ $teacher->whatsapp_number }}</td>
                                <td>{{ $teacher->phone_number }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>
    {{ $teachers->links() }}
@endsection
