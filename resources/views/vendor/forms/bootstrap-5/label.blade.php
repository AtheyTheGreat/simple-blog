@if($label || $blankLabel)
    <label
        {!! $attributes->merge([
            'class' => $floating
                ? 'form-label position-absolute'
                : ($inline ? $inlineLabelClass : 'form-label mb-2')
        ]) !!}
        for="{{ $attributes->get('id') ?: $id() }}"
    >
        {{ $label }}
        @if($required)
            <x-forms::label-required :framework="$framework" />
        @endif
    </label>
@endif
