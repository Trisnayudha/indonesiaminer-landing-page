 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
 <!-- intl-tel-input CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <style>
     .marquee {
         width: 100%;
         overflow: hidden;
         position: relative;
         white-space: nowrap;
         box-sizing: border-box;
     }

     /* Sponsor */
     .marquee-content-sponsor {
         display: inline-block;
         white-space: nowrap;
         animation: marqueeAnimationSponsor var(--marquee-duration-sponsor, 50s) linear infinite;
     }

     /* Exhibitor */
     .marquee-content-exhibitor {
         display: inline-block;
         white-space: nowrap;
         animation: marqueeAnimationExhibitor var(--marquee-duration-exhibitor, 50s) linear infinite;
     }

     @keyframes marqueeAnimationSponsor {
         0% {
             transform: translateX(0);
         }

         100% {
             transform: translateX(calc(-1 * var(--content-width-sponsor, 1000px)));
         }
     }

     @keyframes marqueeAnimationExhibitor {
         0% {
             transform: translateX(0);
         }

         100% {
             transform: translateX(calc(-1 * var(--content-width-exhibitor, 1000px)));
         }
     }

     /* Styling gambar umum */
     .marquee-content-sponsor img,
     .marquee-content-exhibitor img {
         margin-right: 5px;
         vertical-align: middle;
     }

     .exhibitor-logo {
         width: 100px;
         height: 50px;
         object-fit: contain;
     }
 </style>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         function setupMarquee({
             marqueeId,
             contentClass,
             speed,
             widthVar,
             durationVar
         }) {
             const marquee = document.getElementById(marqueeId);
             if (!marquee) return;
             const content = marquee.querySelector(`.${contentClass}`);
             if (!content) return;

             // Clone content untuk looping seamless
             marquee.appendChild(content.cloneNode(true));

             setTimeout(function() {
                 let contentWidth = content.offsetWidth;
                 let marqueeWidth = marquee.offsetWidth;

                 if (contentWidth < marqueeWidth) {
                     contentWidth = marqueeWidth;
                 }

                 marquee.style.setProperty(widthVar, contentWidth + 'px');

                 let duration = contentWidth / speed;
                 if (duration < 20) duration = 20;

                 marquee.style.setProperty(durationVar, duration + 's');
             }, 500);
         }

         // Sponsor
         setupMarquee({
             marqueeId: 'marquee2025',
             contentClass: 'marquee-content-sponsor',
             speed: 30,
             widthVar: '--content-width-sponsor',
             durationVar: '--marquee-duration-sponsor'
         });

         // Exhibitor
         setupMarquee({
             marqueeId: 'marquee2024',
             contentClass: 'marquee-content-exhibitor',
             speed: 30,
             widthVar: '--content-width-exhibitor',
             durationVar: '--marquee-duration-exhibitor'
         });
     });
 </script>

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
         z-index: 1000;
         box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
         border-top-left-radius: 20px;
         border-top-right-radius: 20px;
     }

     .sticky-bottom-bar .timer {
         font-weight: bold;
         font-size: 0.9rem;
     }

     @media (max-width: 576px) {
         .timer .values {
             display: flex;
             gap: .25rem;
             align-items: center;
             margin-top: .25rem;
         }

         .sticky-bottom-bar {
             flex-direction: row !important;
             /* tetap sebar kiri–kanan */
             justify-content: flex-start !important;
             /* mulai dari kiri */
             align-items: center;
             /* beri extra padding kanan untuk space widget Qontak */
             padding: 0.75rem 4rem 0.75rem 1rem;
         }

         /* Price (“timer”) lebih kecil */
         .sticky-bottom-bar .timer {
             font-size: 0.75rem;
         }

         /* Tombol di kanan, tapi geser sedikit ke kiri via margin-right */
         .sticky-bottom-bar .btn-warning {
             margin-left: auto;
             /* dorong tombol ke kanan */
             margin-right: 0;
             /* kalau butuh lebih mundur lagi, bisa pakai margin-right: 20px; */
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

     @media (max-width: 991px) {

         /* Panel utama */
         nav.d-lg-none .navbar-collapse {
             position: fixed;
             top: 0;
             right: 0;
             width: 75%;
             max-width: 320px;
             height: 100vh;
             padding: 1.5rem 1rem;
             border-top-left-radius: 1rem;
             border-bottom-left-radius: 1rem;
             background: linear-gradient(to bottom, #e9faff, #d5f3ff);
             z-index: 1045;
             overflow-y: auto;
         }

         .mobile-close {
             /* hilangkan SVG default */
             background-image: none !important;
             /* gunakan content pseudo-element untuk X */
             position: absolute;
             top: 1rem;
             right: 1rem;
             width: auto;
             height: auto;
             padding: 0;
             font-size: 1.5rem;
             font-weight: bold;
             color: #333;
             background: transparent;
             box-shadow: none;
         }

         .mobile-close::before {
             content: '×';
         }

         .mobile-close:hover {
             opacity: 1;
         }

         /* CTA buttons */
         .mobile-ctas {
             margin: 3rem 0 2rem;
             /* top utk ruang tombol close */
         }

         .mobile-ctas .btn-warning,
         .mobile-ctas .btn-outline-warning {
             width: 100%;
             font-weight: 600;
             border-radius: 0.5rem;
             margin-bottom: 0.75rem;
         }

         .mobile-ctas .btn-warning {
             padding: 0.75rem;
             font-size: 1rem;
         }

         .mobile-ctas .btn-outline-warning {
             padding: 0.7rem;
             font-size: 0.95rem;
         }

         /* List menu utama */
         .navbar-nav.flex-column {
             gap: 0.5rem;
         }

         .navbar-nav .nav-item {
             margin: 0;
         }

         .navbar-nav .nav-link {
             display: block;
             color: #333;
             font-size: 1rem;
             padding: 0.65rem 0;
             transition: background .2s;
         }

         .navbar-nav .nav-link:hover {
             background: rgba(0, 0, 0, 0.03);
             border-radius: 0.25rem;
             color: #000;
         }

         /* Submenu default (tersembunyi) */
         .has-submenu .submenu {
             display: none;
             margin-top: 0.25rem;
             padding-left: 1rem;
         }

         .has-submenu .submenu .nav-link {
             color: #555;
             font-size: 0.95rem;
             padding-left: 0;
         }

         /* Toggle caret */
         .has-submenu>.submenu-toggle {
             position: relative;
             padding-right: 2rem;
             color: #333;
             cursor: pointer;
         }

         .has-submenu>.submenu-toggle .caret {
             position: absolute;
             top: 50%;
             right: 0.5rem;
             width: 0.6em;
             height: 0.6em;
             border: solid #333;
             border-width: 0.15em 0.15em 0 0;
             transform: translateY(-50%) rotate(135deg);
             transition: transform .3s, border-color .3s;
         }

         /* Submenu terbuka */
         .has-submenu.open .submenu {
             display: block;
         }

         .has-submenu.open>.submenu-toggle {
             display: block;
             margin: 0.25rem 0;
             padding: 0.75rem 1rem;
             background-color: #1e88e5;
             color: #fff;
             border-radius: 0.5rem;
         }

         .has-submenu.open>.submenu-toggle .caret {
             transform: translateY(-50%) rotate(-45deg);
             border-color: #fff;
             right: 1rem;
         }

         .has-submenu.open {
             margin: 0 0.5rem;
             /* ruang kiri/kanan */
         }

         /* Overlay backdrop */
         #mobileMenuOverlay {
             position: fixed;
             inset: 0;
             background: rgba(255, 255, 255, 0.2);
             backdrop-filter: blur(6px);
             visibility: hidden;
             opacity: 0;
             transition: opacity .3s ease;
             z-index: 1020;
         }

         #mobileMenuOverlay.show {
             visibility: visible;
             opacity: 1;
         }

         /* Social footer */
         .mobile-social {
             margin-top: auto;
             padding-top: 2rem;
             border-top: 1px solid rgba(0, 0, 0, 0.1);
         }

         .mobile-social span {
             display: block;
             color: #333;
             font-weight: 500;
             margin-bottom: 0.5rem;
         }

         .mobile-social .icons a {
             font-size: 1.2rem;
             color: #333;
             opacity: 0.8;
             margin-right: 0.75rem;
         }

         .mobile-social .icons a:hover {
             opacity: 1;
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
 <style>
     /* tiket card dasar */
     .ticket-card {
         border: none;
         border-radius: 1rem;
         overflow: hidden;
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
         position: relative;
         transition: transform .3s ease, box-shadow .3s ease;
     }

     /* efek hover: kartu naik & bayangan tegas */
     .ticket-card:hover {
         transform: translateY(-8px);
         box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
     }

     /* overlay putih semi-transparent untuk efek “fade” */
     .ticket-card::before {
         content: "";
         position: absolute;
         inset: 0;
         background: rgba(255, 255, 255, 0);
         transition: background .3s ease;
         border-radius: 1rem;
         pointer-events: none;
     }

     .ticket-card:hover::before {
         /* background: rgba(255, 255, 255, 0.3); */
     }

     /* header kartu */
     .ticket-card .card-header {
         font-size: 1.25rem;
         font-weight: 700;
         padding: 1rem;
         border-bottom: none;
         background: #fff;
     }

     /* section harga */
     .ticket-price-section {
         background: linear-gradient(90deg, #F9DB4A, #FF9F28);
         color: #000;
         padding: 2rem 1rem;
     }

     /* daftar benefit */
     .ticket-features li {
         padding: .5rem 0;
         border-bottom: 1px solid #e9ecef;
     }

     .ticket-features li:last-child {
         border-bottom: none;
     }

     /* tombol BUY NOW */
     .ticket-btn {
         border-radius: .5rem;
         padding: .75rem 1.5rem;
         font-size: 1rem;
         font-weight: 500;
         transition: background-color .3s ease;
     }

     .ticket-btn:hover {
         background-color: #e0a534 !important;
     }

     /* ribbone diskon */
     .ribbon {
         position: absolute;
         top: 1rem;
         left: -2rem;
         width: 8rem;
         text-align: center;
         transform: rotate(-45deg);
         font-size: .85rem;
         font-weight: 600;
         color: #fff;
         z-index: 2;
     }

     .ribbon.bg-danger {
         background: #dc3545 !important;
     }

     /* override utilitas Bootstrap warning menjadi kuning konsisten */
     .bg-warning {
         background: #E8B44B !important;
         border-color: #E8B44B !important;
     }

     /* responsive untuk tablet/mobile */
     @media (max-width: 768px) {
         .ribbon {
             top: .5rem;
             left: -1.5rem;
             width: 6rem;
             font-size: .75rem;
         }

         .display-4 {
             font-size: 2rem !important;
         }
     }

     .reserve-modal-content {
         background: linear-gradient(to bottom, #E8B44B, white);
         border-radius: 1rem;
     }

     .reserve-modal-content .form-control {
         border-radius: .5rem;
     }

     .reserve-modal-content .btn-close {
         filter: invert(1);
     }

     .g-recaptcha {
         margin: 1rem 0;
     }

     /* Jika Qontak menyuntik <qontak-webchat> element */
     qontak-webchat {
         position: fixed !important;
         z-index: 2000 !important;
     }

     /* Jika Qontak bikin iframe dengan src mengandung “qontak” */
     iframe[src*="qontak"] {
         position: fixed !important;
         z-index: 2000 !important;
     }
 </style>
