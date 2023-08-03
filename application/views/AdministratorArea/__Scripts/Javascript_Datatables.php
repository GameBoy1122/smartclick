<script>
    jQuery(document).ready(function() {
        // DATE PICKER FOR SEARCH
        $('.table-head-search[data-type="date"]').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            autoclose: true,
            format: "dd MM yyyy",
            altField  : $(this),
            altFormat: "yy-mm-dd"
        });

        // SEARCH IN TABLE HEAD SEARCH
        $(document).on("keyup change",".table-head-search",function(){
            var table = $($(this).data("table")).DataTable();
            var type = $(this).data("type");
            var index = $(this).data("index");
            var value = $(this).val();
            switch (type)
            {
                case "date" :
                    if(value != "")
                    {
                        value = new Date(value);
                        value = value.getFullYear()+"-"+(("0" + (value.getMonth() + 1)).slice(-2))+"-"+(('0' + value.getDate()).slice(-2));
                        table.column(index).search(value).draw();
                    }
                    else
                    {
                        table.column(index).search("").draw();
                    }
                    break;
                case "text" :
                    table.column(index).search(value).draw();
                    break;
            }
        });

        // REFRESH IN TABLE HEAD REFRESH
        $(document).on("click",".table-head-refresh",function(){
            var table = $($(this).data("table")).DataTable();
            $(".table-head-search").val("");
            table.columns().search("").draw();
        });

        // FIX OVER FLOW TABLE
        $('.table-scrollable').on('show.bs.dropdown', function () {
            $('.table-scrollable').css( "overflow", "inherit" );
        });
        $('.table-scrollable').on('hide.bs.dropdown', function () {
            $('.table-scrollable').css( "overflow", "auto" );
        });
        $(".dataTables_filter").css("display","none");
    });
</script>