@extends('dashboard_layout.dashboard_main')
@section('content')
<div dir="rtl" style="padding: 15px" class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class=" card-header pull-left" style="margin-bottom: 25px">
                <h2>إنشاء مستخدم جديد</h2>
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
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الإسم:</strong>
                {!! Form::text('name', null, ['placeholder' => 'الاسم', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>البريد الالكتروني:</strong>
                {!! Form::text('email', null, ['placeholder' => 'البريد الالكتروني', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>كلمو المرور:</strong>
                {!! Form::password('password', ['placeholder' => 'كلمة المرور', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>تأكيد كلمة المرور:</strong>
                {!! Form::password('confirm-password', ['placeholder' => 'تأكيد كلمة المرور', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الصلاحيات:</strong>
                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">إنشاء</button>
            <a class="btn btn-primary" href="{{ route('users.index') }}"> رجوع</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
