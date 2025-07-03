<!-- resources/views/home/section/subscribe.blade.php -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-3 border-warning p-4">
                <h2 class="text-center fw-bold mb-3">NEVER MISS AN UPDATE</h2>
                <p class="text-center mb-4">
                    Sign up for email updates to stay up to date on all things Indonesia Miner, such as price
                    changes,
                    special offer tickets, bulletins, and the most recent speakers added to the lineup.
                </p>
                <form action="{{ url('contact/news-subcribe') }}" method="POST"
                    onsubmit="event.preventDefault(); validateForm();">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email_subscribe" class="form-label">Email*</label>
                        <input type="email" id="email_subscribe" name="email_subcribe" class="form-control"
                            placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <!-- reCAPTCHA placeholder -->
                        <div class="g-recaptcha" data-sitekey="6LdyNmcmAAAAAHD9hhtGDKgiygQR_5Gq_udIDNzv"></div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg">
                            SUBSCRIBE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
