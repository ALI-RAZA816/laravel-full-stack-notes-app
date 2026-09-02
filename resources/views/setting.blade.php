
@extends('layout.layout')
@section('contents')
    <h1 class="page-title">Setting</h1>
    <p class="page-subtitle">Manage your public information and how others see you on NotesHub.</p>

    <div class="profile-card">
        <form action="{{route('update.user',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Profile Picture -->
            <div class="d-flex align-items-center gap-4 flex-wrap">
                <div class="avatar-wrap">
                    @if ($user->profile)
                        <img src="/uploads/{{$user->profile}}" alt="Profile background">
                    @else
                        <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=200&h=200&fit=crop" alt="Profile background">
                        <i class="bi bi-person-fill-add"></i>
                    @endif
                </div>
                <div>
                    <h2 class="picture-heading">Profile Picture</h2>
                    <p class="picture-hint mb-0">JPG, GIF or PNG. Max size of 2MB.</p>
                    <div class="d-flex gap-2 mt-3">
                        <label class="btn-upload" for="profile">
                            <input type="file" hidden id="profile" name="profile">
                            Upload
                        </label>
                        {{-- <button ></button> --}}
                    </div>
                    @error('profile')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <hr class="divider">

            <!-- Form fields -->
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label-custom" for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" class="form-control-custom" value="{{$user->name}}">
                    @error('fullname')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label-custom" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control-custom" value="{{$user->email}}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label-custom" for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control-custom" value="{{$user->phone}}">
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label-custom" for="phone">Role</label>
                    <select name="role" id="" class="form-control-custom">
                        @if($user->role == 'editor')
                            <option selected value="editor">Editor</option>
                            <option value="admin">Admin</option>
                            <option value="viewer">Viewer</option>
                        @elseif ($user->role == 'admin')
                            <option  value="editor">Editor</option>
                            <option selected value="admin">Admin</option>
                            <option value="viewer">Viewer</option>
                        @elseif ($user->role == 'viewer')
                            <option  value="editor">Editor</option>
                            <option  value="admin">Admin</option>
                            <option selected value="viewer">Viewer</option>
                        @endif
                    </select>
                    @error('role')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <hr class="divider">

            <!-- Actions -->
            <div class="d-flex justify-content-end gap-2">
                <button class="btn-save">Save Changes</button>
            </div>
        </form>
    </div>

@endsection