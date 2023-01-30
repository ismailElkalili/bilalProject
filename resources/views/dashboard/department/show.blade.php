@extends('dashboard_layout.dashboard_main')
@section('forms')
    <form action="{{ URL('/departments/' . $departments->id) }}" method="POST" style="margin-top: 12px ;text-align: right">
        @csrf
        <div class="form-group">
            <label for="departmentName" class=" col-form-label">اسم القسم</label>

            <input disabled style="text-align: right"type="text" class="form-control" name="departmentName"
                value="{{ $departments->name }}" id="departmentName" placeholder="اسم القسم">
        </div>

        <!-- select -->
        <div class="form-group">
            <label for="bossID" class=" col-form-label">المسؤول</label>
            <select disabled style="text-align: right" class="form-control" name="bossID" id="bossID">
                @if (empty($allTeacher))
                    <option selected value="">لا يوجد مسؤول</option>
                @else
                    @foreach ($allTeacher as $teacher)
                        @if ($teacher->id == $departments->teacher_id)
                            <option selected value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-sm-12">
            <div class="card-body">
                <table class="table table-bordered float-right" style="text-align: right">
                    <thead>
                        @if ($classes->count() == 0)
                            <td style="vertical-align: middle; text-align: center;font-size: 18px;">
                                لا يوجد بيانات
                            </td>
                        @else
                            <thead>
                                <th style="width: 20px"></th>
                                <th style="width: 20px"></th>
                                <th style="width: 20px"></th>
                                <th>مسؤول الحلقة</th>
                                <th>اسم الحلقة</th>
                                <th style="width: 10px">الرقم</th>
                            </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>
                                    <form method="POST" action="{{ URL('/classes/destroy/' . $class->id) }}">
                                        @csrf
                                        <button type="sumbit" class="btn btn-outline-danger">حذف</button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-outline-info" href="{{ URL('/classes/show/' . $class->id) }}">عرض</a>
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ URL('/classes/edit/' . $class->id) }}"><i
                                            class=" nav-icon fas fa-edit"></i></a>
                                </td>
                                @if (is_null($class->teacher_id))
                                    <td>لا يوجد مسؤول</td>
                                @else
                                    @foreach ($allTeacher as $teacher)
                                        @if ($teacher->id == $class->teacher_id)
                                            <td>{{ $teacher->name }}</td>
                                        @endif
                                    @endforeach
                                @endif
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->id }}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <div class="form-group row" style="margin-top: 35px;position: static;  display: inline;">
        <div>
            <a href="{{ url('/departments/index') }}" class="btn btn-outline-danger"> الرجوع للخلف</a>
        </div>
    </div>
@endsection
