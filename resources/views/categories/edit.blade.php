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
                <h4 class="card-title">Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/categories', [$category->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Category name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $category->name }}">
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
                                    <option value="null">Main Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat['id'] }}"
                                                @if($category->parent_id === $cat['id']) selected @endif>{{ $cat['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Category</button>
                    <div class="clearfix"></div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('/categories', [$category->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
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
