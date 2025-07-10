<div class="container">
    <div class="text-center mb-5">
        <h2 class="fw-bold">How big do you want your presence to be?</h2>
        <p class="lead">Discover customized sponsorship/ exhibition options tailored to your brand's needs.</p>
    </div>
</div>
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

{{-- ========================= --}}
{{--        MOBILE TABS      --}}
{{-- ========================= --}}
<ul class="nav nav-tabs d-md-none justify-content-center mb-3 position-relative" id="packageTabs" role="tablist">
    <li class="nav-item flex-fill" role="presentation">
        <button class="nav-link active" id="exhibit-tab" data-bs-toggle="tab" data-bs-target="#exhibit" type="button"
            role="tab">Exhibition</button>
    </li>
    <li class="nav-item flex-fill" role="presentation">
        <button class="nav-link" id="sponsor-tab" data-bs-toggle="tab" data-bs-target="#sponsor" type="button"
            role="tab">Sponsorship</button>
    </li>
    <div id="tabIndicator"></div>
</ul>

<div class="tab-content d-md-none mb-4" id="packageTabsContent">
    @foreach ($packages as $i => $pkg)
        @php $suffix = $i === 0 ? '' : '2'; @endphp
        <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="{{ $i === 0 ? 'exhibit' : 'sponsor' }}"
            role="tabpanel">
            <!-- PACKAGE CARD -->
            <div class="container-get mx-auto mb-4">
                <div class="header-get{{ $suffix }}">{{ $pkg['title'] }}</div>
                <div class="background-get{{ $suffix }}">
                    <img src="{{ asset($pkg['logo']) }}" class="img" alt="{{ $pkg['title'] }}">
                </div>
                <div class="content-get">
                    <ul>
                        @foreach ($pkg['features'] as [$label, $ok])
                            <li class="d-flex align-items-start mb-2">
                                <i class="fa {{ $ok ? 'fa-check text-success' : 'fa-times text-danger' }} me-2"></i>
                                <span>{{ $label }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="cssbuttons-io-button" data-bs-toggle="modal"
                    data-bs-target="#{{ $pkg['modalId'] }}">
                    Get started
                    <div class="icon"><i class="fa fa-arrow-right text-dark"></i></div>
                </button>
            </div>

            <!-- SUBSCRIBE CALLOUT -->
            <div class="subscribe-callout">
                <h3>COMING SOON!</h3>
                <p>
                    Indonesia Miner 2026 is just around the corner!
                    Sign up with your email and we’ll let you know the moment our exhibitor & sponsorship
                    packages become available.
                </p>
                <form class="subscribe-form" action="/your-subscribe-endpoint" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="you@example.com" required>
                    <button type="submit" class="btn btn-warning custom-yellow-btn fw-bold">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

{{-- ========================= --}}
{{--      DESKTOP GRID       --}}
{{-- ========================= --}}
<div class="container d-none d-md-block">
    <div class="wrapper2">
        <div class="pricing-table-get">
            @foreach ($packages as $i => $pkg)
                @php $suffix = $i === 0 ? '' : '2'; @endphp

                <!-- PACKAGE CARD -->
                <div class="container-get">
                    <div class="header-get{{ $suffix }}">{{ $pkg['title'] }}</div>
                    <div class="background-get{{ $suffix }}">
                        <img src="{{ asset($pkg['logo']) }}" class="img" alt="{{ $pkg['title'] }}">
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
                        <div class="icon"><i class="fa fa-arrow-right text-dark"></i></div>
                    </button>
                </div>

                @if ($loop->iteration === 2)
                    <!-- SUBSCRIBE CALLOUT (after 2nd card) -->
                    <div class="subscribe-callout">
                        <h3>COMING SOON!</h3>
                        <p>
                            Indonesia Miner 2026 is just around the corner!
                            Sign up with your email and we’ll let you know the moment our exhibitor & sponsorship
                            packages become available.
                        </p>
                        <form class="subscribe-form" action="/your-subscribe-endpoint" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="you@example.com" required>
                            <button type="submit" class="btn btn-warning custom-yellow-btn fw-bold">
                                Subscribe
                            </button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
