@extends('dashboard_layout.dashboard_main')
@section('forms')
    <div class="card ">
        <div class="card-header" style="margin-top: 10px">
            <h3 class="card-title float-right" style="font-size: 25px">اللجان</h3>
            <a class="btn btn-info float-left" href="{{ URL('/committees/create') }}">اضافة لجنه جديدة</a>
        </div>
        <div class="card-body float-right">
            <table class="table table-bordered float-right" style="text-align: right">
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
            </table>
        </div>
    </div>
@endsection
