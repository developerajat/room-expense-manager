@php
$segment1 = request()->segment(1);
$segment2 = request()->segment(2) ?? '';
if (Auth::user()->isUser())
{
    $route = 'user.dashboard';
}
else{
    $route = 'dashboard';
}
@endphp

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="{{ route($route) }}">
                <img src="{{ asset('assets/img/brand/new-logo.png') }}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    @if (Auth::user()->isSuperAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ $segment1 == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $segment1 == 'users' ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="fa fa-users text-info" aria-hidden="true"></i>
                                <span class="nav-link-text">Manage Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $segment1 == 'expenses' ? 'active' : '' }}"
                                href="{{ route('expenses.index') }}">
                                <i class="fas fa-cog text-warning"></i>
                                <span class="nav-link-text">Manage Expenses</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->isUser())
                        <li class="nav-item">
                            <a class="nav-link {{ $segment1 == 'user' && $segment2 == 'dashboard' ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $segment1 == 'user' && $segment2 == 'invoices' ? 'active' : '' }}" href="{{ route('user.invoices.index') }}">
                                <i class="fas fa-file-invoice-dollar text-success"></i>
                                <span class="nav-link-text">Manage Expenses </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
