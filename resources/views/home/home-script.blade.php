<div id="myModal" class="modal-custom">
    <div class="modal-custom-content">
        <span class="close">&times;</span>
        <div class="contact_form7_wrapper">
            <h3>
                <b style="color: white">
                    SAVE THE DATE FOR
                </b>
            </h3>
            {{-- <img src="{{ asset('img/im2024_logo_white.png') }}" alt="" height="20%"
            style="max-width: 80%; padding: 0"> --}}
            <h2>
                <b style="color: white">
                    10 - 12 June 2025 | JAKARTA, INDONESIA
                </b>
            </h2>
            <p style="color: white">

                Interested in being a part of Indonesia #1 Premier Conference & Exhibition
            </p>
            <p style="color:white">
                please fill in your details below to be notified
            </p>
            <div role="form" class="wpcf7" lang="en-US" dir="ltr">
                <div class="screen-reader-response"></div>
                <form class="quform" id="form-interest" lang="en-US" dir="ltr">
                    @csrf
                    <div class="quform-elements">
                        <div class="quform-element">
                            <label for="" style="color: white"> I'm interested in:</label>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" id="sponsoring" name="eventType" value="sponsoring">
                                    <label for="sponsoring" style="margin: 0px; color: white">Sponsoring</label>
                                </div>

                                <div class="radio-item">
                                    <input type="radio" id="exhibiting" name="eventType" value="exhibiting">
                                    <label for="exhibiting" style="margin: 0px; color: white">Exhibiting</label>
                                </div>

                                <div class="radio-item">
                                    <input type="radio" id="attending" name="eventType" value="attending">
                                    <label for="attending" style="margin: 0px; color: white">Attending</label>
                                </div>
                            </div>
                        </div>
                        <div class="quform-element">
                            <br />
                            <span class="wpcf7-form-control-wrap your-name">
                                <input id="name_interest" type="text" name="name_interest" size="40"
                                    class="input1" aria-required="true" aria-invalid="false" placeholder="Name*"
                                    required />
                            </span>
                        </div>
                        <div class="quform-element">
                            <br>
                            <span class="wpcf7-form-control-wrap your-name">
                                <input id="phone" type="text" name="phone" size="40" class="input1"
                                    value="62" required />
                            </span>
                        </div>
                        <div class="quform-element">
                            <br />
                            <span class="wpcf7-form-control-wrap your-email">
                                <input type="email" name="email_interest" size="40" id="email_interest"
                                    class="input1" aria-required="true" aria-invalid="false"
                                    placeholder="Business Email*" required />
                            </span>
                        </div>
                        <div class="quform-element">
                            <br />
                            <span class="wpcf7-form-control-wrap your-name">
                                <input id="job_title_interest" type="text" name="job_title_interest" size="40"
                                    class="input1" aria-required="true" aria-invalid="false" placeholder="Job Title*"
                                    required />
                            </span>
                        </div>
                        <div class="quform-element">
                            <br />
                            <span class="wpcf7-form-control-wrap your-name">
                                <input id="company_interest" type="text" name="company_interest" size="40"
                                    class="input1" aria-required="true" aria-invalid="false" placeholder="Company*"
                                    required />
                            </span>
                        </div>
                        {{-- <div class="quform-element"> --}}
                        <br />
                        {{-- <span class="wpcf7-form-control-wrap your-email"> --}}


                        <!-- Begin Submit button -->
                        <div class="quform-submit" style="margin-top:10px">
                            <div class="quform-submit-inner">
                                <button type="button" class="glow-on-hover" id="subcribe_interest">
                                    <span>SUBMIT</span>
                                </button>
                            </div>
                            <div class="quform-loading-wrap">
                                <span class="quform-loading"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<script>
    document.querySelectorAll('.plyr__video-embed').forEach((el) => {
        new Plyr(el);
    });
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function validateForm() {
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            // reCAPTCHA not verified
            console.log('ga masuk sini')
            alert('Please verify that you are not a robot.');
        } else {
            // reCAPTCHA verified, submit the form
            document.getElementById("quform").submit();
        }
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.js"></script>
<script>
    $(document).ready(function() {
        // Menampilkan modal saat tombol diklik
        $(".glow-on-hover").click(function() {
            $("#myModal").show();
        });

        // Menyembunyikan modal saat tombol close diklik
        $(".close").click(function() {
            $("#myModal").hide();
        });

        // Menyembunyikan modal saat klik di luar area modal
        $(window).click(function(event) {
            if ($(event.target).is("#myModal")) {
                $("#myModal").hide();
            }
        });
    });
