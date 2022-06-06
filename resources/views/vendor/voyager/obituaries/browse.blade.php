@extends('voyager::bread.browse')
@section('content')
    @parent
    <input type="hidden" id="total">
@endsection
@section('javascript')
@parent
<script>
    $( document ).ready(function() {
        table = $('#dataTable').dataTable();
        table.fnDestroy();
        $('#dataTable').DataTable({
            dom: 'lBfrtip',
            lengthMenu: [50,100,500,1000,2000,5000,10000,50000,100000],
            buttons: [
                {
                    text: 'Download PDF',
                    className: 'btn btn-default mr-15',
                    download: 'open',
                    title: "UKZ Chema Obituaries",
                    filename: 'UKZChemaObituaries',
                    extend: 'pdfHtml5', //'excelHtml5'
                    messageTop: function(){
                        return "Total Payment: £"+ $("#total").val();
                    },
                    messageBottom: function(){
                        try {
                            let search = api.search();
                            if(!search){
                                return null;
                            }
                            return `Results for: ${search}`;
                        } catch (error) {
                            return null;
                        }
                    },
                    exportOptions: {
                        columns: "thead th:not(.actions)",
                        orthogonal: 'export'
                    }
                }
            ],
            footerCallback: function(row, data, start, end, display) {
                $('#total').val(0);
                let column = 0;
                api = this.api();
                api.columns().header().each((header, i)=> {
                    const txt = $(header).text().trim().toLowerCase();
                    if(txt.indexOf('payment amount') !== -1){
                        column = i;
                    }
                });
                let total = 0;
                api.column(column, { search:'applied' } )
                .data().each(data => {
                    let num = data.replace(/[^0-9\.]+/g, '') * 1;
                    total += num;
                });

                $('#total').val(total.toFixed(2));
            }
        });
        $('.mr-15').css('margin-left', '15px');
    });
</script>
@endsection
