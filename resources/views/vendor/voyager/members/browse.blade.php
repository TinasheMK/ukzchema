@extends('voyager::bread.browse')
@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
    </h1>
    @if($usesSoftDeletes)
        <input type="checkbox" @if ($showSoftDeleted) checked @endif id="show_soft_deletes" data-toggle="toggle" data-on="Hide Terminated" data-off="Show Terminated">
    @endif
</div>
@stop
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
                    title: "UKZ Chema Members",
                    filename: 'UKZChemaMembers',
                    extend: 'pdfHtml5', //'excelHtml5'
                    exportOptions: {
                        columns: "thead th:not(.actions)",
                        orthogonal: 'export'
                    }
                }
        ]
        });
        $('.mr-15').css('margin-left', '15px');
    });
</script>
@endsection
