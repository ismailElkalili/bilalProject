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
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->phone_number }}</td>
                            <td>{{ $teacher->nation_id }}</td>
                            <td>{{ $teacher->date_of_birth }}</td>
                            <td>{{ $teacher->whatsapp_number }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ URL('teacher/update/' . $teacher->id) }}">تعديل</a>

                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ URL('teacher/show/' . $teacher->id) }}">عرض</a>

                            </td>
                            <td>
                                <form method="POST" action="{{ URL('teacher/destroy' . $teacher->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="sumbit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>

                        {{-- <p>This is user {{ $user->id }}</p> --}}
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
