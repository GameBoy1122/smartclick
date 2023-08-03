<div class="modal fade" id="confirmation-delete" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-thunderbird">
                        <i class="fa fa-trash font-red-thunderbird"></i>
                        <span class="caption-subject bold uppercase"> Delete Confirmation</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div style="text-align: center;">
                        <div class="caption font-red-thunderbird row" style="padding-top: 30px;padding-bottom: 50px;">
                            <i class="fa fa-trash font-red-thunderbird"></i><br>
                            <input type="hidden" id="delete-url">
                            <span class="caption-subject bold uppercase"> Are you sure to delete ?<br><small>Delete will completely remove data </small></span><br><br>
                            <button type="button" class="btn red" id="delete-button">Delete</button>
                            <button type="button" class="btn red btn-outline" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        $('#confirmation-delete #delete-button').on("click",function () {
            $.ajax({
                type: "GET",
                url: $('#confirmation-delete #delete-url').val(),
                data: new FormData($('.login-form')[0]),
                cache: false,
                contentType: false,
                processData: false,
                success: function(response){
                    try {
                        if(response.code == "0x0000-00000") {
                            location.reload();
                        }else{
                            $("#system-return-error .message").html(response.message);
                            $("#system-return-error").modal("toggle");
                        }
                    } catch(e) {
                        $("#system-return-failed").modal("toggle");
                    }
                },
                error: function(){
                    $("#system-disconnected").modal("toggle");
                }
            });
            $('#confirmation-delete').modal('hide');
        });
    });
</script>