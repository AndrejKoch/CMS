@extends('layouts.dashboard')
@section('content')
    <div class="col-md-12">


        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add User</h4>
                <p class="card-category">Create your profile</p>
            </div>
            <div class="card-body">
                <form action="{{ url('/user') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Role</label>
                                <input type="text" class="form-control  @error('role') is-invalid @enderror" name="role"
                                       value="{{ old('city') }}">
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Repeat password</label>
                                <input type="password" class="form-control @error('re_password') is-invalid @enderror"
                                       name="re_password">
                                @error('re_password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('re_password') }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add User</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection

