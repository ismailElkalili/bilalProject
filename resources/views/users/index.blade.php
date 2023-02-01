@extends('dashboard_layout.dashboard_main')
@section('content')
<div dir="rtl" class="card">
    <div  class="row">
        <div class="card-header" style="margin-top: 15px" class="col-lg-12 margin-tb">
            <h4 style="display: inline" class="pull-right">إدارة المستخدمين</h4>
                <a class="btn btn-success float-left" href="{{ route('users.create') }}"> إنشاء مستخدم جديد</a>
            
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table dir="rtl" class="table table-bordered">
        <tr>
            <th width="28px">الرقم</th>
            <th>الاسم</th>
            <th>البريد الالكتروني</th>
            <th>الصلاحيات</th>
            <th width="180px">العمليات</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->render() !!}
</div>
@endsection
