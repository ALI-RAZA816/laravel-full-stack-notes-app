
@extends('layout.layout')
@section('contents')
<div class="modal-card">

    <!-- Header -->
    <div class="modal-header-custom">
        <div>
            <h2 class="modal-title-custom">Manage Categories</h2>
            <p class="modal-subtitle-custom mb-0">Organize your thoughts with colors</p>
        </div>
    </div>

    <!-- Create category -->
    <form action="{{route('post.category')}}" method="POST">
        @csrf
        <div class="create-box flex-column d-flex">
            <input type="text" class="category-input" name='category' placeholder="Category Name">
            @error('category')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <button class="btn-create-cat">Create</button>
        </div>
    </form>

    <!-- Category list -->
    <div class="category-list">
        @foreach ($categories as $category )
            <div class="category-list-item justify-content-between">
                <span class="category-name">{{$category->title}}</span>
                <div class="d-flex align-items-center">
                    <a href="{{route("edit.post",$category->id)}}"><button class="card-action-btn edit me-2" title="Edit"><i class="bi bi-pencil"></i></button></a>
                    <a href="{{route('delete.category',$category->id)}}"><button class="card-action-btn delete" title="Delete"><i class="bi bi-trash"></i></button></a>
                </div>
            </div>   
        @endforeach
    </div>
</div>
@endsection