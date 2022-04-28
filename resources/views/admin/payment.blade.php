@extends('layouts.menu')


@section('content')
    <div class="content pay">
        <form id="formPayment" method="post" id="payment-form"
            action="{{ route('admin.paymentcheckout', [Auth::user()->id]) }}">
            @csrf
            <section>
                <div class="show">
                    <div class="card-header py-4 d-flex justify-content-between align-items-center">
                        <h2><i class="bi bi-file-text"></i>Le nostre offerte</h2>
                    </div>
                    <div class="info justify-content-center text-center my-2">
                        <p>Vuoi mettere in risalto le tue prestazioni?</p>
                        <p>Il team di Unison ha pensato a 3 piani di sponsorizzazione che ti permetteranno di risaltare tra
                            le ricerche
                            dei nostri utenti.</p>
                    </div>
                    <label for="amount">
                        @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </label>
                    <div class="plan-box container-fluid d-flex flex-lg-row flex-column">
                        <div class="row w-100 g-5 my-1 justify-content-around">
                            <div
                                class="mx-3 col-lg-4 col-md-6 col-12 text-center d-flex justify-content-between flex-column align-items-center py-3 plan-a plan-card">
                                <h2 class="plan-name">FLASH</h2>
                                <div class="plan-text">
                                    <h1 class="plan-price">24 ore</h1>
                                    <p>a</p>
                                    <h3 class="plan-time">{{ $sponsorship[0]->price }}</h3>
                                    <input id='sponsorship_id' value='{{ $sponsorship[0]->id }}' name='sponsorship_id'
                                        type="radio" checked>
                                </div>
                            </div>
                            <div
                                class="mx-3 col-lg-4 col-md-6 col-12 text-center d-flex justify-content-between flex-column align-items-center py-3 plan-b plan-card">
                                <h2 class="plan-name">NOTORIUS.</h2>
                                <div class="plan-text">
                                    <h1 class="plan-price">72 ore</h1>
                                    <p>a</p>
                                    <h3 class="plan-time">{{ $sponsorship[1]->price }}</h3>
                                    <input id='sponsorship_id' value='{{ $sponsorship[1]->id }}' name='sponsorship_id'
                                        type="radio">
                                </div>
                            </div>
                            <div
                                class="mx-3 col-lg-4 col-md-6 col-12 text-center d-flex justify-content-between flex-column align-items-center py-3 plan-c plan-card">
                                <h2 class="plan-name">CHAMPION</h2>
                                <div class="plan-text">
                                    <h1 class="plan-price">144 ore</h1>
                                    <p>a</p>
                                    <h3 class="plan-time">{{ $sponsorship[2]->price }}</h3>
                                    <input id='sponsorship_id' value='{{ $sponsorship[2]->id }}' name='sponsorship_id'
                                        type="radio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button id="buttonPayment" class="button" type="submit"><strong>Acquista</strong></button>
        </form>
    </div>
    @if (session()->has('success_message'))
        <div class=" alert alert-success my-3 ms_success">
            {{ session()->get('success_message') }}
        </div>
    @elseif (session()->has('error_message'))
        <div class=" alert alert-warning my-3 ms_success">
            {{ session()->get('error_message') }}
        </div>
    @endif
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
