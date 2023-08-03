<script>
    jQuery(document).ready(function() {
        // MAIN FORM CHECK
        $("#main-form select").on('change', function () {
            $(this).valid();
        });
    });
</script>