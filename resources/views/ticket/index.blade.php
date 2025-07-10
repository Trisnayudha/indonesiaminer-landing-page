@extends('template.index')
@section('title', 'Indonesia Miner : Ticket')
{{-- @section('header-bg', 'bg-transparent') --}}
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px;">
        <div class="one withsmallpadding ppb_header "
            style="text-align:center;padding:60px 0 60px 0;background: linear-gradient(to top, #E8B44B, white);">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="text-align:center;color:black; font-size: 40px;">TICKETS INDONESIA
                                MINER 2025 </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">

            <div class="section-top-ticket">
                <h4 style="white-space: nowrap;">CHOOSE YOUR PACKAGE:</h4>
                <span class="section-line-ticket"></span>
            </div>

            @php
                // Daftar tiket, cukup ubah di sini jika ada perubahan
                $tickets = [
                    [
                        'id' => 108,
                        'qty' => 1,
                        'name' => 'NORMAL TICKET',
                        'image' => 'ticket_im24.png',
                        'price_usd' => 1270,
                        'original_usd' => 1270,
                        'tag' => null,
                        'tag_label' => null,
                    ],
                    [
                        'id' => 113,
                        'qty' => 1,
                        'name' => 'EARLY BIRD',
                        'image' => 'ticket_im24x1.png',
                        'price_usd' => 430,
                        'original_usd' => 1270,
                        'tag' => null,
                        'tag_label' => null,
                    ],
                    [
                        'id' => 114,
                        'qty' => 3,
                        'name' => '3X EARLY BIRD',
                        'image' => 'ticket_im24x3.png',
                        'price_usd' => 1200,
                        'original_usd' => 3810,
                        'tag' => 'MOST POPULAR',
                        'tag_label' => 'kotak-body-tag-ticket',
                        'data-target' => 'kotak2',
                    ],
                    [
                        'id' => 115,
                        'qty' => 5,
                        'name' => '5X EARLY BIRD',
                        'image' => 'ticket_im24x5.png',
                        'price_usd' => 1800,
                        'original_usd' => 6350,
                        'tag' => 'BIG SAVING',
                        'tag_label' => 'kotak-body-tag-ticket',
                        'data-target' => 'kotak2',
                    ],
                ];
            @endphp

            <ul class="section-skeleton-ticket">
                @foreach ($tickets as $i => $t)
                    @php
                        $idx = $i + 1;
                        $save = $t['original_usd'] - $t['price_usd'];
                    @endphp

                    <li class="kotak-ticket" id="kotak{{ $idx }}"
                        onclick="selectTicket(
                  {{ $t['price_usd'] }},
                  {{ $rate_idr * $t['price_usd'] }},
                  {{ $t['id'] }},
                  '{{ $t['name'] }}',
                  'Platinum',
                  {{ $t['qty'] }},
                  {{ $t['original_usd'] }},
                  {{ $rate_idr * $t['original_usd'] }}
                )">
                        {{-- Top banner --}}
                        @if ($save > 0)
                            <div class="kotak-top-ticket"><strong>SAVE ${{ number_format($save) }}</strong></div>
                        @else
                            <div class="kotak-top-ticket-nodiscount"></div>
                        @endif

                        {{-- Desktop --}}
                        <div class="kotak-body-ticket">
                            @if ($t['tag'])
                                <div class="{{ $t['tag_label'] }}">
                                    <p style="font-size: 7px">{{ $t['tag'] }}</p>
                                </div>
                            @endif
                            <p style="font-size: 15px;">{{ $t['name'] }}</p>
                            <figure class="kotak-img-ticket">
                                <img src="{{ asset('img/' . $t['image']) }}" alt="Ticket {{ $t['name'] }}"
                                    class="kotak-img-responsive-ticket" decoding="async" data-nimg="fill" sizes="100vw">
                            </figure>
                            <div class="kotak-price-ticket">
                                <b>${{ number_format($t['price_usd']) }}</b>
                                @if ($save > 0)
                                    <p class="kotak-price-discount-ticket">${{ number_format($t['original_usd']) }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- Mobile --}}
                        <div class="kotak-main-mobile-ticket" data-target="kotak{{ $idx }}">
                            <div class="kotak-mobile-ticket">
                                <div class="kotak-body-mobile-ticket">
                                    <figure class="kotak-body-mobile-image-ticket">
                                        <img src="{{ asset('img/' . $t['image']) }}" alt="Ticket {{ $t['name'] }}"
                                            class="kotak-img-responsive-ticket" decoding="async" data-nimg="fill"
                                            sizes="100vw">
                                    </figure>
                                    <div style="white-space: nowrap">
                                        <h3>{{ $t['name'] }}</h3>
                                        <div class="kotak-body-mobile-price-ticket">
                                            <b>${{ number_format($t['price_usd']) }}</b>
                                            @if ($save > 0)
                                                <p class="kotak-price-discount-ticket">
                                                    ${{ number_format($t['original_usd']) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kotak-mobile-footer-ticket">
                                <button class="btn-select-ticket" data-target="kotak{{ $idx }}">Select</button>
                            </div>
                        </div>

                        <div class="kotak-footer-ticket">
                            <button class="btn-select-ticket" data-target="kotak{{ $idx }}">Select</button>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="section-line-ticket my-4"></div>
            <div class="container">
                <div class="section-footer-ticket d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Kiri: daftar item -->
                    <div class="section-items-ticket d-flex flex-column flex-sm-row align-items-start">
                        <div id="list-item" class="me-sm-4 mb-2 mb-sm-0"></div>
                        <div id="include-item"></div>
                    </div>

                    <!-- Kanan: harga & tombol -->
                    <div class="section-price-item d-flex flex-column align-items-end">
                        <div class="total" style="font-size: 20px;">
                            Total:
                            <b id="total-price" style="font-size: 30px"> USD 0</b>
                        </div>
                        <button class="button-checkout active btn btn-warning custom-yellow-btn fw-bold mt-2">
                            Continue to checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('bottom')
    <script>
        // Ambil semua tombol dengan class "btn-select-ticket"
        const buttons = document.querySelectorAll(".btn-select-ticket");
        const mobileTicketElements = document.querySelectorAll('.kotak-main-mobile-ticket');
        const continueButton = document.querySelector(".button-checkout");
        const imgDesktop = document.querySelector('.kotak-img-ticket');

        // Function untuk menangani klik tombol
        function handleButtonClick(button) {
            // Ambil ID kotak tiket yang diacu oleh tombol
            const targetID = button.getAttribute("data-target");
            // Nonaktifkan semua kotak tiket
            const allTickets = document.querySelectorAll(".kotak-ticket, .kotak-img-ticket");
            allTickets.forEach(ticket => {
                ticket.classList.remove("active");
            });

            // Nonaktifkan semua tombol
            buttons.forEach(btn => {
                btn.classList.remove("active");
            });

            // Aktifkan kotak tiket yang diacu oleh tombol
            const targetTicket = document.getElementById(targetID);
            targetTicket.classList.add("active");

            // Aktifkan elemen kotak-img-ticket yang diacu oleh tombol
            const targetImg = targetTicket.querySelector('.kotak-img-ticket');
            targetImg.classList.add("active");

            // Aktifkan tombol yang diklik
            button.classList.add("active");

            if (button.classList.contains("active")) {
                continueButton.classList.add("active");
                continueButton.setAttribute("data-bs-toggle", "modal");

                // Mengambil ID dari elemen yang diaktifkan
                const targetID = button.getAttribute("data-target");

                // Menentukan nilai `data-target` berdasarkan ID
                if (targetID === "kotak1" || targetID === "kotak2") {
                    continueButton.setAttribute("data-bs-target", "#paymentNew");
                } else if (targetID === "kotak3" || targetID === "kotak4") {
                    continueButton.setAttribute("data-bs-target", "#paymentNewMultiple");
                }
            } else {
                continueButton.classList.remove("active");
                continueButton.removeAttribute("data-bs-toggle");
                continueButton.removeAttribute("data-bs-target");
            }
        }

        // Loop melalui semua tombol dan tambahkan event listener
        buttons.forEach(button => {
            button.addEventListener("click", () => {
                handleButtonClick(button);
            });
        });

        // Jika dalam tampilan mobile, tambahkan fungsi yang sama untuk elemen "kotak-main-mobile-ticket"
        if (mobileTicketElements.length > 0) {
            mobileTicketElements.forEach(mobileElement => {
                mobileElement.addEventListener("click", () => {
                    handleButtonClick(mobileElement);
                });
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#vocer').click(function() {
                var str = $("#voucher_code").val();
                var id_ticket = $("#events_tickets_id_new").val();
                // console.log(str)
                // console.log(id_ticket)
                timer = setTimeout(function() {
                    var price_event_dollar = $("#total_price_dollar_val_new").val();
                    var voucher_code = str;
                    console.log('ini hitung' + price_event_dollar)
                    $.ajax({
                        url: '{{ url('/v2/payment-delegate/find-voucher') }}',
                        type: "post",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "dollar": price_event_dollar,
                            "code": voucher_code,
                            "id_ticket": id_ticket
                        },
                        success: function(response) {
                            if (response.status == 1) {
                                console.log(response)
                                var voucher_value = response.item.price_voucher;
                                var voucher_price_dollar = response.item
                                    .convertUSD_voucher;
                                var voucher_price = parseInt(response.item
                                    .convertIDR_voucher).toLocaleString();
                                var voucher_text = "USD " + voucher_price_dollar +
                                    " ( IDR " + voucher_price + " ) ";

                                var total_price_dollar = response.item.convertUSD;
                                var total_price_rupiah = parseInt(response.item
                                    .convertIDR).toLocaleString();
                                var total_price_sub = $("#total_price_dollar_val_new")
                                    .val();
                                console.log(total_price_rupiah)
                                var total = total_price_sub - response.item
                                    .convertIDR_voucher
                                var total_fix = parseInt(total_price_rupiah)
                                    .toLocaleString();
                                var total_price = "USD " + total_price_dollar +
                                    " ( IDR " + total_price_rupiah + " ) ";
                                $("#voucher_new").html(voucher_text);
                                $("#total_price_new").html(total_price);
                                $("#voucher_price_new").val(response.item
                                    .convertIDR_voucher);

                                var convert_total_rupiah = response.item.convertIDR;
                                var convert_total_dollar = response.item.convertUSD;
                                $("#total_price_val_new").val(convert_total_rupiah);
                                $("#total_price_dollar_val_new").val(
                                    convert_total_dollar);

                                var count = $("#countTicket_val_new").val();
                                console.log('count : ' + count)

                                convert_total_rupiah = convert_total_rupiah /
                                    count;
                                convert_total_dollar = convert_total_dollar /
                                    count;
                                $("#price_rupiah_new").val(convert_total_rupiah);
                                $("#price_dollar_new").val(convert_total_dollar);


                                $("#voucher_price_dollar_new").val(
                                    voucher_price_dollar);
                                $("#voucher_id_new").val(response.item.id);
                                $("#voucher_value_new").val(response.item
                                    .price_voucher);
                                $("#curs_dollar_new").val(response.item.curs_dollar);
                                $(".vocer").attr("disabled", true);
                            } else {
                                swal("", response.message, "error")
                            }
                        }
                    });
                }, 500);
            });
        });

        var selectTicket = function(price_dollar, price_rupiah, events_tickets_id, events_tickets_title,
            events_tickets_type, klik, discount_dollar, discount_price) {

            var change_format_price = parseInt(price_dollar).toLocaleString();
            var price_text = "USD " + change_format_price;
            $("#total-price").html(price_text);
            var change_ticket_name = `
            ${events_tickets_title}`;
            $("#list-item").html(change_ticket_name);
            var include_item = `
                Include access to:

               <p>+ Conference </p>
               <p>+ Exhibition</p>
               <p>+ Networking Functions</p>

                `;

            $("#include-item").html(include_item);
            if (klik > 1) {
                selectPaymentMultiple(price_dollar, price_rupiah, events_tickets_id, events_tickets_title,
                    events_tickets_type, klik, discount_dollar, discount_price)
            } else {

                selectPayment(price_dollar, price_rupiah, events_tickets_id, events_tickets_title,
                    events_tickets_type, klik, discount_dollar, discount_price)
            }
        }

        @if (session('success'))
            $("#loader").hide();
            swal({
                title: 'THANK YOU',
                text: "{{ session('success') }}",
                icon: "success",
                customClass: {
                    content: 'custom-swal-text'
                }
            });
        @elseif (session('error'))
            $("#loader").hide();
            swal({
                text: "{{ session('error') }}",
                icon: "success"
            });
        @endif
        @if ($errors->any())
            $("#loader").hide();
            swal({
                text: "Please ensure that all required fields are completed before submitting the form.",
                icon: "error"
            });
        @endif
    </script>
    @include('ticket.js-payment-single')
    @include('ticket.js-payment-multiple')

    <div id="loader" style="display:none">
        <div class="loader"></div>
    </div>

    <!-- Typeahead.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-3-typeahead@4.0.2/bootstrap3-typeahead.min.js"></script>
    <!-- Custom Script -->

    <script>
        $(document).ready(function() {
            // Handle the "Same as contact person" checkbox click event
            $('.flexCheckDefaultMulti').click(function() {
                if ($(this).prop('checked')) {
                    // If the checkbox is checked, copy values from contact person fields to booking contact fields
                    $('.name_multi').val($('.name_booking_multi').val());
                    $('.email_multi').val($('.email_booking_multi').val());
                    $('.phone_multi').val($('.phone_booking_multi').val());
                    $('.job_title_multi').val($('.job_title_booking_multi').val());
                    $('.company_multi').val($('.company_booking_multi').val());
                } else {
                    // If the checkbox is unchecked, clear the booking contact fields
                    $('.name_multi').val('');
                    $('.email_multi').val('');
                    $('.phone_multi').val('');
                    $('.job_title_multi').val('');
                    $('.company_multi').val('');
                }
            });
            $('.flexCheckDefault').click(function() {
                if ($(this).prop('checked')) {
                    // If the checkbox is checked, copy values from contact person fields to booking contact fields
                    $('.name').val($('.name_booking').val());
                    $('.email').val($('.email_booking').val());
                    $('.phone').val($('.phone_booking').val());
                    $('.job_title').val($('.job_title_booking').val());
                    $('.company').val($('.company_booking').val());
                } else {
                    // If the checkbox is unchecked, clear the booking contact fields
                    $('.name').val('');
                    $('.email').val('');
                    $('.phone').val('');
                    $('.job_title').val('');
                    $('.company').val('');
                }
            });
        });
    </script>
@endpush

@push('head')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Algolia Autocomplete.js and its CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js@alpha"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-theme-classic">
    </link>

    @extends('ticket.ticket-css')
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <style>
        .suggestions-box {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            background-color: #fff;
        }

        .suggestions-box div {
            padding: 8px;
            cursor: pointer;
        }

        .suggestions-box div:hover {
            background-color: #f0f0f0;
        }

        .typeahead {
            background-color: #fff !important;
            /* Warna latar belakang putih */
            color: #000 !important;
            /* Warna teks hitam */
            border: 1px solid #ccc !important;
            /* Batas abu-abu */
            z-index: 1051;
            /* Mengatur agar berada di atas elemen lain */
        }

        .typeahead.dropdown-menu {
            display: none;
            /* Ubah menjadi none untuk mencegah tetap tampil */
        }

        .typeahead.dropdown-menu.show {
            display: block !important;
            /* Hanya tampil ketika ada saran */
        }

        .typeahead .active {
            background-color: #007bff !important;
            /* Warna latar belakang untuk item yang dipilih */
            color: #fff !important;
            /* Warna teks putih */
        }

        .iti {
            display: block;
        }
    </style>
@endpush
