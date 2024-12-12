@extends('template.index')
@section('title', 'Indonesia Miner : News')
{{-- @section('header-bg', 'bg-transparent') --}}
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px;">
        <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;">
            <section class="">
                <div class="section-padding pt-0 overflow-hidden">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div style="text-align: left">

                                    <a href="{{ url()->previous() }}" class="link-bread">Home / Directory / List News /
                                        Detail
                                        News</a>
                                    <h4 class="title-sm mb-20">{{ $form->title }}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="brand-box-events">
                                            <input type="hidden" id="desc" value="{{ $form->desc }}">
                                            <p class="title">{{ $form->location }}</p>
                                            <p class="title mb-0">{{ $form->date_news }}</p>
                                            <p class="title">Share</p>
                                            <ul class="social-nav black ml-auto mr-auto social-rounded">
                                                <li>
                                                    <a href="{{ url('/share-url?page=News&type=linkedin&url=' . url("/news/detail/$form->slug") . '&slug=' . $form->slug) }}"
                                                        target="_blank" class="link"><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/share-url?page=News&type=facebook&url=' . url("/news/detail/$form->slug") . '&slug=' . $form->slug) }}"
                                                        target="_blank" class="link"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/share-url?page=News&type=twitter&url=' . url("/news/detail/$form->slug") . '&slug=' . $form->slug) }}"
                                                        target="_blank" class="link"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/share-url?page=News&type=whatsapp&url=' . url("/news/detail/$form->slug") . '&slug=' . $form->slug) }}"
                                                        target="_blank" class="link"><i class="fab fa-whatsapp"></i></a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-end">
                                        <div class="brand-box-events mr-0">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-40">
                            <div class="col-lg-8 col-sm-12">
                                <img src="{{ $form->image }}" alt="Events" style="width: 100%;" class="mb-20">
                                <div class="desc-box mb-20">
                                    {{-- <div class="bg-ads">
                            <a href="{{ $bannerAds->link }}" target="_blank">
                                <img src="{{ $bannerAds->image }}" alt="">
                            </a>
                        </div> --}}
                                    <div class="content">
                                        <section>
                                            {!! $form->desc !!}
                                            <!-- <div v-html="coba"> -->
                                        </section>
                                        {{-- <iframe src="{{ $form->video }}" frameborder="0" class="frame"></iframe> --}}
                                        <p>Image source: {{ $form->location }}</p>
                                        <p>Source Link: <a
                                                href="{{ $form->reference_link }}">{{ $form->reference_link }}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="line-sm"></div>
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
                                                        <source src="{{ asset('assets/img/section_1.mp4') }}"
                                                            type="video/mp4">
                                                    </video>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-start">
                                <h4 class="title-border margin-left-right-after-none">Relate News</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($relate as $i => $row)
                                <div class="col-lg-6 col-md-12">
                                    <a href="{{ url('news/detail/' . $row->slug) }}">
                                        <div class="box-news box-news-update">
                                            <div class="image">
                                                <img src="{{ $row->image }}" alt="News">
                                                <a href="#" class="bookmark-badge"></a>
                                                <div class="date">{{ $row->date_news }}</div>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{ $row->title }}</h4>
                                                <div class="caption-sect">
                                                    <div class="address mb-2">{{ $row->location }}</div>
                                                    <div class="eye">{{ $row->views }} Views</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </section>
        </div>
        <!-- end of DETAIL EVENTS tab -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true" style="overflow-y:auto;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="javascript:void(0)" class="needs-validation" novalidate>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-12">
                                    <label for="email">Email Buisness</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Your Email Buisness" required>
                                    <div class="invalid-feedback">
                                        Please provide a email.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Full Name"
                                        name="name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Name.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control" id="job_title" required name="job_title">
                                    <div class="invalid-feedback">
                                        Please provide a valid Job Title.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-12">
                                    <label for="company_name">Company</label>
                                    <input type="text" class="form-control" id="company_name"
                                        placeholder="Your Company" name="company_name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Company.
                                    </div>
                                </div>
                            </div>
                            <label for="phone">No HP</label>
                            <div class="form-row">
                                <div class="col-md-4 mb-4">
                                    <select name="phone_code" id="phone_code" class="form-control validation"
                                        placeholder="Phone code">
                                        <option alue="">Phone code</option>
                                        @foreach ($phone_code as $p => $prow)
                                            <option @if ($prow->code == '62') selected @endif
                                                {{ old('phone_code') == $prow->id ? 'selected' : '' }}
                                                value="{{ $prow->code }}">+{{ $prow->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="tel" class="form-control" id="phone" placeholder="83xxxxx"
                                        name="phone" required>
                                    <div class="invalid-feedback">
                                        Please provide a phone number.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Your Company" name="password" required>
                                    <div class="invalid-feedback">
                                        Please provide a password.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                        required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No, Thanks</button>
                            <button type="button" class="btn btn-primary" id="sign_up" onclick="subscribe()">Sign
                                Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content2">
                    <div class="modal-header2 img" style="background-image: url(vendor/news/images/img.jpeg)">
                        <button type="button" class="close d-flex align-items-center justify-content-center"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ion-ios-close" style="background: black"></span>
                        </button>
                    </div>
                    <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                        <h2>Subscribe to our bulletin</h2>
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="{{ asset('vendor/news/images/email.svg') }}" alt="" class="img-fluid" />
                        </div>
                        <h4 class="mb-2">Never miss an updated mining stories; subscribe to get a monthly summary of
                            the
                            top
                            mining stories</h4>
                        <form class="subscribe-form needs-validation" novalidate>
                            <div class="form-group d-flex">
                                <input type="text" class="form-control rounded-left" id="email_company"
                                    name="email_company" placeholder="Your work email" required />
                                <button type="button" value="Subscribe" class="form-control submit px-3 rounded-right"
                                    id="main-button">Subscribe</button>
                            </div>
                            <span style="font-size: 12px"><a data-dismiss="modal" aria-label="Close"
                                    href="javascript:void(0);" id="sub-button2"> No, thanks
                                </a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </main>
    @endsection
    @push('bottom')
        <script src="{{ asset('js/rebuild/project/project.js?' . date('Ymds')) }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.js"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields


            function subscribe() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName("needs-validation");
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.classList.add("was-validated");
                });
            }

            $(document).ready(function() {

                if (!Cookies.get('hide-div')) {
                    setTimeout(function() {
                        $('#myModal2').modal();
                    }, 30000);
                };

                $("#sub-button2").click(function() {
                    Cookies.set('hide-div', true, {
                        expires: 1
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(document).ready(function() {
                    $('#phone').change(function() {
                        var phone_code = $("#phone_code").val();
                        if (phone_code == 62) {
                            if (/^0/.test(this.value)) {
                                this.value = this.value.replace(/^0/, "")
                            }
                        }
                    });
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).on('click', '#main-button', function(event) {
                    event.preventDefault();
                    var email = $("#email_company").val();
                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ url('news/subscribe') }}",
                        data: {
                            // name: name,
                            email: email,
                            // company_name: company_name,
                            // job_title: job_title,
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.status == 1) {
                                swal({
                                        title: "Thank you for subcribe",
                                        icon: "success",
                                        button: false,
                                        position: 'center',
                                        timer: 1500
                                    }),
                                    $('#myModal2').modal('hide');
                                setTimeout(function() {
                                    $('#myModal').modal();
                                    $("#email").val(email);
                                }, 1500);
                                Cookies.set('hide-div', true, {
                                    expires: 365
                                });
                            }
                        },
                        error: function(response) {
                            swal({
                                title: 'Please provide a field input',
                                icon: 'error',
                                button: true,
                                position: 'center'
                            })
                        }
                    });
                });
                $(document).ready(function() {
                    $('#email').change(function() {
                        var email = $("#email").val();
                        var listErrorPrefixs = $("#listStringPrefix").val();

                        $.ajax({
                            type: 'POST',
                            url: '{{ url('/register/check-email') }}',
                            headers: {
                                'X-CSRF-Token': '{{ csrf_token() }}',
                            },
                            data: 'email=' + email,
                            success: function(msg) {
                                if (msg == 'found same') {
                                    swal("Warning", "Email (" + email +
                                        ") is Already Registered", "warning");
                                    $("#email").val("");
                                } else if (msg == 'error prefix') {
                                    swal("Warning",
                                        "Sorry you can't use email, which is affiliated " +
                                        listErrorPrefixs, "warning");
                                    $("#email").val("");
                                }
                            }
                        });
                    });
                });
                $("btn btn-primary").hover(function() {
                    $(this).css("background", "#3e64ff")
                });
                $(document).on('click', '#sign_up', function(event) {
                    event.preventDefault();
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var job_title = $("#job_title").val();
                    var company_name = $("#company_name").val();
                    var phone = $("#phone").val();
                    var phone_code = $("#phone_code").val();
                    var combine = phone_code + phone;
                    var password = $("#password").val();

                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ url('register/regis-json') }}",
                        data: {
                            name: name,
                            email: email,
                            company_name: company_name,
                            job_title: job_title,
                            company_name: company_name,
                            combine: combine,
                            password: password,
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.status == 1) {
                                swal({
                                        title: "Success Registration",
                                        icon: "success",
                                        button: false,
                                        position: 'center',
                                        timer: 1500
                                    }),
                                    $('#myModal').modal('hide');
                            } else {
                                swal({
                                    title: res.message,
                                    icon: 'error',
                                    button: true,
                                    position: 'center'
                                })
                            }
                        },
                        error: function(response) {
                            swal({
                                title: response.message,
                                icon: 'error',
                                button: true,
                                position: 'center'
                            })
                        }
                    });
                });
            });
        </script>
    @endpush

    @push('head')
        <link rel="stylesheet" href="{{ asset('vendor/news/css/style.css') }}">
        <style>
            .modal-newsletter {
                color: #999;
                width: 625px;
                max-width: 625px;
                font-size: 15px;
            }

            .modal-newsletter .modal-content {
                padding: 30px;
                border-radius: 0;
                border: none;
            }

            .modal-newsletter .modal-header {
                border-bottom: none;
                position: relative;
                border-radius: 0;
            }

            .modal-newsletter h4 {
                color: #000;
                font-size: 30px;
                margin: 0;
                font-weight: bold;
            }

            .modal-newsletter .close {
                position: absolute;
                top: -15px;
                right: -15px;
                text-shadow: none;
                opacity: 0.3;
                font-size: 24px;
            }

            .modal-newsletter .close:hover {
                opacity: 0.8;
            }

            .modal-newsletter .icon-box {
                color: #7265ea;
                display: inline-block;
                z-index: 9;
                text-align: center;
                position: relative;
                margin-bottom: 10px;
            }

            .modal-newsletter .icon-box i {
                font-size: 110px;
            }

            .modal-newsletter .form-control,
            .modal-newsletter .btn {
                min-height: 46px;
                border-radius: 0;
            }

            .modal-newsletter .form-control {
                box-shadow: none;
                border-color: #dbdbdb;
            }

            .modal-newsletter .form-control:focus {
                border-color: #f95858;
                box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
            }

            .modal-newsletter .btn {
                color: #fff;
                background: #f95858;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                padding: 6px 20px;
                min-width: 150px;
                margin-left: 6px !important;
                border: none;
            }

            .modal-newsletter .btn:hover,
            .modal-newsletter .btn:focus {
                box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
                background: #f72222;
                outline: none;
            }

            .modal-newsletter .input-group {
                margin-top: 30px;
            }

            .hint-text {
                margin: 100px auto;
                text-align: center;
            }

            .form-control {
                border-color: #7d7e81;
                border-radius: 10px;
            }

            #wrapper.transparent .top_bar:not(.scroll) #menu_wrapper div .nav>li>a,
            #wrapper.transparent .top_bar:not(.scroll) #logo_right_button a#mobile_nav_icon,
            #logo_wrapper .social_wrapper ul li a {
                color: black !important;
            }
        </style>
    @endpush
