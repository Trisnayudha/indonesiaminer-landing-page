@extends('template.index')
@section('title', 'Indonesia Miner : Exhibition')
{{-- @section('header-bg', 'bg-transparent') --}}
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px;">
        <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;" id="speaker-page">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="text-align:center; color:black">PREVIOUS SPEAKERS</h2>
                            {{-- <p>HERE ARE SOME OF OUR SPEAKERS AT INDONESIA MINER 2023</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ppb_speaker_classic one nopadding ">
            <div class="page_content_wrapper page_main_content sidebar_content full_width fixed_column">
                <div id="15738080891426664581" data-columns="4">
                    <!-- Speaker 1 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/2.png') }}" alt="Tony Wenas" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Tony Wenas memiliki pengalaman lebih dari 20 tahun di industri
                                        pertambangan dan telah memimpin berbagai proyek besar.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Tony Wenas</h4>
                            <div class="speaker_desc">President Director</div>
                            <p class="speaker_desc">PT Freeport Indonesia</p>
                        </div>
                    </div>
                    <!-- Speaker 2 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/4.png') }}" alt="Rachmat Makkasau" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Rachmat Makkasau adalah ahli dalam pengelolaan sumber daya mineral
                                        dengan rekam jejak sukses di berbagai proyek.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Rachmat Makkasau</h4>
                            <div class="speaker_desc">President Director</div>
                            <p class="speaker_desc">PT. Amman Mineral</p>
                        </div>
                    </div>
                    <!-- Speaker 3 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/3.png') }}" alt="Leonard M. Manurung" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Leonard M. Manurung memiliki keahlian dalam industri aluminium dan
                                        berperan penting dalam pengembangan PT. Borneo Alumina.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Leonard M. Manurung</h4>
                            <div class="speaker_desc">President Director</div>
                            <p class="speaker_desc">PT. Borneo Alumina</p>
                        </div>
                    </div>
                    <!-- Speaker 4 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/1.png') }}" alt="Bede Evans" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Bede Evans dikenal atas kontribusinya dalam eksplorasi tambang di
                                        Indonesia dan memimpin PT Sumbawa Timur Mining.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black" class="speaker_name">Bede Evans</h4>
                            <div class="speaker_desc">President Director</div>
                            <p class="speaker_desc">PT Sumbawa Timur Mining</p>
                        </div>
                    </div>
                    <br class="clear" />
                    <!-- Speaker 5 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/6.png') }}" alt="Adriansyah Chaniago" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Adriansyah Chaniago memiliki pengalaman luas dalam industri
                                        pertambangan nikel dan berperan sebagai Wakil Presiden di PT. Vale Indonesia.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Adriansyah Chaniago</h4>
                            <div class="speaker_desc">Vice President</div>
                            <p class="speaker_desc">PT. Vale Indonesia</p>
                        </div>
                    </div>
                    <!-- Speaker 6 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/9.png') }}" alt="Agus Sitindaon" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Agus Sitindaon berpengalaman dalam produksi mineral dan saat ini
                                        menjabat sebagai Direktur Produksi di PT. Citra Palu Minerals.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Agus Sitindaon</h4>
                            <div class="speaker_desc">Director of Production</div>
                            <p class="speaker_desc">PT. Citra Palu Minerals</p>
                        </div>
                    </div>
                    <!-- Speaker 7 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/5.png') }}" alt="Hannu Laitala" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Hannu Laitala adalah Chief Metallurgist dengan spesialisasi dalam
                                        hidrometalurgi di Platinum Sponsor Metso.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Hannu Laitala</h4>
                            <div class="speaker_desc">Chief Metallurgist - Hydrometallurgy</div>
                            <p class="speaker_desc">Platinum Sponsor Metso</p>
                        </div>
                    </div>
                    <!-- Speaker 8 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/11.png') }}" alt="Tyas Rabudianto" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Tyas Rabudianto adalah Direktur Perencanaan Tambang dan Geologi
                                        untuk Program Pertumbuhan Indonesia di PT. Vale Indonesia.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Tyas Rabudianto</h4>
                            <div class="speaker_desc">Director of Indonesia Growth Program (IGP) Mine Planning and Geology
                            </div>
                            <p class="speaker_desc">PT. Vale Indonesia</p>
                        </div>
                    </div>
                    <br class="clear" />
                    <!-- Speaker 9 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/7.png') }}" alt="Wedya Pratyaksa" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Wedya Pratyaksa adalah Manager Technical Services di Platinum
                                        Sponsor Thiess dengan keahlian dalam layanan teknis pertambangan.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Wedya Pratyaksa</h4>
                            <div class="speaker_desc">Manager Technical Services</div>
                            <p class="speaker_desc">Platinum Sponsor Thiess</p>
                        </div>
                    </div>
                    <!-- Speaker 10 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/10.png') }}" alt="Andrew Orkin" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Andrew Orkin adalah Product Development Manager di Platinum Sponsor
                                        Coolon dengan fokus pada inovasi produk.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Andrew Orkin</h4>
                            <div class="speaker_desc">Product Development Manager</div>
                            <p class="speaker_desc">Platinum Sponsor Coolon</p>
                        </div>
                    </div>
                    <!-- Speaker 11 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/12.png') }}" alt="Muchtazar" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Muchtazar adalah Kepala Departemen Sustainability di Platinum
                                        Sponsor Nickel Industries, berfokus pada keberlanjutan dan tanggung jawab sosial.
                                    </p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Muchtazar</h4>
                            <div class="speaker_desc">Head of Sustainability</div>
                            <p class="speaker_desc">Platinum Sponsor Nickel Industries</p>
                        </div>
                    </div>
                    <!-- Speaker 12 -->
                    <div class="element grid one_fourth_bg">
                        <a class="speaker_grid_link" href="#">
                            <img src="{{ asset('new-home/speakers/13.png') }}" alt="Setiadi Wicaksono" />
                            <!-- Tambahkan overlay bio data -->
                            <div class="bio_overlay">
                                <div>
                                    <p class="bio_data">Setiadi Wicaksono adalah SVP Project Management Office di PT. Bukit
                                        Asam Tbk, berperan dalam pengelolaan proyek strategis perusahaan.</p>
                                    <!-- Ikon Media Sosial -->
                                    <div class="social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- Informasi speaker di bawah gambar -->
                        <div class="speaker_info_wrapper">
                            <h4 style="color:black">Setiadi Wicaksono</h4>
                            <div class="speaker_desc">SVP Project Management Office</div>
                            <p class="speaker_desc">PT. Bukit Asam Tbk</p>
                        </div>
                    </div>
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
