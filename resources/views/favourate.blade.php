@extends('layout.layout')
@section('contents')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
    <div>
        <h1 class="page-title">Favorite Notes</h1>
        <p class="page-subtitle mb-0">Your starred notes and ideas</p>
    </div>
</div>
<div class="row g-4">

    <!-- Card 1 -->
    @if ($fav->count() > 0)
        @foreach ($fav as $favourate )
        <div class="col-md-6 col-lg-4">
            <a href="{{route('single',[$favourate->id, Auth::id()])}}"><div class="note-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge-tag badge-work">{{$favourate->category_name}}</span>
                    <span class="card-date">{{\Carbon\Carbon::parse($favourate->created_at)->format('M, d, Y')}}</span>
                </div>
                <h3 class="card-title">{{$favourate->title ? substr($favourate->title,0,20) : $favourate->title}}</h3>
                <p class="card-desc">{{$favourate->content ? substr($favourate->content,0 ,100) : $favourate->content}}</p>
                <div class="card-actions">
                    <a href="{{route('note.remove',$favourate->id)}}">
                        <button style="background-color: #f59e0b;color:white;" class="card-action-btn star" title="Favorite"><i class="bi bi-star"></i></button>
                    </a>
                </div>
            </div></a>
        </div>
        @endforeach
    @else
        <div style="min-height:45vh;" class="d-flex justify-content-center align-items-center">
            <h2 class="text-lowercase text-secondary">No Favorite Notes Available</h2>
        </div>
    @endif


</div>
@endsection