@extends('layouts.app_v2')

@section('content')
    <div class="col-md-10">
        <div class="panel">
            <div class="panel-heading">
                করদাতা পূরণ
            </div>

            <div class="panel-body">
                <form method="POST" action="{{ route('tax-payers.store') }}">
                    @csrf

                    @include('flash::message')
                    @include('layouts.validation')

                    <div class="form-group">
                        <label for="name">নাম</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="tin_no">টিন নং</label>
                        <input type="text" class="form-control" name="tin_no" value="{{ old('tin_no') }}">
                    </div>

                    <div class="form-group">
                        <label for="address">ঠিকানা</label>
                        <textarea rows="3" class="form-control" name="address">{{ old('address') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success pull-right">
                        <i class="fa fa-save"></i> Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
