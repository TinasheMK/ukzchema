@extends('voyager::bread.edit-add')

@section('javascript')
    @parent
    <script>
        $('select.select2-ajax').on('select2:open', function(){
            const res = setInterval(() => {
                $('li.select2-results__option').each(function(){
                    const text = $(this).text();
                    if(text !== 'Searching…') {
                        setTimeout(() => {
                            clearInterval(res);
                        }, 500);
                    }
                    if(text == 'not_found') $(this).remove();
                })
            }, 100);
        });
    </script>
@endsection
