{{-- resources/views/news/index.blade.php --}}
@extends('template.index')
@section('title', 'Indonesia Miner : News')
@section('header-bg', 'bg-light')

@section('content')
    <div class="container-fluid mt-5 pt-5">

        {{-- Featured banner + 4 small teasers --}}
        @if ($banners->count())
            <div class="row mb-4">
                {{-- Large featured post --}}
                <div class="col-lg-7 mb-3">
                    @php($f = $banners->first())
                    <a href="{{ url('news/detail/' . $f->slug) }}" class="text-decoration-none text-dark">
                        <div class="card position-relative overflow-hidden">
                            <img src="{{ $f->image }}" class="card-img" alt="{{ $f->title }}"
                                style="object-fit:cover; height:400px;">
                            <div class="card-img-overlay d-flex align-items-end p-0">
                                <div class="w-100 bg-dark bg-opacity-50 text-white p-3">
                                    <h3 class="card-title">{{ $f->title }}</h3>
                                    <small>
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $f->date_news }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Four secondary teasers --}}
                <div class="col-lg-5">
                    <div class="row row-cols-1 row-cols-sm-2 g-3">
                        @foreach ($banners->slice(1, 4) as $item)
                            <div class="col">
                                <a href="{{ url('news/detail/' . $item->slug) }}" class="text-decoration-none text-dark">
                                    <div class="card h-100">
                                        <img src="{{ $item->image }}" class="card-img-top"
                                            style="height:120px; object-fit:cover;" alt="{{ $item->title }}">
                                        <div class="card-body p-2">
                                            <h6 class="card-title mb-1">
                                                {{ \Illuminate\Support\Str::limit($item->title, 60) }}</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar-alt me-1"></i>
                                                {{ $item->date_news }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- Search bar --}}
        <form method="GET" action="{{ url('news') }}" class="mb-4">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Search"
                    value="{{ request('search') }}">
                <button class="btn btn-warning"><i class="fa fa-search"></i></button>
            </div>
        </form>

        {{-- Main Row: News list (8 cols) + Ads (4 cols) --}}
        <div class="row">
            {{-- News list --}}
            <div class="col-lg-8">
                <div class="row g-4">
                    @foreach ($news as $item)
                        <div class="col-12">
                            <a href="{{ url('news/detail/' . $item->slug) }}"
                                class="text-decoration-none text-dark d-block">
                                <div class="card flex-row overflow-hidden h-auto position-relative card-hover">
                                    <img src="{{ $item->image }}" class="img-fluid"
                                        style="width:300px; height:auto; object-fit:cover;" alt="{{ $item->title }}">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $item->title }}</h5>

                                        <div class="mb-2 text-muted small">
                                            <i class="fa fa-calendar-alt me-1"></i>{{ $item->date_news }}
                                            <i class="fa fa-eye ms-3 me-1"></i>{{ $item->views }}
                                        </div>

                                        <p class="text-muted mb-0 line-clamp">
                                            {{ $item->desc }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->onEachSide(1)->links('news.pagination') }}

                </div>
            </div>

            {{-- Advertisement --}}
            <div class="col-lg-4">
                <div class="mb-4">
                    <h4 class="bg-warning px-3 py-2 text-dark">Advertisement</h4>
                    <hr class="mt-0 mb-3">
                    <div class="row g-3">
                        @foreach ($ads as $index => $ad)
                            <div class="col-12">
                                <a href="{{ $ad->link }}" target="_blank">
                                    <img src="{{ $ad->image }}" class="img-fluid" alt="Ad #{{ $index + 1 }}">
                                </a>
                            </div>
                            @if ($index === 0)
                                {{-- after the first ad, show the video block --}}
                                <div class="col-12">
                                    <a href="{{ url('/directory') }}">
                                        <video class="w-100" playsinline autoplay muted loop>
                                            <source src="{{ asset('img/section.mp4') }}" type="video/mp4">
                                        </video>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <style>
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .line-clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Desktop: gambar fixed 300px */
        @media (min-width: 768px) {
            .card.flex-row img {
                width: 300px !important;
                height: auto !important;
                object-fit: cover;
            }
        }

        /* Mobile: ubah flex-row jadi column */
        @media (max-width: 767.98px) {
            .card.flex-row {
                flex-direction: column !important;
            }

            .card.flex-row img {
                width: 100% !important;
                height: auto !important;
                object-fit: cover;
            }

            .card-body {
                padding: 1rem !important;
            }
        }

        /* Pagination styling */
        .pagination {
            gap: .5rem;
        }

        .pagination .page-item .page-link {
            width: 2.5rem;
            height: 2.5rem;
            padding: 0;
            line-height: 2.5rem;
            text-align: center;
            border-radius: .75rem;
            border: 1px solid #ccc;
            color: #333;
            transition: background .2s, color .2s;
        }

        .pagination .page-item .page-link:hover,
        .pagination .page-item.active .page-link {
            background-color: #f8db4a;
            border-color: #f8db4a;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #aaa;
            border-color: #eee;
            cursor: default;
        }

        .pagination .page-link.rounded-circle {
            border-radius: 50%;
        }
    </style>
@endpush
