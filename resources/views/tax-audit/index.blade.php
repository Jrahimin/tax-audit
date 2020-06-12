@extends('layouts.app_v2')

@section('additionalCss')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('tax-audit.filter')
        </div>

        <div class="col-md-12">
            @include('tax-audit.create')
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="panel-title col-md-6">
                            কর চালান তালিকা (টোটালঃ {{$taxAudits->total()}})
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createAudit">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    @include('flash::message')
                    @include('layouts.validation')
                    @if($taxAudits)
                        {{$taxAudits->appends($_REQUEST)->render()}}
                    @endif

                    <table class="table table-responsive table-hover table-striped">
                        <thead>
                        <tr>
                            <th>করদাতার নাম</th>
                            <th>টিন নং</th>
                            <th>অর্থবছর</th>
                            <th>করের পরিমাণ</th>
                            <th>চালান নং</th>
                            <th>রেজিস্টারভুক্তি নং</th>
                            <th>তারিখ</th>
                            <th>একশন</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($taxAudits as $audit)
                            <tr>
                                <td>{{$audit->taxPayer->name}}</td>
                                <td>{{$audit->taxPayer->tin_no}}</td>
                                <td>{{$audit->fiscal_year}}</td>
                                <td>{{$audit->tax_amount}}</td>
                                <td>{{$audit->invoice_no}}</td>
                                <td>{{$audit->register_no}}</td>
                                <td>{{$audit->pay_date}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editAudit">এডিট</a>
                                        </div>
                                        @include('tax-audit.edit')
                                        <div class="col-md-4">
                                            {{ Form::open(['route' => ['tax-audits.destroy', $audit->id], 'method' => 'delete']) }}
                                            <button type="submit" class="btn btn-sm btn-danger confirmation">ডিলেট</button>
                                            {{ Form::close() }}show
                                        </div>
                                    </div>

                                    {{--<div id="deleteAudit" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: indianred">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">নিশ্চিতকরণ</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> আপনি কি নিশ্চিত?</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger" >হ্যাঁ {{ $audit->id }}</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">না</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if($taxAudits)
                        {{$taxAudits->appends($_REQUEST)->render()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@section('additionalJS')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".select2-single").select2({
                placeholder: "-- করদাতা --"
            });

            $('.confirmation').on('click', function () {
                return confirm('আপনি কি নিশ্চিত ?');
            });
        });
    </script>
@endsection

@endsection
