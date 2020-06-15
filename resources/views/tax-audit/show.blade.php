<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Tax Audit</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />

    <link href='{{ asset('fonts/fonts.css') }}' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .tiny{
            font-size: 9px;
        }
        .tiny2{
            font-size: 11px;
        }
        .tiny3{
            font-size: 13px;
        }
        .dotted{
            border-bottom: 1px dotted black;
        }

        @page {
            size: 40.35cm 24.5cm;
            margin: 5mm 5mm 5mm 5mm; /* change the margins as you want them to be. */
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <button class="btn btn-sm btn-outline-success mt-2" onclick="printDiv('printDiv')">Print</button>
</div>

<div class="container-fluid mt-4" id="printDiv">
    <div class="row">
        <div class="col-md-4">
            @include('tax-audit.layouts.invoice_table')

            <div class="tiny2">
                <p>বাঃ নিঃ মুঃ ৫২/২০১২-১৩, ৬৪,২৬০০০ কপি (সি-১২), ২০১৩</p>
            </div>

            @include('tax-audit.layouts.invoice_footer')
        </div>

        <div class="col-md-4">
            @include('tax-audit.layouts.invoice_table')

            <div class="mt-5">
                @include('tax-audit.layouts.invoice_footer')
            </div>
        </div>

        <div class="col-md-4">
            <div class="text-center">
                <h5>সার্কেল-১ (কোম্পানি)</h5>
                <small>কর অঞ্চল-১, চট্টগ্রাম। <span class="ml-5">আইটি-৩১ সংশোধিত</span></small>

                <br/><br/><br/><br/><br/><br/>
                <div class="mt-4 tiny2">
                    <p>অর্থ প্রদানকারীকে প্রদেয় রশিদ</p>
                    <p>বকেয়া কর</p>
                </div>
            </div>

            <br/><br/>
            @include('tax-audit.layouts.invoice_right')

            <br/><br/><br/><br/><br/><br/><br/>
            <div class="tiny2">
                <p>বাঃ নিঃ মুঃ ৫২/২০১২-১৩, ৬৪,২৬০০০ কপি (সি-১২), ২০১৩</p>
            </div>

            @include('tax-audit.layouts.invoice_footer')
        </div>
    </div>
</div>

<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }
</script>
</body>
