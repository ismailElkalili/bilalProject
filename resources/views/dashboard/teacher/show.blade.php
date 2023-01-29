@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card">
        <div class="card-header float-right" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 20px">المحفظ</h3>
            <td>
                <a class="btn btn-primary" href="{{ URL('teacher/') }}">الرجوع</a>

            </td>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>اللجنة</th>
                    <th>المؤهل العلمي</th>
                    <th>التخصص</th>
                    <th>رقم الواتس</th>
                    <th>تاريخ الميلاد</th>
                    <th>رقم الهوية</th>
                    <th>رقم الجوال</th>
                    <th>الاسم</th>
                    <th style="width: 10px">الرقم</th>
                </thead>
                <tbody>
                    {{-- @foreach ($teachers as $teacher) --}}
                    <tr>

                        @if (empty($commname))
                            <td>لا يوجد</td>
                        @else
                            <td>{{ $commname }}</td>
                        @endif

                        @if (empty($teacher->qualification))
                            <td>لا يوجد</td>
                        @else
                            <td>{{ $teacher->qualification }}</td>
                        @endif

                        @if (empty($teacher->specialization))
                            <td>لا يوجد</td>
                        @else
                            <td>{{ $teacher->specialization }}</td>
                        @endif

                        @if (empty($teacher->whatsapp_number))
                            <td>لا يوجد</td>
                        @else
                            <td>{{ $teacher->whatsapp_number }}</td>
                        @endif

                        @if (empty($teacher->date_of_birth))
                            <td>لا يوجد</td>
                        @else
                            <td>{{ $teacher->date_of_birth }}</td>
                        @endif

                        <td>{{ $teacher->nation_id }}</td>
                        <td>{{ $teacher->phone_number }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->id }}</td>
                    </tr>

                    {{-- <p>This is user {{ $user->id }}</p> --}}
                    {{-- @endforeach --}}

                </tbody>
            </table>
        </div>
    </div>
    {{-- عرض الحلقات والطلاب الخاصين بهذا المحفظ --}}
    <div class="card ">
        <div class="card-header" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 25px">الحلقات</h3>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
                @if ($classes->count() == 0)
                    <td style="vertical-align: middle; text-align: center;font-size: 18px;">لا يوجد حلقات</td>
                @else
                    <thead>
                        <th style="width: 30px">عرض الحلقة</th>
                        <th>اسم الحلقة</th>
                        <th style="width: 10px">الرقم</th>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>
                                    <a class="btn btn-info" href="{{ URL('/classes/show/' . $class->id) }}">عرض الحلقة </a>
                                </td>
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
