<div id="editTaxPayer-{{ $taxPayer->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">করদাতা পূরণ</h4>
            </div>

            {{ Form::model($taxPayer, ['route' => ['tax-payers.update', $taxPayer->id], 'method' => 'PUT']) }}
            @csrf

            <div class="modal-body" style="max-height: 400px; overflow-y: scroll">
                <div class="form-group">
                    <label for="name">নাম</label>
                    <input type="text" class="form-control" name="name" value="{{ $taxPayer->name }}">
                </div>

                <div class="form-group">
                    <label for="tin_no">টিন নং</label>
                    <input type="text" class="form-control" name="tin_no" value="{{ $taxPayer->tin_no }}">
                </div>

                <div class="form-group">
                    <label for="address">ঠিকানা</label>
                    <textarea rows="3" class="form-control" name="address">{{ $taxPayer->address }}</textarea>
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
