<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{\App\CPU\translate('invoice')}}</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <style media="all">
        * {
            margin: 0;
            padding: 0;
            line-height: 1.3;
            color: #111118;
        }

        body {
            font-size: .75rem;
            background: #F5F5F5;
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 25px 15px;
            text-align: left;
            padding: 0 10px;
            margin: 0;
            font-weight: 500;
            font-size: 10px;
            line-height: 133.9%;
            font-family: 'Fira Mono', monospace;
        }

        img {
            max-width: 100%;
        }
        table {
            width: 100%;
        }

        table thead th {
            padding: 8px;
            font-size: 11px;
            text-align: left;
        }

        table tbody th,
        table tbody td {
            padding: 8px;
            font-size: 11px;
        }


        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .content-position {
            max-width: 595px;
            padding: 25px 40px 0;
            margin: 0 auto;
            background: #fff;
            /* box-shadow: 0 0 15px #11111110; */
            /* border-radius: 10px 10px 0 0; */
        }
        .content-footer:first-child,
        .content-position:first-child {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .content-footer:last-child,
        .content-position:last-child {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .text-white {
            color: white !important;
        }

        .bs-0 {
            border-spacing: 0;
        }
        .h2 {
            font-size: 1.5em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }
        .h3 {
            font-weight: 700;
            font-size: 20px;
            line-height: 24px;
            font-family: 'Inter', sans-serif;
        }

        .h4 {
            margin-block-start: 1.33em;
            margin-block-end: 1.33em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
            font-family: 'Inter', sans-serif;
        }
        .inter {
            font-family: 'Inter', sans-serif;
        }
        .fira {
            font-family: 'Fira Mono', monospace;
        }
        .logo{
            max-width: 180px
        }
        .p-0 {
            padding: 0;
        }
        .bold{
            font-weight: 700;
        }
        .mb-10{
            margin-bottom: 15px;
        }
        .block{
            display: block;
        }
        .h-5 {
            height: 5px;
        }
        .black {
            color: #000000
        }
        .pt-0{
            padding-top: 0;
        }
        .w-75px {
            width: 75px;
        }
        table {
            text-align: left;
        }

        .__product-table {
            font-weight: 400;
            font-size: 11px;
            line-height: 13px;
            color: #111118;
            border-collapse: separate;
            border-spacing: 1px;
        }
        .__product-table td {
            background: #FAFAFA;
        }
        .__product-table thead th {
            background: #0177CD;
            color: #fff;
            font-weight: 500;
            font-size: 11px;
            line-height: 13px;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        .text-center{
            text-align: center;
        }
        .pl-0 {
            padding-left: 0 !important;
        }
        .pr-0 {
            padding-right: 0 !important;
        }
        @media (max-width:460px) {
            .content-position{
                padding: 20px 0 0 !important
            }
        }
        @media (max-width:400px) {
            .h3 {
                font-size: 14px;
            }
            .logo {
                width: 100px;
            }
            th {
                vertical-align:top;
            }
        }
        .bg-section {
            background: #FAFAFA;
        }
        .add-info-border-top-bottom tr:first-child td {
            border-top: 1px solid #A3B9D2
        }
        .add-info-border-top-bottom tr:last-child td {
            border-bottom: 1px solid #A3B9D2
        }
        .text-base {
            color: #0177CD
        }
        .content-footer {
            max-width: 595px;
            margin: 0 auto;
            /* border-radius: 0 0 10px 10px; */
            /* box-shadow: 0 0 15px #11111110; */
        }
        .content-footer tr td {
            background: #ECF0F2;
            border-radius: 0 0 10px 10px;
        }
        a {
            display: inline-block;
            text-decoration: none;
        }
    </style>


</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
    <table class="content-position">
        <tr>
            <td>
                <table class="bs-0">
                    <tr>
                        <th class="h3 p-0 text-left">
                            Oder Transaction Statement
                        </th>
                        <th class="p-0 text-right">
                            <img class="logo" src="{{asset('/public/assets/front-end/img/sslcomz.png')}}" alt="logo">
                        </th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="pt-0">
                <table class="bs-0">
                    <tr>
                        <td class="p-0 text-left">
                            <b class="bold black">Date </b>: June 3, 2020 <span class="block h-5"></span>
                            <b class="bold black">Statement:</b>#0317
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td class="pt-0">
                <table class="bs-0">
                    <tr>
                        <td class="p-0 text-left">
                            <table>
                                <tr>
                                    <th class="bold black p-0" style="padding: 3px 0">Date</th>
                                    <td class="p-0" style="padding: 3px 0">: 12/12/2012</td>
                                </tr>
                                <tr>
                                    <th class="bold black p-0" style="padding: 3px 0">Statement</th>
                                    <td class="p-0" style="padding: 3px 0">: Kent Shop</td>
                                </tr>
                                <tr>
                                    <th class="bold black p-0" style="padding: 3px 0">Customer Info</th>
                                    <td class="p-0" style="padding: 3px 0">: Robert Dudly</td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="p-0 text-left">
                            <table>
                                <tr>
                                    <th class="bold black p-0">Delivered By </th>
                                    <td class="p-0" style="padding: 3px 0;">: Delivery Man Admin</td>
                                </tr>
                                <tr>
                                    <th class="bold black p-0">Payment Method</th>
                                    <td class="p-0" style="padding: 3px 0;">: Digital Payment</td>
                                </tr>
                                <tr>
                                    <th class="bold black p-0">Payment Status</th>
                                    <td class="p-0" style="padding: 3px 0;">: Pending</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td class="pt-0">
                <table class="bs-0 __product-table inter">
                    <thead>
                        <tr>
                            <th class="pl-0 pr-0 text-center">SL</th>
                            <th>Details</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Total Ordered Product Price</td>
                            <td class="text-right">$334</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Total Product DIscount</td>
                            <td class="text-right">$334</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Total Coupon DIscount</td>
                            <td class="text-right">$334</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Total Discounted Amount</td>
                            <td class="text-right">$334</td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Total VAT / TAX</td>
                            <td class="text-right">$334</td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Total Delivery Charge</td>
                            <td class="text-right">$334</td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>Total Order Amount</td>
                            <td class="text-right">$334</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td class="pt-0">
                <table class="inter bs-0">
                    <tr>
                        <th class="text-left black bold">Additional Information</th>
                        <th class="text-right black bold">Totals</th>
                    </tr>
                    <tbody class="bg-section add-info-border-top-bottom">
                        <tr>
                            <td>
                                Admin Discount
                            </td>
                            <td class="text-right">
                                $334
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Seller Discount
                            </td>
                            <td class="text-right">
                                $334
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Admin Commission
                            </td>
                            <td class="text-right">
                                $334
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Admin Net Income
                            </td>
                            <td class="text-right">
                                $334
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Seller Net Income
                            </td>
                            <td class="text-right">
                                $334
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td></td>
                        <td class="inter text-center">
                            If you require any assistance or have feedback or suggestions about our site, you can email us at <a href="mailto:contact@6valley.com" class="text-base">contact@6valley.com</a>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
    <table class="content-footer bs-0">
        <tr>
            <td>
                <table>
                    <tr>
                        <td></td>
                        <td class="inter text-center">
                            <a href="tel:contact@6valley.com"><i class="fa fa-phone"></i> +880372786552 </a>
                            <a href="mailto:contact@6valley.com"> <i class="fa fa-envelope" aria-hidden="true"></i> example@email.com</a>
                            <br>
                            <a href="www.6valley.com" style="padding: 5px 0;"><i class="fa fa-globe" aria-hidden="true"></i>www.6valley.com</a>
                            <br>
                            All copy right reserved © 2022 6valley
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
