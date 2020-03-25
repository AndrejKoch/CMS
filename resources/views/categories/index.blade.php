@extends('layouts.dashboard')

@section('content')


    <a href="/categories/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Category</a>
    <div class="card">
        <div class="row">
            <div class="card-body">
                <div class="col-md-12">


                    @if($categories)
                        @if(count($categories) === 0)
                            <p>You don't have any categories</p>

                        @endif
                    @endif
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
