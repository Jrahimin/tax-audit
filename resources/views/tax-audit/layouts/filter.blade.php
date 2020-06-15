<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-search"></i> Search
    </div>
    <div class="panel-body" style="margin: 5px;">
        {{ Form::model($_REQUEST, ['class' => '', 'id' => 'mainForm', 'method' => 'get', 'uri' => 'tax-audits']) }}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group has-feedback">
                    <div class="form-group has-feedback">
                        <div class="input-icon left">
                            {{ Form::text('tin_no', null, ['class' => 'form-control', 'placeholder' => 'টিন নং']) }}
                        </div>
                    </div>
                    <div class="input-icon left">
                        <select class="form-control" name="fiscal_year">
                            <option value="">-- অর্থবছর --</option>
                            <option value="২০১৮-২০১৯">২০১৮-২০১৯</option>
                            <option value="২০১৯-২০২০">২০১৯-২০২০</option>
                            <option value="২০২০-২০২১">২০২০-২০২১</option>
                            <option value="২০২১-২০২২">২০২১-২০২২</option>
                            <option value="২০২২-২০২৩">২০২২-২০২৩</option>
                            <option value="২০২৩-২০২৪">২০২৩-২০২৪</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <div class="input-icon left">
                        {{ Form::text('invoice_no', null, ['class' => 'form-control', 'placeholder' => 'চালান নং']) }}
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-icon left">
                        {{ Form::text('register_no', null, ['class' => 'form-control', 'placeholder' => 'রেজিস্টারভুক্তির নং']) }}
                    </div>
                </div>

            </div>


        </div>
        <div class="form-group text-right">
            <a href="{{route('tax-audits.index')}}" class="btn btn-danger">
                <i class="fa fa-btn fa-times"></i> Clear
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-search"></i> খোঁজ করুন
            </button>

        </div>
        {{ Form::close() }}
    </div>
</div>
