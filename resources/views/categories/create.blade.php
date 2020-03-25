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
                <h4 class="card-title">Add Category</h4>
                <p class="card-category">Create your profile</p>
            </div>
            <div class="card-body">
                <form action="{{ url('/categories') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Category name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">

                                <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                    <option value="">Main Category</option>
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Add Category</button>
                    <div class="clearfix"></div>
                </form>


            </div>
        </div>
    </div>

    <div class="card">
        <div class="row">
            <div class="card-body">
                <div class="col-md-12">
                    <ul>
                        @if($categories)
                            @foreach($categories as $category)
                                <li><a href="/categories/{{ $category['id'] }}/edit">{{ $category['name'] }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
