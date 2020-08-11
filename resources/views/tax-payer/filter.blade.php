<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-search"></i> Search
    </div>
    <div class="panel-body" style="margin: 5px;">
        {{ Form::model($_REQUEST, ['class' => '', 'id' => 'mainForm', 'method' => 'get', 'uri' => 'tax-payers']) }}

        <div class="row">
            <div class="form-group has-feedback col-md-6">
                <div class="input-icon left">
                    {{ Form::text('tin_no', null, ['class' => 'form-control', 'placeholder' => 'টিন নং']) }}
                </div>
            </div>
            <div class="form-group has-feedback col-md-6">
                <div class="input-icon left">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'করদাতার নাম']) }}
                </div>
            </div>
        </div>

        <div class="form-group text-right">
            <a href="{{route('tax-payers.index')}}" class="btn btn-danger">
                <i class="fa fa-btn fa-times"></i> Clear
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-search"></i> খোঁজ করুন
            </button>

        </div>
        {{ Form::close() }}
    </div>
</div>
