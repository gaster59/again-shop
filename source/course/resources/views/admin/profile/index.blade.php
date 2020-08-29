@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Profile</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        
        <h1 class="page-header">Profile</h1>
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.profile.renewpassword') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" disabled name="name" class="form-control" id="name" value="{{ $profile->name }}" />
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" disabled name="email" class="form-control" id="email" value="{{ $profile->email }}" />
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Old password</label>
                <div class="col-sm-10">
                    <input type="password" name="old_password" class="form-control" id="old_password" value="{{ old('old_password', '') }}" />
                    @if($errors->has('old_password'))
                        <div class="error text-danger">{{ $errors->first('old_password') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">New password</label>
                <div class="col-sm-10">
                    <input type="password" name="new_password" class="form-control" id="new_password" value="{{ old('new_password', '') }}" />
                    @if($errors->has('new_password'))
                        <div class="error text-danger">{{ $errors->first('new_password') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Confirm new password</label>
                <div class="col-sm-10">
                    <input type="password" name="renew_password" class="form-control" id="renew_password" value="{{ old('renew_password', '') }}" />
                    @if($errors->has('renew_password'))
                        <div class="error text-danger">{{ $errors->first('renew_password') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Renew password</button>
                <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection