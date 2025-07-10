<div class="modal fade" id="paymentNewMultiple" tabindex="-1" role="dialog" aria-labelledby="choose-package"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body modal-body-no-padding">
                <form action="{{ url('payment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <input type="hidden" id="events_id_new" value="13" name="events_id_new">
                            <!-- events ticket -->
                            <input type="hidden" id="events_tickets_id" name="events_tickets_id_new">
                            <input type="hidden" id="events_tickets_title" name="events_tickets_title_new">
                            <input type="hidden" id="events_tickets_type" name="events_tickets_type_new">
                            <!-- event price -->
                            <input type="hidden" id="price_rupiah" name="price_rupiah_new">
                            <input type="hidden" id="price_dollar" name="price_dollar_new">
                            <!-- total price -->
                            <input type="hidden" id="total_price_val" name="total_price_val_new">
                            <input type="hidden" id="total_price_dollar_val" name="total_price_dollar_val_new">
                            <input type="hidden" id="countTicket_val" name="countTicket_val_new">

                            <input type="hidden" name="rate_idr" value="{{ $rate_idr }}">

                            <div class="col-md-12 col-lg-12">
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <div class="alert alert-info" role="alert">
                                            <h4 class="alert-heading" style="text-align: left">* ATTENDEES</h4>
                                            <hr>
                                            <p class="mb-0" style="text-align: left">Enter Attendees Details Here
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="wrapper-login-forgot" style="margin: 0px;">
                                            <div class="btn-group-bt">
                                                <input class="form-check-input flexCheckDefaultMulti" type="checkbox"
                                                    value="">
                                                <span class="form-check-label" for="flexCheckDefault">Same as
                                                    contact person</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control name_multi" name="name[]"
                                            placeholder="" value="" required>
                                        <div class="invalid-feedback">Valid full name is required.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control email_multi" name="email[]"
                                            placeholder="" value="" required>
                                        <div class="invalid-feedback">Valid email is required.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="phone" class="form-label">Mobile Number <span
                                                class="text-muted"></span></label>
                                        <input type="text" class="form-control phone_multi_dynamic" name="phone[]"
                                            placeholder="" value="62" required>
                                        <div class="invalid-feedback">Please enter a valid phone.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="company" class="form-label">Company *</label>
                                        <input type="text" class="form-control company_multi" name="company[]"
                                            placeholder="PT" value="" required>
                                        <div class="invalid-feedback">Please enter your company.</div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="job_title" class="form-label">Job Title <span
                                                class="text-muted"></span></label>
                                        <select class="form-control job-title-select-multiple" name="job_title[]"
                                            required>
                                            <option value="">Select Job Title</option>
                                            @foreach ($job_title_main as $data)
                                                <option value="{{ $data->job_title }}"
                                                    data-tier="{{ $data->tier }}">
                                                    {{ $data->job_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="job_title_tier"
                                            class="selected-job-title-tier-multiple">
                                        <div class="invalid-feedback">Please select a valid job title.</div>
                                    </div>
                                    <!-- Menyembunyikan Job Title Detail secara default -->
                                    <div class="col-sm-12 job-title-detail-container d-none">
                                        <label for="job_title_detail" class="form-label">Job Function<span
                                                class="text-muted"></span></label>
                                        <input type="text" class="form-control job-title-detail-input-multiple"
                                            name="job_title_detail[]" required>
                                        <div class="invalid-feedback">Please enter a valid job title detail.</div>
                                    </div>
                                    <div class="customerMultiple"></div>
                                    <hr style="margin:10px">
                                    <div class="col-sm-12">
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading" style="text-align: left">* Booking Contact
                                            </h4>
                                            <hr>
                                            <p class="mb-0" style="text-align: left">Enter the best person we
                                                can contact for this booking in the event of unplanned changes.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control name_booking_multi"
                                            name="name_booking" placeholder="" value="{{ $name }}"
                                            id="name_booking" required>
                                        <div class="invalid-feedback">Valid full name is required.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control email_booking_multi"
                                            name="email_booking" placeholder="" value="{{ $email }}"
                                            id="email_booking" required>
                                        <div class="invalid-feedback">Valid email is required.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="phone" class="form-label">Mobile Number <span
                                                class="text-muted"></span></label>
                                        <input type="text" class="form-control phone_multi_dynamic"
                                            name="phone_booking" placeholder="" id="phone_booking"
                                            value="62{{ $phone }}" required>
                                        <div class="invalid-feedback">Please enter a valid phone.</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="job_title_booking" class="form-label">Job Title <span
                                                class="text-muted"></span></label>
                                        <input type="text" class="form-control job_title_booking_multi"
                                            name="job_title_booking" placeholder="" id="job_title_booking"
                                            value="{{ $job_title }}" required>
                                        <div class="invalid-feedback">Please enter a valid job title.</div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="company_booking" class="form-label">Company *</label>
                                        <input type="text" class="form-control company_booking_multi"
                                            name="company_booking" placeholder="PT" id="company_booking"
                                            value="{{ $company_name }}" required>
                                        <div class="invalid-feedback">Please enter your company.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city" class="form-label">City *</label>
                                        <input type="text" class="form-control" name="city"
                                            placeholder="Jakarta" id="city" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="country" class="form-label">Country/Region *</label>
                                        <input type="text" class="form-control" name="country"
                                            placeholder="Indonesia" id="country" required>
                                        <div class="invalid-feedback">Please provide a Country</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="zip" class="form-label">Zip/Postal Code *</label>
                                        <input type="number" class="form-control" name="zip" id="zip"
                                            required>
                                        <div class="invalid-feedback">Please provide a Zip/Postal Code.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="company_website" class="form-label">Company Website *</label>
                                        <input type="text" class="form-control" name="company_website"
                                            placeholder="https://indonesiaminer.com" id="company_website" required>
                                        <div class="invalid-feedback">Please provide a Company Website.</div>
                                    </div>
                                </div>
                                <hr class="my-4">
                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card bg-light h-100 shadow-sm">
                                <div class="card-body d-flex flex-column">

                                    <!-- Discount Code -->
                                    <label class="form-label fw-semibold mb-1">Discount Code</label>
                                    <div class="input-group mb-4">
                                        <input type="text" name="voucher_code" id="voucher_code"
                                            class="form-control" placeholder="Input discount code">
                                        <button type="button" class="btn btn-outline-secondary" id="vocer">
                                            Apply
                                        </button>
                                    </div>

                                    <!-- Price Breakdown -->
                                    <div class="flex-grow-1 mb-4">
                                        <div class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Quantity</span>
                                            <span id="ticket_increment">1×</span>
                                        </div>
                                        <div class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Event Price</span>
                                            <span id="event_price">USD 0 (IDR 0)</span>
                                        </div>
                                        <div class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Discount</span>
                                            <span id="voucher">USD 0 (IDR 0)</span>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <strong>Total Price</strong>
                                            <strong id="total_price">USD 0 (IDR 0)</strong>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="d-flex justify-content-between mt-auto">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="btn btn-warning custom-yellow-btn fw-bold beforePayment">
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var counter = 0;
    var tampung = 0;
    const jobTitleDetails = @json($grouped_job_titles);

    var selectPaymentMultiple = function(discount_dollar, discount_rupiah, events_tickets_id, events_tickets_title,
        events_tickets_type, klik, price_dollar, price_rupiah) {

        var countKlik = klik;
        var ticket = countKlik;
        var total_discount_dollar = price_dollar - discount_dollar;
        var total_discount_rupiah = price_rupiah - discount_rupiah;

        $("#submit").prop("disabled", true);
        $("#submit").addClass("btn-next-outline-disabled");

        var format_price_dollar = parseInt(price_dollar).toLocaleString();
        var format_price_rupiah = parseInt(price_rupiah).toLocaleString();
        var price_text = "USD " + format_price_dollar + " ( IDR " + format_price_rupiah + " ) ";
        var change_format_price_dollar = parseInt(discount_dollar).toLocaleString();
        var change_format_price_rupiah = parseInt(discount_rupiah).toLocaleString();
        var change_discount_dollar = parseInt(total_discount_dollar).toLocaleString();
        var change_discount_price = parseInt(total_discount_rupiah).toLocaleString();
        var discount = "USD " + change_discount_dollar + " ( IDR " + change_discount_price + " ) ";
        var event_price_text = "USD " + change_format_price_dollar + " ( IDR " + change_format_price_rupiah + " ) ";
        var convert_rupiah = discount_rupiah / klik;
        var convert_dollar = discount_dollar / klik;

        $("#price_rupiah").val(convert_rupiah);
        $("#price_dollar").val(convert_dollar);
        $("#event_price").html(price_text);
        $("#ticket_increment").html(ticket);
        $("#voucher").html(discount);
        $("#total_price").html(event_price_text);

        $("#events_tickets_id").val(events_tickets_id);
        $("#events_tickets_title").val(events_tickets_title);
        $("#events_tickets_type").val(events_tickets_type);

        $("#total_price_val").val(discount_rupiah);
        $("#total_price_dollar_val").val(discount_dollar);
        $("#countTicket_val").val(countKlik);

        counter++;
        if (tampung != klik) {
            counter = 1;
            $(".customerMultiple").empty();
        }

        if (counter == 1) {
            for (let i = 1; i < klik; i++) {
                $(".customerMultiple").append(`
                    <div class="row g-3 tambah" style="margin-left: 5px">
                        <div class="col-sm-6">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" name="name[]" placeholder="" required>
                            <div class="invalid-feedback">Valid full name is required.</div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email[]" placeholder="" required>
                            <div class="invalid-feedback">Valid email is required.</div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Mobile Number <span class="text-muted"></span></label>
                            <input type="text" class="form-control phone_multi_dynamic" name="phone[]" placeholder="" value="62" required>
                            <div class="invalid-feedback">Please enter a valid phone.</div>
                        </div>
                        <div class="col-sm-6">
                            <label for="company" class="form-label">Company *</label>
                            <input type="text" class="form-control" name="company[]" placeholder="PT" required>
                            <div class="invalid-feedback">Please enter your company.</div>
                        </div>
                        <div class="col-sm-12">
                            <label for="job_title" class="form-label">Job Title</label>
                            <select class="form-control job-title-select-multiple" name="job_title[]" required>
                                <option value="">Select Job Title</option>
                                @foreach ($job_title_main as $data)
                                    <option value="{{ $data->job_title }}" data-tier="{{ $data->tier }}">
                                        {{ $data->job_title }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="job_title_tier" class="selected-job-title-tier-multiple">
                            <div class="invalid-feedback">Please select a valid job title.</div>
                        </div>
                        <div class="col-sm-12 job-title-detail-container d-none">
                            <label for="job_title_detail" class="form-label">Job Function<span class="text-muted"></span></label>
                            <input type="text" class="form-control job-title-detail-input-multiple" name="job_title_detail[]" required>
                            <div class="invalid-feedback">Please enter a valid job title detail.</div>
                        </div>
                    </div>
                    <br><hr><br>
                `);
            }
        }

        tampung = klik;

        // Apply phone number input functionality
        $(".phone_multi_dynamic").each(function() {
            var iti = window.intlTelInput(this, {
                initialCountry: "id",
            });

            $(this).on("countrychange", function(e) {
                var countryData = iti.getSelectedCountryData();
                $(this).val("+" + countryData.dialCode);
            });
        });

        // Bind job title change event
        $(".job-title-select-multiple").off('change').on('change', function() {
            var selectedJobTitle = $(this).val();
            var selectedTier = $(this).find(':selected').data('tier');
            var $detailContainer = $(this).closest('.row').find('.job-title-detail-container');
            var $detailInput = $detailContainer.find('.job-title-detail-input-multiple');
            var $hiddenTierInput = $(this).closest('.row').find('.selected-job-title-tier-multiple');

            if (selectedJobTitle) {
                $hiddenTierInput.val(selectedTier);
                $detailContainer.removeClass('d-none');

                // Bind typeahead without focusing on the input
                $detailInput.typeahead({
                    source: function(query, process) {
                        if (selectedTier && jobTitleDetails[selectedTier]) {
                            return process(jobTitleDetails[selectedTier]);
                        } else {
                            return process([]);
                        }
                    }
                });
            } else {
                $detailContainer.addClass('d-none');
                $detailInput.val('');
                $hiddenTierInput.val('');
            }
        });
    };

    $(document).on('click', '.remove', function() {
        $(this).parents('.tambah').remove();
    });

    function loadingState(form) {
        const button = form.querySelector('.beforePayment');
        button.disabled = true;
        button.innerHTML = 'Processing...';
    }

    @if (session('success'))
        Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    @endif
</script>
