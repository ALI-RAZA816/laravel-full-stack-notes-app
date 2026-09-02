@extends('layout.layout')
@section('contents')<!-- Editor toolbar -->

<!-- Note card -->
<div class="note-card">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="d-flex align-items-center gap-3">
            <span class="note-tag">{{$note->category_name}}</span>
        </div>
    </div>

    <h1 class="note-title">{{$note->title}}</h1>
    <div class="note-body">
        <h3>Content</h3>
        <p>{{$note->content}}</p>
    </div>

</div>
@endsection