@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card">
        <div class="card-header">

            {{--  Import Teachers File   --}}
            <div class="container mt-5 text-center">
                <form action="{{ route('importT') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">اختر الملف</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">رفع ملف المحفظين</button>
                     {{--  Export Teachers File  --}}
                    <a class="btn btn-success" href="{{ route('export-teachers') }}">تصدير المحفظين</a>
                </form>
            </div>


            <h3 class="card-title float-right" style="font-size: 25px">المحفظين</h3>
            <a href="{{ URL('/teacher/create') }}" type="submit" class="btn btn-info float-left">إضافة محفظ جديد</a>
            
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                <thead>
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
                                <a class="btn btn-primary" href="{{ URL('teacher/edit/' . $teacher->id) }}">تعديل</a>

                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ URL('teacher/show/' . $teacher->id) }}">عرض</a>

                            </td>
                            {{-- <td>
                                <form method="POST" action="{{ URL('teacher/destroy' . $teacher->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="sumbit" class="btn btn-danger">حذف</button>
                                </form>
                            </td> --}}
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
