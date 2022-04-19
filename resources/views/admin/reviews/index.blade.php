
@extends('layouts.menu')
@section('content')
    <div class="show">
        <div class="card-header py-4 d-flex justify-content-between align-items-center">
            <h2><i class="bi bi-file-text"></i> Recensioni</h2>
        </div>

        <div class="u_messages">
            @foreach($reviews as $review)
            <div class="u_message">
                <div class="u_message_text">
                    <span>{{$review->id}}</span>
                <h4>{{$review->username}}</h4>
                </div>
                <p class="paragraph">{{$review->content}}</p>
                <div class="vote">
                    <span>Voto:</span> {{$review->vote}} / 5
                </div>  
                <button onclick="this.parentElement.classList.toggle('showContent'); changeButton(this)" class="leggi">Read More</button>
            </div>
            @endforeach
        </div>
    </div>
@endsection

