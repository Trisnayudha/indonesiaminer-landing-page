<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<style>
    .wrapper2 {
        width: 95%;
        max-width: 1200px;
        margin: 30px auto;
    }

    .pricing-table h2 {
        font-size: 1.5em;
        padding: 35px 10px;
        margin: 0;
    }

    .description {
        margin-top: 20px;
        font-size: 0.85em;
        padding: 0 40px;
        font-style: italic;
    }

    .description {
        margin-top: 20px;
        font-size: 0.85em;
        padding: 0 40px;
        font-style: italic;
    }

    .price,
    .pricing-box {
        -webkit-transition: all ease-out 0.2s;
        transition: all ease-out 0.2s;
    }

    .price {
        background: #4a8eb2;
        color: #fff;
        font-size: 2em;
        font-weight: 600;
        position: relative;
        padding: 20px 10px;
        display: block;
    }

    .pricing-box:nth-child(2) .price {
        background: #216f99;
    }

    .pricing-box:nth-child(3) .price {
        background: #02537f;
    }

    .pricing-box:hover .price {
        background: #E8B44B;
        box-shadow: inset 0 0 100px 0 rgba(0, 0, 0, 0.3);
        color: #000;
    }

    .pricing-table-divider {
        display: block;
        height: 1px;
        background: rgba(0, 0, 0, 0.08);
        max-width: 80%;
        margin: 20px auto 0;
    }

    .pricing-table {
        border-radius: 3px;
        display: -ms-grid;
        display: inline-grid;
        -ms-grid-columns: (1fr)[3];
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: 20px;
        grid-row-gap: 20px;
        text-align: center;
    }

    .pricing-box {
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.13);
        border: 2px solid rgba(10, 123, 183, 0.14);
    }

    .pricing-box:hover {
        -webkit-transform: scale(1.01);
        transform: scale(1.01);
    }

    .pricing-table ul li {
        padding: 3px 0;
        font-size: 0.95em;
    }

    .pricing-table ul {
        color: #000;
        padding: 15px 60px;
        text-align: left;
    }

    @media (max-width: 750px) {
        .pricing-table {
            -ms-grid-columns: 1fr;
            grid-template-columns: 1fr;
        }

        .pricing-table>div:nth-child(3) {
            -ms-grid-row: 1;
            grid-row-start: 1;
        }

        .pricing-table>div:nth-child(2) {
            -ms-grid-row: 2;
            grid-row-start: 2;
        }

        .pricing-table>div {
            -ms-flex-item-align: top;
            -ms-grid-row-align: top;
            align-self: top;
        }

        .responsive_brought {
            padding-top: 20px !important;
        }
    }

    .responsive_brought {
        padding-top: 70px;
    }

    .pemisah {
        height: 124px;
        width: 2px;
        background: red;
        display: inline-block;
        opacity: 1;
        margin: 0px 25px;
    }

    .list-price2 {
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
    }

    .price-sales {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
    }

    .presale {
        overflow: hidden;
        background: radial-gradient(49.23% 25319.6% at 3.27% 50.77%, rgb(255, 159, 40) 0%, rgba(255, 159, 40, 0) 100%), rgb(248, 219, 74);
        ;
        position: fixed;
        bottom: 0;
        width: 100%;
        border-radius: 20px 20px 0px 0px;
        height: 60px;
        z-index: 500;
    }

    .presale .card-presale {
        display: grid;
        grid-template-columns: repeat(3, auto);
        -webkit-box-align: center;
        align-items: center;
        gap: 0rem 2rem;
        padding: 15px;
        -webkit-box-pack: center;
        justify-content: center;

    }

    .presale .card-presale .flex {
        display: flex;
        gap: 1.5rem;
        -webkit-box-align: center;
        align-items: center;
    }

    .label {
        display: inline-block;
        margin: 0px;
        padding: 10px;
        border-radius: 5px;
        font-size: 25px;
    }

    .btn-side {
        font-size: 14px;
        font-weight: 300;
        text-transform: uppercase;
        line-height: 8px;
        border-radius: 30px;
        border: none;
        background-image: linear-gradient(120deg, #00537a 60%, white 120%);
        color: white;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .btn-side>* {
        display: inline-block;
        transition: all ease-in-out .5s;
    }

    .btn__visible {
        padding: 1.2rem 3rem;
        text-align: center;
        -webkit-text-stroke-width: medium;
    }

    .btn__invisible {
        width: 100%;
        position: absolute;
        padding: 1.2rem 0;
        left: 0;
        top: -100%;
        -webkit-text-stroke-width: medium;
    }

    .btn-side:hover {
        background-image: linear-gradient(160deg, #00537a 60%, white 120%);
    }

    .btn-side:hover .btn__visible {
        transform: translateY(100%);
    }

    .btn-side:hover .btn__invisible {
        top: 0;
    }

    .btn-side:focus {
        outline: none;
    }

    @media only screen and (max-width: 767px) {
        .presale {
            display: none;
        }

        .label {
            font-size: 16px;
        }
    }

    .card-shadow {
        padding: 15px;
        background-color: white;
        color: black;
        box-shadow: 5px 5px 10px #00000015, -5px -5px 10px #00000015;
        border-radius: 20px;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .card-shadow:hover {
        border: 1 solid black
    }

    .pricing-table-get {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-auto-rows: auto;
        gap: 20px;
        margin: auto;
        color: black;
        border-radius: 3px;
    }

    /* Container styling */
    .container-get {
        background-color: #fff;
        width: 450px;
        max-width: 100%;
        height: auto;
        margin: 20px auto;
        border-radius: 20px;
        box-shadow: 5px 5px 8px grey, -5px -5px 10px grey;
        overflow: hidden;
    }

    .container-get .header-get,
    .container-get .header-get2 {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
        font-size: 1.2rem;
        color: #fff;
        text-transform: uppercase;
    }

    .container-get .header-get {
        background-color: rgb(214, 156, 37);
    }

    .container-get .header-get2 {
        background-color: #094662;
    }

    .container-get .background-get,
    .container-get .background-get2 {
        height: 100px;
        position: relative;
        background-color: rgb(232, 180, 75);
    }

    .container-get .background-get2 {
        background-color: #00537a;
    }

    .container-get .background-get:after,
    .container-get .background-get2:after {
        content: attr(data-label);
        color: #fff;
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 1.5rem;
        font-weight: 900;
    }

    .container-get .background-get .img,
    .container-get .background-get2 .img {
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 80px;
        border-radius: 10px;
        box-shadow: 2px 2px 5px grey, -2px -2px 5px grey;
    }

    .container-get .content-get {
        padding: 20px 10px;
    }

    .container-get .content-get ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .container-get .content-get ul li {
        display: flex;
        align-items: center;
        margin: 8px 0;
    }

    .container-get .content-get ul li div {
        display: flex;
        align-items: center;
    }

    .container-get .content-get ul li div svg {
        margin-right: 8px;
        width: 24px;
    }

    .container-get .cssbuttons-io-button {
        width: 80%;
        padding: 0.8em;
        font-size: 1rem;
        margin: 20px auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle, #f8db4a, #ff9f28);
        color: white;
        border: none;
        border-radius: 0.9em;
        box-shadow: inset 0 0 1.6em -0.6em rgba(255, 159, 40, 0.8), rgb(248, 219, 74);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .container-get .cssbuttons-io-button .icon {
        background: #fff;
        width: 2.2em;
        height: 2.2em;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 0.8em;
    }

    .container-get .cssbuttons-io-button .icon i {
        font-size: 1rem;
    }


    .container-get .cssbuttons-io-button .icon svg {
        width: 1.2em;
        color: black;
    }

    .container-get .cssbuttons-io-button:hover .icon {
        width: calc(100% - 1.5em);
    }

    .container-get .cssbuttons-io-button:hover .icon svg {
        transform: translateX(0.1em);
    }

    .top-bar {
        font-size: 12px !important;
    }

    @media (max-width: 768px) {
        .pricing-table-get {
            grid-template-columns: 1fr;
        }

        .container-get {
            width: 90%;
        }

        .container-get .header-get,
        .container-get .header-get2 {
            font-size: 1rem;
            height: 40px;
        }

        .container-get .background-get:after,
        .container-get .background-get2:after {
            font-size: 1.25rem;
        }

        .container-get .cssbuttons-io-button {
            font-size: 0.9rem;
            padding: 0.7em;
        }

        .top-bar {
            font-size: 9px !important;
        }

        /* Responsive mobile menu improvements */
        .mobile_menu_content {
            width: 80%;
            /* Adjust menu width for smaller screens */
        }

        .mobile_main_nav {
            font-size: 14px;
            /* Reduce font size */
        }

        .menu-item a {
            padding: 10px 20px;
            /* Adjust padding for compact look */
        }

        #mobile_menu_close {
            font-size: 20px;
            /* Resize close button */
        }
    }

    @media (max-width: 576px) {
        .container-get {
            width: 100%;
            margin: 0 auto;
        }

        .container-get .header-get,
        .container-get .header-get2 {
            font-size: 0.9rem;
            height: 35px;
        }

        .container-get .background-get:after,
        .container-get .background-get2:after {
            font-size: 1rem;
        }

        .container-get .content-get {
            padding: 10px;
            text-align: left;
        }

        .container-get .content-get ul li div svg {
            width: 20px;
        }

        .container-get .cssbuttons-io-button {
            font-size: 12px;
            padding: 0.6em;
            height: auto;
        }

        .top-bar {
            font-size: 9px !important;
        }
    }

    /* Menyembunyikan dropdown secara default */
    .sub-menu {
        display: none;
        padding-left: 20px;
    }

    /* Menampilkan dropdown saat item menu diklik */
    .menu-item-has-children.open>.sub-menu {
        display: block;
    }

    /* Mengatur transisi agar dropdown muncul halus */
    .sub-menu {
        transition: all 0.3s ease-in-out;
    }

    /* Menyesuaikan ukuran font dan padding di perangkat mobile */
    @media (max-width: 768px) {
        .mobile_menu_content {
            width: 80%;
            /* Sesuaikan lebar menu */
        }

        .mobile_main_nav {
            font-size: 14px;
            /* Menurunkan ukuran font */
        }

        .menu-item a {
            padding: 10px 20px;
            /* Menurunkan padding agar lebih compact */
        }

        .sub-menu {
            padding-left: 20px;
            /* Jarak submenu */
        }

        .menu-item-has-children.open>.sub-menu {
            display: block;
        }

        /* Untuk tombol close menu */
        #mobile_menu_close {
            font-size: 20px;
            /* Mengurangi ukuran tombol close */
        }

        /* Menyesuaikan icon WhatsApp */
        #whatsapp-button {
            position: fixed;
            bottom: 15px;
            right: 15px;
            font-size: 25px;
        }
    }

    .responsive-menu {
        font-size: 20px !important;
    }

    @media (max-width: 768px) {
        .mobile_menu_content {
            width: 80%;
            /* Sesuaikan lebar menu */
        }

        .mobile_main_nav {
            font-size: 14px;
            /* Menurunkan ukuran font */
        }

        .menu-item a {
            padding: 10px 20px;
            /* Menurunkan padding agar lebih compact */
        }

        .sub-menu {
            padding-left: 20px;
            /* Jarak submenu */
        }

        .menu-item-has-children.open>.sub-menu {
            display: block;
        }

        /* Untuk tombol close menu */
        #mobile_menu_close {
            font-size: 20px;
            /* Mengurangi ukuran tombol close */
        }

        /* Menyesuaikan icon WhatsApp */
        #whatsapp-button {
            position: fixed;
            bottom: 15px;
            right: 15px;
            font-size: 25px;
        }

        /* Sesuaikan ukuran font di responsive-menu */
        .responsive-menu {
            font-size: 18px !important;
        }
    }

    .subscribe-callout {
        grid-column: 1 / -1;
        /* mulai kolom 1 sampai kolom terakhir */
        background: #094662;
        color: #fff;
        border-radius: 1rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        padding: 2rem 1.5rem;
        text-align: center;
        margin-top: -195px;
        /* <-- geser 60px ke atas */
        padding: 2rem 1.5rem;
        z-index: 1000;
        font-size: 20px;
    }

    /* Form di dalamnya */
    .subscribe-form {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: .5rem;
        margin-top: 1rem;
    }

    .subscribe-form input {
        flex: 1 1 200px;
        padding: .75rem;
        border: none;
        border-radius: .5rem;
    }

    /* Responsif: ubah jadi satu kolom di mobile */
    @media (max-width: 768px) {
        .pricing-table-get {
            grid-template-columns: 1fr;
        }

        .subscribe-callout {
            grid-column: 1 / -1;
        }

        .container-get {
            margin: 0 1rem;
            /* sisakan 1rem kiri & kanan */
        }

        .subscribe-callout {
            position: sticky !important;
            transform: none !important;
            width: auto !important;
            margin: 1.5rem 1rem;
            /* kiri & kanan 1rem */
            padding: 1.5rem;
            margin-top: -100px;
            font-size: 13px;
        }
    }

    /* 1) Dasar styling nav dan tombol */
    #packageTabs {
        /* reset margin kiri/kanan full width */
        width: 100vw;
        left: 50%;
        margin-left: -50vw;
    }

    #packageTabs .nav-item {
        flex: 1;
    }

    #packageTabs .nav-link {
        display: block;
        width: 100%;
        padding: 1rem 0;
        font-size: 1.125rem;
        font-weight: 600;
        text-align: center;
        color: #666;
        background: #f8f9fa;
        border: none;
        transition: color .2s;
    }

    /* 2) Hilangkan border default bootstrap */
    #packageTabs .nav-link,
    #packageTabs .nav-item {
        border: none !important;
    }

    /* 3) Indicator bar */
    #tabIndicator {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50%;
        /* karena dua tab => 50% */
        height: 4px;
        background: rgb(232, 180, 75);
        /* default warna Exhibition */
        transition: left .3s ease, background .3s ease;
    }

    /* 4) Active font color */
    #packageTabs .nav-link.active {
        color: #222;
    }

    /* 5) Hover color */
    #packageTabs .nav-link:hover {
        color: #00537a;
    }

    /* Kecilkan font body di modal trafficSourcesModal */
    #trafficSourcesModal .modal-body,
    #trafficSourcesModal .modal-body .form-check-label,
    #trafficSourcesModal .modal-body p {
        font-size: 0.85rem;
        /* 85% dari default */
        line-height: 1.3;
    }

    /* Kalau mau cell checkbox-nya juga sedikit padat */
    #trafficSourcesModal .form-check {
        margin-bottom: 0.25rem;
    }
</style>
