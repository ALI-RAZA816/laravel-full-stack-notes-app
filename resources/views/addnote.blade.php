@extends('layout.layout')
@section('contents')
<div class="modal-card">
    <!-- Header -->
    <div class="modal-header-custom">
        <div class="header-icon"><i class="bi bi-pencil-square"></i></div>
        <div>
            <h2 class="modal-title-custom">Create New Note</h2>
            <div class="modal-subtitle-custom">WORKSPACE &bull; NOTESHUB</div>
        </div>
        <button class="close-btn" title="Close"></button>
    </div>

    <!-- Body -->
    <div class="modal-body-custom">
        <form action="{{route('add.notes')}}" method="POST">
            @csrf
            <!-- Note Title -->
            <div class="mb-4">
                <label class="field-label" for="note-title">Note Title</label>
                <input type="text" id="note-title" value="{{old('title')}}" name="title" class="field-input" placeholder="What's on your mind?">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- Category + Visual Inspiration -->
            <div class="row g-4 mb-4">
                <div class="col">
                    <label class="field-label" for="category">Category</label>
                    <select id="category" name="category" class="category-select">
                        <option selected disabled value="">Select Category</option>
                        @foreach ($category as $cat )
                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- Content -->
            <div>
                <label class="field-label" for="content">Content</label>
                <textarea id="content" value="{{old('content')}}" class="content-textarea" name="content" placeholder="Start typing your note here..."></textarea>
                @error('content')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button class="btn-save-note">Save Note</button>
        </form>

    </div>
</div>

@endsection
