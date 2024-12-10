@extends('template.index')
@section('title', 'Indonesia Miner : Exhibition')
{{-- @section('header-bg', 'bg-transparent') --}}
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px;">
        <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="text-align:center;color:black">EXHIBIT AND SPONSOR</h2>
                            <p>Exhibit and Sponsor in front of Indonesia Miners</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="one withsmallpadding ppb_text" style="text-align:left;padding:0px 0 0px 0;margin-top:10px;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="">
                        <div class="row">
                            <div class="col-12 col-md-6 order-1 order-md-1">
                                <div class="plyr__video-embed" id="player">
                                    <iframe
                                        src="https://www.youtube.com/embed/RGl4FhEr8EM?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                        allowfullscreen allowtransparency allow="autoplay"></iframe>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 order-2 order-md-2" style="text-align:justify;">
                                <p style="font-size: 20px">Join the excitement! Here’s why you can’t miss <b> Indonesia
                                        Miner Conference &
                                        Exhibition 2025:</b>
                                </p>
                                <p style="font-size: 16px"> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                        style="color: green;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> <span>One Dynamic Platform: From impactful conferences to hands-on exhibitions
                                        and workshops,
                                        it’s the perfect stage to amplify your brand and make a splash.</span></p>
                                <p style="font-size: 16px"> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                        style="color: green;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> <span>Think Local, Go Global: Engage with Indonesia's mining landscape through a
                                        global lens,
                                        featuring top-tier speakers, delegates, and exhibitors from around the world.</span>
                                </p>
                                <p style="font-size: 16px"> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                        style="color: green;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> <span>Network Without Limits: Connect with decision-makers, influencers, and key
                                        associations shaping the future of the mining industry.</span></p>
                                <a href="#exhibitor" class="button ghost mt-4"
                                    style="color: white;
                background-image: linear-gradient(to right, #E8B44B 20%, #E8B44B 41%, #E8B44B 100%) !important;">COMPARE
                                    PACKAGE NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="one withsmallpadding ppb_text" style="margin-top:20px;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <ul class="stats-list">
                        <li>
                            <strong>1.500+</strong>
                            <span>Delegates</span>
                        </li>
                        <li>
                            <strong>540+</strong>
                            <span>Companies</span>
                        </li>
                        <li>
                            <strong>26+</strong>
                            <span>Countries</span>
                        </li>
                        <li>
                            <strong>60+</strong>
                            <span>Speakers</span>
                        </li>
                        <li>
                            <strong>40+</strong>
                            <span>Leading Companies as Sponsors & Exhibitors</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="one withsmallpadding ppb_text" style="text-align:left;padding:0px 0 0px 0;margin-top:10px;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <p>Indonesia Miner 2024 sponsorship and compact exhibition floor will
                            delivers the greatest impact and visibility amongst industry Leaders,
                            Experts and decision makers. Through our reach, digital moments, and
                            exceptional in-person events your company has the opportunity to
                            educate, empower and engage Indonesia Miners most important
                            audience.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ppb_speaker_grid one nopadding" style="margin-top:30px;">
            <div class="page_content_wrapper page_main_content sidebar_content full_width fixed_column">
                <div id="15738080891821730550" data-columns="3">
                    <div class="element grid one_third_bg">
                        <a class="speaker_grid_link" href="#"><img
                                src="{{ asset('new-home/exhibition/exhibition_4.jpg') }}" alt="John Doe" class="" />
                            <div class="speaker_info_wrapper">
                                {{-- <h4>John Doe</h4>
                                <div class="speaker_desc">Founder Envato</div> --}}
                            </div>
                        </a>
                    </div>
                    <div class="element grid one_third_bg">
                        <a class="speaker_grid_link" href="#"><img
                                src="{{ asset('new-home/exhibition/exhibition_5.png') }}" alt="Joanna Smith"
                                class="" />
                            <div class="speaker_info_wrapper">
                                {{-- <h4>Joanna Smith</h4>
                                <div class="speaker_desc">VP Design Apple</div> --}}
                            </div>
                        </a>
                    </div>
                    <div class="element grid one_third_bg">
                        <a class="speaker_grid_link" href="#"><img
                                src="{{ asset('new-home/exhibition/exhibition_3.jpg') }}" alt="Luis Gallop"
                                class="" />
                            <div class="speaker_info_wrapper">
                                {{-- <h4>Luis Gallop</h4>
                                <div class="speaker_desc">Head Engineering Dell</div> --}}
                            </div>
                        </a>
                    </div>
                    <br class="clear" />
                    <div class="element grid one_third_bg">
                        <a class="speaker_grid_link" href="#"><img
                                src="{{ asset('new-home/exhibition/exhibition_2.jpg') }}" alt="Katie Stricker"
                                class="" />
                            <div class="speaker_info_wrapper">
                                {{-- <h4>Katie Stricker</h4>
                                <div class="speaker_desc">Co-founder Blackbox</div> --}}
                            </div>
                        </a>
                    </div>
                    <div class="element grid one_third_bg">
                        <a class="speaker_grid_link" href="#"><img
                                src="{{ asset('new-home/exhibition/exhibition_1.jpg') }}"
                                alt="Espen
                            Brunberg" class="" />
                            <div class="speaker_info_wrapper">
                                {{-- <h4>Espen Brunberg</h4>
                                <div class="speaker_desc">Web Technologist</div> --}}
                            </div>
                        </a>
                    </div>
                    <div class="element grid one_third_bg">
                        <a class="speaker_grid_link" href="#"><img
                                src="{{ asset('new-home/exhibition/exhibition_6.jpg') }}" alt="Kevin Chase"
                                class="" />
                            <div class="speaker_info_wrapper">
                                {{-- <h4>Kevin Chase</h4>
                                <div class="speaker_desc">Chairman Tesla</div> --}}
                            </div>
                        </a>
                    </div>
                    <br class="clear" />
                </div>
            </div>
        </div>
        <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="text-align:center;color:black">WHY EXHIBIT AND SPONSORS</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="one withsmallpadding ppb_text"
            style="text-align:left;padding:0px 0 0px 0;margin-top:10px; margin-bottom:10px">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div class="card-shadow">
                            <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                            Fuel your pipeline for the year ahead
                        </div>
                        <div class="card-shadow">
                            <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                            Share Your Success Stories on Global Event
                        </div>
                        <div class="card-shadow">
                            <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                            Generate New Leads and Secure Prospects
                        </div>
                        <div class="card-shadow">
                            <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                            Maximizing Brand Exposure and Build Awareness
                        </div>
                        <div class="card-shadow">
                            <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                            Network and Build Relationships
                        </div>
                        <div class="card-shadow">
                            <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                            Gain Insights and Stay Ahead of The Competition
                        </div>
                        <div class="card-shadow">
                            <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                            Gain your unfair advantage with early access to our networking
                            app
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%" id="exhibitor">
                            <h2 class="ppb_title" style="text-align:center;color:black">HOW BIG DO YOU WANT TO GO?
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper2">
            <div style="color:white">.</divc>
                <div class="pricing-table-get">
                    <div class="container-get">
                        <div class="header-get">EXHIBITOR</div>
                        <div class="background-get">
                            <img src="{{ asset('new-home/logo/9.png') }}" alt="tes" class="img">
                        </div>
                        <div class="content-get">
                            <ul>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Prime, Super, Standard Plus, Standard and Basic Stand</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Up to 6 Exhibitor Passes Included</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Up to 100 Wishlist for Visitor Passes</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Company Logo and Profile Placement on Event Booklet</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Social Media Promotional Content</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Listing at Indonesia Miner Directory (Online &amp; Book)</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>


                                        <span>Speaking Opportunity

                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>

                                        <span>Exposure to Email List


                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>
                                        <span>Company Logo on All Marketing Materials
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>
                                        <span>Company Logo on Onsite Branding
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>
                                        <span>On Site Physical Branding
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>
                                        <span>Lounge packages
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>
                                        <span>Lunches and Networking Drinks packages
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" style="color: red">
                                            <path d="M18 6L6 18M6 6l12 12"></path>
                                        </svg>
                                        <span>Private Meeting Room
                                        </span>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <button class="cssbuttons-io-button" id="myBtn"> Get started
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </div>
                        </button>


                    </div>
                    <div class="container-get">
                        <div class="header-get2">OFFICIAL SPONSOR</div>
                        <div class="background-get2">
                            <img src="{{ asset('new-home/logo/10.png') }}" alt="tes" class="img">
                        </div>
                        <div class="content-get">
                            <ul>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Platinum, Gold and Silver</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Up to 6 Delegate Passes Included
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Up to 100 Wishlist for Visitor Passes

                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Speaking Opportunity</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Company Logo and Profile Placement on Event Booklet
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Social Media Promotional Content

                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Listing at Indonesia Miner Directory (Online & Book)
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Speaking Opportunity

                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Exposure to Email List

                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Company Logo on All Marketing Materials


                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Company Logo on Onsite Branding

                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>On Site Physical Branding


                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Lounge Packages



                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Lunches and Networking Drinks packages
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                            style="color: green;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Private Meeting Room

                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <button class="cssbuttons-io-button" id="myBtn2"> Get started
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </div>
                        </button>


                    </div>
                </div>
            </div>
        </div>
        {{-- <img style="top: 0;left: 0;bottom: 0;right: 0;width:100%; height:100%" src="{{ asset('img/floor.png') }}" /> --}}
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="contact_form7_wrapper">
                JOIN INDONESIA MINER 2024
                <p>

                    Fill out the form below and we’ll contact you when booths or sponsorships become available.
                </p>
                <div role="form" class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form class="quform" action="{{ url('contact/exhibition') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="quform-elements">
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-name">
                                    <input id="name" type="text" name="name" size="40" class="input1"
                                        aria-required="true" aria-invalid="false" placeholder="Name*" required />
                                </span>
                            </div>
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="email" name="email" size="40" class="input1"
                                        aria-required="true" aria-invalid="false" placeholder="Email*" required />
                                </span>
                            </div>
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-name">
                                    <input id="company_name" type="text" name="company_name" size="40"
                                        class="input1" aria-required="true" aria-invalid="false"
                                        placeholder="Company Name*" required />
                                </span>
                            </div>
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="tel" name="phone" size="40" class="input1"
                                        aria-required="true" aria-invalid="false" placeholder="Phone Number*" required />
                                </span>
                            </div>
                            <!-- Begin Submit button -->
                            <div class="quform-submit" style="margin-top:10px">
                                <div class="quform-submit-inner">
                                    <button type="submit"class="glow-on-hover">
                                        <span>Send me Booth Information</span>
                                    </button>
                                </div>
                                <div class="quform-loading-wrap">
                                    <span class="quform-loading"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="contact_form7_wrapper">
                JOIN INDONESIA MINER 2024
                <p>

                    Fill out the form below and we’ll contact you when booths or sponsorships become available.
                </p>
                <div role="form" class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form class="quform" action="{{ url('contact/sponsorship') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="quform-elements">
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-name">
                                    <input type="text" name="name_sponsor" size="40" class="input1"
                                        aria-required="true" aria-invalid="false" placeholder="Name*" required />
                                </span>
                            </div>
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="email" name="email_sponsor" size="40" class="input1"
                                        aria-required="true" aria-invalid="false" placeholder="Email*" required />
                                </span>
                            </div>
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-name">
                                    <input id="company_name" type="text" name="company_name_sponsor" size="40"
                                        class="input1" aria-required="true" aria-invalid="false"
                                        placeholder="Company Name*" required />
                                </span>
                            </div>
                            <div class="quform-element">
                                <br />
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="tel" name="phone_sponsor" size="40" class="input1"
                                        aria-required="true" aria-invalid="false" placeholder="Phone Number*" required />
                                </span>
                            </div>
                            <!-- Begin Submit button -->
                            <div class="quform-submit" style="margin-top:10px">
                                <div class="quform-submit-inner">
                                    <button type="submit"class="glow-on-hover">
                                        <span>Send me Sponsorship Information</span>
                                    </button>
                                </div>
                                <div class="quform-loading-wrap">
                                    <span class="quform-loading"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

    @if (session('success'))
        <script>
            swal({
                title: 'THANK YOU',
                text: "{{ session('success') }}",
                icon: "success",
                customClass: {
                    content: 'custom-swal-text'
                }
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            swal({
                title: 'Error',
                text: "{{ session('error') }}",
                icon: "error",
                customClass: {
                    content: 'custom-swal-text'
                }
            });
        </script>
    @endif
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('#player');
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

        .stats-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1.5rem;
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .stats-list li {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .stats-list li strong {
            font-size: 3.5rem;
        }

        .stats-list li span {
            margin-top: 0.5rem;
            font-size: 1.25rem;
            /* white-space: nowrap; */
            /* Teks tidak dibungkus ke baris berikutnya */
        }

        /* Responsif Breakpoints */

        /* Tablet Portrait: Kurangi kolom jadi 3 */
        @media (max-width: 992px) {
            .stats-list {
                grid-template-columns: repeat(3, 1fr);
            }

            .stats-list li strong {
                font-size: 2.5rem;
            }

            .stats-list li span {
                font-size: 1.1rem;
            }
        }

        /* Mobile Landscape: Kurangi kolom jadi 2 */
        @media (max-width: 768px) {
            .stats-list {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-list li strong {
                font-size: 2rem;
            }

            .stats-list li span {
                font-size: 1rem;
            }
        }

        /* Mobile Portrait: Tampilkan satu kolom per baris */
        @media (max-width: 480px) {
            .stats-list {
                grid-template-columns: 1fr;
            }

            .stats-list li strong {
                font-size: 1.8rem;
            }

            .stats-list li span {
                font-size: 0.9rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
@endpush
