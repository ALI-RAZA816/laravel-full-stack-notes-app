<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verify Your Email - NotesHub</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-4 page-wrap">
        
          <!-- Card -->
          <div class="card-custom">
            <h1 class="card-title-custom">Verify your email</h1>
            <p class="card-subtitle-custom">
              We've sent a 6-digit code to your <b>{{session('email')}}</b> email address.<br>
              Please enter it below to continue.
            </p>
        
            <form action="{{route('verify.otp')}}" method="POST">
              @csrf
              <div class="flex-column otp-group mb-2">
                <input type="text" maxlength="6" class="otp-input" name="otp" inputmode="numeric" placeholder="Enter OTP">
                @error('otp')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
        
              <button type="submit" class="btn-verify">Verify Code</button>
            </form>
            
            <div class="resend-text">
              <span>Didn't receive the code?</span>

              <form action="{{ route('reset.password') }}" method="POST" style="display:inline;">
                  @csrf
                  <input type="email" name="email" value="{{session('email')}}" hidden>
                  <button type="submit" class="btn btn-link">
                      Resend
                  </button>
              </form>
            </div>
            
        
            <a href="{{route('login')}}" class="back-link">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Back to Login
            </a>
          </div>
        
        </div>
    </div>
</div>
</body>
</html>