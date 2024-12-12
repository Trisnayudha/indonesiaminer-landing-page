<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesia Miner Conference 2025 Speaker Submission</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .container {
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            position: relative;
            z-index: 2;
        }

        h2,
        h4 {
            color: #0d6efd;
        }

        .form-control,
        .form-select {
            background-color: #ffffff;
            color: #212529;
            border: 1px solid #ced4da;
        }

        .form-control::placeholder,
        .form-select::placeholder {
            color: #6c757d;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        /* Floating abstract shapes */
        .shape1,
        .shape2 {
            position: absolute;
            border-radius: 30%;
            opacity: 0.2;
            z-index: 1;
        }

        .shape1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #0d6efd, #6ea8fe);
            top: -100px;
            left: -50px;
            transform: rotate(30deg);
        }

        .shape2 {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #6ea8fe, #0d6efd);
            bottom: -150px;
            right: -100px;
            transform: rotate(-30deg);
        }

        /* Logo banner styling with animation */
        .banner {
            text-align: center;
            margin-bottom: 30px;
        }

        .banner img {
            max-width: 100%;
            height: auto;
            animation: logoAnimation 2s infinite alternate;
        }

        .guidelines {
            list-style: none;
            padding-left: 0;
            margin-left: 0;
        }

        .conference-topics {
            list-style-type: none;
            padding-left: 0;
        }

        .conference-topics li {
            display: flex;
            align-items: center;
        }

        .conference-topics .checkmark {
            margin-right: 8px;
        }

        .description {
            font-size: 11pt;
        }

        .text-danger {
            color: #dc3545;
        }

        .form-check-input:focus {
            outline: none;
            box-shadow: none;
        }

        /* Keyframes for logo animation */
        @keyframes logoAnimation {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.05);
            }
        }

        /* Responsive styling for tablets */
        @media (max-width: 768px) {
            .container {
                max-width: 95%;
                padding: 20px;
            }

            .description {
                font-size: 10pt;
            }

            .shape1,
            .shape2 {
                display: none;
            }
        }

        /* Responsive styling for mobile devices */
        @media (max-width: 576px) {
            .container {
                max-width: 100%;
                padding: 15px;
            }

            h2 {
                font-size: 1.5rem;
            }

            h4 {
                font-size: 1.25rem;
            }

            .description {
                font-size: 9pt;
            }
        }
    </style>
</head>

