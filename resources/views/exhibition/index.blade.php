{{-- resources/views/exhibition.blade.php --}}
@extends('template.index')

@section('title', 'Indonesia Miner : Exhibition')
@section('header-bg', 'bg-light')

@section('content')
    <div class="container mt-5 pt-5">

        {{-- ——— Hero header ——— --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold">STAY AT THE FOREFRONT OF THE INDUSTRY</h2>
            <p class="lead">BE A PART OF INDONESIA #1 PREMIER MINING EVENT</p>
        </div>

        {{-- ——— Video + alasan ikut ——— --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <!-- in your Blade -->
                <div class="plyr__video-embed plyr-responsive" id="player">
                    <iframe
                        src="https://www.youtube.com/embed/X7vE_oTmUg8?
                        autoplay=0
                        &loop=1
                        &playlist=X7vE_oTmUg8
                        &modestbranding=1
                        &rel=0
                        &iv_load_policy=3
                        &showinfo=0"
                        allow="fullscreen" allowfullscreen></iframe>
                </div>

            </div>
            <div class="col-md-6">
                <p class="fs-5 mb-3">
                    Join the excitement! Here’s why you can’t miss
                    <strong>Indonesia Miner Conference & Exhibition 2025:</strong>
                </p>
                <ul class="list-unstyled">
                    <li class="d-flex mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <div>
                            <strong>One Dynamic Platform</strong><br>
                            From impactful conferences to hands-on exhibitions and workshops, it’s the perfect stage to
                            amplify your brand.
                        </div>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <div>
                            <strong>Think Local, Go Global</strong><br>
                            Engage with Indonesia's mining landscape through a global lens.
                        </div>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <div>
                            <strong>Network Without Limits</strong><br>
                            Connect with decision-makers, influencers, and key associations.
                        </div>
                    </li>
                </ul>
                <a href="#exhibitor" class="btn btn-warning mt-3">
                    Discover Options to Elevate Your Brand
                </a>
            </div>
        </div>

        {{-- ——— Key stats ——— --}}
        <div class="row text-center mb-5">
            @php
                $stats = [
                    ['1.500+', 'Delegates'],
                    ['540+', 'Companies'],
                    ['26+', 'Countries'],
                    ['60+', 'Speakers'],
                    ['40+', 'Leading Companies as Sponsors & Exhibitors'],
                ];
            @endphp
            @foreach ($stats as $s)
                <div class="col-6 col-md-4 col-lg text-center mb-4">
                    <h3 class="display-5 fw-bold">{{ $s[0] }}</h3>
                    <p class="mb-0">{{ $s[1] }}</p>
                </div>
            @endforeach
        </div>

        {{-- ——— Intro text ——— --}}
        <div class="mb-5">
            <p>
                Indonesia Miner Conference & Exhibition 2025 offers a unique opportunity to showcase your brand to the right
                audience on the right platform. Building on the success of last year's event, we invite you to participate
                in the return of Indonesia's #1 premier mining event on June 10 - 12 at The Westin Hotel Jakarta, Indonesia.
                Don’t miss the chance to make your mark and get discovered by industry leaders, experts, key
                decision-makers, and influential figures in Indonesia mining sector.
            </p>
        </div>

    </div>

    {{-- ——— Photo carousel/grid ——— --}}
    <section id="photo-gallery" class="py-5 bg-light">
        @include('home.section.photo')
    </section>

    {{-- ——— Packages & Modals ——— --}}
    @php
        $packages = [
            [
                'title' => 'EXHIBITOR',
                'logo' => 'new-home/logo/9.png',
                'modalId' => 'exhibitModal',
                'features' => [
                    ['Prime, Super, Standard Plus and Standard', true],
                    ['Up to 6 Exhibitor Passes Included', true],
                    ['Up to 100 Wishlist for Visitor Passes', true],
                    ['Company Logo & Profile Placement on Event Booklet', true],
                    ['Social Media Promotional Content', true],
                    ['Listing at Indonesia Miner Directory (Online & Book)', true],
                    ['Speaking Opportunity', false],
                    ['Exposure to Email List', false],
                    ['Company Logo on All Marketing Materials', false],
                    ['Company Logo on Onsite Branding', false],
                    ['On Site Physical Branding', false],
                    ['Lounge Packages', false],
                    ['Lunches and Networking Drinks packages', false],
                    ['Private Meeting Room', false],
                ],
            ],
            [
                'title' => 'OFFICIAL SPONSOR',
                'logo' => 'new-home/logo/10.png',
                'modalId' => 'sponsorModal',
                'features' => collect([
                    'Platinum, Gold and Silver',
                    'Up to 6 Delegate Passes Included',
                    'Up to 100 Wishlist for Visitor Passes',
                    'Speaking Opportunity',
                    'Company Logo & Profile Placement on Event Booklet',
                    'Social Media Promotional Content',
                    'Listing at Indonesia Miner Directory (Online & Book)',
                    'Exposure to Email List',
                    'Company Logo on All Marketing Materials',
                    'Company Logo on Onsite Branding',
                    'On Site Physical Branding',
                    'Lounge Packages',
                    'Lunches and Networking Drinks packages',
                    'Private Meeting Room',
                ])
                    ->map(fn($t) => [$t, true])
                    ->toArray(),
            ],
        ];
    @endphp

    <section class="py-5">
        <div class="container">
            <div class="wrapper2">
                <div style="color:white">.</div>
                <div class="pricing-table-get">
                    @foreach ($packages as $pkg)
                        @php
                            $suf = $loop->first ? '' : '2';
                        @endphp
                        <div class="container-get">
                            <div class="header-get{{ $suf }}">{{ $pkg['title'] }}</div>
                            <div class="background-get{{ $suf }}">
                                <img src="{{ asset($pkg['logo']) }}" alt="{{ $pkg['title'] }} icon" class="img">
                            </div>
                            <div class="content-get">
                                <ul>
                                    @foreach ($pkg['features'] as [$label, $ok])
                                        <li class="d-flex align-items-start mb-2">
                                            <i
                                                class="fa {{ $ok ? 'fa-check text-success' : 'fa-times text-danger' }} me-2"></i>
                                            <span>{{ $label }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="button" class="cssbuttons-io-button" data-bs-toggle="modal"
                                data-bs-target="#{{ $pkg['modalId'] }}">
                                Get started
                                <div class="icon">
                                    <i class="fa fa-arrow-right text-dark"></i>
                                </div>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ——— Bootstrap Modals ——— --}}
    {{-- Exhibition Modal --}}
    <div class="modal fade" id="exhibitModal" tabindex="-1" aria-labelledby="exhibitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exhibitModalLabel">Join Indonesia Miner 2025</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="exhibitForm" action="{{ url('contact/exhibition') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name *" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email *" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="company_name" class="form-control" placeholder="Company Name *"
                                required>
                        </div>
                        <div class="mb-3">
                            <input id="phoneExhibit" type="tel" name="phone" class="form-control"
                                placeholder="Phone Number *" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">
                            SEND ME MORE DETAILS
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Sponsorship Modal --}}
    <div class="modal fade" id="sponsorModal" tabindex="-1" aria-labelledby="sponsorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sponsorModalLabel">Join Indonesia Miner 2025</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="sponsorForm" action="{{ url('contact/sponsorship') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name_sponsor" class="form-control" placeholder="Name *"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email_sponsor" class="form-control" placeholder="Email *"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="company_name_sponsor" class="form-control"
                                placeholder="Company Name *" required>
                        </div>
                        <div class="mb-3">
                            <input id="phoneSponsor" type="tel" name="phone_sponsor" class="form-control"
                                placeholder="Phone Number *" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">
                            SEND ME MORE DETAILS
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')
    @include('exhibition.css')
@endpush

@push('bottom')
    @include('exhibition.js')
@endpush
