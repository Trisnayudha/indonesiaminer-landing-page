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
                            amplify your brand and make a splash.
                        </div>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <div>
                            <strong>Think Local, Go Global</strong><br>
                            Engage with Indonesia's mining landscape through a global lens, featuring top-tier speakers,
                            delegates, and exhibitors from around the world.
                        </div>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <div>
                            <strong>Network Without Limits</strong><br>
                            Connect with decision-makers, influencers, and key associations shaping the future of the mining
                            industry.
                        </div>
                    </li>
                </ul>
                <a href="#package" class="btn btn-warning custom-yellow-btn fw-bold mt-3">
                    Discover Options to Elevate Your Brand
                </a>
            </div>
        </div>

        {{-- ——— Key stats ——— --}}
        <div class="row text-center mb-5">
            @php
                $stats = [
                    ['2.000+', 'Delegates'],
                    ['600+', 'Companies'],
                    ['20+', 'Countries'],
                    ['80+', 'Speakers'],
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
    <section id="package">
        @include('exhibition.package')
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
                            <input type="text" name="name_sponsor" class="form-control" placeholder="Name *" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email_sponsor" class="form-control" placeholder="Email *" required>
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
    @php
        // Di controller (atau di atas Blade)
        $trafficSources = [
            'Display (Desktop)',
            'Display (Mobile)',
            'Email',
            'LinkedIn',
            'Meta (Facebook / Instagram)',
            'Native',
            'Paid Search',
            'Pinterest',
            'Pops & Redirect',
            'Push',
            'Quora',
            'Reddit',
            'Search Arbitrage',
            'SEO',
            'SMS',
            'SnapChat',
            'Telegram',
            'TikTok',
            'Twitter',
            'YouTube',
            'Other',
        ];

        $verticals = [
            'exploration' => 'Exploration & Geoscience',
            'minerals' => 'Base & Precious Minerals',
            'coal' => 'Coal & Thermal Energy',
            'metallurgy' => 'Metallurgy & Smelting',
            'safety' => 'Health, Safety & Environment',
            'equipment' => 'Mining Equipment & Machinery',
            'digital' => 'Digitalization & Automation',
            'supply_chain' => 'Supply Chain & Logistics',
            // … kalau mau tambah tinggal tambah di sini
        ];
    @endphp

    <!-- ===== Traffic & Verticals Modal ===== -->
    <div class="modal fade" id="trafficSourcesModal" tabindex="-1" aria-labelledby="trafficSourcesLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="trafficForm" class="modal-body">
                    @csrf

                    {{-- TRAFFIC SOURCES --}}
                    <!-- Bagian atas daftar checkbox di modal -->
                    <div>
                        <strong>What traffic sources are you interested in?</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">

                        <small>Please select minimum of 1</small>
                        <a href="#" id="clearAllTraffic" class="text-decoration-none">Clear all</a>
                    </div>

                    <div class="row gx-3">
                        @foreach ($trafficSources as $source)
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input traffic-checkbox" type="checkbox"
                                        value="{{ $source }}" id="traffic-{{ Str::slug($source) }}">
                                    <label class="form-check-label" for="traffic-{{ Str::slug($source) }}">
                                        {{ $source }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <hr>
                    <div>
                        <strong>What verticals are you interested in?</strong>
                    </div>
                    <div class="form-group mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <small>Please select minimum of 1</small>
                            <a href="#" id="clearVerticals" class="small">Clear all</a>
                        </div>

                        <div class="row">
                            @foreach ($verticals as $key => $label)
                                <div class="col-6 col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input vertical-checkbox" type="checkbox"
                                            name="verticals[]" id="vertical-{{ $key }}"
                                            value="{{ $key }}">
                                        <label class="form-check-label" for="vertical-{{ $key }}">
                                            {{ $label }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit choices</button>
                    </div>
                </form>
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
