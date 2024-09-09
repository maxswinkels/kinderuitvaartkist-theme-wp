@if (!empty($flex_rows))
    @foreach ($flex_rows as $row)
        @include('flex-rows.' . $row->row_name)
    @endforeach
@endif
