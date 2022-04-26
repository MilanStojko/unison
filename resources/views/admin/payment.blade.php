@extends('layouts.menu')


@section('content')
    <div class="content pay">
        <form id="formPayment" method="post" id="payment-form" action="{{ route('admin.paymentcheckout', [Auth::user()->id]) }}">
            @csrf
            <section>
                <select class="selectSponsor" name="sponsorship_id" id="sponsorship_id">
                    <option> Seleziona una sponsorizzazione</option>
                    @foreach ($sponsorship as $element)
                        <option value="{{ $element->id }}">{{ $element->duration }} ore - {{ $element->price }} € </option>
                    @endforeach
                </select>
                <label for="amount">
                    <span class="input-label total">Totale</span>
                    <div class="input-wrapper amount-wrapper">
                        <input id="amount" name="amount" type="tel" min="1"
                            placeholder="Inserisci l'importo della sponsorship"
                            class="@error('amount') is-invalid @enderror">
                    </div>
                    @error('amount')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </label>

                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button id="buttonPayment" class="button" type="submit"><strong>Acquista</strong></button>
        </form>
    </div>
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
