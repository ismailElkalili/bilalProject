@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">المحفظين</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th style="width: 10px">الرقم</th>
                    <th>الاسم</th>
                    <th>رقم الجوال</th>
                    <th>رقم الهوية</th>
                    <th>تاريخ الميلاد</th>
                    <th>رقم الواتس</th>
                    <th>التخصص</th>
                    <th>المؤهل العلمي</th>
                    <th>اللجنة</th>
                    <th style="width: 20px"></th>

                </thead>
                <tbody>
                    {{-- @foreach ($teachers as $teacher) --}}
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->phone_number }}</td>
                        <td>{{ $teacher->nation_id }}</td>
                        <td>{{ $teacher->date_of_birth }}</td>
                        <td>{{ $teacher->whatsapp_number }}</td>
                        <td>{{ $teacher->specialization }}</td>
                        <td>{{ $teacher->qualification }}</td>
                        <td>{{ $commname }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ URL('teacher/') }}">الرجوع</a>

                        </td>
                    </tr>

                    {{-- <p>This is user {{ $user->id }}</p> --}}
                    {{-- @endforeach --}}

                </tbody>
            </table>
        </div>
    </div>
@endsection
