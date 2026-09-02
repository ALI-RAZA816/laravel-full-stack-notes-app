@extends('layout.layout')
@section('contents')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
    <div>
        <h1 class="page-title">User Management</h1>
        <p class="page-subtitle mb-0">Manage team members, roles, and permissions.</p>
    </div>
</div>

<!-- Stat cards -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-card-header">
                <span class="stat-label">Total Users</span>
                <div class="stat-icon purple"><i class="bi bi-people-fill"></i></div>
            </div>
            <span class="stat-value">{{$total < 9 ? '0'.$total : $total}}</span>
            <span class="stat-sub primary">+{{$thismonth}} this month</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-card-header">
                <span class="stat-label">Active Now</span>
                <div class="stat-icon gray"><i class="bi bi-lightning-fill"></i></div>
            </div>
            <span class="stat-value">{{$active < 9 ? '0'.$active : $active}}</span>
            <span class="stat-sub">{{$average}}% of total</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-card-header">
                <span class="stat-label">Inactive</span>
                <div class="stat-icon gray"><i class="bi bi-hourglass-split"></i></div>
            </div>
            <span class="stat-value">{{$inactive}}</span>
            <span class="stat-sub danger">{{$averageInactive}}% of total</span>
        </div>
    </div>
</div>

<!-- Table card -->
<div class="table-card">

    <!-- Filter bar -->
    <div class="filter-bar">
        <form action="{{route('search.user')}}" method="GET" class="d-flex w-100">
            @csrf
            <div class="filter-input-wrap">
                <i class="bi bi-funnel"></i>
                <input type="text" name="search" placeholder="Filter users by name, email...">
            </div>
            <button class="ms-2 btn-filter-dropdown">Search</button>
        </form>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>USER</th>
                    <th>ROLE</th>
                    <th>STATUS</th>
                    <th>LAST ACTIVE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allusers as $user )
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar-initials  overflow-hidden" style="background:#e0e5fc; color:#3b3fc9;">
                                     @if ($user->profile)
                                        <img src="/uploads/{{$user->profile}}" class="img-fluid" alt="Profile background">
                                    @else
                                        {{substr($user->name,0,1)}}
                                    @endif
                                </div>
                                <div>
                                    <div class="user-name">{{ucwords($user->name)}}</div>
                                    <div class="user-email">{{$user->email}}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="role-badge admin">{{ucwords($user->role)}}</span></td>
                        <td><span class="status-cell"><span class="status-dot {{$user->status == 'active' ? 'active' : 'inactive'}}"></span>{{ucwords($user->status)}}</span></td>
                        <td><span class="last-active">{{\Carbon\Carbon::parse($user->created_at)->format('M, d, Y')}}</span></td>
                        <td class="align-center">
                            <div class="d-flex">
                                <a href="{{route('setting',$user->id)}}"><button class="card-action-btn edit me-2" title="Edit"><i class="bi bi-pencil"></i></button></a>
                                <a href="{{route('user.delete',$user->id)}}"><button class="card-action-btn delete" title="Delete" {{$user->role === 'admin' ? 'disabled':''}}><i class="bi bi-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="table-footer">
        {{$allusers->links()}}
        {{-- <span class="footer-count">Showing 4 of 24 users</span>
        <div class="pagination-controls">
            <button class="page-arrow" disabled><i class="bi bi-chevron-left"></i></button>
            <span class="page-num">1</span>
            <button class="page-arrow"><i class="bi bi-chevron-right"></i></button>
        </div> --}}
    </div>
</div>
@endsection
