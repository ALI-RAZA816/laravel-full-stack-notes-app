@extends('layout.layout')
@section('contents')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
    <div>
        <h1 class="page-title">All Notes</h1>
        <p class="page-subtitle mb-0">Organize your thoughts, one note at a time.</p>
    </div>
</div>
<div class="row g-4">
    <form action="{{route('search',Auth::id())}}" method="GET">
        <div class="search-box d-flex w-100 align-items-center">
            <i class="bi bi-search"></i>
            <input type="text" name="search" placeholder="Search your notes...">
            <a href=""><button type="submit" class="btn ms-2 " style="background-color: #4648d4;color:#fff;">Search</button></a>
        </div>
    </form>
    <!-- Card 1 -->
    @if($notes->count() > 0)
        @foreach ($notes as $note )
            <div class="col-md-6 col-lg-4"> 
                <a href="{{route('single',[$note->id, Auth::id()])}}">
                    <div class="note-card">
                    @if ($note->favourate === 'star')
                        <i style="color:#969696;position: absolute;top:15px;right:15px;" class="bi bi-star"></i>
                    @endif
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge-tag badge-work">{{$note->category_name}}</span>
                        <span class="card-date">{{\Carbon\Carbon::parse($note->created_at)->format('M, d, Y')}}</span>
                    </div>
                    <h3 class="card-title">{{$note->title ? substr($note->title,0,20) : $note->title}}</h3>
                    <p class="card-desc">{{$note->content ? substr($note->content,0,100) : $note->content}}</p>
                    <div class="card-actions">
                        @if ($note->favourate === 'star')
                        <a href="{{route('note.remove',$note->id)}}">
                            <button style="background-color: #f59e0b;color:white;" class="card-action-btn star" title="Favorite"><i class="bi bi-star"></i></button>
                        </a>
                        @else
                        <a href="{{route('note.star',$note->id)}}">
                            <button class="card-action-btn star" title="Favorite"><i class="bi bi-star"></i></button>
                        </a>
                        @endif($note->favourate === 'star')
                        <a href="{{route('editnote',[$note->id, Auth::id()])}}"><button class="card-action-btn edit" title="Edit"><i class="bi bi-pencil"></i></button></a>
                        <a href="{{route('note.delete',$note->id)}}"><button class="card-action-btn delete" title="Delete"><i class="bi bi-trash"></i></button></a>
                    </div>
                </div></a>
            </div>    
        @endforeach
    @else
    <div style="min-height:45vh;" class="d-flex justify-content-center align-items-center">
        <h2 class="text-lowercase text-secondary">No Notes Available</h2>
    </div>
    @endif
</div>
@endsection