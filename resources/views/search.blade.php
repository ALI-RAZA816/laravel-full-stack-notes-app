@extends('layout.layout')
@section('contents')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
    <div>
        <h1 class="page-title">Search Notes</h1>
        <p class="page-subtitle mb-0">{{$search->count()}} results found.</p>
    </div>
</div>
<div class="row g-4">

    <!-- Card 1 -->
    @if ($search->count() > 0)
        @foreach ($search as $note )
            <div class="col-md-6 col-lg-4">
                <a href="{{route('single',[$note->id, Auth::id()])}}">
                    <div class="note-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge-tag badge-work">{{$note->category_name}}</span>
                            <span class="card-date">{{\Carbon\Carbon::parse($note->created_at)->format('M, d, Y')}}</span>
                        </div>
                        <h3 class="card-title">{{$note->title ? substr($note->title,0,20) : $note->title}}</h3>
                        <p class="card-desc">{{$note->content ? substr($note->content,0,40) : $note->content}}</p>
                        <div class="card-actions">
                            @if ($note->favourate === 'star')
                            <a href="{{route('note.remove',$note->id)}}">
                                <button style="background-color: #f59e0b;color:white;" class="card-action-btn star" title="Favorite"><i class="bi bi-star"></i></button>
                            </a>
                            @else
                            <a href="{{route('note.star',$note->id)}}">
                                <button class="card-action-btn star" title="Favorite"><i class="bi bi-star"></i></button>
                            </a>
                            @endif
                            <a href="{{route('editnote',[$note->id, Auth::id()])}}"><button class="card-action-btn edit" title="Edit"><i class="bi bi-pencil"></i></button></a>
                            <a href="{{route('note.delete',$note->id)}}"><button class="card-action-btn delete" title="Delete"><i class="bi bi-trash"></i></button></a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
     <div style="min-height:45vh;" class="d-flex justify-content-center align-items-center">
        <h2 class="text-lowercase text-secondary">Not Found</h2>
    </div>
    @endif

</div>
@endsection