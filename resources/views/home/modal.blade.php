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
