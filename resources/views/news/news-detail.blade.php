@extends('template.index')
@section('title', 'Indonesia Miner : News Detail')
@section('header-bg', 'bg-light')

@section('content')
    <div class="container-fluid mt-5 pt-5">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent px-0 mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/news') }}">News</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail News</li>
            </ol>
        </nav>

        {{-- Judul --}}
        <h1 class="h3 mb-1">{{ $form->title }}</h1>

        {{-- Source / Author --}}
        <p class="text-muted mb-1">
            {{ $form->source ?? ($form->author ?? 'Unknown Source') }}
        </p>

        {{-- Tanggal --}}
        <p class="text-muted mb-3">
            <i class="fas fa-calendar-alt me-1"></i>{{ $form->date_news }}
        </p>

        {{-- Share label + ikon --}}
        <p class="mb-1 fw-semibold">Share</p>
        <div class="d-flex align-items-center mb-4">
            <a href="{{ url('/share-url?page=News&type=linkedin&url=' . url("/news/detail/{$form->slug}")) }}"
                class="btn btn-outline-secondary btn-sm me-2">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="{{ url('/share-url?page=News&type=facebook&url=' . url("/news/detail/{$form->slug}")) }}"
                class="btn btn-outline-secondary btn-sm me-2">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="{{ url('/share-url?page=News&type=twitter&url=' . url("/news/detail/{$form->slug}")) }}"
                class="btn btn-outline-secondary btn-sm me-2">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="{{ url('/share-url?page=News&type=whatsapp&url=' . url("/news/detail/{$form->slug}")) }}"
                class="btn btn-outline-secondary btn-sm">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>

        {{-- Konten utama & sidebar iklan --}}
        <div class="row gx-5">
            <div class="col-lg-8">
                <img src="{{ $form->image }}" alt="{{ $form->title }}" class="img-fluid ">
                <p style="text-align: justify">
                    {!! $form->desc !!}
                </p>
            </div>
            <div class="col-lg-4">
                <h5 class="mb-3">Advertisement</h5>
                @foreach ($ads as $idx => $ad)
                    <div class="mb-4">
                        <a href="{{ $ad->link }}" target="_blank">
                            <img src="{{ $ad->image }}" class="img-fluid rounded" alt="Ad">
                        </a>
                    </div>
                    @if ($idx === 0)
                        <div class="mb-4">
                            <a href="{{ url('/directory') }}">
                                <video class="w-100 rounded" playsinline autoplay muted loop>
                                    <source src="{{ asset('img/section.mp4') }}" type="video/mp4">
                                </video>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Related News --}}
        <h4 class="mt-5 mb-4">Related News</h4>
        <div class="row gx-4 gy-4">
            @foreach ($relate as $item)
                <div class="col-12 col-md-6">
                    <a href="{{ url('news/detail/' . $item->slug) }}" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden related-card">
                            <div class="row g-0 h-100">

                                <!-- IMAGE: full‐width di xs, 5/12 di ≥sm -->
                                <div class="col-12 col-sm-5 position-relative related-img-wrapper">
                                    <img src="{{ $item->image }}" class="img-fluid w-100 h-100 object-fit-cover"
                                        alt="{{ $item->title }}">
                                    <span class="badge bg-warning position-absolute related-badge">
                                        <i class="fas fa-calendar-alt me-1"></i>{{ $item->date_news }}
                                    </span>
                                </div>

                                <!-- CONTENT: full‐width di xs, 7/12 di ≥sm -->
                                <div class="col-12 col-sm-7">
                                    <div class="card-body d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <h5 class="card-title mb-2 related-title">
                                                {{ \Illuminate\Support\Str::limit($item->title, 70, '...') }}
                                            </h5>
                                            <p class="text-muted small mb-1">
                                                <i class="fas fa-globe me-1"></i>{{ $item->source ?? $item->location }}
                                            </p>
                                            <p class="text-muted small mb-3">
                                                <i class="fas fa-eye me-1"></i>{{ $item->views }} Views
                                            </p>
                                        </div>
                                        <p class="card-text text-secondary small mb-0 related-desc">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($item->desc), 120, '...') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@push('head')
    <style>
        .related-card {
            transition: transform .2s, box-shadow .2s;
        }

        .related-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Wrapper gambar & badge */
        .related-img-wrapper {
            position: relative;
            height: 160px;
            /* desktop default */
        }

        .related-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-badge {
            position: absolute;
            bottom: .5rem;
            left: .5rem;
            padding: .4em .6em;
            font-size: .75rem;
        }

        /* Judul & deskripsi clamp */
        .related-title {
            line-height: 1.2;
            height: 2.4em;
            /* memuat 2 baris */
            overflow: hidden;
        }

        .related-desc {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* 3 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* --- RESPONSIVE FIXES --- */

        /* Tablet ke atas: tetap layout dua kolom horizontal */
        @media (min-width: 768px) {
            .related-img-wrapper {
                height: 160px;
            }
        }

        /* Mobile: ubah jadi vertical stack */
        @media (max-width: 767.98px) {
            .related-card .row {
                display: flex;
                flex-direction: column;
            }

            .related-img-wrapper {
                height: 200px;
                /* sedikit lebih tinggi untuk proporsi mobile */
            }

            .related-img-wrapper img {
                width: 100%;
                height: 100%;
            }

            .related-desc {
                -webkit-line-clamp: 4;
                /* boleh ditambah satu baris lagi */
            }

            /* tambah spacing antar card di mobile */
            .row.gx-4>.col-12 {
                margin-bottom: 1rem;
            }
        }
    </style>
@endpush
