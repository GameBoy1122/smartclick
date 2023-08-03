<div class="modal fade" id="confirmation-save" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-thunderbird">
                        <i class="fa fa-check font-red-thunderbird"></i>
                        <span class="caption-subject bold uppercase"> Save Confirmation</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div style="text-align: center;">
                        <div class="caption font-red-thunderbird row" style="padding-top: 30px;padding-bottom: 50px;">
                            <i class="fa fa-check font-red-thunderbird"></i><br>
                            <span class="caption-subject bold uppercase"> Are you sure to save ?<br><small>Save will overwrite previous data </small></span><br><br>
                            <button type="button" class="btn red-thunderbird" id="save-button" onclick="$('#main-form').submit();$('#confirmation-save').modal('hide')">Save Changes</button>
                            <button type="button" class="btn red btn-outline" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>