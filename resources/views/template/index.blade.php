<!DOCTYPE html>
<html lang="en" style="--bs-primary:#00537a;--bs-warning:#E8B44B;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Indonesia Miner</title>
    @include('template.css')
    @stack('head')
</head>

<body>

    {{-- Navbar tetap --}}
    @include('template.header')

    @yield('content')

    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row gx-5">
                <!-- About & Social -->
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('new-home/logo/miner.png') }}" width="158" alt="Indonesia Miner Logo"
                        class="mb-3">
                    <p class="text-justify">
                        INDONESIA MINER offers partners an unsurpassed platform to reach Indonesia mining community
                        and Global audience. INDONESIA MINER hosts a premier conference that combines Metals, Coal
                        and Other minerals, including EV Battery Industry discussion. With digital media news
                        centred on Minerals and Coal project updates and operational technology and Intelligent
                        Directory our platform will create influential content that engages audiences and establish
                        a brand as industry innovative thought leaders.
                    </p>
                    <div>
                        <a href="https://www.facebook.com/IndonesiaMiner/" target="_blank" class="text-white me-3">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/#" target="_blank" class="text-white me-3">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UC5ENaOi6ROvFl5PWMkjmEQA" target="_blank"
                            class="text-white me-3">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/14762536/" target="_blank" class="text-white me-3">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.instagram.com/indonesia_miner/" target="_blank" class="text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <!-- Get In Touch -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">GET IN TOUCH</h5>
                    <p class="mb-1">PT. Media Mitrakarya Indonesia</p>
                    <p>CIBIS NINE - 11th Floor<br>TB. Simatupang No. 2 Jakarta, Indonesia 12560</p>
                    <p class="mb-1">
                        <i class="fas fa-phone-volume me-2"></i>
                        622180623711
                    </p>
                    <p class="mb-1">
                        <i class="fas fa-mobile-alt me-2"></i>
                        628111798599
                    </p>
                    <p>
                        <i class="fas fa-envelope me-2"></i>
                        <a href="mailto:info@indonesiaminer.com" class="text-white">
                            info@indonesiaminer.com
                        </a>
                    </p>
                </div>

                <!-- Bulletin Signup -->
                <div class="col-md-4">
                    <h5 class="fw-bold">Indonesia Miner Bulletin</h5>
                    <p>Don't miss a thing!<br>Sign up now to receive our weekly bulletin</p>
                    <form id="footer-subscribe" action="{{ url('contact/news-subcribe') }}" method="post"
                        onsubmit="event.preventDefault(); validateMC4WPForm();">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email_2" class="form-control" placeholder="Your email address"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="name_2" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LdyNmcmAAAAAHD9hhtGDKgiygQR_5Gq_udIDNzv"></div>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    @include('home.modal')
    @stack('bottom')
    @include('template.js')
    <!-- Start of Qontak Webchat Script -->
    <script>
        const qchatInit = document.createElement('script');
        qchatInit.src = "https://webchat.qontak.com/qchatInitialize.js";
        const qchatWidget = document.createElement('script');
        qchatWidget.src = "https://webchat.qontak.com/js/app.js";
        document.head.prepend(qchatInit);
        document.head.prepend(qchatWidget);
        qchatInit.onload = function() {
            qchatInitialize({
                id: "07de68be-c5e2-44c3-8bc1-8d5ec154c564",
                code: "ti5J3-J7yHcPbOmxSewyKw"
            })
        };
    </script>
    <!-- End of Qontak Webchat Script -->
</body>

</html>
