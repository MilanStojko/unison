@extends('layouts.menu')

@section('content')

<div class="show">
    <div class="card-header py-4 d-flex justify-content-between align-items-center">
        <h2><i class="bi bi-file-text"></i>Le nostre offerte</h2>
    </div>
    <div class="info justify-content-center text-center">
        <p>Vuoi mettere in risalto le tue prestazioni?</p>
        <p>Il team di Unison ha pensato a 3 piani di sponsorizzazione che ti permetteranno di risaltare tra le ricerche dei nostri utenti.</p>
    </div>
    <div class="plan-box d-flex flex-lg-row flex-column justify-content-between px-3">
        <div class="plan-a plan-card col-lg-3 col-12 text-center py-3">
            <h2 class="plan-name">Flash</h2>
            <h1 class="plan-price">24 ore</h1>
            <p>a</p>
            <h3 class="plan-time">2,99 €</h3>
        </div>
        <div class="plan-b plan-card col-lg-3 col-12">
            Notorius
        </div>
        <div class="plan-c plan-card col-lg-3 col-12">
            Champion
        </div>
    </div>
</div>

@endsection
