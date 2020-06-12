<div id="createAudit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">অডিট পূরণ</h4>
            </div>

            <form method="POST" action="{{ route('tax-audits.store') }}">
                @csrf
                <div class="modal-body" style="max-height: 400px; overflow-y: scroll">
                    <div class="form-group">
                        <label for="tax_payer_id">করদাতা</label>
                        <select class="form-control select2-single" name="tax_payer_id">
                            <option value="">-- করদাতা --</option>
                            @foreach($taxPayers as $taxPayer)
                                <option value="{{ $taxPayer->id }}">{{ $taxPayer->name }} - {{ $taxPayer->tin_no }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fiscal_year">অর্থবছর</label>
                        <select class="form-control" name="fiscal_year" value="{{ old('fiscal_year') }}">
                            <option value="">-- অর্থবছর --</option>
                            <option value="২০১৮-২০১৯">২০১৮-২০১৯</option>
                            <option value="২০১৯-২০২০">২০১৯-২০২০</option>
                            <option value="২০২০-২০২১">২০২০-২০২১</option>
                            <option value="২০২১-২০২২">২০২১-২০২২</option>
                            <option value="২০২২-২০২৩">২০২২-২০২৩</option>
                            <option value="২০২৩-২০২৪">২০২৩-২০২৪</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pay_date">চালানের তারিখ</label>
                        <input type="date" class="form-control" name="pay_date" value="{{ old('pay_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="tax_amount">করের পরিয়াণ (সংখ্যায়)</label>
                        <input type="text" class="form-control" name="tax_amount" value="{{ old('tax_amount') }}">
                    </div>

                    <div class="form-group">
                        <label for="tax_amount_in_sentence">করের পরিয়াণ (কথায়)</label>
                        <input type="text" class="form-control" name="tax_amount_in_sentence" value="{{ old('tax_amount_in_sentence') }}">
                    </div>

                    <div class="form-group">
                        <label for="invoice_no">চালান নং</label>
                        <input type="text" class="form-control" name="invoice_no" value="{{ old('invoice_no') }}">
                    </div>

                    <div class="form-group">
                        <label for="register_no">রেজিস্টারভুক্তির নং</label>
                        <input type="text" class="form-control" name="register_no" value="{{ old('register_no') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">সেভ</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
                </div>
            </form>
        </div>
    </div>
</div>
