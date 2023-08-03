<div class="modal fade" id="confirmation-cancel" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-thunderbird">
                        <i class="fa fa-close font-red-thunderbird"></i>
                        <span class="caption-subject bold uppercase"> Cancel Confirmation</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div style="text-align: center;">
                        <div class="caption font-red-thunderbird row" style="padding-top: 30px;padding-bottom: 50px;">
                            <i class="fa fa-close font-red-thunderbird"></i><br>
                            <span class="caption-subject bold uppercase"> Are you sure to cancel ?<br><small>Cancel operation </small></span><br><br>
                            <button type="button" class="btn red" id="cancel-button" onclick="$('#confirmation-cancel').modal('hide');window.history.back();">OK</button>
                            <button type="button" class="btn red btn-outline" data-dismiss="modal">Return</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>