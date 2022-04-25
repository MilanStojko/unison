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
    <div class="plan-box d-flex flex-lg-row flex-column justify-content-between px-5">
        <div class="col-lg-3 col-12 text-center d-flex justify-content-between flex-column py-3 plan-a plan-card">
            <h2 class="plan-name">FLASH</h2>
            <div class="plan-text">
                <h1 class="plan-price">24 ore</h1>
                <p>a</p>
                <h3 class="plan-time">2,99 €</h3>
                <a href="{{route('admin.payment', auth()->user())}}">Acquista</a>
            </div>
        </div>
        <div class="col-lg-3 col-12 text-center d-flex justify-content-between flex-column py-3 plan-b plan-card">
            <h2 class="plan-name">NOTORIUS.</h2>
            <div class="plan-text">
                <h1 class="plan-price">72 ore</h1>
                <p>a</p>
                <h3 class="plan-time">5,99 €</h3>
                <a href="{{route('admin.payment', auth()->user())}}">Acquista</a>
            </div>
        </div>
        <div class="col-lg-3 col-12 text-center d-flex justify-content-between flex-column py-3 plan-c plan-card">
            <h2 class="plan-name">CHAMPION</h2>
            <div class="plan-text">
                <h1 class="plan-price">144 ore</h1>
                <p>a</p>
                <h3 class="plan-time">9,99 €</h3>
                <a href="{{route('admin.payment', auth()->user())}}">Acquista</a>
            </div>
        </div>
    </div>
</div>

@endsection
