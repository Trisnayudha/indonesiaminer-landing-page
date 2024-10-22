@extends('template.index')
@section('title', 'Indonesia Miner : Exhibition')
{{-- @section('header-bg', 'bg-transparent') --}}
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px;">
        <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;">
            <section class="">
                <div class="section-padding pt-0 overflow-hidden">
                    <div class="container-fluid">
                        <br>
                        @if (count($banners) > 0)
                            <div class="row mb-30">
                                <div class="col-lg-6 col-sm-12">
                                    @foreach ($banners as $row)
                                        @if ($loop->first)
                                            <a href="{{ url('news/detail/' . $row->slug) }}">
                                                <div class="box__news-content box__news-content-lg">
                                                    <img src="{{ $row->image }}" alt="News">
                                                    <div class="box__news-body">
                                                        <div class="address">{{ $row->location }}</div>
                                                        <h4 class="title">{{ $row->title }}</h4>
                                                        <div class="date">{{ $row->date_news }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row h-100">
                                        @foreach ($banners as $index => $row)
                                            @if ($index != 0)
                                                <div class="col-lg-6 col-sm-12 {{ $index > 2 ? 'mt-auto' : '' }}">
                                                    <a href="{{ url('news/detail/' . $row->slug) }}">
                                                        <div class="box__news-content box__news-content-sm">
                                                            <img src="{{ $row->image }}" alt="News">
                                                            <div class="box__news-body">
                                                                <div class="address">{{ $row->location }}</div>
                                                                <h4 class="title">{{ $row->title }}</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-8 col-sm-12">
                                <div class="row">
                                    <form class="col-lg-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-transparent"
                                                    placeholder="Search" name="search" value="{{ 'search' }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn-yellow-group"><span
                                                            class="fas fa-search"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach ($news as $index => $row)
                                        <div class="col-12">
                                            <a href="{{ url('news/detail/' . $row->slug) }}">
                                                <div class="box-news box-news-update">
                                                    <div class="image">
                                                        <img src="{{ $row->image }}" alt="News">
                                                        {{-- <a href="#" class="bookmark-badge"></a> --}}
                                                        <div class="date">{{ $row->date_news }}</div>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">{{ $row->title }}</h4>
                                                        <div class="caption-sect">
                                                            <div class="d-flex align-items-center">
                                                                <div class="address mr-3">{{ $row->location }}</div>
                                                                <div class="eye">{{ $row->views }} Views</div>
                                                            </div>
                                                            <div class="desc mt-2">
                                                                {{ $row->desc }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    <div class="col-12 mt-2">
                                        {{ $news->links('news.pagination') }}
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="list-advertisement">
                                    <div class="list-head">
                                        <h4 class="title">Advertisement</h4>
                                    </div>
                                    <div class="list-body">
                                        @foreach ($ads as $da => $rowda)
                                            <!-- Menampilkan iklan/link -->
                                            <a href="{{ $rowda->link }}" target="_blank" class="m-auto">
                                                <img src="{{ $rowda->image }}" alt="Advertisement">
                                            </a>

                                            <!-- Menempatkan video setelah iklan pertama -->
                                            @if ($da == 0)
                                                <a href="{{ url('/directory') }}">
                                                    <video style="max-width: 100%; height : auto;" playsinline autoplay
                                                        muted loop>
                                                        <source src="{{ asset('img/section_1.mp4') }}" type="video/mp4">
                                                    </video>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-12 col-sm-12 d-flex align-items-center">
                                <h4 class="title-right">UPCOMING EVENT</h4>
                                <a href="{{ url('/events') }}" class="ml-auto btn-view-title">
                                    View All
                                    <i class="fas fa-arrow-right ml-3"></i>
                                </a>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="row">
                                    @foreach ($upcomingEvents as $row)
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <div class="event-box">
                                                <a href="{{ url('events/detail/' . $row->slug) }}">
                                                    <div class="event-image">
                                                        <img src="{{ $row->image }}" alt="Image Events">
                                                        @if ($row->isUpcoming)
                                                            <span class="badge-exlusive">Upcoming</span>
                                                        @endif
                                                        <span
                                                            class="badge-event status-event">{{ $row->events_type }}</span>
                                                        <span
                                                            class="badge-event release-event">{{ $row->events_list }}</span>
                                                    </div>
                                                    <div class="event-content">
                                                        <div class="date-event"><span class="far fa-calendar"></span>&nbsp;
                                                            {{ $row->date_start }}
                                                            - {{ $row->date_end }}</div>
                                                        <h4 class="title-event">{{ $row->name }}</h4>
                                                        <div class="place-event">{{ $row->location }}</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



@endsection

@push('bottom')
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }


        // Get the modal
        var modal2 = document.getElementById("myModal2");

        // Get the button that opens the modal
        var btn2 = document.getElementById("myBtn2");


        // When the user clicks the button, open the modal
        btn2.onclick = function() {
            modal2.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal2.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal || event.target == modal2) {
                modal.style.display = "none";
                modal2.style.display = "none";
            }
        }
    </script>
@endpush
@push('head')
    <style>
        #wrapper.transparent .top_bar:not(.scroll) #menu_wrapper div .nav>li>a,
        #wrapper.transparent .top_bar:not(.scroll) #logo_right_button a#mobile_nav_icon,
        #logo_wrapper .social_wrapper ul li a {
            color: black !important;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: black;
            float: right;
            display: flex;
            justify-content: end;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #f00;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endpush
