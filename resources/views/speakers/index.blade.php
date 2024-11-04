@extends('template.index')
@section('title', 'Indonesia Miner : Exhibition')
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px;">
        <div class="one withsmallpadding ppb_header" style="text-align:center; padding:60px 0 60px 0;" id="speaker-page">
            <div class="container">
                <h2 class="ppb_title" style="text-align:center; color:black">PREVIOUS SPEAKERS</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($speaker as $item)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card h-100 text-center"
                            style="border: 3px solid #E8B44B; border-radius: 20px; overflow: hidden; position: relative;">
                            <div class="speaker_grid_link" style="position: relative; display: block;">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="card-img-top" />
                                <div class="bio_overlay">
                                    <div class="bio_data">
                                        <p>{!! $item->desc !!}</p>
                                        <!-- Social Media Icons -->
                                        <div class="social-icons">
                                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" style="color:black">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->position }}</p>
                                <p class="card-text">{{ $item->company }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('head')
    <style>
        #wrapper.transparent .top_bar:not(.scroll) #menu_wrapper div .nav>li>a,
        #wrapper.transparent .top_bar:not(.scroll) #logo_right_button a#mobile_nav_icon,
        #logo_wrapper .social_wrapper ul li a {
            color: black !important;
        }

        .card {
            border: 3px solid #E8B44B;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .bio_overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 20px;
        }

        /* Show overlay on hover over the card */
        .card:hover .bio_overlay {
            opacity: 1;
        }

        .social-icons a {
            margin: 0 5px;
            color: white;
            font-size: 1.2em;
        }
    </style>
    @include('home.home-css')
@endpush

@push('bottom')
    @include('home.home-script')
@endpush
