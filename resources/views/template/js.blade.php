<input class='chatMenu hidden' id='offchatMenu' type='checkbox' />
<label class='chatButton' for='offchatMenu'>
    <svg class='svg-1' viewBox='0 0 32 32'>
        <g>
            <path
                d='M16,2A13,13,0,0,0,8,25.23V29a1,1,0,0,0,.51.87A1,1,0,0,0,9,30a1,1,0,0,0,.51-.14l3.65-2.19A12.64,12.64,0,0,0,16,28,13,13,0,0,0,16,2Zm0,24a11.13,11.13,0,0,1-2.76-.36,1,1,0,0,0-.76.11L10,27.23v-2.5a1,1,0,0,0-.42-.81A11,11,0,1,1,16,26Z'>
            </path>
            <path
                d='M19.86,15.18a1.9,1.9,0,0,0-2.64,0l-.09.09-1.4-1.4.09-.09a1.86,1.86,0,0,0,0-2.64L14.23,9.55a1.9,1.9,0,0,0-2.64,0l-.8.79a3.56,3.56,0,0,0-.5,3.76,10.64,10.64,0,0,0,2.62,4A8.7,8.7,0,0,0,18.56,21a2.92,2.92,0,0,0,2.1-.79l.79-.8a1.86,1.86,0,0,0,0-2.64Zm-.62,3.61c-.57.58-2.78,0-4.92-2.11a8.88,8.88,0,0,1-2.13-3.21c-.26-.79-.25-1.44,0-1.71l.7-.7,1.4,1.4-.7.7a1,1,0,0,0,0,1.41l2.82,2.82a1,1,0,0,0,1.41,0l.7-.7,1.4,1.4Z'>
            </path>
        </g>
    </svg>
    <svg class='svg-2' viewBox='0 0 512 512'>
        <path
            d='M278.6 256l68.2-68.2c6.2-6.2 6.2-16.4 0-22.6-6.2-6.2-16.4-6.2-22.6 0L256 233.4l-68.2-68.2c-6.2-6.2-16.4-6.2-22.6 0-3.1 3.1-4.7 7.2-4.7 11.3 0 4.1 1.6 8.2 4.7 11.3l68.2 68.2-68.2 68.2c-3.1 3.1-4.7 7.2-4.7 11.3 0 4.1 1.6 8.2 4.7 11.3 6.2 6.2 16.4 6.2 22.6 0l68.2-68.2 68.2 68.2c6.2 6.2 16.4 6.2 22.6 0 6.2-6.2 6.2-16.4 0-22.6L278.6 256z'>
        </path>
    </svg>
</label>

<div class='chatBox'>
    <form class="validations" novalidate>
        <div class='chatContent'>
            <div class='chatHeader'>
                <svg viewbox='0 0 32 32'>
                    <path
                        d='M24,22a1,1,0,0,1-.64-.23L18.84,18H17A8,8,0,0,1,17,2h6a8,8,0,0,1,2,15.74V21a1,1,0,0,1-.58.91A1,1,0,0,1,24,22ZM17,4a6,6,0,0,0,0,12h2.2a1,1,0,0,1,.64.23L23,18.86V16.92a1,1,0,0,1,.86-1A6,6,0,0,0,23,4Z'>
                    </path>
                    <rect height='2' width='2' x='19' y='9'></rect>
                    <rect height='2' width='2' x='14' y='9'></rect>
                    <rect height='2' width='2' x='24' y='9'></rect>
                    <path
                        d='M8,30a1,1,0,0,1-.42-.09A1,1,0,0,1,7,29V25.74a8,8,0,0,1-1.28-15,1,1,0,1,1,.82,1.82,6,6,0,0,0,1.6,11.4,1,1,0,0,1,.86,1v1.94l3.16-2.63A1,1,0,0,1,12.8,24H15a5.94,5.94,0,0,0,4.29-1.82,1,1,0,0,1,1.44,1.4A8,8,0,0,1,15,26H13.16L8.64,29.77A1,1,0,0,1,8,30Z'>
                    </path>
                </svg>
                <div class='chatTitle'>Hello! We would like to talk to you.<span>Please fill the details below to start
                        chatting with us.</span></div>
            </div>
            <div class='chatText'>
                <div class="wa_group field">
                    <input type="text" class="wa_field" placeholder="Full Name" name="wa_name" id='wa_name'
                        required />
                    <label for="name" class="wa_label">Full Name</label>
                </div>
                <div class="wa_group field">
                    <input type="text" class="wa_field" placeholder="Company Name" name="wa_company_name"
                        id='wa_company_name' required />
                    <label for="company_name" class="wa_label">Company Name</label>
                </div>
                <div class="wa_group field">
                    <input type="text" class="wa_field" placeholder="Email Buisness" name="wa_email" id='wa_email'
                        required />
                    <label for="email" class="wa_label">Email Buisness</label>
                </div>
                <div class="wa_group field">
                    <label for="question" class="wa_label">Question</label>
                    <textarea name="question" id="question" wrap="off" class="wa_field"></textarea>

                </div>
            </div>
        </div>

        <button type="button" class='chatStart' onclick="send()">
            Start Chatting
        </button>
    </form>
