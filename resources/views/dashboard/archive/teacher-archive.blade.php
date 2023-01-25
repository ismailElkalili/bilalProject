@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card">
        <div class="card-header" style="margin-top: 15px">
            <h3 class="card-title float-right" style="font-size: 25px">المحفظين</h3>


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
                                <form method="POST" action="{{ URL('teacher/restore/' . $teacher->id) }}">
                                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                    @csrf
                                    <button class=" btn btn-block btn-outline-danger " type="sumbit"
                                        class="btn btn-danger">استعادة</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-block btn-outline-info" href="{{ URL('teacher/show/' . $teacher->id) }}">
                                    عرض</a>

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
