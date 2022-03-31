<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pay with Paypal</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
</head>
<body>

    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
        {{ session()->forget('error') }}
    @endif
    
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        {{ session()->forget('success') }}
    @endif

    <a href="{{ route('processPaypal') }}">Pay with PayPal</a>
</body>
</html>