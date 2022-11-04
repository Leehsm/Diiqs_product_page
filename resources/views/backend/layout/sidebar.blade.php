<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Sale Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manage-feedback') }}">
                    Feedback
                </a>
            <li class="nav-item">
                <a class="nav-link" >
                    {{-- Integrations --}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" >
                    {{-- Integrations --}}
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Frontend Infomation</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manage-product-and-combo') }}">
                    Products & Combo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manage-slider') }}">
                    Sliders
                </a>
                </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('manage-about-us') }}">
                About us
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('manage-about-product') }}">
                About Product
            </a>
            </li>
        </ul>
    </div>
</nav>