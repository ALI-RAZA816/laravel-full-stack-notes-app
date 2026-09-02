<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NotesHub - All Notes</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row overflow-hidden">
            <div class="col-1 col-xl-2 overflow-hidden p-0 vh-100 sidebar-outer">         
                <!-- ============ SIDEBAR ============ -->
                <aside class="sidebar">
                    <div>
                        <div class=" text-center mt-3 mt-xl-0 mb-3">
                            <img src="{{asset('logo.png')}}" class="img-fluid logo-image" alt="">
                        </div>
                        <div class="sidebar-label">PERSONAL WORKSPACE</div>
                        <a href="{{route('dashboard',Auth::id())}}" class="side-link {{request()->routeIs('dashboard') ? 'active' : ''}}"><i class="bi bi-file-earmark-text"></i> <span class="sidebar-link">All Notes</span></a>
                        @if(Gate::allows('isAdmin'))
                            <a href="{{route('users')}}" class="side-link {{request()->routeIs('users') ? 'active' : ''}}"><i class="bi bi-person"></i>  <span class="sidebar-link">Users</span></a>
                        @endif
                        <a href="{{route('favourate')}}" class="side-link {{request()->routeIs('favourate') ? 'active' : ''}}"><i class="bi bi-star"></i>  <span class="sidebar-link">Favorites</span></a>
                        <a href="{{route('addnote')}}"  class="side-link {{request()->routeIs('addnote') ? 'active' : ''}} fw-semibold"><i class="bi bi-journal-plus"></i> <span class="sidebar-link">Add Note</span></a>
                        <a href="{{route('category')}}" class="side-link {{request()->routeIs('category') ? 'active' : ''}} fw-semibold"><i class="bi bi-tags"></i> <span class="sidebar-link">Add Category </span></a>
                    </div>

                    <div class="sidebar-footer">
                        <a href="{{route('profile',Auth::id())}}" class="side-link {{request()->routeIs('profile') ? 'active' : ''}}"><i class="bi bi-gear"></i> <span class="sidebar-link">Settings</span></a>
                        <a href="{{route('logoutaccount.page',Auth::id())}}" class="side-link text-danger"><i class="bi text-danger bi-box-arrow-right"></i> <span class="sidebar-link">Logout</span></a>
                    </div>
                </aside>
            </div>
            <div class="col-11 overflow-hidden col-xl-10 p-0">
                <!-- ============ TOP NAVBAR ============ -->
                <div class="topnav">
                    <div class="logo">NotesHub</div>
                    <div style="height:40px;width:40px;border-radius:100%;background-color:#F4F6FE;border:1px solid #E7E8F2 ;" class="ms-auto justify-content-center overflow-hidden d-flex align-items-center gap-2">
                        @if (Auth::check())
                            @if (Auth::user()->profile)
                                <img class="img-fluid" src="{{ asset('uploads/' . Auth::user()->profile) }}" alt="Profile">
                            @else
                                {{substr(Auth::user()->name,0,1)}}
                            @endif
                        @endif
                    </div>
                </div>
                <!-- ============ MAIN CONTENT ============ -->
                <main class="main-content flex-grow-1">
                    @yield('contents')
                </main>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>