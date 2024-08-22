<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Daily Report</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{setActive(['admin.dashboard'])}}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li class="{{setActive(['admin.target-sales.*'])}}"><a class="nav-link" href="{{ route('admin.target-sales.index') }}"><i class="fas fa-bullseye"></i></i>
            <span>Target</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="{{setActive(['admin.brand-client.*'])}}"><a class="nav-link" href="{{ route('admin.brand-client.index') }}"><i class="fas fa-phone"></i><span>Brand/Client</span></a></li>
            <li class="{{setActive(['admin.daily-report.*'])}}"><a class="nav-link" href="{{ route('admin.daily-report.index') }}"><i class="fas fa-vote-yea"></i><span>Daily Report</span></a></li>
            <li class="{{setActive(['admin.proposal-surat.*'])}}"><a class="nav-link" href="{{ route('admin.proposal-surat.index') }}"><i class="fas fa-mail-bulk"></i><span>Proposal dan Surat</span></a></li>
            <li class="{{setActive(['admin.media-order.*'])}}"><a class="nav-link" href="{{ route('admin.media-order.index') }}"><i class="fas fa-tv"></i> <span>List Media Order</span></a></li>

            <li class="menu-header">Setting</li>
            <li class="{{setActive(['admin.profile'])}}"><a class="nav-link" href="{{ route('admin.profile') }}"><i class="fas fa-user-alt"></i> <span>My Profile</span></a></li>
            <li class="{{setActive(['admin.manage-user.*'])}}"><a class="nav-link" href="{{ route('admin.manage-user.index')}}"><i class="fas fa-user-cog"></i> <span>User List</span></a></li>

    </aside>
</div>