<body>
    <!-- Background Shapes -->
    <div class="shape1"></div>
    <div class="shape2"></div>

    <div class="container my-5">
        <!-- Banner Logo -->
        <div class="banner">
            <img src="{{ asset('img/call-for-papers.png') }}" alt="Indonesia Miner Conference 2025 Logo">
        </div>

        <!-- Description Section -->
        <div class="description">
            <h2>Indonesia Miner Conference and Exhibition 2025</h2>
            <p>Thank you for your interest in speaking at Indonesia Miner Conference and Exhibition 2025.</p>
            <p>Indonesia Miner Conference and Exhibition 2025 by Indonesia Miner Advisory Board invites you to submit
                your presentation proposal here for consideration for the conference program. Please complete the form
                below completely.</p>
            <h4>General Submission Guidelines:</h4>
            <ul class="guidelines">
                <li>🟨 Indonesia Miner Conference and Exhibition 2025 does not provide speaker honorariums or reimburse
                    for
                    speaker travel, lodging or other incidental expenses.</li>
                <li>🟨 Speakers receive complimentary admission to the event including participation in all meals (live
                    only) and social events (live and virtual).</li>
                <li>🟨 Speakers will be featured on the event website, advertisement artworks, and in the event booklet.
                </li>
                <li>🟨 Speakers are required to provide a presentation. Most speaking sessions total 25-minutes (20
                    minutes
                    for presentation & 5 minutes for Q&A session). It is suggested that speakers allocate some time for
                    questions.</li>
                <li>🟨 Sales pitches will NOT be accepted. For product-related presentations, case studies and user
                    perspectives are recommended.</li>
                <li>🟨 We encourage you to submit an abstract that has NEVER BEEN presented at any industrial event.
                </li>
                <li>🟨 The submission deadline is December 13, 2024. Notification of the results of your submission will
                    be sent via email. It will usually take 2 weeks from the deadline to get the results.</li>
            </ul>
            <h4>Conference Topic:</h4>
            <ul class="conference-topics">
                <li><span class="checkmark">✅</span> Market Outlook</li>
                <li><span class="checkmark">✅</span> Project Showcase (Digging Deep Session)</li>
                <li><span class="checkmark">✅</span> Technological Innovation</li>
                <li><span class="checkmark">✅</span> Sustainability</li>
                <li><span class="checkmark">✅</span> Workforce Adaptability</li>
                <li><span class="checkmark">✅</span> Community Engagement</li>
                <li><span class="checkmark">✅</span> Supply Chain Resilience</li>
                <li><span class="checkmark">✅</span> Financial</li>
            </ul>
        </div>

        <h4>Contact Information for Lead Presenter</h4>
        <p>We only use your information to send information if you are selected as a speaker at Indonesia Miner
            Conference and Exhibition 2025</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>There were some problems with your input:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('call-for-papers.store') }}" method="POST" novalidate>
            @csrf
            <!-- Full Name -->
            <div class="mb-3 animate-input">
                <label for="full_name" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please enter your full name.</div>
            </div>

            <!-- Job Title -->
            <div class="mb-3 animate-input">
                <label for="job_title" class="form-label">Job Title *</label>
                <input type="text" class="form-control" id="job_title" name="job_title" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please enter your job title.</div>
            </div>

            <!-- Company Name -->
            <div class="mb-3 animate-input">
                <label for="company_name" class="form-label">Company Name *</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please enter your company name.</div>
            </div>

            <!-- Company Address -->
            <div class="mb-3 animate-input">
                <label for="company_address" class="form-label">Company Address *</label>
                <input type="text" class="form-control" id="company_address" name="company_address" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please enter your company address.</div>
            </div>

            <!-- Email -->
            <div class="mb-3 animate-input">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" class="form-control" id="email" name="email" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>

            <!-- Mobile Number -->
            <div class="mb-3 animate-input">
                <label for="mobile_number" class="form-label">Mobile Number *</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please enter your mobile number.</div>
            </div>

            <!-- Category Selection -->
            <div class="mb-3 animate-input">
                <label class="form-label">Which category do you feel would be the best fit for your presentation?
                    *</label>
                <div id="category-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]"
                            value="Investment & Project Showcase" id="category1">
                        <label class="form-check-label" for="category1">Investment & Project Showcase</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="Innovation"
                            id="category2">
                        <label class="form-check-label" for="category2">Innovation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="Market Outlook"
                            id="category3">
                        <label class="form-check-label" for="category3">Market Outlook</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="Technology"
                            id="category4">
                        <label class="form-check-label" for="category4">Technology</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="Sustainability"
                            id="category5">
                        <label class="form-check-label" for="category5">Sustainability</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]"
                            value="Workforce Adaptability" id="category6">
                        <label class="form-check-label" for="category5">Workforce Adaptability</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]"
                            value="Community Engagement" id="category7">
                        <label class="form-check-label" for="category5">Community Engagement</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]"
                            value="Supply Chain Resilience" id="category8">
                        <label class="form-check-label" for="category5">Supply Chain Resilience</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="Financial"
                            id="category9">
                        <label class="form-check-label" for="category5">Financial</label>
                    </div>
                </div>
                <div class="text-danger mt-1" id="category-error" style="display: none;">Please select at least one
                    category.</div>
            </div>


            <!-- Session Selection -->
            <div class="mb-3 animate-input">
                <label class="form-label">Which session do you think is the best fit for your presentation?
                    *</label>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="session" id="session1"
                            value="Gold Copper & Other Minerals" required>
                        <label class="form-check-label" for="session1">
                            Gold Copper & Other Minerals
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="session" id="session2"
                            value="Metals">
                        <label class="form-check-label" for="session2">
                            Metals
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="session" id="session3"
                            value="Coal & Energy Transition">
                        <label class="form-check-label" for="session3">
                            Coal & Energy Transition
                        </label>
                    </div>
                </div>
                <div class="invalid-feedback">Please select a session.</div>
            </div>


            <!-- Abstract Title -->
            <div class="mb-3 animate-input">
                <label for="abstract_title" class="form-label">Title of Abstract *</label>
                <input type="text" class="form-control" id="abstract_title" name="abstract_title" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please enter the title of your abstract.</div>
            </div>

            <!-- Presentation Description -->
            <div class="mb-3 animate-input">
                <label for="presentation_description" class="form-label">Presentation Description *</label>
                <textarea class="form-control" id="presentation_description" name="presentation_description" rows="5" required
                    placeholder="Your Answer"></textarea>
                <div class="invalid-feedback">Please provide a description of your presentation.</div>
            </div>

            <!-- Learning Objectives -->
            <div class="mb-3 animate-input">
                <label for="learning_objectives" class="form-label">Learning Objectives - please provide at least
                    three (3) take-aways for your audience *</label>
                <textarea class="form-control" id="learning_objectives" name="learning_objectives" rows="3" required
                    placeholder="Your Answer"></textarea>
                <div class="invalid-feedback">Please provide the learning objectives.</div>
            </div>

            <!-- Presented Before -->
            <div class="mb-3 animate-input">
                <label for="presented_before" class="form-label">Have you presented this topic at another industry
                    event? *</label>
                <input type="text" class="form-control" id="presented_before" name="presented_before" required
                    placeholder="Your Answer">
                <div class="invalid-feedback">Please answer this question.</div>
            </div>

            <!-- Bio -->
            <div class="mb-3 animate-input">
                <label for="bio" class="form-label">Please provide a brief 60-word bio for each speaker *</label>
                <textarea class="form-control" id="bio" name="bio" rows="3" required placeholder="Your Answer"></textarea>
                <div class="invalid-feedback">Please provide your bio.</div>
            </div>

            <!-- Additional Comments -->
            <div class="mb-3 animate-input">
                <label for="additional_comments" class="form-label">Please provide any additional comments</label>
                <textarea class="form-control" id="additional_comments" name="additional_comments" rows="3"
                    placeholder="Your Answer"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS for validation -->
    <!-- JavaScript untuk validasi checkbox dan menyimpan data ke localStorage -->
    <script>
        // Custom validation script
        (function() {
            'use strict';
            const form = document.querySelector('form');
            const categoryError = document.getElementById('category-error');
            const categoryGroup = document.querySelectorAll('input[name="category[]"]');

            // Validasi kustom untuk checkbox dan pengaturan kelas 'was-validated'
            form.addEventListener('submit', function(event) {
                let categoryChecked = false;
                categoryGroup.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        categoryChecked = true;
                    }
                });

                if (!categoryChecked) {
                    // Tampilkan pesan kesalahan untuk checkbox jika tidak ada yang dipilih
                    categoryError.style.display = 'block';
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    categoryError.style.display = 'none';
                }

                // Tambahkan kelas 'was-validated' untuk validasi Bootstrap
                form.classList.add('was-validated');

                // Cegah pengiriman formulir jika terdapat input yang tidak valid
                if (!form.checkValidity() || !categoryChecked) {
                    event.preventDefault();
                    event.stopPropagation();

                    // Cari elemen pertama yang tidak valid
                    const firstInvalid = form.querySelector('.is-invalid, :invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstInvalid.focus();
                    }
                } else {
                    // Bersihkan localStorage hanya jika formulir valid dan siap dikirim
                    localStorage.clear();
                }
            }, false);
        })();


        // Fungsi untuk menyimpan data ke localStorage saat pengguna mengisi formulir
        function saveFormData() {
            const formElements = document.querySelectorAll('input, textarea, select');
            formElements.forEach(function(element) {
                element.addEventListener('input', function() {
                    if (element.type === 'checkbox' || element.type === 'radio') {
                        const checkedElements = document.querySelectorAll('input[name="' + element.name +
                            '"]:checked');
                        const values = Array.from(checkedElements).map(el => el.value);
                        localStorage.setItem(element.name, JSON.stringify(values));
                    } else {
                        localStorage.setItem(element.name, element.value);
                    }
                });
            });
        }

        // Fungsi untuk mengisi formulir dari data yang disimpan di localStorage
        function fillFormData() {
            const formElements = document.querySelectorAll('input, textarea, select');
            formElements.forEach(function(element) {
                const savedValue = localStorage.getItem(element.name);
                if (savedValue) {
                    if (element.type === 'checkbox' || element.type === 'radio') {
                        const values = JSON.parse(savedValue);
                        if (values.includes(element.value)) {
                            element.checked = true;
                        }
                    } else {
                        element.value = savedValue;
                    }
                }
            });
        }

        // Panggil fungsi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            fillFormData();
            saveFormData();
        });
    </script>


</body>

</html>
