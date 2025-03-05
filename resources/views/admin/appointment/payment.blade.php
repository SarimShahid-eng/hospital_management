<!DOCTYPE html>
<html>

<head>
    <title>Payement Reciept</title>

    <style>
        @page {
            margin-right: 0;
            margin-left: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        @media print {
            .hidden-print {
                display: none;
            }
        }

        .main-container {
            width: 98%;
            float: left;
            margin-left: 1%;
        }

        .foundationDiscount {
            display: none;
        }

        .logo {
            float: left;
            width: 70%;
        }

        .date {
            float: left;
            margin-top: 1%;
        }

        .main-div {
            /*border: 1px solid #000;*/
            margin-bottom: 5% !important;
        }

        .heading {
            float: left;
            width: 100%;
            border: 1px solid #000;
            text-align: center;
            font-size: 15px;
            border-right: 0px;
            border-left: 0px;
        }

        .main-div table {
            text-align: left;
            width: 100%;
            border-collapse: collapse;
        }

        .main-div table tr {
            border-bottom: 1px solid #000;
        }

        .pull-right {
            float: right;
        }

        .text-center {
            text-align: center;
        }

        .ftr-div {
            float: left;
            width: 100%;
            /*border: 1px solid #000;*/
        }

        .ftr-div h4 {
            margin: 0px;
        }

        .ftr-div p {
            padding-left: 10px;
            padding-right: 5px;
        }

        .table-bordered {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>th {
            border: 1px solid #000;
            padding: 5px;
            margin: 0px;
            border-spacing: 0;
        }

        .dating {
            border-bottom-color: transparent !important;
        }

        * {
            font-size: 12px;
        }

        /*            .no-bordertbl{
                            border-left: 1px solid #000;
                            border-right: 1px solid #000;

                        }*/

        .no-bordertbl tr {
            border-bottom: none !important;
        }

        @media print {
            a[href]:after {
                content: none !important;
            }
        }
    </style>


</head>

<body id="strid">
    <a href="javascript:void(0)" onclick="test()" class="hidden-print">Test print</a> <span> </span>

    <div class="main-container" style="height: 1250px;">

        <div class="logo">
            <h3 style="font-size: 23px !important;">Payment Receipt</h3>
            {{-- <img src="{{asset('assets/receipt_image/payment_slip/print_image.png')}}" alt="Logo" height="80px"> --}}

        </div>
        @php
            use Carbon\Carbon;
        @endphp
        <div class="date">
            <b> Issue Date:</b>
            {{ Carbon::parse($appointment->created_at)->setTimezone('Asia/Karachi')->format('M d, Y h:i A') }}
        </div>
        <div class="main-div">
            <div class="heading">
                PAYMENT RECEIPT
            </div>
            <table class="no-bordertbl">
                <tr>
                    <th>MR NO :</th>
                    <td>{{ $appointment->mr_no }}</td>
                </tr>

                <tr>
                    <th>PATIENT NAME :</th>
                    <td>{{ $user->firstname }}</td>
                </tr>

                <tr>
                    <th>AGE :</th>
                    <td>{{ $user->age }}</td>
                </tr>

                <tr>
                    <th>GENDER :</th>
                    <td>{{ $user->gender }}</td>
                </tr>

                <tr>
                    <th>PHONE NO :</th>
                    <td>{{ $user->phone_no }}</td>
                </tr>

                <tr>
                    <th>ADDRESS :</th>
                    <td>{{ $user->address }}</td>
                </tr>

                {{-- <tr>
                    <th>RECIEPT NO :</th>
                    <td>{{$appointment->users->name}}</td>
                </tr> --}}

                {{-- <tr>
                    <th>SESSION :</th>
                    <td>3rd Visit</td>
                </tr> --}}

                <tr style="border-bottom: none;">
                    <th>DATE :</th>
                    <td class="dating">{{ $appointment->appointment_date }}</td>
                </tr>

            </table>

            <div class="heading" style="border-bottom-color: transparent !important;">
                SERVICES FEES </div>
            <table class="table-bordered">
                <tr>
                    <th style="text-align: center;">S#</th>

                    <th>SERVICES</th>
                    <th style="text-align: center;">AMOUNT</th>

                </tr>
                @php
                    $sno = 1;
                @endphp
                @foreach ($appointment_details as $app_detail)
                    <tr>
                        <td style="text-align: center;">{{ $sno++ }}</td>

                        <td>
                            @foreach (@$app_detail->services as $services)
                                {{ $services->name }}
                            @endforeach
                            {{-- {{->name}}/ --}}

                            ( {{ @$app_detail->doctors->firstname }} )
                        </td>
                        <td style="text-align: center;">{{ $app_detail->amount }}</td>

                    </tr>
                @endforeach
            </table>
        </div>

        <div class="ftr-div">
            <table style="width: 100%; text-align: center;">
                <tr>
                    <td><span style="display:block; text-transform:uppercase; font-size:25px;"></span><span
                            style="display:block; text-transform:uppercase; font-size:25px;"></span> </td>
                    <td><strong>TOTAL RECEIVED AMOUNT</strong></td>
                    <td>{{ @$appointment->total }}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>

                <!--<tr>-->
                <!--    <td>ADMIN ADMIN</td>-->

                <!--    <td>ADVANCED</td>-->
                <!--    <td>15000</td>-->

                <!--</tr>-->
                <tr>
                    <td style="border-top: 1px solid #000;"><strong>PREPARED BY</strong></td>
                    {{-- <td><strong>TOTAL RECEIVED AMOUNT </strong> </td> --}}
                    <td><strong>TOTAL AMOUNT </strong> </td>
                    <td>{{ @$appointment->main_total }}</td>
                </tr>
            </table>
        </div>

        <div class="ftr-div text-center">
            <h4 class="heading">Address:</h4>
            {{ $user->address }} <br /> Contact # {{ $user->phone_no }} <br />
            {{-- 49/49, Opp: Hyderi Medical Store, Saddar Bazaar, Main Doctor's Line, Hyderabad. <br/> Contact # 03342624666 <br/> --}}
        </div>

    </div>


</body>

</html>

<script>
    function test() {
        var prtContent = document.getElementById('strid');
        console.log(prtContent);
        var WinPrint = window.open('', '', 'left=0,top=0,width=3in,height=400,toolbar=1,scrollbars=1,status=0');
        WinPrint.document.write('<html><head><title></title></head>');
        WinPrint.document.write('<body style="width:3in;height:200px:" >');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.write('</body></html>');
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
    }

    window.print();
</script>
<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Laboratory Slip</title>

        <style>
            @page{
                margin-right: 0;
                margin-left: 0;
                margin-top: 0;
                margin-bottom: 0;
            }

            @media print{
                .hidden-print{
                    display: none;
                }
            }

            .main-container{
                width: 98%;
                float: left;
                margin-left: 1%;
            }

            .logo{
                float: left;
                width: 70%;
            }
            .date{
                float: left;
                margin-top: 1%;
            }

            .main-div{
                /*border: 1px solid #000;*/
                margin-bottom: 8%;
            }

            .heading{
                float: left;
                width: 100%;
                border: 1px solid #000;
                text-align: center;
                font-size: 15px;
                border-right: 0px;
                border-left: 0px;
            }

            .main-div table{
                text-align: left;
                width: 100%;
                border-collapse: collapse;
            }

            .main-div table tr{
                border-bottom: 1px solid #000;
            }

            .pull-right{
                float: right;
            }

            .text-center{
                text-align: center;
            }

            .ftr-div{
                float: left;
                width: 100%;
                /*border: 1px solid #000;*/
            }

            .ftr-div h4{
                margin: 0px;
            }

            .ftr-div p{
                padding-left: 10px;
                padding-right: 5px;
            }

            .table-bordered{
                border-collapse: collapse;
                border-spacing: 0;
            }

            .dating{
                border-bottom-color: transparent !important;
            }

            *{
                font-size: 12px;
            }

            /*            .no-bordertbl{
                            border-left: 1px solid #000;
                            border-right: 1px solid #000;

                        }*/

            .no-bordertbl tr{
                border-bottom: none !important;
            }
        </style>

    </head>
    <body id="strid">
                    <a href="javascript:void(0)" onclick="test()" class="hidden-print">Test print</a>

        <div class="main-container" style="height: 1300px">
            <div class="logo">
                <img src="https://skindentology.com/demo/assets/print_image.png" alt="Logo">

            </div>
            <div class="date">
                <b> Issue Date:</b>  Jul 24, 2024 07:41 PM            </div>
            <div class="main-div">
                <div class="heading">
                    PATIENT DETAILS
                </div>
                <table class="no-bordertbl">
                    <tr>
                        <th>MR NO :</th>
                        <td>00-00-01-43</td>
                    </tr>

                    <tr>
                        <th>PATIENT NAME :</th>
                        <td>Yusra Memon</td>
                    </tr>

                    <tr>
                        <th>AGE :</th>
                        <td>36</td>
                    </tr>

                    <tr>
                        <th>GENDER :</th>
                        <td>Female</td>
                    </tr>

                    <tr>
                        <th>PHONE NO :</th>
                        <td>0333270065</td>
                    </tr>

                    <tr>
                        <th>ADDRESS :</th>
                        <td>Hyderabad Diplai Memon Society </td>
                    </tr>

                    <tr>
                        <th>RECEIPT NO :</th>
                        <td>000383</td>
                    </tr>

                    <tr style="border-bottom: none;">
                        <th>DATE :</th>
                        <td class="dating">Jul 24, 2024</td>
                    </tr>
                </table>

                <div class="heading" style="border-bottom-color: transparent !important;">
                     HAIR REDUCTION LASER TEST DETAIL                </div>
                <table class="table-bordered">
                    <tr>
                        <th>S#</th>
                        <th>Test Name</th>
                    </tr>
                                            <tr>
                            <td>1</td>
                            <td>
                                 Hair Reduction Laser ( Dr. Hira  )                            </td>
                        </tr>
                                    </table>
            </div>

                        <div style="border: 0px solid #000; width: 98%; text-align: center;"><span style="font-size: 40px;">Que# : </span></div>
                        <div class="ftr-div">
                <table style="border-top: 0px solid #000; text-align: left;">

                    <tr>
                        <td>ADMIN ADMIN</td>

                    </tr>
                    <tr>
                        <td style="border-top: 1px solid #000; text-align: left;"><strong>PREPARED BY</strong></td>
                    </tr>
                </table>
            </div>
            <div class="ftr-div text-center">
                <h4 class="heading">Address:</h4>
                164-B Aptech Computer Center Street, Unit No. 02, Latifabad Hyderabad <br/>
                Contact # &nbsp; &nbsp; &nbsp; 03162129596 &nbsp; &nbsp; 0223407813
            </div>
        </div>
    </body>
</html>
<script>
    function test() {
        var prtContent = document.getElementById('strid');
        console.log(prtContent);
        var WinPrint = window.open('', '', 'left=0,top=0,width=3in,height=400,toolbar=1,scrollbars=1,status=0');
        WinPrint.document.write('<html><head><title></title></head>');
        WinPrint.document.write('<body style="width:3in;height:200px:" >');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.write('</body></html>');
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
    }

    window.print();
</script> -->
