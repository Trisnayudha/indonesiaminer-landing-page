<div class="modal fade" id="paymentNew" tabindex="-1" role="dialog" aria-labelledby="choose-package" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body modal-body-no-padding">
                <form action="{{ url('payment') }}" method="post" onsubmit="loadingState(this)">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <input type="hidden" id="events_id_new" value="13" name="events_id_new">
                            <!-- events ticket -->
                            <input type="hidden" id="events_tickets_id_new" name="events_tickets_id_new">
                            <input type="hidden" id="events_tickets_title_new" name="events_tickets_title_new">
                            <input type="hidden" id="events_tickets_type_new" name="events_tickets_type_new">
                            <!-- voucher -->
                            <input type="hidden" id="voucher_price_new" name="voucher_price_new">
                            <input type="hidden" id="voucher_price_dollar_new" name="voucher_price_dollar_new">
                            <input type="hidden" id="voucher_id_new" name="voucher_id_new">
                            <input type="hidden" id="voucher_value_new" name="voucher_value_new">
                            <input type="hidden" id="curs_dollar_new" name="curs_dollar_new">
                            <!-- event price -->
                            <input type="hidden" id="price_rupiah_new" name="price_rupiah_new">
                            <input type="hidden" id="price_dollar_new" name="price_dollar_new">
                            <!-- total price -->
                            <input type="hidden" id="total_price_val_new" name="total_price_val_new">
                            <input type="hidden" id="total_price_dollar_val_new" name="total_price_dollar_val_new">
                            <input type="hidden" id="countTicket_val_new" name="countTicket_val_new">

                            <input type="hidden" name="rate_idr" value="{{ $rate_idr }}">

                            <div class="col-md-12 col-lg-12">
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <div class="alert alert-info" role="alert">
                                            <h4 class="alert-heading" style="text-align: left">* ATTENDEES</h4>
                                            <hr>
                                            <p class="mb-0" style="text-align: left">Enter Attendees Details
                                                Here
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="wrapper-login-forgot" style="margin: 0px;">
                                            <div class="btn-group-bt">
                                                <input class="form-check-input flexCheckDefault" type="checkbox"
                                                    value="">
                                                <span class="form-check-label" for="flexCheckDefault">
                                                    Same as contact person
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name" class="form-label">Full Name
                                            *</label>
                                        <input type="text" class="form-control name" name="name[]" placeholder=""
                                            value="" required>
                                        <div class="invalid-feedback">
                                            Valid full name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control email" name="email[]" placeholder=""
                                            value="" required>
                                        <div class="invalid-feedback">
                                            Valid email is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="phone" class="form-label">Mobile Number
                                            <span class="text-muted"></span></label>
                                        <input type="text" class="form-control phone" name="phone[]"
                                            placeholder="" value="62" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="company" class="form-label">Company *</label>
                                        <input type="text" class="form-control company" name="company[]"
                                            placeholder="PT" value="" required>
                                        <div class="invalid-feedback">
                                            Please enter your company.
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="job_title" class="form-label">Job Title <span
                                                class="text-muted"></span></label>
                                        <select class="form-control job-title-select" name="job_title[]" required>
                                            <option value="">Select Job Title</option>
                                            @foreach ($job_title_main as $data)
                                                <option value="{{ $data->job_title }}"
                                                    data-tier="{{ $data->tier }}">
                                                    {{ $data->job_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="job_title_tier" class="selected-job-title-tier">
                                        <div class="invalid-feedback">
                                            Please select a valid job title.
                                        </div>
                                    </div>

                                    <!-- Menyembunyikan Job Title Detail secara default -->
                                    <div class="col-sm-12 job-title-detail-container d-none">
                                        <label for="job_title_detail" class="form-label">Job Function<span
                                                class="text-muted"></span></label>
                                        <input type="text" class="form-control job-title-detail-input"
                                            name="job_title_detail[]" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid job title detail.
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="wrapper-login-forgot" style="margin: 0px;">
                                            <div class="btn-group-bt">
                                                <a href="javascript:void(0)"
                                                    class="addData btn btn-warning float-right">Add
                                                    Guest</a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer">


                                    </div>
                                    <hr style="margin:10px">
                                    <div class="col-sm-12">
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading" style="text-align: left">* Booking Contact
                                            </h4>
                                            <hr>
                                            <p class="mb-0" style="text-align: left">Enter the best person we
                                                can
                                                contact for this booking in the event of unplanned changes.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="name" class="form-label">Full Name
                                            *</label>
                                        <input type="text" class="form-control name_booking" name="name_booking"
                                            placeholder="" value="{{ $name }}" id="name_booking" required>
                                        <div class="invalid-feedback">
                                            Valid full name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control email_booking" name="email_booking"
                                            placeholder="" value="{{ $email }}" id="email_booking" required>
                                        <div class="invalid-feedback">
                                            Valid email is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="phone" class="form-label">Mobile Number
                                            <span class="text-muted"></span></label>
                                        <input type="text" class="form-control phone_booking" name="phone_booking"
                                            placeholder="" id="phone_booking" value="62{{ $phone }}" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone.
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="job_title_booking" class="form-label">Job Title <span
                                                class="text-muted"></span></label>
                                        <input type="text" class="form-control job_title_booking"
                                            name="job_title_booking" placeholder="" id="job_title_booking"
                                            value="{{ $job_title }}" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid job title.
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="company" class="form-label">Company *</label>
                                        <input type="text" class="form-control company_booking"
                                            name="company_booking" placeholder="PT" id="company_booking"
                                            value="{{ $company_name }}" required>
                                        <div class="invalid-feedback">
                                            Please enter your company.
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city" class="form-label">City * </label>
                                        <input type="text" class="form-control" name="city"
                                            placeholder="Jakarta" id="city" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="country" class="form-label">Country/Region
                                            *</label>
                                        <input type="text" class="form-control" name="country"
                                            placeholder="Indonesia" id="country" required>
                                        <div class="invalid-feedback">
                                            Please provide a Country
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="zip" class="form-label">Zip/Postal Code
                                            *</label>
                                        <input type="number" class="form-control" name="zip" id="zip"
                                            required>
                                        <div class="invalid-feedback">
                                            Please provide a Zip/Postal Code.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="company_website" class="form-label">Company
                                            Website *</label>
                                        <input type="text" class="form-control" name="company_website"
                                            placeholder="https://indonesiaminer.com" id="company_website" required>
                                        <div class="invalid-feedback">
                                            Please provide a Company Website.
                                        </div>
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
                                            <span id="ticket_increment_new">1×</span>
                                        </div>
                                        <div class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Event Price</span>
                                            <span id="event_price_new">USD 0 (IDR 0)</span>
                                        </div>
                                        <div class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Discount</span>
                                            <span id="voucher_new">USD 0 (IDR 0)</span>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <strong>Total Price</strong>
                                            <strong id="total_price_new">USD 0 (IDR 0)</strong>
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
    $(document).ready(function() {
        // Event delegation for job title change on all current and future .job-title-select elements
        $(document).on('change', '.job-title-select', function() {
            var selectedOption = $(this).find('option:selected');
            var tier = selectedOption.data('tier');

            // Store the tier in the hidden input
            $(this).closest('.row').find('.selected-job-title-tier').val(tier);

            // Show or hide the Job Function input based on the selected job title
            var jobTitleDetailContainer = $(this).closest('.row').find('.job-title-detail-container');
            if (selectedOption.val() !== '') {
                jobTitleDetailContainer.removeClass('d-none');
            } else {
                jobTitleDetailContainer.addClass('d-none');
            }
        });
    });

    var selectPayment = function(discount_dollar, discount_rupiah, events_tickets_id, events_tickets_title,
        events_tickets_type, klik, price_dollar, price_rupiah) {
        $(".customer").empty();
        console.log("klik select = " + klik);
        $(".minus-icon").attr("disabled", true);
        var total_discount_dollar = price_dollar - discount_dollar;
        var total_discount_rupiah = price_rupiah - discount_rupiah;
        var countKlik = 1;
        var ticket = countKlik;
        var total_dollar = countKlik * discount_dollar;
        var total_rupiah = countKlik * discount_rupiah;

        var total_dollar_discount = countKlik * price_dollar;
        var total_rupiah_discount = countKlik * price_rupiah;
        $("#submit").prop("disabled", true);
        $("#submit").addClass("btn-next-outline-disabled");

        var change_format_price_dollar = parseInt(total_dollar).toLocaleString();
        var change_format_price_rupiah = parseInt(total_rupiah).toLocaleString();
        var change_format_price_dollar_discount = parseInt(total_dollar_discount).toLocaleString();
        var change_format_price_rupiah_discount = parseInt(total_rupiah_discount).toLocaleString();
        var change_discount_dollar = parseInt(total_discount_dollar).toLocaleString();
        var change_discount_price = parseInt(total_discount_rupiah).toLocaleString();
        var discount = "USD " + change_discount_dollar + " ( IDR " + change_discount_price + " ) ";
        var event_price_text = "USD " + change_format_price_dollar + " ( IDR " + change_format_price_rupiah + " ) ";
        var event_price_total_text = "USD " + change_format_price_dollar_discount + " ( IDR " +
            change_format_price_rupiah_discount +
            " ) ";

        $("#price_rupiah_new").val(price_rupiah);
        $("#price_dollar_new").val(price_dollar);
        $("#event_price_new").html(event_price_total_text);
        $("#ticket_increment_new").html(ticket);
        // Total price initially
        $("#total_price_new").html(event_price_text);

        $("#events_tickets_id_new").val(events_tickets_id);
        $("#events_tickets_title_new").val(events_tickets_title);
        $("#events_tickets_type_new").val(events_tickets_type);
        $("#voucher_new").html(discount);
        $("#total_price_val_new").val(total_rupiah);
        $("#total_price_dollar_val_new").val(total_dollar);
        $("#countTicket_val_new").val(countKlik);

        // Add delegate functionality
        $(".addData").off().click(function() {
            var emptyVoucher = "USD 0 ( IDR 0 )";
            $("#voucher_new").html(emptyVoucher);
            if (countKlik < 6) {
                countKlik += 1;
                ticket = countKlik;

                total_dollar = countKlik * price_dollar;
                total_rupiah = countKlik * price_rupiah;

                change_format_price_dollar = parseInt(total_dollar).toLocaleString();
                change_format_price_rupiah = parseInt(total_rupiah).toLocaleString();
                event_price_text = "USD " + change_format_price_dollar + " ( IDR " +
                    change_format_price_rupiah + " ) ";
                $("#ticket_increment_new").html(ticket);
                $("#total_price_new").html(event_price_text);

                $("#total_price_val_new").val(total_rupiah);
                $("#total_price_dollar_val_new").val(total_dollar);
                $("#countTicket_val_new").val(countKlik);
                $(".minus-icon").removeAttr("disabled");

                // Append the new delegate form with Job Title and Job Function fields
                $(".customer").append(`
                    <div class="row g-3 tambah" style="margin-left: 5px">
                        <div class="col-sm-6">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control name" name="name[]" placeholder="" required>
                            <div class="invalid-feedback">
                                Valid full name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control email" name="email[]" placeholder="" required>
                            <div class="invalid-feedback">
                                Valid email is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Mobile Number <span class="text-muted"></span></label>
                            <input type="text" class="form-control phone" name="phone[]" placeholder="" value="62" required>
                            <div class="invalid-feedback">
                                Please enter a valid phone.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="company" class="form-label">Company *</label>
                            <input type="text" class="form-control company" name="company[]" placeholder="PT" required>
                            <div class="invalid-feedback">
                                Please enter your company.
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="job_title" class="form-label">Job Title <span class="text-muted"></span></label>
                            <select class="form-control job-title-select" name="job_title[]" required>
                                <option value="">Select Job Title</option>
                                @foreach ($job_title_main as $data)
                                    <option value="{{ $data->job_title }}" data-tier="{{ $data->tier }}">
                                        {{ $data->job_title }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="job_title_tier[]" class="selected-job-title-tier">
                            <div class="invalid-feedback">
                                Please select a valid job title.
                            </div>
                        </div>

                        <!-- Hidden Job Function field -->
                        <div class="col-sm-12 job-title-detail-container d-none">
                            <label for="job_title_detail" class="form-label">Job Function<span class="text-muted"></span></label>
                            <input type="text" class="form-control job-title-detail-input" name="job_title_detail[]" required>
                            <div class="invalid-feedback">
                                Please enter a valid job function.
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="wrapper-login-forgot" style="margin: 0px;">
                                <div class="btn-group-bt">
                                    <a href="javascript:void(0)" class="remove btn btn-danger float-right">Remove Delegate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            }
            if (countKlik >= 6) {
                countKlik = 6;
                $(".addData").attr("disabled", true);
            } else {
                $(".addData").removeAttr("disabled");
            }
            $("#ticket_increment_new").html(ticket);
            console.log("Output Count : " + countKlik);
            $(".vocer").removeAttr("disabled");
        });

        // Remove delegate functionality
        $('.customer').on('click', '.remove', function() {
            console.log('remove');
            var emptyVoucher = "USD 0 ( IDR 0 )";
            $("#voucher_new").html(emptyVoucher);
            if (countKlik > 1) {
                countKlik -= 1;
                ticket = countKlik;
                total_dollar = countKlik * price_dollar;
                total_rupiah = countKlik * price_rupiah;
                change_format_price_dollar = parseInt(total_dollar).toLocaleString();
                change_format_price_rupiah = parseInt(total_rupiah).toLocaleString();
                event_price_text = "USD " + change_format_price_dollar + " ( IDR " +
                    change_format_price_rupiah + " ) ";
                $("#ticket_increment_new").html(ticket);
                $("#total_price_new").html(event_price_text);

                $("#total_price_val_new").val(total_rupiah);
                $("#total_price_dollar_val_new").val(total_dollar);
                $("#countTicket_val_new").val(countKlik);
                $(".remove").removeAttr("disabled");
                $(this).closest('.tambah').remove();
            }
            if (countKlik == 1) {
                $(".remove").attr("disabled", true);
            }
            if (countKlik <= 6) {
                $(".addData").removeAttr("disabled");
            }
            $("#ticket_increment_new").html(ticket);
            console.log("Minus : " + countKlik);
            $(".vocer").removeAttr("disabled");
        });
    }

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
