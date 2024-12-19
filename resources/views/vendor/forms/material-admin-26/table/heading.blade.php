<th
    @if ($colspan !== null)
        colspan="{{ $colspan }}"
    @endif

    @if ($sortable)
        data-sort-field="{{ $sortable }}"
    @endif

    {{ $attributes->merge([
        'class' => $sortable ? $addSortClass() : ''
    ]) }}
>
    {{ $label }}
</th>
