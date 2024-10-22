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

<style>
    /* Modal Overlay */
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
</style>
