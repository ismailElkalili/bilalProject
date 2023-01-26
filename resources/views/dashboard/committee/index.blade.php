@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div dir="rtl" class="row">

        <div class="col-md-8 offset-md-2">
            <form action="{{ URL('/committees/search') }}" method="GET">
                <span style="position: absolute;margin:12px " align="center">
                    <i class="fa fa-search"></i>
                </span>
                <input style="padding-right :50px" type="search" id="committeeName" name="committeeName"
                    class="form-control form-control-lg" placeholder="أدخل اسم اللجنة">
            </form>
        </div>

    </div>

    </div>


    <div class="card ">
        <div class="card-header" style="margin-top: 10px">
            <h3 class="card-title float-right" style="font-size: 25px">اللجان</h3>
            <a class="btn btn-info float-left" style="color: white"href="{{ URL('/committees/create') }}">اضافة لجنه
                جديدة</a>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">

                @if ($committees->count() == 0)
                    <td style="vertical-align: middle; text-align: center;font-size: 18px;">
                        لا يوجد بيانات
                    </td>
                @else
                    <thead>
                        <th style="width: 20px"></th>
                        <th style="width: 20px"></th>
                        <th style="width: 20px"></th>
                        <th>اسم اللجنة</th>
                        <th style="width: 10px">الرقم</th>
                    </thead>
                    <tbody>
                        @foreach ($committees as $committee)
                            <tr>
                                <td>
                                    <form method="POST" action="{{ URL('/committees/destroy/' . $committee->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="sumbit" class="btn btn-block btn-outline-danger">حذف</button>
                                    </form>
                                </td>

                                <td>
                                    <a class="btn btn-block btn-outline-info"
                                        href="{{ URL('/committees/show/' . $committee->id) }}">عرض</a>

                                </td>
                                <td>
                                    <a href="{{ URL('/committees/edit/' . $committee->id) }}"
                                        class=" btn btn-block btn-outline-primary btn-sm"><i
                                            class=" nav-icon fas fa-edit"></i></a>

                                </td>
                                <td>{{ $committee->name }}</td>
                                <td>{{ $committee->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>
@endsection
