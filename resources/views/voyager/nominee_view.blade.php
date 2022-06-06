<div class="nominee-view" id="{{ $row->field }}">
    @php
        dd($dataTypeContent->{$row->field});
    @endphp
    Test
    {{-- <nominee-view :view="{{ $dataTypeContent->{$row->field} }}"></nominee-view> --}}
</div>