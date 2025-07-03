<nav class="navbar navbar-expand-lg fixed-top navbar-light shadow-sm custom-navbar">
    <div class="container-fluid px-3">
        <a class="navbar-brand fw-bold" href="#">
            <img src="https://indonesiaminer.com/vendor/front/images/indominer-icon.png" alt="Indonesia Miner Logo"
                height="40">
        </a>
        <span class="text-muted small d-none d-md-inline">Jakarta, The Westin Hotel • 4–6 June 2026</span>
        <button class="navbar-toggler collapsed ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Schedule</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Day 1</a></li>
                        <li><a class="dropdown-item" href="#">Day 2</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Exhibitors</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">List</a></li>
                        <li><a class="dropdown-item" href="#">Map</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="btn btn-warning me-2" href="{{ url('exhibition') }}">EXHIBIT &
                        SPONSOR</a></li>
                <button type="button" class="btn btn-outline-warning fw-bold" data-bs-toggle="modal"
                    data-bs-target="#interestModal">
                    REGISTER YOUR INTEREST
                </button>
            </ul>
        </div>
    </div>
</nav>
