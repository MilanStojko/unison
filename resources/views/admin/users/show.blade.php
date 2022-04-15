@extends('layouts.menu')

@section('content')
    
    <div class="show">
        <div class="card-header py-4 d-flex justify-content-between align-items-center">
            <h2><i class="bi bi-people"></i> Il mio profilo</h2>

            <div class="u_edit-user">
                <a href="{{route('admin.users.edit', auth()->user())}}">
                    <i class="bi bi-pencil-square"></i>
                    Modifica Profilo
                </a>
            </div>
        </div>

        <div class="u_info">
            <div class="u_info-head">
                <div class="profile-image">
                    <img src="{{URL::asset('/images/jumbo-2.png')}}">
                </div>

                <div class="u_info-head_text">
                    <h3>
                        {{$user->name}} {{$user->surname}}
                    </h3>

                    <p>
                        {{$user->bio}}
                    </p>
                </div>

            </div>
            <div class="u_info-body">
                <div class="personal-info">

                    <div class="list">
                        <ul>
                            <li>Nome: </li>
                            <li>Cognome: </li>
                            <li>Username: </li>
                            <li>Indirizzo: </li>
                            <li>Cellulare: </li>
                            <li>Email: </li>
                            <li>Categorie: </li>
                            <li>Disponibilità:</li>

                        </ul>
                    </div>

                    <div class="result">
                        <ul>
                            <li>{{$user->name}} </li>
                            <li>{{$user->surname}}</li>
                            <li>{{$user->username}}</li>
                            <li>{{$user->address}}</li>
                            <li>{{$user->cellphone ? $user->cellphone : '-'}}</li>
                            <li>{{$user->email}}</li>
                            
                            <li>
                                @foreach($user->categories as $category)
                                {{$category->name}}

                                    @if( !$loop->last)
                                    ,
                                    @endif
                                @endforeach
                            </li>
                            <li>
                                @foreach($user->availabilities as $availability)
                                {{$availability->name}}

                                    @if( !$loop->last)
                                    ,
                                    @endif
                                @endforeach
                            </li>
                            
                        </ul>
                    </div>
                    
                </div>

                <div class="personal-data">
                    <div class="messages-reviews">
                        <h5>24</h5>
                        <p>Messaggi</p>
                    </div>

                    <div class="messages-reviews">
                        <h5>10</h5>
                        <p>Recensioni</p>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
       
@endsection
