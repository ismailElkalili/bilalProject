@extends('dashboard_layout.dashboard_main')
@section('content')
<div dir="rtl" class="card" style="padding: 15px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="margin-bottom: 15px" class="col-lg-12 margin-tb card-header" class="pull-left">
                <h2>تعديل الصلاحية</h2>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم الصلاحية:</strong>
                {!! Form::text('name', null, ['placeholder' => 'اسم الصلاحية', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br />
                @foreach ($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                        {{ $value->name }}</label>
                    <br />
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">تعديل</button>
            <a class="btn btn-primary" href="{{ route('roles.index') }}">رجوع</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
