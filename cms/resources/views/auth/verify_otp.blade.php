<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('partials.style');
</head>
<body>
    <div class="caontainer-main" style="width: 100%; height:70vh; display:flex;justify-content:center;">
        <!-- Add this code to your verify_otp.blade.php view -->
<div class="col-md-6">
    <form method="POST" action="{{ route('otp.verify.verify') }}">
        @csrf
        <div class="form-group">
            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" id="otp" class="form-control">
            @error('otp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Verify OTP</button>
    </form>
</div>
    </div>
</body>
</html>
