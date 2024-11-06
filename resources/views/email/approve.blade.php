<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: sans-serif;
            /*background: #F6F7F7;*/
            background: linear-gradient(72.03deg, #FBFBFB 0%, #F6F7F7 99.18%);
            margin: 5% 25%;
        }

        .body {
            width: 100%;
            background: #FFF;
            border-radius: 8px;
        }

        .header-email {
            padding: 60px;
            padding-bottom: 20px;
            border-bottom-right-radius: 33%;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .body-email {
            padding: 20px 40px;
            font-size: 13px;
            color: #333;
        }

        .footer-email {
            border-top: 1px solid #E5E5E5;
            padding: 20px;
            font-size: 11px;
            color: #333;
            font-weight: bold;
        }


        .flex-code {
            display: flex;
            margin: 4% auto;
        }

        .flex-code .code {
            /*width: 50px;*/
            /*height: 50px;*/
            border-radius: 10px;
            background: #F6F7F7;
            margin-right: 10px;
            /*display: flex;*/
            /*align-items: center;*/
            /*justify-content: center;*/
            font-weight: bold;
            padding: 20px 25px;
        }

        .link-confirm {
            background: #F6F7F7;
            margin: 4% auto;
            padding: 15px 15px;
            border-radius: 7px;
            border: 1px dotted #E5E5E5;
        }

        .btn-link-confirm {
            text-decoration: none;
            background: #F1B22C;
            color: #FFF;
            padding: 17px 16px;
            text-align: center;
            display: block;
            margin: 5% auto;
            width: 20%;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 2px 1px 3px #ddd;
        }

        .img-logo {
            width: 100%;
            /* Full width */
            height: auto;
            /* Maintain aspect ratio */
            display: block;
            /* Removes spacing below the image */
        }

        @media only screen and (max-device-width: 601px) {
            body {
                margin: 5% 5%;
            }

            .btn-link-confirm {
                width: 40%;
            }
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            color: #555;
        }

        .table td,
        .table th {
            font-size: 13px;
            border-top-width: 0;
            border-bottom: 1px solid;
            border-color: transparent !important;
            padding: .75rem !important;
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="body">
        <div class="header-email">
            <img src="{{ asset('img/im2025.png') }}" alt="Image" class="img-logo">
        </div>
        <div class="body-email">
            <p>Dear {{ $users_name }},</p>
            <p>Your registration {{ $pesan ? $pesan : '' }} for {{ $events_name }} has been successfully confirmed.
                This is
                your E - Ticket to
                attend the event.</p>

            <table class="table">
                <tr>
                    <th colspan="3">
                        REGISTRATION DETAILS
                    </th>
                </tr>
                <tr>
                    <th>Event</th>
                    <th>:</th>
                    <td>{{ $events_name }}</td>
                </tr>
                <tr>
                    <th>Date/Time</th>
                    <th>:</th>
                    <td>{{ $events_date }}</td>
                </tr>
                <tr>
                    <th>Venue</th>
                    <th>:</th>
                    <td> The Westin Hotel Jakarta, Indonesia</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <th>:</th>
                    <td> <a href="https://goo.gl/maps/ZBL2T6VCpsyfnPEA7"> Jalan H.R. Rasuna Said Kav. C-22A, Setiabudi,
                            Jakarta 12940 </a></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>:</th>
                    <td> {{ $users_name }}</td>
                </tr>
                <tr>
                    <th>Company</th>
                    <th>:</th>
                    <td> {{ $company_name }}</td>
                </tr>
                <tr>
                    <th>Account Access</th>
                    <th>:</th>
                    <td> {{ $email }}</td>
                </tr>
            </table>
            <p>Below is your QR CODE, please use to check-in and get your {{ $pesan1 ? $pesan1 : 'delegate' }} badge,
                you
                must present this document
                along with your passport or Indonesian identity card (KTP) at the registration table at the venue. </p>

            </p>

            <br>
            <p>
                <img src="{{ $qr_code }}" alt="qr_code_({{ $qr_code }})">
            </p>
            {{-- <p>This email is registered to access <a href="https://indonesiaminer.com/apps">
                    Indonesia Miner Mobile Apps
                </a>
                , where you can network with other
                delegate
                access conference videos, download presentations and exhibitor profiles and products</p> --}}
            {{-- <p>{{ $pesan2 ? $pesan2 : '' }}</p> --}}
            <br>
            <p>If information above incorrect, please contact our support team at
                info@indonesiaminer.com or WhatsApp at <a href="wa.me/628111798599">+628111798599 </a> </p>

            <p>Warm regards,</p>
            <span>The Indonesia Miner Team</span>
        </div>
        <div class="footer-email">
            Do not reply to emails to this email address. This email is sent automatically by our system.
        </div>
    </div>

</body>

</html>
