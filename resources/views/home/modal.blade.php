<!-- interest-modal.blade.php -->
<div class="modal fade" id="interestModal" tabindex="-1" aria-labelledby="interestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="interestModalLabel">
                    Be part of Indonesia’s #1 Premier Conference & Exhibition!<br>
                    please fill in your details below to be notified
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-interest" method="POST" action="{{ url('contact/interest') }}">
                    @csrf

                    <!-- EVENT TYPE -->
                    <div class="mb-4 text-center">
                        <label class="form-label d-block mb-2" style="color:#fff;">I'm interested in:</label>
                        <div class="d-flex justify-content-center gap-4">
                            @foreach (['sponsoring' => 'Sponsoring', 'exhibiting' => 'Exhibiting', 'attending' => 'Attending'] as $val => $label)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="eventType"
                                        id="{{ $val }}" value="{{ $val }}" required>
                                    <label class="form-check-label text-white"
                                        for="{{ $val }}">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- NAME -->
                    <div class="mb-3">
                        <input name="name_interest" type="text" class="form-control" placeholder="Name*" required>
                    </div>

                    <!-- PHONE -->
                    <div class="mb-3">
                        <input id="phone" name="phone" type="tel" class="form-control" placeholder="Phone*"
                            value="62" required />
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <input name="email_interest" type="email" class="form-control" placeholder="Business Email*"
                            required>
                    </div>

                    <!-- JOB TITLE -->
                    <div class="mb-3">
                        <input name="job_title_interest" type="text" class="form-control" placeholder="Job Title*"
                            required>
                    </div>

                    <!-- COMPANY -->
                    <div class="mb-3">
                        <input name="company_interest" type="text" class="form-control" placeholder="Company*"
                            required>
                    </div>

                    <!-- SUBMIT -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-submit">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reserve Your Spot Modal -->
<div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content reserve-modal-content">
            <div class="modal-header border-0">
                <h2 class="modal-title fw-bold mx-auto" id="reserveModalLabel">RESERVE YOUR SPOT</h2>
                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-4">
                <p class="text-center mb-4">Complete the form below</p>

                <form id="reserveForm" method="POST" action="{{ url('ticket/reserve') }}"> {{-- point to your controller --}}
                    @csrf
                    <input type="hidden" name="package" id="reserve-package" value="">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="reserve-name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" id="reserve-name" name="name"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label for="reserve-job" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="reserve-job" name="job_title" required>
                        </div>

                        <div class="col-md-6">
                            <label for="reserve-company" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="reserve-company" name="company_name"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label for="reserve-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="reserve-email" name="email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="reserve-phone" class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control" id="reserve-phone" name="phone" required>
                        </div>

                        <div class="col-12">
                            <div class="g-recaptcha" data-sitekey="6LdyNmcmAAAAAHD9hhtGDKgiygQR_5Gq_udIDNzv"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer border-0 justify-content-end pe-5 pb-4">
                <button type="submit" form="reserveForm" class="btn btn-lg btn-warning px-5 rounded-pill">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>
