@extends('voyager::bread.browse')
@php
$obituary = \App\Models\Obituary::findOrFail(request()->obituary);
@endphp

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        Unpaid members for {{$obituary->full_name}} 
    </h1>

    <a href="{{ route('voyager.obituaries.index') }}" class="btn btn-warning btn-add-new">
        <span class="glyphicon glyphicon-list"></span>
        <span> Return to Obituaries </span>
    </a>

    @foreach($actions as $action)
        @if (method_exists($action, 'massAction'))
            @include('voyager::bread.partials.actions', ['action' => $action, 'data' => null])
        @endif
    @endforeach
    @include('voyager::multilingual.language-selector')
</div>
@stop

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
                    text: 'Download CSV',
                    className: 'btn btn-default mr-15',
                    download: 'open',
                    title: "Unpaid Members for {{$obituary->full_name}}",
                    filename: 'UKZChemaObituaries',
                    extend: 'excelHtml5', //'excelHtml5'
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
            ]
        });
        $('.mr-15').css('margin-left', '15px');
    });
</script>
@endsection