<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NotesHub - Sign In</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="d-flex flex-wrap justify-content-center">
    <!-- ===== Left Side: Login Form ===== -->
    <section class="login-side col-12 col-lg-6 d-flex align-items-center justify-content-center p-4">
        <div class="w-100" style="max-width:420px;">

            <!-- Branding -->
            <div class="text-center mb-4">
                <svg class="brand-logo mb-2" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="10" fill="#4648d4"/>
                    <path d="M12 28V12L28 28V12" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h1 class="brand-title mb-2">NotesHub</h1>
                <p class="brand-subtitle mb-0">Focus your thoughts, organize your world.</p>
            </div>

            <!-- Card -->
            <div class="login-card">
                <form action="{{route('login.page')}}" method="POST">
                    @csrf
                    <!-- Email -->
                   
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-icon-group">
                            <i class="bi bi-envelope"></i>
                            <input type="email" class="form-control" value="alirazamujahid102@gmail.com" name="email" id="email" placeholder="name@company.com">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label mb-0">Password</label>
                            <a href="{{route('resetpassword')}}" style="font-size:14px; color:royalblue;">Forgot password?</a>
                        </div>
                        <div class="input-icon-group">
                            <i class="bi bi-lock"></i>
                            <input type="password" class="form-control" name="password" value="admin123" id="password" placeholder="••••••••">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Sign in -->
                    <button type="submit" class="btn btn-signin w-100">
                        Sign In <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
                <!-- Footer -->
                <p class="text-center mt-4 mb-0" style="font-size:16px; color:var(--on-surface-variant);">
                    Don't have an account? <a href="{{route("register")}}" class="register-link">Register</a>
                </p>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
