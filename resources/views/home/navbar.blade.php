<!-- NAVBAR DESKTOP (≥992px) -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light shadow-sm custom-navbar d-none d-lg-flex">
    <div class="container-fluid px-3">
        <a class="navbar-brand fw-bold" href="#">
            <img src="https://indonesiaminer.com/vendor/front/images/indominer-icon.png" alt="Logo" height="40">
        </a>

        <div class="collapse navbar-collapse" id="navMenuDesktop">
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 align-items-center">
                <li class="nav-item px-2"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Exhibitors</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#exhibition-page">List of Exhibitor</a></li>
                        <li><a class="dropdown-item disabled">Floor Plan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">More</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#speakers">Speakers</a></li>
                        <li><a class="dropdown-item" href="#foim">FOIM 2025</a></li>
                        <li><a class="dropdown-item" href="#minerstalk">Miners Talk 2025</a></li>
                        <li><a class="dropdown-item" href="sponsors">Sponsors</a></li>
                        <li><a class="dropdown-item" href="news">News</a></li>
                    </ul>
                </li>
                <li class="nav-item px-2">
                    <a class="btn btn-warning me-2" href="exhibition">EXHIBIT & SPONSOR</a>
                </li>
                <li class="nav-item px-2">
                    <button class="btn btn-outline-warning fw-bold" data-bs-toggle="modal"
                        data-bs-target="#interestModal">
                        REGISTER YOUR INTEREST
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- NAVBAR MOBILE (≤991px) -->
<nav class="navbar custom-navbar fixed-top d-lg-none">
    <div class="container-fluid px-3">
        <a class="navbar-brand" href="#"><img
                src="https://indonesiaminer.com/vendor/front/images/indominer-icon.png" height="40"></a>
        <!-- tombol buka -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navMenuMobile"
            aria-controls="navMenuMobile" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- overlay backdrop -->
        <!-- panel -->
        <div class="collapse navbar-collapse" id="navMenuMobile">
            <!-- lihat baris ini -->
            <button type="button" class="btn-close mobile-close" data-bs-toggle="collapse"
                data-bs-target="#navMenuMobile" aria-controls="navMenuMobile" aria-label="Close">
            </button>

            <div class="mobile-ctas mb-4">
                <a href="exhibition" class="btn btn-warning w-100 mb-2">EXHIBIT & SPONSOR</a>
                <button class="btn btn-outline-warning w-100" data-bs-toggle="modal" data-bs-target="#interestModal">
                    REGISTER YOUR INTEREST
                </button>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#">Exhibitors <span class="caret"></span></a>
                    <ul class="submenu list-unstyled ps-3">
                        <li><a class="nav-link" href="#exhibition-page">List of Exhibitor</a></li>
                        <li><a class="nav-link disabled">Floor Plan</a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#">More <span class="caret"></span></a>
                    <ul class="submenu list-unstyled ps-3">
                        <li><a class="nav-link" href="#speakers">Speakers</a></li>
                        <li><a class="nav-link" href="#foim">FOIM 2025</a></li>
                        <li><a class="nav-link" href="#minerstalk">Miners Talk 2025</a></li>
                        <li><a class="nav-link" href="sponsors">Sponsors</a></li>
                        <li><a class="nav-link" href="news">News</a></li>
                    </ul>
                </li>
            </ul>
            <div class="mobile-social mt-auto pt-4">
                <span class="d-block mb-2">Follow us:</span>
                <div class="d-flex">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="ms-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="ms-3"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" class="ms-3"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="ms-3"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div id="mobileMenuOverlay"></div>
