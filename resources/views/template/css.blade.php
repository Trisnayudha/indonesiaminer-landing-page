 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
 <!-- intl-tel-input CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- Custom CSS -->
 <style>
     :root {
         /* custom theme vars */
         --bs-primary: #00537a;
         --bs-primary-rgb: 0, 83, 122;
         --bs-warning: #E8B44B;
         --bs-warning-rgb: 232, 180, 75;
     }

     /* skeleton placeholder */
     .lazy-placeholder {
         background-color: #e0e0e0;
         border-radius: .25rem;
         position: relative;
         overflow: hidden;
     }

     .lazy-placeholder::after {
         content: "";
         position: absolute;
         top: 0;
         left: -100%;
         width: 100%;
         height: 100%;
         background: linear-gradient(to right,
                 transparent 0%,
                 rgba(255, 255, 255, 0.6) 50%,
                 transparent 100%);
         animation: shimmer 1.5s infinite;
     }

     @keyframes shimmer {
         100% {
             transform: translateX(200%);
         }
     }

     body {
         margin: 0;
         padding: 0;
     }

     .custom-navbar {
         backdrop-filter: blur(12px);
         background-color: rgba(255, 255, 255, 0.2);
         transition: background-color 0.3s, box-shadow 0.3s;
     }

     .custom-navbar.scrolled {
         background-color: rgba(255, 255, 255, 0.9);
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
     }

     .jarallax {
         position: relative;
         height: 75vh;
         color: white;
     }

     .jarallax>.container {
         position: relative;
         z-index: 2;
     }

     .overlay {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
         z-index: 1;
     }

     .jarallax h1 {
         font-size: 3.2rem;
     }

     .jarallax p {
         font-size: 1.1rem;
     }

     /* Pastikan ini di-load setelah Bootstrap */
     .btn-outline-warning:hover {
         /* biar teks default link juga putih */
         color: #fff !important;
         background-color: var(--bs-warning) !important;
         border-color: var(--bs-warning) !important;
     }

     /* Override nested text-warning dan ikon */
     .btn-outline-warning:hover .text-warning,
     .btn-outline-warning:hover .bi-play-fill {
         color: #fff !important;
     }


     @media (max-width: 768px) {
         .jarallax {
             height: 500px;
         }

         .jarallax h1 {
             font-size: 2rem;
         }

         .jarallax p {
             font-size: 1rem;
         }
     }

     .sticky-bottom-bar {
         position: fixed;
         bottom: 0;
         left: 0;
         width: 100%;
         background: linear-gradient(126deg, #00537a, #5fa8cb);
         /* ganti gradien sesuai selera */
         padding: 0.75rem 1rem;
         z-index: 1100;
         box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
         border-top-left-radius: 20px;
         border-top-right-radius: 20px;
     }

     .sticky-bottom-bar .timer {
         font-weight: bold;
         font-size: 0.9rem;
     }

     @media (max-width: 576px) {
         .sticky-bottom-bar {
             flex-direction: column;
             gap: .5rem;
             text-align: center;
         }
     }


     .navbar-nav .dropdown:hover .dropdown-menu {
         display: block;
         margin-top: 0;
     }

     .navbar-collapse {
         transition: transform 0.3s ease-in-out;
     }

     .lazy-placeholder {
         background-color: #e0e0e0;
         border-radius: .25rem;
         position: relative;
         overflow: hidden;
     }

     .lazy-placeholder::after {
         content: "";
         position: absolute;
         top: 0;
         left: -100%;
         width: 100%;
         height: 100%;
         background: linear-gradient(to right, transparent 0%, rgba(255, 255, 255, 0.6) 50%, transparent 100%);
         animation: shimmer 1.5s infinite;
     }

     @keyframes shimmer {
         100% {
             transform: translateX(200%);
         }
     }

     @media (max-width: 768px) {
         .navbar-collapse {
             position: fixed;
             top: 0;
             right: 0;
             transform: translateX(100%);
             height: 100vh;
             width: 80%;
             max-width: 320px;
             background: linear-gradient(135deg, #e6f7ff, #ccf2ff);
             padding: 2rem 1rem;
             box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
             border-radius: 1rem 0 0 1rem;
             z-index: 1050;
             overflow-y: auto;
         }

         .navbar-collapse.show {
             transform: translateX(0);
         }

         .navbar-toggler.collapsed {
             position: absolute;
             top: 1.25rem;
             right: 1.25rem;
             z-index: 1100;
         }
     }

     /* Modal overlay */
     .modal-custom {
         display: none;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.6);
         z-index: 1050;
         align-items: center;
         justify-content: center;
     }

     /* Tampilkan modal ketika .show */
     .modal-custom.show {
         display: flex;
     }

     /* Konten modal */
     .modal-custom-content {
         position: relative;
         background: var(--bs-primary);
         padding: 2rem;
         border-radius: .5rem;
         width: 90%;
         max-width: 600px;
         color: #fff;
     }

     /* Tombol close */
     .modal-custom-content .close {
         position: absolute;
         top: .5rem;
         right: .75rem;
         font-size: 1.5rem;
         cursor: pointer;
         color: #fff;
     }

     /* Radio group styling */
     .radio-group {
         display: flex;
         gap: 1rem;
     }

     .radio-item input {
         margin-right: .25rem;
     }

     /* MODAL CUSTOM */
     #interestModal .modal-dialog {
         max-width: 800px;
     }

     #interestModal .modal-content {
         background-color: var(--bs-primary);
         border-radius: 1rem;
         padding: 2rem;
         /* color: #fff; */
         border: none;
     }

     /* di home.css, setelah styling modal sebelumnya */

     #interestModal .modal-header {
         /* non-flex supaya judul bisa benar-benar di tengah */
         display: block;
         padding: 1rem 2rem 0;
         /* atur padding atas & samping */
         position: relative;
         /* untuk positioning close icon */
         text-align: center;
         /* center teks */
         border: none;
         /* hilangkan garis bawah */
     }

     #interestModal .modal-title {
         margin: 0;
         font-size: 1.25rem;
         line-height: 1.4;
     }

     #interestModal .btn-close {
         /* posisikan close icon fixed di pojok kanan atas header */
         position: absolute;
         top: 1rem;
         right: 1rem;
         /* tombol bawaan Bootstrap sudah memiliki background transparan */
     }


     #interestModal .modal-body {
         padding-top: 1rem;
     }

     #interestModal .form-control:focus {
         box-shadow: none;
     }

     /* PHONE INPUT GROUP */
     .input-group .input-group-text {
         background-color: #fff;
         border: none;
         border-top-left-radius: 0.5rem;
         border-bottom-left-radius: 0.5rem;
     }

     .input-group .form-control {
         border-top-left-radius: 0;
         border-bottom-left-radius: 0;
     }

     /* SUBMIT BUTTON */
     #interestModal .btn-submit {
         background-color: var(--bs-warning);
         color: #000;
         font-weight: 500;
         border: none;
         border-radius: 2rem;
         padding: 0.75rem 2rem;
     }

     /* buat teks “Mining Resilience” 4px lebih besar */
     .resilience-text {
         /* mobile: fs-6 (1rem) + 4px = 1rem + .25rem = 1.25rem */
         font-size: 1.25rem !important;
     }

     /* responsive font adjustments for jarallax */
     @media (max-width: 767.98px) {
         .header-line {
             font-size: 1.2rem !important;
         }

         .resilience-text {
             font-size: 1rem !important;
         }
     }

     /* typewriter effect + blinking cursor */
     .typewriter {
         overflow: hidden;
         white-space: nowrap;
         /* border-right: .15em solid var(--bs-warning); */
         /* pause before start: */
         animation:
             typing 3s steps(40, end),
             blink-cursor .7s step-end infinite;
     }

     /* keyframes for the typing */
     @keyframes typing {
         from {
             width: 0;
         }

         to {
             width: 100%;
         }
     }

     /* blink cursor */
     @keyframes blink-cursor {
         50% {
             border-color: transparent;
         }
     }

     /* fade-in effect */
     /* Fade-in saja, tanpa cursor */
     .fade-in {
         opacity: 0;
         transform: translateY(10px);
         animation: fadeInUp 0.8s ease-out forwards;
     }

     /* Hanya pakai typewriter di desktop (>=768px) */
     @media (min-width: 768px) {
         .typewriter {
             overflow: hidden;
             white-space: nowrap;
             animation: typing 3s steps(40, end) forwards;
         }

         @keyframes typing {
             from {
                 width: 0;
             }

             to {
                 width: 100%;
             }
         }
     }

     /* Di mobile (<768px), disable typewriter dan gunakan fade-in biasa */
     @media (max-width: 767.98px) {
         .typewriter {
             /* kembalikan ke wrapping normal */
             white-space: normal !important;
             overflow: visible !important;
             width: auto !important;
             /* pakai fade-in agar tetap muncul smooth */
             animation: fadeInUp 0.8s ease-out forwards !important;
         }
     }

     /* animasi fade-in yang sudah ada */
     @keyframes fadeInUp {
         from {
             opacity: 0;
             transform: translateY(10px);
         }

         to {
             opacity: 1;
             transform: translateY(0);
         }
     }

     /* ============================================
   Enable typewriter hanya di layar lebar (>=992px)
   ============================================ */
     @media (min-width: 992px) {
         .typewriter {
             white-space: nowrap;
             overflow: hidden;
             width: 0;
             animation:
                 typing 3s steps(40, end) forwards;
         }

         @keyframes typing {
             from {
                 width: 0;
             }

             to {
                 width: 100%;
             }
         }
     }

     /* ==================================================
   Disable typewriter & pakai fade-in untuk <=991px
   ================================================== */
     @media (max-width: 991.98px) {
         .typewriter {
             /* kembalikan wrapping & lebar default */
             white-space: normal !important;
             overflow: visible !important;
             width: auto !important;
             /* pakai fade-in supaya muncul halus */
             animation: fadeInUp 0.8s ease-out forwards !important;
         }
     }

     /* fade-in effect (dipakai juga di mobile) */
     @keyframes fadeInUp {
         from {
             opacity: 0;
             transform: translateY(10px);
         }

         to {
             opacity: 1;
             transform: translateY(0);
         }
     }


     .iti {
         display: block;
     }
 </style>
