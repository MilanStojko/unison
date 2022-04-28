@extends('layouts.menu')

@section('content')
    <div class="show">
        <div class="card-header py-4 d-flex justify-content-between align-items-center">
            <h2><i class="bi bi-people"></i>La mia dashboard</h2>

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
                    @if(isset($user->avatar))
                        <img src="{{asset("storage/{$user->avatar}")}}" alt="">
                    @else   
                        <img src="https://thumbs.dreamstime.com/b/profilo-utente-vettoriale-avatar-predefinito-179376714.jpg">
                    @endif
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
                            <li>Il mio cv:</li>
                            <li>Categorie: </li>
                            <li>Disponibilità:</li>
                            <li>Sponsorizzazioni:</li>
                        </ul>
                    </div>

                    <div class="result">
                        <ul>
                            <li>{{$user->name}} </li>
                            <li>{{$user->surname}}</li>
                            <li>{{$user->username}}</li>
                            <li>{{$user->address ? $user->address : '-'}}</li>
                            <li>{{$user->cellphone ? $user->cellphone : '-'}}</li>
                            <li>{{$user->email}}</li>
                            {{-- CV --}}
                            <li>
                                @if(isset(auth()->user()->cv))
                                <a href={{asset('storage/'.auth()->user()->cv)}} target="_blank">Il mio cv</a>
                                @else
                                {{'-'}}
                                @endif
                            </li>    
                            {{-- CAT --}}
                            <li>
                                @if(count($user->categories) > 0)
                                @foreach($user->categories as $category)
                                {{$category->name}}

                                    @if( !$loop->last)
                                    ,
                                    @endif
                                @endforeach

                                @else 
                                {{'-'}}

                                @endif
                            </li>
                            {{-- AVAIL --}}
                            <li>
                                @if(count($user->availabilities) > 0)
                                @foreach($user->availabilities as $availability)
                                {{$availability->name}}

                                    @if( !$loop->last)
                                    ,
                                    @endif
                                @endforeach

                                @else 
                                {{'-'}}

                                @endif
                            </li>
                            <li>
                                @if(count($user->sponsorships) > 0 )
                                    @foreach ($user->sponsorships as $plan)
                                        {{$plan->type}}
                                        @if( !$loop->last)
                                        ,
                                        @endif
                                        
                                    @endforeach
                                @else 
                                    {{'-'}}
                                @endif
                            </li>              
                        </ul>
                    </div>
                    
                </div>

                <div class="personal-data">
                    <div class="messages-reviews">
                        <h5>{{auth()->user()->messages->count()}}</h5>
                        <p>Messaggi</p>
                    </div>

                    <div class="messages-reviews">
                        <h5>{{auth()->user()->reviews->count()}}</h5>
                        <p>Recensioni</p>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
       

    {{-- <script>
         function getDate(user){
            const today = new Date();
            if(Date.parse(user) >= Date.parse(today)){
                console.log(user);
                return user.pivot.name;
            }
        }
    </script> --}}
@endsection
