@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card">
        <div class="card-header" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 25px">المحفظين</h3>
            <a href="{{ URL('/teacher/create') }}" type="submit" class="btn btn-info float-left">إضافة محفظ جديد</a>
            {{--  Import Teachers File   --}}


        </div>
        <div class="container mt-5 text-center">
            <form action="{{ route('importT') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="custom-file  text-left">

                        <label id="file_name" class="custom-file-label "
                            class="btn btn-success col fileinput-button dz-clickable" for="customFile">اختر
                            الملف</label>
                        <input type="file" name="file" class="custom-file-input" id="customFile"
                            onchange="getUploadName()">
                    </div>

                </div>
            </form>

            <button class="btn btn-primary " style="align-items: center;">رفع ملف المحفظين</button>
            {{--  Export Teachers File  --}}
            <a class="btn btn-success " style="margin-left: 15px;align-items: center"
                href="{{ route('export-teachers') }}">تصدير
                المحفظين</a>

        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
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
                        <tr><td>
                            <form  method="POST" action="{{ URL('teacher/destroy' . $teacher->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <button class=" btn btn-block btn-outline-danger " type="sumbit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                            <td>
                                <a class="btn btn-block btn-outline-info" href="{{ URL('teacher/show/' . $teacher->id) }}">
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
            </table>
        </div>
    </div>
@endsection
