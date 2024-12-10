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
                            <h2 class="ppb_title" style="text-align:center;color:black">NDONESIA MINER 2024 SUPPORTED BY</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Tabs untuk memilih tahun -->
        <ul class="nav nav-tabs" role="tablist" style="justify-content: center;">
            <li class="nav-item">
                <a class="nav-link active" id="sponsors-2024-tab" data-toggle="tab" href="#sponsors-2024" role="tab"
                    aria-controls="sponsors-2024" aria-selected="true">Sponsors 2024</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sponsors-2025-tab" data-toggle="tab" href="#sponsors-2025" role="tab"
                    aria-controls="sponsors-2025" aria-selected="false">Sponsors 2025</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Tab untuk Sponsors 2024 -->
            <div class="tab-pane fade show active" id="sponsors-2024" role="tabpanel" aria-labelledby="sponsors-2024-tab">
                <!-- Sponsors Section 2024 -->
                <div class="ppb_speaker_classic one nopadding">
                    <!-- Platinum Sponsors 2024 -->
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

                    <!-- Gold Sponsors 2024 -->
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

                    <!-- Silver Sponsors 2024 -->
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

                    <!-- Registration, Lanyard, Lunch, Charging 2024 -->
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

                    <!-- Knowledge Partners 2024 -->
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

                <!-- Supporting Association & Media Partners 2024 -->
                <div class="one withsmallpadding ppb_header" style="text-align:center;padding:60px 0 60px 0;">
                    <div class="standard_wrapper">
                        <div class="page_content_wrapper">
                            <div class="inner">
                                <div style="margin:auto;width:100%">
                                    <h2 class="ppb_title" style="text-align:center;color:black">SUPPORTING ASSOCIATION &
                                        MEDIA PARTNERS</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ppb_speaker_classic one nopadding">
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

                <!-- Exhibition List 2024 -->
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

            <!-- Tab untuk Sponsors 2025 -->
            <div class="tab-pane fade" id="sponsors-2025" role="tabpanel" aria-labelledby="sponsors-2025-tab">
                <!-- Struktur serupa dengan 2024, ganti variabel dengan variabel tahun 2025 -->
                <div class="ppb_speaker_classic one nopadding">
                    <!-- Platinum Sponsors 2025 -->
                    @if (!empty($sponsor_platinum2025))
                        <ul class="list-container">
                            @foreach ($sponsor_platinum2025 as $sponsors)
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

                    <!-- Gold Sponsors 2025 -->
                    @if (!empty($sponsor_gold2025))
                        <ul class="list-container lite">
                            @foreach ($sponsor_gold2025 as $sponsors)
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

                    <!-- Silver Sponsors 2025 -->
                    @if (!empty($sponsor_silver2025))
                        <ul class="list-container lite">
                            @foreach ($sponsor_silver2025 as $sponsors)
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

                    <!-- Jika ada kategori sponsor lain untuk 2025, silakan ditambahkan mirip dengan 2024 -->
                    <!-- Knowledge Partners 2025 -->
                    @if (!empty($knowledge_partner2025))
                        <ul class="list-container lite">
                            @foreach ($knowledge_partner2025 as $sponsors)
                                @foreach ($sponsors as $sponsor)
                                    <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Knowledge Partner">
                                        <div class="tag knowledge">KNOWLEDGE PARTNER</div>
                                        <figure class="image-container">
                                            <img alt="{{ $sponsor->name }}" src="{{ $sponsor->image }}" />
                                        </figure>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Supporting Association & Media Partners 2025 -->
                <div class="one withsmallpadding ppb_header" style="text-align:center;padding:60px 0 60px 0;">
                    <div class="standard_wrapper">
                        <div class="page_content_wrapper">
                            <div class="inner">
                                <div style="margin:auto;width:100%">
                                    <h2 class="ppb_title" style="text-align:center;color:black">SUPPORTING ASSOCIATION &
                                        MEDIA PARTNERS</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ppb_speaker_classic one nopadding">
                    @if (!empty($support_association2025))
                        <ul class="list-container lite">
                            @foreach ($support_association2025 as $sponsors)
                                @foreach ($sponsors as $sponsor)
                                    <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Association">
                                        <figure class="image-container">
                                            <img alt="{{ $sponsor->name }}" src="{{ $sponsor->image }}" />
                                        </figure>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    @endif

                    <ul class="list-container lite" style="padding-bottom: 20px;">
                        @if (!empty($media_partner2025))
                            @foreach ($media_partner2025 as $sponsors)
                                @foreach ($sponsors as $sponsor)
                                    <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Media Partner">
                                        <div class="tag medical">MEDIA PARTNER</div>
                                        <figure class="image-container">
                                            <img alt="{{ $sponsor->name }}" src="{{ $sponsor->image }}" />
                                        </figure>
                                    </li>
                                @endforeach
                            @endforeach
                        @endif
                    </ul>
                </div>

                <!-- Exhibition List 2025 -->
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
                        @if (!empty($exhibitor2025))
                            @foreach ($exhibitor2025 as $sponsors)
                                @foreach ($sponsors as $sponsor)
                                    <li class="list-item" data-id="{{ $sponsor->id }}" data-type="Exhibitor">
                                        <figure class="image-container">
                                            <img alt="{{ $sponsor->name }}" src="{{ $sponsor->image }}" />
                                        </figure>
                                    </li>
                                @endforeach
                            @endforeach
                        @endif
                    </ul>
                </div>
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
    </style>
    @include('home.home-css')
@endpush
@push('bottom')
    @include('home.home-script')
@endpush
