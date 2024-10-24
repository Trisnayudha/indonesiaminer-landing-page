<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />

<style>
    /* The Modal (background) */
    .modal-custom {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        /* background-color: rgb(0, 0, 0);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                /* Fallback color */
        /* background-color: rgba(0, 0, 0, 0.4); */
        */
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-custom-content {
        background: rgb(3, 74, 102);
        background: linear-gradient(90deg, rgba(3, 74, 102, 1) 0%, rgba(16, 115, 151, 1) 100%);
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        /* Could be more or less, depending on screen size */
        overflow: hidden;
        /* Prevent content scrolling */
    }

    /* The Close Button */
    .close {
        color: black;
        float: right;
        display: flex;
        justify-content: end;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #f00;
        text-decoration: none;
        cursor: pointer;
    }

    .radio-group {
        display: flex;
        align-items: center;
    }

    .radio-item {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .radio-item input[type="radio"] {
        margin-right: 5px;
    }

    .custom-swal-text {
        font-size: 15px;
        /* Adjust the font size value as needed */
    }

    #paymentNew {
        z-index: 99999999;
        /* Sesuaikan dengan kebutuhan */
    }

    body {
        overscroll-behavior-y: none;
    }

    .play-icon {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 33px;
        color: white;
        opacity: 0.8;
    }

    /* Gaya Umum untuk list-container */
    .list-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        max-width: 1560px;
        margin: 3rem auto 0;
        gap: 2rem;
        list-style-type: none;
        padding: 0;
    }

    .list-container>li {
        width: 319px;
        max-width: 319px;
    }

    .list-item {
        position: relative;
        border-radius: 20px;
        cursor: pointer;
        /* Ubah cursor menjadi pointer */
        overflow: hidden;
        background: white;
        user-select: none;
        display: flex;
        flex-direction: column;
        min-height: 138px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.13);
        border: 2px solid rgba(10, 123, 183, 0.14);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        /* Tambahkan transisi */
    }

    .list-item .tag {
        background: linear-gradient(235deg, rgb(228, 55, 254) 11%, rgb(103, 65, 255) 132.18%);
        color: #fff;
        text-align: center;
        padding: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        font-weight: 600;
        width: 100%;
    }

    .list-item .image-container {
        height: 140px;
        width: 225px;
        /* Lebar default */
        max-height: 140px;
        margin: 0px auto;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        flex-grow: 1;
        padding: 0.75rem;
        overflow: hidden;
    }

    .list-item .image-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        display: block;
        margin: auto;
    }

    .list-item .info {
        padding: 1rem;
        width: 100%;
    }

    .list-item:hover {
        border-color: #E8B44B;
        box-shadow: 0 0 30px #E8B44B;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .description {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* Jumlah baris teks yang ditampilkan */
        -webkit-box-orient: vertical;
    }

    .ellipsis {
        display: inline-block;
    }

    /* CSS Khusus untuk Versi Lite */
    .list-container.lite {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        /* Memusatkan item */
        gap: 1rem;
        max-width: 100%;
    }

    .list-container.lite>li {
        flex: 0 1 calc(16.6667% - 1rem);
        /* 6 item per baris */
        max-width: calc(16.6667% - 1rem);
        box-sizing: border-box;
    }

    .list-container.lite .list-item {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 2px solid rgba(10, 123, 183, 0.14);
        cursor: pointer;
        /* Ubah cursor menjadi pointer */
        min-height: auto;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        /* Tambahkan transisi */
    }

    /* Tambahkan efek hover untuk item lite */
    .list-container.lite .list-item:hover {
        border-color: #E8B44B;
        box-shadow: 0 0 30px #E8B44B;
    }

    .list-container.lite .list-item .image-container {
        height: 140px;
        width: 168px;
        /* Lebar disesuaikan untuk versi lite */
        max-height: 140px;
        margin: 0px auto;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem;
        position: relative;
        overflow: hidden;
    }

    .list-container.lite .list-item .image-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        display: block;
        margin: auto;
    }

    /* Sembunyikan elemen yang tidak diperlukan pada versi lite */
    .list-container.lite .list-item .info,
    .list-container.lite .list-item .tag,
    .list-container.lite .list-item .description {
        display: none;
    }

    /* Media Queries untuk Responsif */
    @media (max-width: 1200px) {
        .list-container.lite>li {
            flex: 0 1 calc(25% - 1rem);
            /* 4 item per baris */
            max-width: calc(25% - 1rem);
        }
    }

    @media (max-width: 768px) {
        .list-container.lite>li {
            flex: 0 1 calc(33.3333% - 1rem);
            /* 3 item per baris */
            max-width: calc(33.3333% - 1rem);
        }
    }

    @media (max-width: 480px) {
        .list-container.lite>li {
            flex: 0 1 calc(50% - 1rem);
            /* 2 item per baris */
            max-width: calc(50% - 1rem);
        }
    }


    .modal-overlay {
        display: none;
        /* Tersembunyi secara default */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Transparansi */
        backdrop-filter: blur(10px);
        /* Efek blur pada latar belakang */
        z-index: 1000;
        justify-content: flex-end;
        /* Agar modal berada di kanan */
        align-items: flex-start;
    }

    /* Ketika modal aktif, gunakan kelas tambahan */
    .modal-overlay.show {
        display: flex;
        /* Tampilkan modal saat dibuka */
    }

    /* Modal Drawer */
    .modal-drawer {
        background-color: #ffffff;
        /* Warna latar modal */
        width: 480px;
        height: 100%;
        border-radius: 40px 0 0 40px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        /* Bayangan untuk modal */
        position: relative;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
    }

    /* Drawer Header */
    .drawer-header {
        display: flex;
        justify-content: flex-end;
        padding: 1rem;
    }

    /* Close Button */
    .close-button {
        cursor: pointer;
        font-size: 1.5rem;
        color: #7C7C7C;
    }

    /* Drawer Content */
    .drawer-content {
        color: #000;
        /* Warna teks konten modal */
    }

    /* Gaya umum untuk konten dalam modal */
    .header {
        text-align: center;
        margin-bottom: 1rem;
    }

    .sponsor-level {
        font-weight: bold;
        color: #ffffff;
        background-color: #06A3FF;
        padding: 0.75rem;
        font-size: 1.25rem;
        text-transform: uppercase;
        letter-spacing: 0.75px;
        margin-bottom: 1rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .description-modal {
        margin: 1.5rem 0;
        text-align: justify;
    }

    .niches {
        list-style-type: none;
        padding: 0;
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .niches li {
        background-color: #000;
        color: #fff;
        padding: 5px 10px;
        border-radius: 6px;
    }

    .media a {
        display: inline-block;
        margin-right: 1rem;
    }

    .program-schedule-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        margin: 30px auto;
        max-width: 100%;
        width: 100%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Title Section */
    .program-title {
        font-size: 28px;
        margin-bottom: 20px;
        font-weight: bold;
        display: inline-block;
        vertical-align: middle;
    }

    /* Day Tabs */
    .program-day-tabs .nav-tabs {
        border-bottom: none;
        background-color: #435469;
        border-radius: 10px 10px 0 0;
        padding: 0;
        text-align: center;
        position: relative;
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .program-day-tabs .nav-tabs li {
        flex-grow: 1;
        position: relative;
    }

    .program-day-tabs .nav-tabs li a {
        color: #ffffff;
        padding: 10px;
        font-size: 16px;
        border-radius: 10px 10px 0 0;
        display: inline-block;
        text-transform: uppercase;
        text-align: center;
    }

    .program-day-tabs .nav-tabs li.active a {
        background-color: #ffffff;
        color: #435469;
        border-bottom: none;
        position: relative;
        z-index: 2;
        padding-top: 5px;
        padding-bottom: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .program-day-tabs .nav-tabs li.active a .program-date {
        display: block;
        margin-top: 5px;
        font-size: 12px;
        color: #666;
    }

    .program-day-tabs .nav-tabs li.active:before {
        content: '';
        position: absolute;
        bottom: 0px;
        left: 50%;
        transform: translateX(-50%);
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #ffffff;
        z-index: 1;
    }

    /* Hall Tabs */
    .program-hall-tabs {
        margin-top: -5px;
    }

    .program-hall-tabs .nav-tabs {
        border-bottom: none;
        margin-top: 0;
        padding: 0;
        text-align: center;
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .program-hall-tabs .nav-tabs li {
        flex-grow: 1;
    }

    .program-hall-tabs .nav-tabs li a {
        color: #9B9B9B;
        padding: 8px;
        background-color: #F8F8F8;
        font-size: 14px;
        text-transform: uppercase;
        display: inline-block;
        text-align: center;
    }

    .program-hall-tabs .nav-tabs li.active a {
        color: #DC143C;
        border-bottom: 2px solid #DC143C;
        background-color: #ffffff;
    }

    /* Session Info */
    .session-info {
        margin-top: 20px;
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 10px;
    }

    .session-header {
        display: flex;
        align-items: center;
    }

    .speaker-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .session-details {
        flex-grow: 1;
    }

    .session-time {
        font-size: 16px;
        color: #666;
        margin-bottom: 5px;
    }

    .session-title {
        font-size: 20px;
        font-weight: bold;
        color: #dc143c;
        margin: 0;
    }

    .session-footer {
        margin-top: 10px;
    }

    .session-footer i {
        margin-right: 5px;
    }

    .session-footer a {
        margin-left: 5px;
    }

    .session-share {
        margin-left: 15px;
        margin-top: 10px;
    }

    .session-share .share-button {
        font-size: 20px;
        color: #dc143c;
    }

    .accordion__item {
        display: block;
        margin-bottom: 15px;
        border: 1px solid rgba(0, 0, 0, .125);
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
    }

    .accordion__button {
        background-color: transparent;
        display: flex;
        position: relative;
        align-items: center;
        padding: 35px 140px 35px 25px;
    }

    .author.author-multi {
        max-width: 100px;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
    }

    .author.author-multi img {
        border-radius: 50%;
        margin-left: -10px;
        width: 45px;
        height: 45px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        border: 2px solid #fff;
    }

    .schedule-info h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .schedule-info ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
        display: flex;
        gap: 20px;
    }

    .schedule-info ul li {
        display: inline;
        font-size: 14px;
        color: #666;
    }

    .schedule-info ul li i {
        color: #ff5252;
        margin-right: 5px;
    }

    .accordion__panel {
        padding: 20px 25px 35px;
    }

    .accordion__panel p {
        margin-bottom: 15px;
        font-size: 14px;
        color: #666;
        line-height: 1.8;
    }

    .location {
        font-size: 14px;
        color: #ff5252;
    }

    .location span {
        color: #1e90ff;
    }

    .btn.btn-primary {
        background-color: #ff5252;
        border-color: #ff5252;
        padding: 10px 20px;
        font-size: 14px;
        color: #fff;
        border-radius: 25px;
        text-transform: uppercase;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn.btn-primary:hover {
        background-color: #e04b4b;
        border-color: #e04b4b;
    }

    .accordion__button {
        cursor: pointer;
        /* Change cursor to pointer for interactivity */
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        /* Smooth transition for hover effects */
    }

    .accordion__button:hover {
        background-color: #f5f5f5;
        /* Lighten the background on hover */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        /* Add subtle shadow for depth */
    }

    .accordion__button:hover h3 {
        color: #ff5252;
        /* Change the color of the title on hover */
    }

    .accordion__button:hover ul li i {
        color: #ff5252;
        /* Change the icon color on hover */
    }

    .accordion__panel {
        display: none;
        transition: max-height 0.5s ease;
        /* Smooth opening and closing of the panel */
        overflow: hidden;
        /* Hide overflow content during transition */
    }

    .speaker-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        /* 2 speakers per row */
        gap: 30px;
        margin-top: 30px;
    }

    @media (max-width: 992px) {
        .speaker-grid {
            grid-template-columns: repeat(2, 1fr);
            /* 2 speakers per row on medium screens */
        }
    }

    @media (max-width: 576px) {
        .speaker-grid {
            grid-template-columns: 1fr;
            /* 1 speaker per row on small screens */
        }
    }

    /* Speaker Item */
    .speaker-item {
        background-color: #fff8eb;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: left;
        transition: transform 0.3s ease;
    }

    .speaker-item:hover {
        transform: translateY(-5px);
    }

    /* Speaker Inner Structure */
    .speaker-inner {
        display: flex;
        align-items: center;
        column-gap: 20px;
    }

    .speaker-thumb {
        width: 100px;
    }

    .speaker-thumb img {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }

    /* Speaker Info */
    .speaker-content {
        flex-grow: 1;
    }

    .speaker-infos h5 {
        font-size: 18px;
        font-weight: bold;
        color: #ff5a5f;
        margin: 0;
    }

    .speaker-infos p {
        font-size: 14px;
        color: #666;
        margin: 5px 0;
    }

    /* Speaker Company Logo */
    .speaker-comp-logo img {
        /* width: 50px; */
        height: 50px;
    }

    /* Speaker Description */
    .spkr-content-details p {
        font-size: 14px;
        color: #555;
        margin: 10px 0;
    }

    /* Social Icons */
    .social-icons {
        display: flex;
        gap: 10px;
    }

    .social-icons li {
        list-style: none;
    }

    .social-icons li a {
        font-size: 18px;
        color: #999;
        transition: color 0.3s;
    }

    .social-icons li a:hover {
        color: #ff5a5f;
    }

    /* Utility classes */
    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }
</style>
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("quform").submit();
    }
</script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- CSS for Flip Effect -->
<style>
    .element.grid.one_fourth_bg {
        position: relative;
        overflow: hidden;
    }

    .speaker_grid_link img {
        width: 100%;
        transition: all 0.3s ease;
    }

    .element.grid.one_fourth_bg:hover .speaker_grid_link img {
        filter: blur(3px);
        color: white !important;
    }

    .bio_overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: #fff !important;
        /* Warna teks putih */
        background-color: rgba(0, 0, 0, 0.6);
        opacity: 0;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        box-sizing: border-box;
    }

    .element.grid.one_fourth_bg:hover .bio_overlay {
        opacity: 1;
    }

    .social-icons {
        margin-top: 10px;
        display: flex;
        justify-content: center;
    }

    .social-icons a {
        margin: 0 5px;
        color: #fff;
        text-decoration: none;
        font-size: 20px;
    }

    .speaker_info_wrapper {
        text-align: center;
    }

    .speaker_info_wrapper h4,
    .speaker_desc {
        margin: 5px 0;
    }
</style>
