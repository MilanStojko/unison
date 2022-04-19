@extends('layouts.menu')
@section('content')
<div class="show">
    <div class="card-header py-4 d-flex justify-content-between align-items-center">
        <h2><i class="bi bi-chat-dots"></i> Messaggi</h2>
    </div>

    <div class="u_messages">
        @foreach($messages as $message)
        <div class="u_message message-box">
            <div class="u_message_text">
                <span>{{$message->id}}</span>
            <h4>{{$message->name}} {{$message->surname}}</h4>
            </div>
            <p class="paragraph">{{$message->content}}</p>
            <div>
                <a href="mailto:{{$message->email}}">Rispondi</a>
            </div>  
            <button onclick="this.parentElement.classList.toggle('showContent'); changeButton(this)" class="leggi">Read More</button>
        </div>
        @endforeach
    </div>
</div>
@endsection