</div>
<script>
    function subscribe() {

    }

    function send() {

        var name = document.getElementById("wa_name").value;
        var company_name = document.getElementById("wa_company_name").value;
        var email = document.getElementById("wa_email").value;
        var question = document.getElementById("question").value;
        if (name != '' && company_name != '' && email != '' && question != '') {
            window.open(
                'https://api.whatsapp.com/send?phone=628111798599&text=' + name + '%0D%0A' + company_name +
                '%0D%0A' +
                email + '%0D%0A%0D%0A' + 'Question: ' + question,
                '_blank' // <- This is what makes it open in a new window.
            );
        } else {
            swal({
                title: 'Please provide a field input',
                icon: 'error',
                button: true,
                position: 'center'
            })
        }
    }
</script>
<!-- Plugins Needed for the Project -->
<script src="{{ asset('/vendor/front/plugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('/vendor/front/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendor/front/plugins/slick/slick.min.js') }}"></script>
{{-- <!--<script src="{{ asset('/vendor/front/plugins/shuffle/shuffle.min.js') }}"></script>--> --}}
<script src="{{ asset('/vendor/front/plugins/aos/aos.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="{{ asset('vendor/indominer/azzara') }}/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Main Script -->
<script src="{{ asset('/vendor/front/js/script.js') }}"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
@if (env('APP_PRODUCTION'))
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <!-- Start of Qontak Webchat Script -->
    {{-- <script>
    const qchatInit = document.createElement('script');
    qchatInit.src = "https://webchat.qontak.com/qchatInitialize.js";
    const qchatWidget = document.createElement('script');
    qchatWidget.src = "https://webchat.qontak.com/js/app.js";
    document.head.prepend(qchatInit);
    document.head.prepend(qchatWidget);
    qchatInit.onload = function () {qchatInitialize({ id: '07de68be-c5e2-44c3-8bc1-8d5ec154c564', code: 'ti5J3-J7yHcPbOmxSewyKw' })};
</script> --}}
    <!-- End of Qontak Webchat Script -->
    <!--<script src="{{ asset('js/disable.js') }}"></script>-->
@else
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/vue-cookies@1.7.4/vue-cookies.min.js"></script>
<!--<script src="https://unpkg.com/vue-cookies@1.7.4/vue-cookies.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
<script src="https://unpkg.com/vue-advanced-cropper@1.0.0/dist/index.umd.js"></script>
<script src="{{ asset('new-home/js/jquery.js') }}"></script>
<script src="{{ asset('new-home/js/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js') }}">
</script>
<script
    src="{{ asset('new-home/js/plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js') }}">
</script>
<script
    src="{{ asset('new-home/js/plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js') }}">
</script>
<script
    src="{{ asset('new-home/js/plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js') }}">
</script>
<script
    src="{{ asset('new-home/js/plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js') }}">
</script>
<script
    src="{{ asset('new-home/js/plugins/revslider/public/assets/js/extensions/revolution.extension.parallax.min.js') }}">
</script>
<script
    src="{{ asset('new-home/js/plugins/revslider/public/assets/js/extensions/revolution.extension.actions.min.js') }}">
</script>
<script
    src="{{ asset('new-home/js/plugins/revslider/public/assets/js/extensions/revolution.extension.video.min.js') }}">
</script>

<script src="{{ asset('new-home/js/plugins/ui/core.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.requestAnimationFrame.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/ilightbox.packed.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.easing.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/waypoints.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.isotope.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.masory.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.tooltipster.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jarallax.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.sticky-kit.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.cookie.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/custom_plugins.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/custom.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/custom_onepage.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.countdown.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/imagesloaded.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/masonry.min.js') }}"></script>

<script src="{{ asset('new-home/js/plugins/jquery.simplegmaps.min.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jarallax-video.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/jquery.cookie.js') }}"></script>
<script src="{{ asset('new-home/js/plugins/custom_clock.js') }}"></script>

<script src='{{ asset('new-home/js/plugins/ui/widget.min.js') }}'></script>
<script src='{{ asset('new-home/js/plugins/ui/accordion.min.js') }}'></script>
<script src='{{ asset('new-home/js/plugins/custom-accordion.js') }}'></script>
<script>
    /* <![CDATA[ */
    var mc4wp_forms_config = [];
    /* ]]> */
</script>
<script>
    function validateMC4WPForm() {
        var response = grecaptcha.getResponse();
        console.log(response)
        if (response.length == 0) {
            // reCAPTCHA not verified
            console.log('masuk ini')
            alert('Please verify that you are not a robot.');
        } else {
            // reCAPTCHA verified, submit the form
            document.getElementById("mc4wp-form-1").submit();
        }
    }
