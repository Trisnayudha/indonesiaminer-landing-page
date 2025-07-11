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

    <div class="sticky-bottom-bar d-flex align-items-center justify-content-center px-3 gap-3">

        <div class="timer text-white">
            <span class="label">
                Indonesia Miner 2026 Booth Sales Coming Soon
            </span>
        </div>
    </div>

    @include('exhibition.modal')


@endsection

@push('head')
    @include('exhibition.css')
@endpush

@push('bottom')
    @include('exhibition.js')
@endpush
