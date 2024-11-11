<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">
<!-- grandconference/index.html  22 Nov 2019 03:51:30 GMT -->

<head>
    <title>Indonesia Miner</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no" />

    @include('template.header')
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body class="home page-template-default page page-id-350 woocommerce-no-js ppb_enable">
    <input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="1">
    <input type="hidden" id="tg_smart_fixed_menu" name="tg_smart_fixed_menu" value="1">
    <input type="hidden" id="tg_sidebar_sticky" name="tg_sidebar_sticky" value="1">
    <input type="hidden" id="pp_topbar" name="pp_topbar" value="0">
    <input type="hidden" id="tg_sidemenu_overlay_effect" name="tg_sidemenu_overlay_effect" value="blur">

    <!-- Begin mobile menu -->
    <a id="close_mobile_menu" href="javascript:;"></a>

    <div class="mobile_menu_wrapper">
        <a id="mobile_menu_close" href="javascript:;" class="button"><span class="ti-close"></span></a>

        <div class="mobile_menu_content">
            <div class="menu-main-menu-container">
                <ul id="mobile_main_menu" class="mobile_main_nav">
                    <li class="menu-item current-menu-item menu-item-has-children">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{ url('/program') }}">Program</a>

                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{ url('/speakers') }}">Speakers</a>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{ url('exhibitor') }}">Exhibitor</a>

                    </li>
                    <li class="menu-item menu-item-has-children menu-item-59">
                        <a href="{{ url('foim-2024') }}">FOIM 2024</a>

                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{ url('/') }}">Mining Directory</a>
                    </li>
                </ul>
            </div>
            <!-- Begin side menu sidebar -->
            <div class="page_content_wrapper">
                <div class="sidebar_wrapper">
                    <div class="sidebar">
                        <div class="content">
                            <ul class="sidebar_widget"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End side menu sidebar -->
        </div>
    </div>


    <!-- End mobile menu -->
    <!-- Begin template wrapper -->
    <div id="wrapper" class="hasbg transparent">
        <div class="header_style_wrapper">
            <!-- End top bar -->

            <div class="top_bar hasbg">
                <div class="standard_wrapper">
                    <!-- Begin logo -->
                    <div id="logo_wrapper">
                        <div id="logo_normal" class="logo_container">
                            <div class="logo_align">
                                <a id="custom_logo" class="logo_wrapper hidden" href="{{ url('/') }}">
                                    <img src="https://indonesiaminer.com/vendor/front/images/indominer-icon.png"
                                        class="kecil" style="width: 70%" />
                                </a>
                            </div>
                        </div>

                        <div id="logo_transparent" class="logo_container">
                            <div class="logo_align">
                                <a id="custom_logo_transparent" class="logo_wrapper default" href="{{ url('/') }}">
                                    <img src="https://indonesiaminer.com/vendor/front/images/indominer-icon.png"
                                        class="kecil" style="width: 70%" />
                                </a>
                            </div>
                        </div>
                        <!-- End logo -->

                        <div id="menu_wrapper">
                            <div id="nav_wrapper">
                                <div class="nav_wrapper_inner">
                                    <div id="menu_border_wrapper">
                                        <div class="menu-main-menu-container">
                                            <ul id="main_menu" class="nav">
                                                <li class="menu-item current-menu-item menu-item-has-children">
                                                    <a href="#home-page" style="text-transform: uppercase">HOME</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="https://indonesiaminer.com/events/detail/2023-11-10085837-indonesia-miner-2024"
                                                        style="text-transform: uppercase">PROGRAMS</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#speaker-page"
                                                        style="text-transform: uppercase">SPEAKERS</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#exhibition-page"
                                                        style="text-transform: uppercase">EXHIBITORS</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#foim2024" style="text-transform: uppercase">FOIM
                                                        2024</a>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="{{ url('/directory') }}"
                                                        style="text-transform: uppercase">MINING DIRECTORY</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Begin right corner buttons -->
                                <div id="logo_right_button">

                                    <a href="{{ url('exhibition') }}" id="get_ticket"
                                        class="button ghost touch">SPONSOR
                                        &amp;
                                        EXHIBITS</a>
                                    {{-- <a href="#buy-tickets" id="get_ticket" class="button ghost"
                                        style="color:white;
                                        /* background-image: linear-gradient(to right, #f6d365 20%, #fda085 41%, #E8B44B 100%) !important;"
                                        * />BUY
                                    TICKETS!</a> --}}
                                    <a href="#buy-tickets" id="get_ticket" class="button ghost"
                                        style="color: white;
                                    background-image: linear-gradient(to right, #E8B44B 20%, #E8B44B 41%, #E8B44B 100%) !important;">BUY
                                        TICKETS!</a>

                                    <!-- Begin side menu -->
                                    <a href="javascript:;" id="mobile_nav_icon"><span class="ti-menu"></span></a>
                                    <!-- End side menu -->
                                </div>
                                <!-- End right corner buttons -->
                            </div>
                            <!-- End main nav -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div id="side_menu_wrapper" class="overlay_background">
            <a id="close_share" href="javascript:;"><span class="ti-close"></span></a>
        </div>

        <div id="footer" class="ppb_wrapper">
            <ul class="sidebar_widget three">
                <li id="text-2" class="widget widget_text">
                    <div class="textwidget">
                        <p>
                            <img src="{{ asset('new-home/logo/miner.png') }}" width="158" height="20"
                                alt="" />
                        </p>
                        <p style="text-align: justify">
                            INDONESIA MINER offers partners an unsurpassed platform to reach Indonesia mining community
                            and Global audience. INDONESIA MINER hosts a premier conference that combines Metals, Coal
                            and Other minerals, including EV Battery Industry discussion. With digital media news
                            centred on Minerals and Coal project updates and operational technology and Intelligent
                            Directory our platform will create influential content that engages audiences and establish
                            a brand as industry innovative thought leaders.
                        </p>
                        <div style="margin-top: 20px">
                            <div class="social_wrapper shortcode dark">
                                <ul>
                                    <li class="facebook">
                                        <a target="_blank" title="Facebook"
                                            href="https://www.facebook.com/IndonesiaMiner/"><i
                                                class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a target="_blank" title="Twitter" href="https://twitter.com/#"><i
                                                class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="youtube">
                                        <a target="_blank" title="Youtube"
                                            href="https://www.youtube.com/channel/UC5ENaOi6ROvFl5PWMkjmEQA"><i
                                                class="fa fa-youtube"></i></a>
                                    </li>
                                    <li class="facebook">
                                        <a target="_blank" title="Linkedin"
                                            href="https://www.linkedin.com/company/14762536/"><i
                                                class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li class="instagram">
                                        <a target="_blank" title="Instagram"
                                            href="https://www.instagram.com/indonesia_miner/"><i
                                                class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="grandconference_flickr-3" class="widget GrandConference_Flickr">
                    <h2 class="widgettitle">GET IN TOUCH</h2>
                    <p style="text-align: left">PT. Media Mitrakarya Indonesia</p>
                    <p style="text-align: left">CIBIS NINE - 11th Floor TB. Simatupang No. 2 Jakarta, Indonesia 12560
                    </p>
                    <br class="clear" />
                    <p style="text-align: left">

                        <a href=""><span class="fas fa-phone-volume"></span>&nbsp;
                            -</a>
                    </p>
                    <p style="text-align: left">

                        <a href=""><span class="fas fa-mobile-alt"></span>&nbsp;
                            -</a>
                    </p>
                    <p style="text-align: left">
                        <a href="mailto:-"><span class="fas fa-envelope"></span>&nbsp;
                            -</a>
                    </p>

                </li>
                <li id="mc4wp_form_widget-2" class="widget widget_mc4wp_form_widget">
                    <h2 class="widgettitle">Indonesia Miner Bulletin</h2>

                    <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-92" method="post" data-id="92"
                        action="{{ url('contact/news-subcribe') }}"
                        onsubmit="event.preventDefault(); validateMC4WPForm();">
                        @csrf
                        <div class="mc4wp-form-fields">
                            <p>
                                Don't miss a thing!
                                <br />Sign up now to receive our weekly bulletin
                            </p>

                            <input type="email" name="email_2" placeholder="Your email address" required=""
                                required />
                            <input type="text" name="name_2" placeholder="Your Name" required="" required />
                            <div class="g-recaptcha mt-2" data-sitekey="6LdyNmcmAAAAAHD9hhtGDKgiygQR_5Gq_udIDNzv"
                                id="section_footer" required></div>
                            <input type="submit" value="Sign up" />
                        </div>
                        <label style="display: none !important">Leave this field empty if you're human:
                            <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1"
                                autocomplete="off" />
                        </label>

                        <div class="mc4wp-response"></div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    @include('template.footer')
</body>

</html>
