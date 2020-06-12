<div id="editModal" class="modal fade" style="margin-top: 5%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Item </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="address">Item Category</label>
                        <select class="form-control" v-model="anItem.category_id">
                            <option value="">-- Select Item Category --</option>
                            <option v-for="(category, index) in categories" :value="index">@{{ category }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Titel</label>
                        <input type="text" class="form-control" v-model="anItem.title">
                    </div>
                    <div class="form-group">
                        <label for="price">Model</label>
                        <input type="text" class="form-control" v-model="anItem.model">
                    </div>

                    <div class="form-group">
                        <label for="price">Company</label>
                        <input type="text" class="form-control" v-model="anItem.company">
                    </div>

                    <div class="form-group">
                        <label for="price">Serial No</label>
                        <input type="text" class="form-control" v-model="anItem.serial_no">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"  @click.prevent="editItem(item_id)">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
