<?php
$khaltiPubKey = config('services.khalti.public_key');
$cost  = env("TEMP_COST");
?>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
<script>
    let khaltiPubKey = @json($khaltiPubKey);
    let buttonId = "{{$button_id}}"
    let btn = document.getElementById(buttonId);
    let config = {
        "publicKey": khaltiPubKey,
        "productIdentity": "{{config('app.name')}}",
        "productName": "{{config('app.name')}}",
        "productUrl": "{{config('app.url')}}",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
        ],
        "eventHandler": {
            onSuccess(resp) {
                if (resp.idx) {
                    resp.user_id = "{{$artist_id}}"
                    resp.event_id = "{{$event_id}}"
                    $.ajax({
                        "url": '{{route('front.checkout.verify')}}',
                        "dataType": "json",
                        "type": "POST",
                        "data": resp,
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        beforeSend: function () {

                        },
                        success: function (resp) {
                            toastSuccess(resp.message)
                            location.reload();
                        },
                        error: function (xhr) {
                            toastr.error("Something went wrong!!!");
                        },
                        complete: function () {

                        }
                    });
                }
            },
            onError(error) {
                alert("Unknown error occurred during Khalti payment");
            },
        }
    };
    let checkout = new KhaltiCheckout(config);
    if (btn) {
        btn.onclick = function () {
            checkout.show({amount: 10 * 100});
        }
    }
</script>