@extends('dashboard_layout.dashboard_main')
@section('content')
<div dir="rtl" class="card">
    <div class="row">
        <div style="margin-top: 15px" class="col-lg-12 margin-tb card-header">
           
            <h4 style="display: inline" class="pull-right">إدارة الصلاحيات</h4>

                @can('role-create')
                    <a class="btn btn-success float-left" href="{{ route('roles.create') }}">انشاء صلاحية جديدة</a>
                @endcan
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="28px">الرقم</th>
            <th>الإسم</th>
            <th width="280px">العمليات</th>
        </tr>

        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $roles->render() !!}
</div>
@endsection
