<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('manager.dashboard') }}">Daily Report</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{setActive(['manager.dashboard'])}}"><a class="nav-link" href="{{ route('manager.dashboard') }}"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li class="{{setActive(['manager.target-sales.*'])}}"><a class="nav-link" href="{{ route('manager.target-sales.index') }}"><i class="fas fa-bullseye"></i></i><span>Target</span></a></li>
            <li class="menu-header">Report</li>
            <li class="{{setActive(['manager.brand-client.*'])}}"><a class="nav-link" href="{{ route('manager.brand-client.index') }}"><i class="fas fa-phone"></i><span>Brand/Client</span></a></li>
            <li class="{{setActive(['manager.daily-report.*'])}}"><a class="nav-link" href="{{ route('manager.daily-report.index') }}"><i class="fas fa-vote-yea"></i><span>Daily Report</span></a></li>
            <li class="{{setActive(['manager.proposal-surat.*'])}}"><a class="nav-link" href="{{ route('manager.proposal-surat.index') }}"><i class="fas fa-mail-bulk"></i><span>Proposal dan Surat</span></a></li>
            <li class="{{setActive(['manager.media-order.*'])}}"><a class="nav-link" href="{{ route('manager.media-order.index') }}"><i class="fas fa-tv"></i> <span>List Paket</span></a></li>

            <li class="menu-header">Setting</li>
            <li class="{{setActive(['manager.profile'])}}"><a class="nav-link" href="{{ route('manager.profile') }}"><i class="fas fa-user-alt"></i> <span>My Profile</span></a></li>

    </aside>
</div>
