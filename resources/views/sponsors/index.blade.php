@extends('template.index')
@section('title', 'Indonesia Miner : Exhibition')
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px; margin-bottom:20px">
        <!-- Header Section -->
        <div class="one withsmallpadding ppb_header" style="text-align:center;padding:60px 0 60px 0;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="text-align:center;color:black">SPONSORS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sponsors Section -->
        <div class="ppb_speaker_classic one nopadding">
            <!-- Platinum Sponsors -->
            @if (!empty($sponsor_platinum2024))
                <ul class="list-container">
                    @foreach ($sponsor_platinum2024 as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Sponsor">
                                <div class="tag platinum">PLATINUM</div>
                                <figure class="image-container">
                                    <img alt="{{ $sponsor->name }}" src="{{ $sponsor->image }}" />
                                </figure>
                                <div class="info">
                                    <h4>{{ $sponsor->name }}</h4>
                                    <div class="description">
                                        <div>
                                            {!! $sponsor->desc !!}
                                            <span class="ellipsis">…</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            @endif

            <!-- Gold Sponsors -->
            @if (!empty($sponsor_gold2024))
                <ul class="list-container lite">
                    @foreach ($sponsor_gold2024 as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Sponsor">
                                <div class="tag gold">GOLD</div>
                                <figure class="image-container">
                                    <img alt="{{ $sponsor->name }}" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            @endif

            <!-- Silver Sponsors -->
            @if (!empty($sponsor_silver2024))
                <ul class="list-container lite">
                    @foreach ($sponsor_silver2024 as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Sponsor">
                                <div class="tag silver">SILVER</div>
                                <figure class="image-container">
                                    <img alt="{{ $sponsor->name }}" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            @endif

            <!-- Registration Sponsors -->
            <ul class="list-container lite">
                @if (!empty($registration))
                    @foreach ($registration as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="registration">
                                <div class="tag registration">REGISTRATION</div>
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                @endif

                <!-- Lanyard Sponsors -->
                @if (!empty($landyard))
                    @foreach ($landyard as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="landyard">
                                <div class="tag lanyard">LANDYARD & BADGES</div>
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                @endif

                <!-- Lunch Sponsors -->
                @if (!empty($lunch))
                    @foreach ($lunch as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="lunch">
                                <div class="tag lunch">LUNCH</div>
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                @endif

                <!-- Charging Sponsors -->
                @if (!empty($charging))
                    @foreach ($charging as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="charging">
                                <div class="tag charging">CHARGING</div>
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                @endif
            </ul>

            <!-- Knowledge Partners -->
            @if (!empty($knowledge_partner2024))
                <ul class="list-container lite">
                    @foreach ($knowledge_partner2024 as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Knowledge Partner">
                                <div class="tag knowledge">KNOWLEDGE PARTNER</div>
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            @endif
        </div>


        <!-- Supporting Association & Media Partners -->
        <div class="one withsmallpadding ppb_header" style="text-align:center;padding:60px 0 60px 0;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="text-align:center;color:black">SUPPORTING ASSOCIATION & MEDIA
                                PARTNERS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ppb_speaker_classic one nopadding">
            <!-- Supporting Associations -->
            @if (!empty($support_association2024))
                <ul class="list-container lite">
                    @foreach ($support_association2024 as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Association">
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            @endif

            <!-- Media Partners -->
            <ul class="list-container lite" style="padding-bottom: 20px;">
                @if (!empty($media_partner2024))
                    @foreach ($media_partner2024 as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Media Partner">
                                <div class="tag medical">MEDIA PARTNER</div>
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                @endif

                <!-- Medical Partners -->
                @if (!empty($medical))
                    @foreach ($medical as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Medical Partner">
                                <div class="tag medical">MEDICAL PARTNER</div>
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="one withsmallpadding ppb_header" style="text-align:center;padding:60px 0 60px 0;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="text-align:center;color:black">Exhibition List</h2>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-container lite" style="padding-bottom: 20px;">
                @if (!empty($exhibitor))
                    @foreach ($exhibitor as $sponsors)
                        @foreach ($sponsors as $sponsor)
                            <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Media Partner">
                                <figure class="image-container">
                                    <img alt="IM2025" src="{{ $sponsor->image }}" />
                                </figure>
                            </li>
                        @endforeach
                    @endforeach
                @endif
            </ul>
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
    </style>
    @include('home.home-css')
@endpush
@push('bottom')
    @include('home.home-script')
@endpush
