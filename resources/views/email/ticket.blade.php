<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: sans-serif;
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

        /* .img-logo {
            height: 70px;
        } */

        .img-logo {
            height: 86px;
            width: auto;
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
            font-size: 12px;
            border-top-width: 0;
            border-bottom: 1px solid;
            border-color: transparent !important;
            padding: .75rem !important;
            margin-bottom: 10px;
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="body">
        <div class="body-email">
            <hr>

            <img src="https://sin1.contabostorage.com/ee5317510fad4e33b9e308839348b77b:indonesiaminer/web/img/imXSponsor.png"
                alt="Image" class="img-logo">

            {{-- <table width=100% align=center>

                <tr>
                    <td align=left>
                        <img src="{{ asset('/vendor/front/images/img_indonesia_miner_logo_login.png') }}" alt="Image"
                            class="img-logo">
                    </td>

                    <td align=right>
                        {{ $code_payment }}
                    </td>
                </tr>

            </table> --}}
            <hr>
            <p style="text-align:justify; font-size:12px">This is an E-Ticket confirmation. To check-in and get your
                delegate badge, you must present this document along with your <b>Indonesian Identity Card (KTP)</b> or
                <b>Passport</b> and <b>Business Card</b> at the registration table at the venue.
            </p>

            <table class="table">
                <tr>
                    <th rowspan="6">
                        <img src="https://quickchart.io/qr?text={{ $code_payment }}" style="height: 140px; width: 140px"
                            alt="">
                    </th>
                </tr>
                <tr>
                    <th>Code Access</th>
                    <th>:</th>
                    <td>{{ $code_payment }}</td>
                </tr>
                <tr>
                    <th>Event</th>
                    <th>:</th>
                    <td>Indonesia Miner Conference & Exhibition 2025</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>:</th>
                    <td>June 10 - 12, 2025 (Tuesday - Thursday) </td>
                </tr>
                <tr>
                    <th>Time</th>
                    <th>:</th>
                    <td>08.00 am - 05.00 pm (Jakarta Time)</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <th>:</th>
                    <td>The Westin Hotel Jakarta
                        Jalan H.R. Rasuna Said Kav. C-22A, Setiabudi, Jakarta 129400</td>
                </tr>
            </table>

            <table class="table">
                <tr>
                    <th>Ticket Holder Name</th>
                    <th>:</th>
                    <th>{{ $name }}</th>
                </tr>
                <tr>
                    <th>Company</th>
                    <th>:</th>
                    <th>{{ $company_name }}</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>:</th>
                    <th>{{ $email }}
                </tr>
                <tr>
                    <th>Contact Number</th>
                    <th>:</th>
                    <th>{{ $phone }}
                </tr>
            </table>

            <p>Important Notes:</p>
            <p style="text-align:justify; font-size:12px">Your E-Ticket will include 3 days access to the live
                event including the main conference, exhibition and networking functions (coffee break, lunch and
                networking
                drinks). </p>
            <p style="text-align:justify; font-size:12px">Please find the attached delegate information for
                your reference.</p>
            <p style="text-align:justify; font-size:12px">If you are unable to attend, please contact our team for
                substitution of delegate information. </p>
            <p style="text-align:justify; font-size:12px">Please read the notes carefully. If you need any
                clarifications, please contact our registration team <a href="wa.me/628111798599">+628111798599 </a> or
                email us at
                info@indonesiaminer.com. </p>
            <hr>
        </div>
    </div>

</body>

</html>
