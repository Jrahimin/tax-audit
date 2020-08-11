@extends('layouts.app_v2')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('tax-payer.filter')
        </div>

        <div class="col-md-12">
            @include('tax-payer.create')
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="panel-title col-md-6">
                            করদাতা তালিকা (টোটালঃ {{$taxPayers->total()}})
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createTaxPayer">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    @include('flash::message')
                    @include('layouts.validation')
                    @if($taxPayers)
                        {{$taxPayers->appends($_REQUEST)->render()}}
                    @endif

                    <table class="table table-responsive table-hover table-striped">
                        <thead>
                        <tr>
                            <th>করদাতার নাম</th>
                            <th>টিন নং</th>
                            <th>ঠিকানা</th>
                            <th>নিবন্ধন তারিখ</th>
                            <th>একশন</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($taxPayers as $taxPayer)
                            <tr>
                                <td>{{$taxPayer->name}}</td>
                                <td>{{$taxPayer->tin_no}}</td>
                                <td>{{$taxPayer->address}}</td>
                                <td>{{$taxPayer->created_at}}</td>
                                <td>
                                    <div class="btn-group">

                                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTaxPayer-{{ $taxPayer->id }}">এডিট</a>
                                        @include('tax-payer.edit')
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTaxPayer-{{ $taxPayer->id }}">ডিলেট</a>
                                    </div>

                                    <div id="deleteTaxPayer-{{ $taxPayer->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            {{ Form::open(['route' => ['tax-payers.destroy', $taxPayer->id], 'method' => 'delete']) }}
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: indianred">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">নিশ্চিতকরণ</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> আপনি কি নিশ্চিত?</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger" >হ্যাঁ</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">না</button>
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if($taxPayers)
                        {{$taxPayers->appends($_REQUEST)->render()}}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