</script>
<script>
    // Fungsi untuk menampilkan modal
    $(".2025").click(function() {
        $("#myModal").show();
    });


    // Menyembunyikan modal saat tombol close diklik
    $(".close").click(function() {
        $("#myModal").hide();
    });

    // Menyembunyikan modal saat klik di luar area modal
    $(window).click(function(event) {
        if ($(event.target).is("#myModal")) {
            $("#myModal").hide();
        }
    });

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
    // Tunggu selama 5 detik, lalu panggil fungsi showModal
    $(document).ready(function() {

        if (!Cookies.get('interest')) {
            // setTimeout(showModal, 30000); // 30000 milidetik (30 detik)
        };

    });
    $(document).ready(function() {
        $('#subcribe_interest').click(function(event) {
            event.preventDefault();

            // Show loading message
            swal({
                title: 'Please wait',
                text: 'Submitting the form...',
                icon: 'info',
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
            });

            // Serialize form data
            var formData = $('#form-interest').serialize();

            $.ajax({
                url: '{{ url('contact/interest') }}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    swal.close(); // Close the loading swal
                    if (response.status == 1) {
                        swal({
                            title: 'THANK YOU',
                            text: "Our representative will get in touch with you shortly.",
                            icon: "success",
                            customClass: {
                                content: 'custom-swal-text'
                            }
                        });
                        $('#form-interest')[0].reset();

                        Cookies.set('interest', true, {
                            expires: 1
                        });
                        setTimeout(hideModal,
                            300); // 300 milliseconds delay before hiding the modal
                    } else {
                        swal({
                            title: 'Error',
                            text: "An error occurred while submitting the form.",
                            icon: "error",
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close(); // Close the loading swal
                    swal({
                        title: 'Error',
                        text: "An error occurred while submitting the form.",
                        icon: "error",
                    });
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function scrollToHash() {
            var hash = window.location.hash;
            if (hash) {
                var targetElement = document.querySelector(hash);
                if (targetElement) {
                    setTimeout(function() {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }, 7000); // Menggunakan setTimeout untuk memberikan cukup waktu
                }
            }
        }

        scrollToHash();

        window.addEventListener('hashchange', scrollToHash);
    });
</script>

<script>
    const xhttp = new XMLHttpRequest();
    const select = document.getElementById("country");
    const flag = document.getElementById("flag");

    let country;

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            country = JSON.parse(xhttp.responseText);
            assignValues();
            handleCountryChange();
        }
    };
    xhttp.open("GET", "https://restcountries.com/v3.1/all", true);
    xhttp.send();

    function assignValues() {
        country.forEach(country => {
            const option = document.createElement("option");
            option.value = country.cioc;
            option.textContent = country.name.common;
            select.appendChild(option);
        });
    }

    function handleCountryChange() {
        const countryData = country.find(
            country => select.value === country.alpha2Code
        );
        flag.style.backgroundImage = `url(${countryData.flag})`;
    }

    select.addEventListener("change", handleCountryChange.bind(this));
</script>


<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // separateDialCode: true,
        initialCountry: "id",

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
            type: 'iframe',
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    }
                },
                srcAction: 'iframe_src',
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function scrollToHash() {
            var hash = window.location.hash;
            if (hash) {
                var targetElement = document.querySelector(hash);
                if (targetElement) {
                    setTimeout(function() {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }, 1000); // Sesuaikan waktu delay jika diperlukan
                }
            }
        }

        scrollToHash();

        window.addEventListener('hashchange', scrollToHash);
    });
</script>

<!-- Modal Overlay -->
<div id="modal" class="modal-overlay">
    <div class="modal-drawer">
        <!-- Header Modal -->
        <div class="drawer-header" aria-label="Drawer Header">
            <span class="close-button">
                <!-- Ikon Close -->
                <svg width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </span>
        </div>
        <!-- Konten Modal -->
        <div class="drawer-content">
            <!-- Konten Dinamis Modal -->
            <div class="header">
                <img src="https://affiliateworldconferences.com/asia/_next/image?url=https%3A%2F%2Fstorage.googleapis.com%2Fdownload%2Fstorage%2Fv1%2Fb%2Fawc-platform-prod%2Fo%2Fawa24%252Fdisplay-logos%252F1729497063_kudiixk_site-%255BC14-MonadLead).png%3Fgeneration%3D1729497065935938%26alt%3Dmedia&w=384&q=75"
                    alt="MonadLead">
                <div class="sponsor-level">Diamond Sponsor</div>
            </div>
            <div class="body" style="padding: 1rem">
                <h3>MonadLead</h3>
                <div class="info-item">
                    <svg width="18px" height="18px" viewBox="0 0 14 14" fill="none">
                        <!-- Ikon di sini -->
                    </svg>
                    <p>Affiliate Network | Bosnia and Herzegovina</p>
                </div>
                <div class="info-item">
                    <svg width="18px" height="18px" viewBox="0 0 14 16" fill="none">
                        <!-- Ikon di sini -->
                    </svg>
                    <p>Booth C14</p>
                </div>
                <article class="description-modal">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit, impedit libero? Possimus
                        voluptates illum inventore nesciunt! Vitae ullam, doloribus saepe, numquam natus suscipit
                        dolore, sed provident ab soluta eum beatae?
                        Porro dolorum corrupti distinctio exercitationem adipisci ipsam odit fuga molestias nobis!
                        Inventore, alias consectetur veniam, excepturi optio deleniti necessitatibus ex est minus,
                        cupiditate itaque recusandae voluptatum officia dignissimos atque dolores?
                        Natus, dolor quaerat minima expedita alias sint architecto quibusdam molestiae eos ratione ut
                        laboriosam repudiandae, vel perspiciatis nihil eaque quidem ipsum eveniet vero tempore obcaecati
                        at incidunt enim! Perferendis, ratione?
                        Similique quas cumque, nemo quidem eum reiciendis non sapiente quam at blanditiis, cupiditate
                        quae id eos facere unde dolores sint quo eligendi repellat earum exercitationem molestiae?
                        Accusantium itaque laborum maiores?
                        Quisquam vel alias inventore et, saepe repudiandae quaerat at minima id harum, ipsam expedita
                        aliquid adipisci tenetur, voluptates molestias facere provident. Placeat, natus? Facilis
                        excepturi, accusamus voluptate repudiandae ratione cum!</p>
                </article>
            </div>
        </div>
    </div>
</div>


<!-- Tambahkan script ini di akhir body -->
<script>
    // Dapatkan elemen modal dan tombol close
    const modal = document.getElementById('modal');
    const closeButton = document.querySelector('.close-button');

    // Fungsi untuk membuka modal
    function openModal() {
        modal.classList.add('show'); // Tambahkan kelas 'show' untuk menampilkan modal
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        modal.classList.remove('show'); // Hapus kelas 'show' untuk menyembunyikan modal
    }

    // Event listener untuk tombol close
    closeButton.addEventListener('click', closeModal);

    // Menutup modal ketika mengklik di luar modal
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Contoh pemanggilan modal saat item list diklik
    const listItem = document.querySelector('.list-item');
    listItem.addEventListener('click', openModal); // Buka modal saat list-item diklik
</script>
<script>
    function toggleAccordion(button) {
        // Find the panel element that is the sibling of the clicked button
        var panel = button.parentElement.nextElementSibling;

        // Toggle display between block and none
        if (panel.style.display === "block") {
            panel.style.display = "none";
            button.setAttribute('aria-expanded', 'false');
        } else {
            panel.style.display = "block";
            button.setAttribute('aria-expanded', 'true');
        }
    }
</script>
