<div class="modal fade" id="confirmation-refresh" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-thunderbird">
                        <i class="fa fa-refresh font-red-thunderbird"></i>
                        <span class="caption-subject bold uppercase"> Refresh Confirmation</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div style="text-align: center;">
                        <div class="caption font-red-thunderbird row" style="padding-top: 30px;padding-bottom: 50px;">
                            <i class="fa fa-refresh font-red-thunderbird"></i><br>
                            <input type="hidden" id="refresh-url">
                            <span class="caption-subject bold uppercase"> Are you sure to refresh ?<br><small>Refresh will completely remove previous data </small></span><br><br>
                            <button type="button" class="btn red-thunderbird" id="refresh-button">Refresh</button>
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
        $('#confirmation-refresh #refresh-button').on("click",function () {
            $.ajax({
                type: "GET",
                url: $('#confirmation-refresh #refresh-url').val(),
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
            $('#confirmation-refresh').modal('hide');
        });
    });
</script>