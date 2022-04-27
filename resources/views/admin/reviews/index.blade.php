
@extends('layouts.menu')
@section('content')
    <div class="show">
        <div class="card-header py-4 d-flex justify-content-between align-items-center">
            <h2><i class="bi bi-file-text"></i> Recensioni</h2>
        </div>
        @if(!$reviews->isEmpty())
            <div class="u_messages">
                @foreach($reviews as $review)
                <div class="u_message">
                    <div class="u_message_text">
                        <div class="circle-div">
                            <span class="circle"></span>
                            <?php
                                        setlocale(LC_TIME, 'italian');
                                        echo $review->created_at->formatLocalized('%d %B %Y, %H:%M');
                            ?>
                        </div>
                         
                    <h4>{{$review->username}}</h4>
                    </div>
                    <p class="paragraph">{{$review->content}}</p>
                    <div class="vote">
                        <span>Voto:</span> {{$review->vote}} / 5
                    </div>
                    @if(Str::length($review->content) > 230)
                    <button onclick="this.parentElement.classList.toggle('showContent'); changeButton(this)" class="leggi">Read More</button>
                    @endif
                </div>
                @endforeach
            </div>
        @else 
            <div class="empty d-flex flex-column justify-content-center text-center">
                <div class="clef">&#119074;</div>
                <div class="empty-text">
                    <p>Sembra che tu non abbia ancora ricevuto recensioni...</p>
                    <p>Prova ad aggiornare il tuo portfolio, altrimenti <a href="{{route('admin.sponsorships.index')}}">clicca qui</a> per mettere in risalto il tuo profilo!</p>
                </div>
            </div>
        @endif    
    </div>
@endsection

