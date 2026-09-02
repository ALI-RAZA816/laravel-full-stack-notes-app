<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Set New Password - NotesHub</title>
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
            <h1 class="card-title-custom">Set new password</h1>
            <p class="card-subtitle-custom">
              Your new password must be different from previous passwords.
            </p>
        
            <form action="{{route('change.password')}}" method="POST">
              @csrf
              <label for="newPassword" class="form-label-custom">New Password</label>
              <div class="input-group-custom">
                <input type="password" id="newPassword" class="form-control-custom" name="password" placeholder="Password">
                @error('password')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
        
              <label for="confirmPassword" class="form-label-custom">Confirm Password</label>
              <div class="input-group-custom">
                <input type="password" id="confirmPassword" name="password_confirmation" class="form-control-custom" placeholder="Re-enter password">
                 @error('password_confirmation')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
        
              <button type="submit" class="btn-reset">Reset Password</button>
            </form>
        
            <hr class="hr-custom">
        
            <a href="{{route('login')}}" class="back-link">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Back to Login
            </a>
          </div>
        
          <!-- Footer -->
          <p class="footer-text">Secure 256-bit encrypted connection</p>
        
        </div>
    </div>
</div>
</body>
</html>