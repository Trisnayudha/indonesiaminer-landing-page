<!-- resources/views/home/section/foim.blade.php -->
<div class="container">
    <!-- FACE OF INDONESIA MINER 2025 -->
    <h2 class="text-center fw-bold mb-4">FACE OF INDONESIA MINER 2025</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 mb-5">
        @foreach ([['6k8Rl_l8ckc', 'Sandra Makadada'], ['sUPLHMRON78', 'Tom Malik'], ['p2mLxXOR_HM', 'Kanya Stira Sjahrir'], ['0RyiRLJGBCE', 'Ahmad Hidayat']] as $video)
            <div class="col">
                <div class="card h-100 border-1">
                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/{{ $video[0] }}/maxresdefault.jpg"
                            alt="{{ $video[1] }}" class="object-fit-cover w-100 h-100 rounded-top">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $video[1] }}</h5>
                        <a href="https://www.youtube.com/watch?v={{ $video[0] }}"
                            class="btn btn-outline-warning w-100" target="_blank">
                            <i class="bi bi-play-fill text-warning me-2"></i>
                            <span class="text-warning">Watch Video</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- FACE OF INDONESIA MINER 2024 -->
    <h2 class="text-center fw-bold mb-4">FACE OF INDONESIA MINER 2024</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ([['PkwPZNyLuA4', 'Raden Sukhyar'], ['gdTNBXH1YHk', 'Febriany Eddy'], ['lI60aWaoMoE', 'Retno Nartani'], ['ca_TnnF06KY', 'Irma Kurniawati'], ['pQo5bbbUTVc', 'Henny Dwi Purnamasari'], ['cA9cg8GlAI8', 'STJ Budi Santoso'], ['Y4RFLL4PS4k', 'Rochman Alamsjah'], ['K5kInEfthrI', 'Haykal Hubeis']] as $video)
            <div class="col">
                <div class="card h-100 border-1">
                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/{{ $video[0] }}/maxresdefault.jpg"
                            alt="{{ $video[1] }}" class="object-fit-cover w-100 h-100 rounded-top">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $video[1] }}</h5>
                        <a href="https://www.youtube.com/watch?v={{ $video[0] }}"
                            class="btn btn-outline-warning w-100" target="_blank">
                            <i class="bi bi-play-fill text-warning me-2"></i>
                            <span class="text-warning">Watch Video</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
