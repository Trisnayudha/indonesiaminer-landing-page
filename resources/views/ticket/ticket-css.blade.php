<style>
    #wrapper.transparent .top_bar:not(.scroll) #menu_wrapper div .nav>li>a,
    #wrapper.transparent .top_bar:not(.scroll) #logo_right_button a#mobile_nav_icon,
    #logo_wrapper .social_wrapper ul li a {
        color: black !important;
    }

    .section-top-ticket {
        justify-content: start !important;
        display: flex;
        -webkit-box-align: center;
        gap: 2rem;
        align-items: center
    }

    .section-line-ticket {
        display: inline-block;
        height: 0.5px;
        width: 100%;
        background-color: gray
    }

    .section-skeleton-ticket {
        list-style-type: none;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* grid-template-columns: repeat(3, 1fr); */
        gap: 1rem;
        padding: 2rem 0px 3rem;
    }

    ul li.kotak-ticket {
        width: 100%;
        background-color: white;
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        cursor: default;
        box-shadow:
            0 4px 6px rgba(0, 0, 0, 0.1),
            /* bayangan besar lembut */
            0 1px 3px rgba(0, 0, 0, 0.08);
        /* bayangan halus di tepi */
        /* filter: drop-shadow(rgba(209, 203, 21, 0.4) 0px 35px 100px); */
        border: none;
    }




    ul li.kotak-ticket.active {
        outline: 4px solid #00537a
    }

    .kotak-top-ticket {
        width: 100%;
        height: 35px;
        padding: 0.5rem 1rem;
        background-color: rgb(248, 219, 74);
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        border-bottom: 1px solid var(--divider);
    }

    .kotak-top-ticket-nodiscount {
        width: 100%;
        height: 35px;
        padding: 0.5rem 1rem;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        border-bottom: 1px solid var(--divider);
    }

    .kotak-body-ticket {
        width: 100%;
        padding: 0.75rem 0.75rem 0px;
        display: flex;
        flex-direction: column;
        -webkit-box-pack: start;
        justify-content: flex-start;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-flex: 1;
        flex-grow: 1;
        position: relative;
        overflow: hidden;
    }

    .kotak-body-tag-ticket {
        position: absolute;
        right: -40%;
        top: 5%;
        background: #E8B44B;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        padding: 15px 3px 6px;
        transform: rotate(40deg);
        width: 100%;
        min-height: 25px;
        text-align: center;
    }

    .kotak-body-tag-ticket p {
        font-size: 10px !important;
        /* sebelumnya 7px, kamu bisa sesuaikan */
    }

    .kotak-img-ticket {
        position: relative;
        width: 100%;
        height: 138px;
        max-width: 210px;
        margin: 0px auto;
        pointer-events: none;
        filter: drop-shadow(rgba(27, 87, 238, 0.4) 0px 0px 1px)
    }

    .kotak-img-ticket.active {
        filter: drop-shadow(rgba(27, 87, 238, 0.4) 0px 0px 45px)
    }


    .kotak-img-responsive-ticket {
        position: absolute;
        inset: 0px;
        box-sizing: border-box;
        padding: 0px;
        border: none;
        margin: auto;
        display: block;
        width: 0px;
        height: 0px;
        min-width: 100%;
        max-width: 100%;
        min-height: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .kotak-price-ticket {
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        font-size: 1.5rem;
    }

    .kotak-price-discount-ticket {
        margin: 0px;
        position: relative;
        font-size: 1rem;
        font-weight: normal;
        opacity: 0.5;
        font-size: 1rem;
        color: var(--color-black);
        font-weight: 700;
        text-decoration: line-through;
    }

    .kotak-footer-ticket {
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        padding: 1rem 1rem 2rem;
        gap: 0.5rem;
        /* width: fit-content; */
        width: auto;
    }

    .btn-select-ticket {
        min-width: 222px;
        min-height: 40px;
        max-width: 100%;
        cursor: pointer;
        background: white;
        border-bottom: 2px solid #E8B44B;
        border-color: #E8B44B;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        color: rgb(4, 0, 21);
        font-weight: 600;
        letter-spacing: 0.05em;
        font-size: 1rem;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        gap: 10px;
        width: auto;
        position: relative;
        overflow: hidden;
    }

    .btn-select-ticket:hover {
        background: #E8B44B;
        color: white;
    }

    .btn-select-ticket.active {
        background: #E8B44B;
        color: white;
    }

    .section-footer-ticket {
        padding: 2rem 0px;
        position: relative;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.25rem;
    }

    ul.section-list-item {
        list-style-position: inside;
        margin-top: 0.5rem;
    }

    .section-price-item {
        display: flex;
        -webkit-box-pack: end;
        justify-content: flex-end;
        align-items: flex-start;
        gap: 1.25rem;
    }

    .section-price-item.total {
        display: flex;
        align-items: flex-start;
        -webkit-box-pack: justify;
        justify-content: space-between;
        gap: 1rem;
        color: var(--text-primary);
    }

    .section-items-ticket {
        text-align: justify;
    }

    .kotak-mobile-ticket {
        /* display: flex;
        flex-direction: column;
        align-items: start; */
        /* position: relative; */
    }

    .kotak-body-mobile-ticket {
        display: none;
        padding: 0px 0.75rem;
        flex-direction: row;
        -webkit-box-align: center;
        align-items: center;
        border-top-left-radius: 0px;
    }

    .kotak-body-mobile-tag-ticket {
        display: none;
    }

    .button-checkout {
        border-color: #E8B44B;
        border-radius: 10px;
        background: white;
        border-bottom: 2px solid #E8B44B;
        border-color: #E8B44B;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        color: rgb(4, 0, 21);
        font-weight: 600;
        letter-spacing: 0.05em;
        font-size: 1rem;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        gap: 10px;
        width: auto;
        position: relative;
        overflow: hidden;
        cursor: not-allowed !important;
    }

    .button-checkout.active {
        background: #E8B44B;
        color: white;
        cursor: pointer !important;
    }

    @media (max-width:1280px) {
        .section-skeleton-ticket {
            grid-template-columns: 1fr 1fr;
            margin: 15px;
        }

        .kotak-body-tag-ticket {
            padding: 8px 6px 6px 27px !important;
        }

        .kotak-footer-ticket {
            padding: 1rem 8rem 2rem;
        }


    }

    .kotak-main-mobile-ticket {
        display: none;
    }

    .kotak-mobile-ticket {
        display: none;
    }

    @media (max-width: 768px) {
        .section-skeleton-ticket {
            grid-template-columns: 1fr;
            padding: 2rem 0px;
        }

        /* .kotak-body-tag-ticket {
            padding: 7px 0px 8px 48px !important;
        } */

        .kotak-mobile-ticket {
            display: block;
            width: 100%;
        }

        .kotak-top-ticket {
            /* display: none; */
        }

        .kotak-body-mobile-ticket {
            display: block;
        }

        .kotak-body-ticket {
            display: none;
        }

        .kotak-footer-ticket {
            /* padding: 0px;
            margin: 0px auto gap: 0px; */
            display: none;
        }

        .kotak-top-ticket-nodiscount {
            display: none;
        }

        .kotak-ticket {
            width: 100%;
            cursor: pointer !important;
            /* outline: transparent solid 5px; */
            background-color: white;
            border-radius: 20px;
            /* overflow: hidden; */
            display: flex;
            flex-direction: column;
            border: 0px;
        }

        .kotak-main-mobile-ticket {
            display: flex;
        }

        .kotak-body-mobile-ticket {
            overflow: hidden !important;
            display: flex;
            padding: 0px 0.75rem;
            flex-direction: row;
            -webkit-box-align: center;
            align-items: center;
            border-top-left-radius: 0px;
        }

        .kotak-ticket.active {
            overflow: hidden;
            margin-top: 20px;
            border: 2px solid white;
            filter: none;
            box-shadow: rgba(255, 255, 255, 0.55) 0px -1px 1px inset;
            filter: drop-shadow(rgba(27, 87, 238, 0.4) 0px 0px 25px);
        }

        /* .kotak-ticket {
            border-top-left-radius: 0px !important;
        } */

        .kotak-mobile-select-ticket {
            font-size: 14px;
            font-weight: 800;
            background-color: rgb(248, 219, 74);
            padding: 3px 10px;
            border-radius: 10px 10px 0px 0px;
            /* display: inline-block; */
            /* z-index: 99; */
            position: absolute;
            top: -31px;
            left: -2px;
        }

        .kotak-body-mobile-image-ticket {
            width: 100px;
            height: 88px;
            margin: 0px 10px;
        }

        .kotak-img-responsive-ticket {
            position: relative;
            box-shadow: rgba(255, 255, 255, 0.55) 0px -1px 1px inset;
            filter: drop-shadow(rgba(27, 87, 238, 0.4) 0px 0px 25px)
        }

        .kotak-body-mobile-discount-ticket {
            border-radius: 50px;
            width: initial;
            padding: 4px 10px;
            height: initial;
            background-color: rgb(248, 219, 74);
            /* display: inline-flex; */
            margin-top: 15px;
        }

        .kotak-body-mobile-price-ticket {
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            gap: 0.75rem;
            color: black;
            position: relative;
            justify-content: flex-start;
            -webkit-box-pack: start;

        }

        .kotak-body-mobile-tag-ticket {
            top: 21%;
            right: -48%;
            height: 11px;
            padding: 9px 60px 6px 27px !important;
            font-size: 8px;
            position: absolute;
            background: #E8B44B;
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            padding: 3px 6px;
            transform: rotate(40deg);
            width: 100%;
            min-height: 25px;
            text-align: center;
        }

        .btn-select-ticket {
            /* min-width: 111px;
            min-height: 40px;
            max-width: 100%; */
        }

        .kotak-mobile-footer-ticket {
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            /* padding: 1rem 1rem 2rem; */
            gap: 0.5rem;
            width: 50%;
            margin: 20px;
            /* width: auto; */
        }

        .kotak-body-mobile-tag-ticket {
            display: none;
        }
    }

    @media (max-width: 690px) {
        .kotak-body-mobile-image-ticket {
            width: 63px;
            height: 69px;
            margin: 0px 10px;
        }

        .kotak-mobile-footer-ticket {
            display: none;
        }

        .kotak-main-mobile-ticket {
            cursor: pointer;
        }

        .section-top-ticket {
            margin-top: 10px;
        }
    }
</style>

<style>
    #add-icon,
    #minus-icon {
        background-color: green;
        color: white;
        font-size: 24px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .addData:hover,
    #minus-icon:hover {
        background-color: #E8B44B;
    }

    .remove[disabled],
    .vocer[disabled],
    .addData[disabled] {
        background-color: lightgray;
        cursor: default;
    }

    #loader {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loader {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 576px) {
        .section-footer-ticket {
            flex-direction: column;
            align-items: stretch;
        }

        .section-items-ticket,
        .section-price-item {
            width: 100%;
            margin-bottom: 1rem;
        }

        .section-price-item {
            text-align: center;
        }

        .section-price-item .total {
            margin-bottom: .5rem;
        }
    }
</style>
