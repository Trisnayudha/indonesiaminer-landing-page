<!-- resources/views/home/section/minerstalk.blade.php -->

<div class="container">
    <h2 class="text-center fw-bold mb-4">MINERS TALK 2025</h2>

    @php
        $talks = [
            ['a8BWOxFfrZY', 'Hitachi Digitization & Innovation in Mining'],
            ['sGt44R3jAGE', 'Enhanced Nickel Solvent Extraction Using GTL Diluents'],
            ['aHj3Bm8E4gc', 'Growing Beyond Nickel: Integrating Agroecology in the Mining Landscape of Hengjaya Mine'],
            ['F9XHhR4fhrw', 'Mining Resilience: Strengthen Strategy To Adapt a Dynamic Future For Women'],
            [
                'BG9NTB98h94',
                'Harnessing Innovation to Succeed in a VUCA Mining World: Turning Disruption into Opportunity',
            ],
        ];
    @endphp

    <!-- First row: 3 cards -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        @foreach (array_slice($talks, 0, 3) as $talk)
            <div class="col">
                <div class="card h-100 border-1">
                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/{{ $talk[0] }}/maxresdefault.jpg"
                            alt="{{ $talk[1] }}" class="object-fit-cover w-100 h-100 rounded-top">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $talk[1] }}</h5>
                        <a href="https://www.youtube.com/watch?v={{ $talk[0] }}"
                            class="btn btn-outline-warning w-100 mt-auto">
                            <i class="bi bi-play-fill text-warning me-2"></i>
                            <span class="text-warning">Watch Video</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Second row: 2 cards centered -->
    <div class="row justify-content-center row-cols-1 row-cols-md-2 g-4">
        @foreach (array_slice($talks, 3) as $talk)
            <div class="col col-lg-4">
                <div class="card h-100 border-1">
                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/{{ $talk[0] }}/maxresdefault.jpg"
                            alt="{{ $talk[1] }}" class="object-fit-cover w-100 h-100 rounded-top">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $talk[1] }}</h5>
                        <a href="https://www.youtube.com/watch?v={{ $talk[0] }}"
                            class="btn btn-outline-warning w-100 mt-auto">
                            <i class="bi bi-play-fill text-warning me-2"></i>
                            <span class="text-warning">Watch Video</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
