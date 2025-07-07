    <div class="container text-center mb-5">
        <h2 class="fw-bold">Buy Tickets</h2>
    </div>

    <div class="container-fluid">
        <div class="row g-4 justify-content-center">
            {{-- Late Ticket --}}
            <div class="col-6 col-md-6 col-lg-4">
                <div class="card ticket-card mx-auto">
                    <div class="card-header text-center text-uppercase bg-white">
                        Late Ticket
                    </div>
                    <div class="ticket-price-section text-center">
                        <div class="h5 fw-normal">Normal Price</div>
                        <div class="display-4 fw-bold mb-2">$1,500</div>
                    </div>
                    <div class="card-body">
                        <ul class="ticket-features list-unstyled mb-4">
                            <li>3-day delegate & exhibition access (incl. luncheon…)</li>
                            <li>40+ live speeches, panels & Q&A</li>
                            <li>Access to presentation materials</li>
                            <li>Identified as a company</li>
                            <li>Company name, logo & job title on profile</li>
                            <li>Live chat with attendees</li>
                        </ul>
                        <button class="btn btn-warning ticket-btn w-100">
                            BUY NOW
                        </button>
                    </div>
                </div>
            </div>

            {{-- Early Bird --}}
            <div class="col-6 col-md-6 col-lg-4">
                <div class="card ticket-card position-relative mx-auto">
                    <div class="ribbon bg-danger text-white position-absolute">
                        20% OFF
                    </div>
                    <div class="card-header text-center text-uppercase bg-white">
                        Early Bird
                    </div>
                    <div class="ticket-price-section text-center">
                        <div class="small text-muted text-decoration-line-through mb-1">
                            $1,500
                        </div>
                        <div class="display-4 fw-bold mb-2">$1,200</div>
                    </div>
                    <div class="card-body">
                        <ul class="ticket-features list-unstyled mb-4">
                            <li>3-day delegate & exhibition access</li>
                            <li>40+ live speeches, panels & Q&A</li>
                            <li>Access to all presentation materials</li>
                            <li>Company profile highlight</li>
                            <li>Networking dinner invite</li>
                            <li>Live chat with attendees</li>
                        </ul>
                        <button class="btn btn-warning ticket-btn w-100">
                            BUY NOW
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bundles --}}
        <div class="row g-4 justify-content-center mt-2">
            {{-- 3× Normal Deal --}}
            <div class="col-6 col-md-6 col-lg-4">
                <div class="card ticket-card bundle-card mx-auto">
                    <div class="card-header text-center text-uppercase bg-white">
                        3 × Normal Deal
                    </div>
                    <img src="{{ asset('new-home/tickets/bundle_3_v1.png') }}" class="card-img-top bundle-artwork"
                        alt="3× Normal Deal">
                    <div class="card-body">
                        <button class="btn btn-warning ticket-btn w-100" data-bs-toggle="modal"
                            data-bs-target="#paymentNew">
                            BUY NOW
                        </button>
                    </div>
                </div>
            </div>

            {{-- 5× Normal Deal --}}
            <div class="col-6 col-md-6 col-lg-4">
                <div class="card ticket-card bundle-card mx-auto">
                    <div class="card-header text-center text-uppercase bg-white">
                        5 × Normal Deal
                    </div>
                    <img src="{{ asset('new-home/tickets/bundle_5_v2.png') }}" class="card-img-top bundle-artwork"
                        alt="5× Normal Deal">
                    <div class="card-body">
                        <button class="btn btn-warning ticket-btn w-100" data-bs-toggle="modal"
                            data-bs-target="#paymentNew">
                            BUY NOW
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
