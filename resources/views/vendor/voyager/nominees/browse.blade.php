@extends('voyager::bread.browse')
@php
$member = request()->member;
@endphp

@section('javascript')
@parent
<script>
    const search = "{{$member}}";
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
                    title: "UKZ Chema Nominees",
                    filename: 'UKZChemaNominees',
                    extend: 'pdfHtml5', //'excelHtml5'
                    exportOptions: {
                        columns: "thead th:not(.actions)",
                        orthogonal: 'export'
                    }
                }
        ]
        }).search(search).draw();
        $('.mr-15').css('margin-left', '15px');
    });
</script>
@endsection