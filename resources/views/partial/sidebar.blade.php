<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Point of sale System</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="{{ url('/users') }}" >
        <i class="fas fa-fw fa-cog"></i>
        <span>Users</span>
    </a>
</li>

<!-- <li class="nav-item">
    <a class="nav-link" href="{{ url('/orders') }}" >
        <i class="fas fa-fw fa-cog"></i>
        <span>orders</span>
    </a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Product
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="{{ url('/category') }}" >
        <i class="fas fa-fw fa-cog"></i>
        <span>Category</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ url('/subcategory') }}" >
        <i class="fas fa-fw fa-cog"></i>
        <span>Sub Category</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/units') }}" >
        <i class="fas fa-fw fa-wrench"></i>
        <span>Units</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/products') }}" >
        <i class="fas fa-fw fa-wrench"></i>
        <span>Product</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="{{ url('/customers') }}" >
        <i class="fas fa-fw fa-user"></i>
        <span>Customers</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Reports
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Sales Report</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Sales Return</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Product List Purchases</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Product List Returns</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Product List Cancelled</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->