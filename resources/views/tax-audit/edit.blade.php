<div id="editAudit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">অডিট পূরণ</h4>
            </div>

            {{ Form::model($audit, ['route' => ['tax-audits.update', $audit->id], 'method' => 'PUT']) }}
            @csrf

            <div class="modal-body" style="max-height: 400px; overflow-y: scroll">
                <div class="form-group">
                    <label for="pay_date">চালানের তারিখ</label>
                    <input type="date" class="form-control" name="pay_date" value="{{ $audit->pay_date }}">
                </div>

                <div class="form-group">
                    <label for="tax_amount">করের পরিয়াণ (সংখ্যায়)</label>
                    {{ Form::text('tax_amount', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="tax_amount_in_sentence">করের পরিয়াণ (কথায়)</label>
                    {{ Form::text('tax_amount_in_sentence', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="invoice_no">চালান নং</label>
                    {{ Form::text('invoice_no', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="register_no">রেজিস্টারভুক্তির নং</label>
                    {{ Form::text('register_no', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="আপডেট">
                <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