</script>
<script>
    jQuery(document).ready(function() {
        jQuery("#map1566739327259493916").simplegmaps({
            MapOptions: {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 8,
                scrollwheel: false,
            },
        });
    });
</script>
<script type="text/javascript">
    function setREVStartSize(e) {
        try {
            var i = jQuery(window).width(),
                t = 9999,
                r = 0,
                n = 0,
                l = 0,
                f = 0,
                s = 0,
                h = 0;
            if (
                (e.responsiveLevels &&
                    (jQuery.each(e.responsiveLevels, function(e, f) {
                            f > i && ((t = r = f), (l = e)),
                                i > f && f > r && ((r = f), (n = e));
                        }),
                        t > r && (l = n)),
                    (f = e.gridheight[l] || e.gridheight[0] || e.gridheight),
                    (s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth),
                    (h = i / s),
                    (h = h > 1 ? 1 : h),
                    (f = Math.round(h * f)),
                    "fullscreen" == e.sliderLayout)
            ) {
                var u = (e.c.width(), jQuery(window).height());
                if (void 0 != e.fullScreenOffsetContainer) {
                    var c = e.fullScreenOffsetContainer.split(",");
                    if (c)
                        jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u;
                        }),
                        e.fullScreenOffset.split("%").length > 1 &&
                        void 0 != e.fullScreenOffset &&
                        e.fullScreenOffset.length > 0 ?
                        (u -=
                            (jQuery(window).height() *
                                parseInt(e.fullScreenOffset, 0)) /
                            100) :
                        void 0 != e.fullScreenOffset &&
                        e.fullScreenOffset.length > 0 &&
                        (u -= parseInt(e.fullScreenOffset, 0));
                }
                f = u;
            } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
            e.c.closest(".rev_slider_wrapper").css({
                height: f,
            });
        } catch (d) {
            console.log("Failure at Presize of Slider:" + d);
        }
    }
</script>
<script>
    (function() {
        function addEventListener(element, event, handler) {
            if (element.addEventListener) {
                element.addEventListener(event, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent("on" + event, handler);
            }
        }

        function maybePrefixUrlField() {
            if (this.value.trim() !== "" && this.value.indexOf("http") !== 0) {
                this.value = "http://" + this.value;
            }
        }

        var urlFields = document.querySelectorAll(
            '.mc4wp-form input[type="url"]'
        );
        if (urlFields && urlFields.length > 0) {
            for (var j = 0; j < urlFields.length; j++) {
                addEventListener(urlFields[j], "blur", maybePrefixUrlField);
            }
        } /* test if browser supports date fields */
        var testInput = document.createElement("input");
        testInput.setAttribute("type", "date");
        if (testInput.type !== "date") {
            /* add placeholder & pattern to all date fields */
            var dateFields = document.querySelectorAll(
                '.mc4wp-form input[type="date"]'
            );
            for (var i = 0; i < dateFields.length; i++) {
                if (!dateFields[i].placeholder) {
                    dateFields[i].placeholder = "YYYY-MM-DD";
                }
                if (!dateFields[i].pattern) {
                    dateFields[i].pattern =
                        "[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])";
                }
            }
        }
    })();
</script>
<script type="text/javascript">
    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage =
            "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage +=
            "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage +=
            "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage +=
            "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage =
            "<span style='font-size:16px;color:#BC0C06;'>" +
            errorMessage +
            "</span>";
        jQuery(sliderID).show().html(errorMessage);
    }
</script>
<script>
    var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
    var htmlDivCss = "";
    if (htmlDiv) {
        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
    } else {
        var htmlDiv = document.createElement("div");
        htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
        document
            .getElementsByTagName("head")[0]
            .appendChild(htmlDiv.childNodes[0]);
    }
</script>
<script type="text/javascript">
    setREVStartSize({
        c: jQuery("#rev_slider_1_1"),
        gridwidth: [1240],
        gridheight: [800],
        sliderLayout: "fullwidth",
    });

    var revapi1,
        tpj = jQuery;

    tpj(document).ready(function() {
        if (tpj("#rev_slider_1_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1_1");
        } else {
            revapi1 = tpj("#rev_slider_1_1")
                .show()
                .revolution({
                    sliderType: "standard",
                    jsFileLocation: "js/plugins/revslider/public/assets/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        onHoverStop: "off",
                    },
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: 1240,
                    gridheight: 800,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner3",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    },
                });
        }
    }); /*ready*/
</script>
<script>
    var htmlDivCss =
        "	#rev_slider_1_1_wrapper .tp-loader.spinner3 div { background-color: #ff2d55 !important; } ";
    var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
    if (htmlDiv) {
        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
    } else {
        var htmlDiv = document.createElement("div");
        htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
        document
            .getElementsByTagName("head")[0]
            .appendChild(htmlDiv.childNodes[0]);
    }
</script>
