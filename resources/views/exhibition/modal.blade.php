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

<!-- Traffic & Details Modal -->
<div class="modal fade" id="trafficSourcesModal" tabindex="-1" aria-labelledby="trafficSourcesLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trafficSourcesLabel">Almost there…</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="trafficForm" class="modal-body">
                @csrf
                <input type="hidden" name="subscription_id" id="subscriptionId" value="">

                {{-- PERSONAL DETAILS --}}
                <div class="mb-4">
                    <div class="row gx-3">
                        <div class="col-md-6 mb-3">
                            <label for="detailName" class="form-label">Name*</label>
                            <input type="text" class="form-control" id="detailName" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="detailCompany" class="form-label">Company*</label>
                            <input type="text" class="form-control" id="detailCompany" name="company" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="detailJobTitle" class="form-label">Job Title*</label>
                            <input type="text" class="form-control" id="detailJobTitle" name="job_title"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="detailPhone" class="form-label">Phone*</label>
                            <input type="tel" class="form-control" id="detailPhone" name="phone" required>
                        </div>
                    </div>
                </div>

                <hr>
                {{-- INTEREST TYPES (boleh pilih lebih dari satu) --}}
                <div class="mb-4">
                    <strong>I’m interested in:*</strong>
                    <div class="d-flex flex-wrap gap-3 mt-2">
                        <div class="form-check">
                            <input class="form-check-input interest-checkbox" type="checkbox" name="interest_types[]"
                                id="interestExhibit" value="exhibition">
                            <label class="form-check-label" for="interestExhibit">Exhibition</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input interest-checkbox" type="checkbox" name="interest_types[]"
                                id="interestSponsor" value="sponsorship">
                            <label class="form-check-label" for="interestSponsor">Sponsorship</label>
                        </div>
                        {{-- Tambah opsi lain jika perlu --}}
                    </div>
                </div>

                <hr>
                {{-- TRAFFIC SOURCES --}}
                <div class="mb-4">
                    <strong>What traffic sources are you interested in?*</strong>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <small>Please select at least 1</small>
                        <a href="#" id="clearAllTraffic" class="text-decoration-none small">Clear all</a>
                    </div>
                    <div class="row gx-3 mt-2">
                        @foreach ($trafficSources as $source)
                            <div class="col-6 col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input traffic-checkbox" type="checkbox"
                                        name="traffics[]" value="{{ $source }}"
                                        id="traffic-{{ Str::slug($source) }}">
                                    <label class="form-check-label" for="traffic-{{ Str::slug($source) }}">
                                        {{ $source }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <hr>

                {{-- VERTICALS --}}
                <div class="mb-4">
                    <strong>What verticals are you interested in?*</strong>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <small>Please select at least 1</small>
                        <a href="#" id="clearVerticals" class="text-decoration-none small">Clear all</a>
                    </div>
                    <div class="row gx-3 mt-2">
                        @foreach ($verticals as $key => $label)
                            <div class="col-6 col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input vertical-checkbox" type="checkbox"
                                        name="verticals[]" value="{{ $key }}"
                                        id="vertical-{{ $key }}">
                                    <label class="form-check-label" for="vertical-{{ $key }}">
                                        {{ $label }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit all</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Toast Container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <!-- Email subscribe success toast -->
    <div id="toastEmailSuccess" class="toast align-items-center text-white bg-primary border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Email subscribed successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>

    <!-- Details submit success toast -->
    <div id="toastDetailsSuccess" class="toast align-items-center text-white bg-primary border-0 mt-2" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Details submitted successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
