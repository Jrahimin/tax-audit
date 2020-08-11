<div id="createTaxPayer" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">করদাতা পূরণ</h4>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: scroll">

                <form method="POST" action="{{ route('tax-payers.store') }}">
                    @csrf

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
</div>
