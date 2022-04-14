@extends('layouts.menu')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">La tua dashboard</div>
                    <div class="card-content">
                        <h1>
                            {{$user->name}}
                        </h1>
                        <span>Categorie</span>
                        <ul>
                            @foreach($user->categories as $category)
                            <li>{{$category->name}}</li>
                            @endforeach
                        </ul>
                        <span>Prestazioni</span>
                        <ul>
                            @foreach($user->availabilities as $availability)
                            <li>{{$availability->name}}</li>
                            @endforeach
                        </ul>
                        <a href="{{route('admin.users.edit', auth()->user())}}">edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
