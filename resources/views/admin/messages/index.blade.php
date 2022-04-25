@extends('layouts.menu')
@section('content')
<div class="show">
    <div class="card-header py-4 d-flex justify-content-between align-items-center">
        <h2><i class="bi bi-chat-dots"></i> Messaggi</h2>
    </div>
    @if(!$messages->isEmpty())
        <div class="u_messages">
            @foreach($messages as $message)
            <div class="u_message message-box">
                <div class="u_message_text">
                    <span></span>
                <h4>{{$message->name}} {{$message->surname}}</h4>
                </div>
                <p class="paragraph">{{$message->content}}</p>
                <div>
                    <a href="callto:{{$message->cellphone}}"><i class="bi bi-telephone-fill"></i> {{$message->cellphone}}</a>
                </div>
                <div>
                    <a href="mailto:{{$message->email}}"><i class="bi bi-envelope-fill"></i> {{$message->email}}</a>
                </div>
                @if(Str::length($message->content) > 230)
                <button onclick="this.parentElement.classList.toggle('showContent'); changeButton(this)" class="leggi">Read More</button>
                @endif
            </div>
            @endforeach
        </div>  
    @else 
        <div class="empty d-flex flex-column justify-content-center text-center">
            <div class="clef">&#119074;</div>
            <div class="empty-text">
                <p>Sembra che tu non abbia ancora ricevuto messaggi...</p>
                <p>Prova ad aggiornare il tuo portfolio, altrimenti <a href="{{route('admin.sponsorships.index')}}">clicca qui</a> per mettere in risalto il tuo profilo!</p>
            </div>
        </div>
    @endif
 
</div>
@endsection
