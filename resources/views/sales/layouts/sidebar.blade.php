<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('sales.dashboard') }}">Daily Report</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{ route('sales.dashboard') }}"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li><a class="nav-link" href="{{ route('sales.target-sales.index') }}"><i class="fas fa-bullseye"></i></i>
            <span>Target</span></a></li>
            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{ route('sales.brand-client.index') }}"><i class="fas fa-phone"></i>
                    <span>Brand/Client</span></a></li>
            <li><a class="nav-link" href="{{ route('sales.daily-report.index') }}"><i class="fas fa-vote-yea"></i>
                    <span>Daily Report</span></a></li>
            <li><a class="nav-link" href="{{ route('sales.proposal-surat.index') }}"><i class="fas fa-mail-bulk"></i>
                    <span>Proposal dan Surat</span></a></li>
            <li><a class="nav-link" href="{{ route('sales.media-order.index') }}"><i class="fas fa-tv"></i> <span>List
                        Media Order</span></a></li>

            <li class="menu-header">Setting</li>
            <li><a class="nav-link" href="{{ route('sales.profile') }}"><i class="fas fa-user-alt"></i> <span>My
                        Profile</span></a></li>

    </aside>
</div>
