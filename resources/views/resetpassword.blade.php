<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - NotesHub</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container">
  <div class="row vh-100 justify-content-center align-items-center">
    <!-- Card -->
    <div class="col-4 card-custom">
      <h1 class="card-title-custom">Forgot Password</h1>
      <p class="card-subtitle-custom">
        Enter your email address and we'll send you a link to reset your password.
      </p>
  
      <form action="{{route('reset.password')}}" method="POST">
        @csrf
        <label for="email" class="form-label-custom">Email Address</label>
        <div class="input-group-custom">
          <span class="icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 6L12 13L21 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/>
            </svg>
          </span>
          <input type="email" id="email" class="form-control-custom" name="email" placeholder="name@example.com">
          @error('email')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <button type="submit" class="btn-reset">Send Reset Link</button>
      </form>
  
      <div class="divider-custom">OR</div>
  
      <a href="{{route('login')}}" class="back-link">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Back to Login
      </a>
    </div>
  
  </div>
</div>

</body>
</html>