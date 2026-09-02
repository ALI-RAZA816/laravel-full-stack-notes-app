<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NotesHub - Create Account</title>
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
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-4 border card p-4">

                <!-- Heading -->
                <h1 class="page-title">Join our workspace</h1>
                <p class="page-subtitle">Start capturing your thoughts with clarity and speed.</p>

                <!-- Form -->
                <form action="{{route('createaccount')}}" method="POST">
                    @csrf
                    <!-- Full Name -->
                    <label for="fullname" class="form-label">Full Name</label>
                    <div class="input-icon-group">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="John Doe">
                        @error('fullname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-icon-group">
                        <i class="bi bi-envelope"></i>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@company.com">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <label for="password" class="form-label">Password</label>
                    <div class="input-icon-group">
                        <i class="bi bi-lock"></i>
                        <input type="password" class="form-control" name="password" id="password" placeholder="••••••••">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <div class="input-icon-group">
                        <i class="bi bi-arrow-counterclockwise"></i>
                        <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="••••••••">
                        @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- Submit -->
                    <button type="submit" class="btn btn-create">Create Account</button>
                </form>

                <!-- Footer -->
                <p class="login-footer">Already have an account? <a href="{{route("login")}}">Login</a></p>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>