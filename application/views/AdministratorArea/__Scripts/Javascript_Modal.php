<script>
    jQuery(document).ready(function() {
        // REPLACE MODAL
        $("#modal").on("hidden.bs.modal", function () {
            $(".modal-main").html("");
        });
    });
</script>