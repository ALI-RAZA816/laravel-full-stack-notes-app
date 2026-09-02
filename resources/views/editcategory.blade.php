
@extends('layout.layout')
@section('contents')
<div class="modal-card">

    <!-- Header -->
    <div class="modal-header-custom">
        <div>
            <h2 class="modal-title-custom">Edit Category</h2>
            <p class="modal-subtitle-custom mb-0">Organize your thoughts with colors</p>
        </div>
    </div>

    <!-- Create category -->
    <form action="{{route('update.post',$singleCat->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="create-box flex-column d-flex">
            <input type="text" class="category-input" value='{{$singleCat->title}}' name='editcategory' placeholder="">
            <button type="submit" class="btn-create-cat">Update Category</button>
        </div>
    </form>

    <!-- Category list -->
    <div>
        @foreach ($allcategory as $item)
        <div class="category-list-item justify-content-between">
            <span class="category-name">{{$item->title}}</span>
        </div>
        @endforeach
    </div>
</div>
@endsection