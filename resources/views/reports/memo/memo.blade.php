<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>তানভির ওয়েল মিল</title>

    <style>
        @font-face {
            font-family: 'Firefly';
            font-style: normal;
            font-weight: normal;
            src: {{ url('fonts/kalpurush.ttf') }} format('truetype');
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .button {
            background-color: #67b168;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 8px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            cursor: pointer;
        }
    </style>
</head>

<body style="font-family: kalpurush, DejaVu Sans, sans-serif;">
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <strong>মেসার্স তানভির অয়েল মিলস</strong><br>
                প্রোঃ মোঃ সোহরাওয়ার্দী আলম<br/>
                মোবাঃ ০১৭১৩-৭১২৪৭৫, ০১৭০৩-৪৬৭০৭৫<br/>
                পীরগঞ্জ, ঠাকুরগাঁও<br/>
            </td>
            <td>
                ক্রমিক নং # {{ $salePack->id }}<br>
                তারিখঃ {{ date('d-m-Y', strtotime($salePack->created_at)) }}
            </td>
        </tr>

        <tr>
            <td colspan="2"><hr></td>
        </tr>

        <tr>
            <td>
                ক্রেতার নামঃ {{ $salePack->customer->name }}<br>
                ঠিকানাঃ {{ $salePack->customer->address }}
            </td>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>ক্রম</td>
            <td>বিবরণ</td>
            <td>পরিমাণ</td>
            <td>ইউনিট প্রতি</td>
            <td>টাকা</td>
        </tr>

        @php
            $count = 1;
            $total = 0;
        @endphp
        @foreach($salePack->sales as $sale)
            @php
                $total += $sale->total_price;
            @endphp
            <tr class="details">
                <td>{{ $count++ }}</td>
                <td>{{ $sale->item->title }}</td>
                <td>{{ $sale->quantity }}  {{ $sale->item_unit->name }}</td>
                <td>{{ $sale->unit_price }} টাকা</td>
                <td>{{ $sale->total_price }} টাকা</td>
            </tr>
        @endforeach

        <tr class="heading">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><span> মোটঃ {{ $total }} টাকা</span></td>
        </tr>

        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>

        <tr>
            <td>
                গ্রহীতার স্বাক্ষরঃ
            </td>
        </tr>

    </table>
</div>

<div style="width: 1380px; margin-top: 15px;" id="printDiv">
    <input class="button" type="button" value="print" style="float: right;" onclick="printPage()">
</div>

<script type="text/javascript">
    function printPage() {
        document.getElementById("printDiv").style.display = "none";
        print();
    }
</script>

</body>
</html>
