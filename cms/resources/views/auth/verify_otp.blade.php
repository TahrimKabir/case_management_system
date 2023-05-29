<!-- Add this code to your verify_otp.blade.php view -->
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
