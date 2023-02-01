@extends('dashboard_layout.dashboard_main')
@section('content')
<div dir="rtl" class="card" style="padding: 15px">
    <div class="row">
        <div style="margin-bottom: 15px" class="col-lg-12 margin-tb card-header">
            <div class="pull-left">
                <h2> الصلاحيات</h2>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم الصلاحية:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الصلاحية الفعالة:</strong>
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('roles.index') }}">الرجوع</a>
    </div>
</div>
@endsection
